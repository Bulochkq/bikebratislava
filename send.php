<?php
ini_set('display_errors', 0);
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: https://bikebratislava.com/");
    exit;
}

/* ---------- Helpers ---------- */
function clean($key, $max = 200) {
    if (!isset($_POST[$key])) return '';
    return mb_substr(htmlspecialchars(trim($_POST[$key]), ENT_QUOTES, 'UTF-8'), 0, $max);
}

$isAjax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') || isset($_POST['ajax']);

function respond($ok, $isAjax, $errorCode = 'error') {
    if ($isAjax) {
        if ($ok) {
            echo "success";
        } else {
            http_response_code($errorCode === 'error_invalid_input' ? 400 : ($errorCode === 'error_rate_limited' ? 429 : 500));
            echo $errorCode;
        }
    } else {
        $status = $ok ? 'success' : 'error';
        header("Location: https://bikebratislava.com/contact.html?status=" . $status);
    }
    exit;
}

/* ---------- Anti-spam ---------- */
// Honeypot: this field is hidden from real users. If a bot fills it, pretend
// the submission succeeded (so the bot moves on) but send nothing.
if (!empty($_POST['company_website'])) {
    respond(true, $isAjax);
}

// Basic per-IP rate limiting: min 20s between sends, max 5 within an hour.
function rate_limited() {
    $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'unknown';
    $dir = sys_get_temp_dir() . '/bb_rl';
    if (!is_dir($dir)) { @mkdir($dir, 0700, true); }
    $file = $dir . '/' . md5($ip) . '.json';
    $now = time();
    $hits = array();
    if (is_file($file)) {
        $data = json_decode(@file_get_contents($file), true);
        if (is_array($data)) { $hits = $data; }
    }
    $recent = array();
    foreach ($hits as $t) { if ($t > $now - 3600) { $recent[] = $t; } }
    if (!empty($recent) && ($now - max($recent)) < 20) { return true; }
    if (count($recent) >= 5) { return true; }
    $recent[] = $now;
    @file_put_contents($file, json_encode(array_values($recent)), LOCK_EX);
    return false;
}
if (rate_limited()) {
    respond(false, $isAjax, 'error_rate_limited');
}

/* ---------- Collect & sanitize ---------- */
$name        = clean('name', 100);
$country     = clean('country', 100);
$email       = clean('email', 120);
$dates       = clean('dates', 120);
$groupSize   = clean('group-size', 100);
$experience  = clean('experience', 100);
$rideType    = clean('ride-type', 120);
$phoneCode   = clean('phone-code', 12);
$phoneNumber = clean('phone-number', 40);
$source      = clean('source', 60);        // "Manual form" or "Ride Builder"
$messageContent = clean('message', 2000);

// Optional phone: combine country dial code + number only if a number was given
$phone = ($phoneNumber !== '') ? trim($phoneCode . ' ' . $phoneNumber) : '';

// Strip injected line-breaks from header-critical fields
$email = str_replace(array("\r", "\n"), '', $email);
$name  = str_replace(array("\r", "\n"), '', $name);

if ($source === '') $source = 'Manual form';

/* ---------- Validate ---------- */
// GDPR: explicit consent is required (proof of consent, not just client-side).
$consent = isset($_POST['gdpr-consent']) && $_POST['gdpr-consent'] !== '';
$isEmailValid = filter_var($email, FILTER_VALIDATE_EMAIL);
if (empty($name) || empty($email) || !$isEmailValid || empty($dates) || !$consent) {
    respond(false, $isAjax, 'error_invalid_input');
}

/* ---------- Recipient ---------- */
// TODO: switch back to info@bikebratislava.com when the mailbox is ready.
$to = "bulochkq@gmail.com";

$fromName = ($source === 'Manual form') ? "New website inquiry" : "New ride-builder request";
$subject  = "New Bike Booking Inquiry — " . $name . " (" . $source . ")";

/* ---------- Build table rows (only those with a value) ---------- */
$rows = array(
    'Name'           => $name,
    'Country'        => $country,
    'E-mail'         => '<a href="mailto:' . $email . '" style="color:#111111;text-decoration:underline;">' . $email . '</a>',
    'Phone'          => ($phone !== '' ? '<a href="tel:' . str_replace(' ', '', $phone) . '" style="color:#111111;text-decoration:underline;">' . $phone . '</a>' : ''),
    'Travel Dates'   => $dates,
    'Group Size'     => $groupSize,
    'Experience'     => $experience,
    'Preferred Ride' => $rideType,
);

$rowsHtml = '';
foreach ($rows as $label => $value) {
    if ($value === '' || $value === null) continue;
    $rowsHtml .= '
                    <tr>
                        <td class="label">' . $label . '</td>
                        <td class="value">' . $value . '</td>
                    </tr>';
}

$messageBlock = '';
if (!empty($messageContent)) {
    $messageBlock = '
            <div class="note-section" style="margin-top: 25px;">
                <div class="note-title" style="font-weight: bold; color: #8E8E8E; font-size: 11px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;">Message / Special Requests:</div>
                <div class="note-box">' . nl2br($messageContent) . '</div>
            </div>';
}

/* ---------- Email HTML ---------- */
$message = '<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Booking Inquiry</title>
    <style>
        body { font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; background-color: #F8F9FA; color: #111111; margin: 0; padding: 20px; -webkit-font-smoothing: antialiased; }
        .container { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 16px; border: 1px solid #E9ECEF; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.03); }
        .header { background-color: #D71920; padding: 30px; text-align: center; border-bottom: 3px solid #B8141A; }
        .header h2 { color: #ffffff; margin: 0; font-size: 20px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; }
        .header .badge { display:inline-block; margin-top:12px; padding:5px 14px; background:rgba(255,255,255,0.18); border:1px solid rgba(255,255,255,0.4); border-radius:30px; color:#ffffff; font-size:10px; letter-spacing:2px; text-transform:uppercase; font-weight:600; }
        .content { padding: 40px 30px; }
        .intro { font-size: 16px; line-height: 1.6; color: #555555; margin-top: 0; margin-bottom: 30px; }
        .table-wrapper { border: 1px solid #E9ECEF; border-radius: 12px; overflow: hidden; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; table-layout: fixed; }
        td { padding: 14px 18px; font-size: 14px; line-height: 1.5; border-bottom: 1px solid #E9ECEF; word-wrap: break-word; word-break: break-word; overflow-wrap: break-word; }
        tr:last-child td { border-bottom: none; }
        td.label { font-weight: bold; color: #8E8E8E; width: 150px; text-transform: uppercase; font-size: 11px; letter-spacing: 1px; }
        td.value { color: #111111; font-weight: 500; }
        .note-box { background-color: #F8F9FA; border-left: 4px solid #D71920; padding: 15px 20px; border-radius: 0 8px 8px 0; margin-top: 5px; font-style: italic; color: #333333; line-height: 1.6; word-wrap: break-word; word-break: break-word; overflow-wrap: break-word; }
        .footer { background-color: #F8F9FA; padding: 20px; text-align: center; font-size: 11px; color: #8E8E8E; border-top: 1px solid #E9ECEF; font-weight: 600; letter-spacing: 1px; text-transform: uppercase; }
        .reply-cta { display:inline-block; margin-top:6px; padding:12px 26px; background:#111111; color:#ffffff !important; text-decoration:none; border-radius:8px; font-size:12px; letter-spacing:1px; text-transform:uppercase; font-weight:600; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Booking Inquiry</h2>
            <span class="badge">' . $source . '</span>
        </div>
        <div class="content">
            <p class="intro">Dobrý deň,<br>z webu <strong>bikebratislava.com</strong> bol odoslaný nový dopyt o jazdu:</p>
            <div class="table-wrapper">
                <table>' . $rowsHtml . '
                </table>
            </div>
' . $messageBlock . '
            <div style="margin-top:30px; text-align:center;">
                <a class="reply-cta" href="mailto:' . $email . '?subject=Re:%20Your%20Bike%20Bratislava%20inquiry">Reply to ' . $name . '</a>
            </div>
        </div>
        <div class="footer">
            &copy; ' . date('Y') . ' BIKE BRATISLAVA
        </div>
    </div>
</body>
</html>';

/* ---------- Headers ---------- */
$headers  = "From: " . $fromName . " <noreply@bikebratislava.com>\r\n";
$headers .= "Reply-To: " . $name . " <" . $email . ">\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

/* ---------- Send ---------- */
$sent = @mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $message, $headers);
respond($sent, $isAjax);
?>
