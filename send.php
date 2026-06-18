<?php
ini_set('display_errors', 0);
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $name = mb_substr(htmlspecialchars(trim($_POST["name"])), 0, 100);
    $country = mb_substr(htmlspecialchars(trim($_POST["country"])), 0, 100);
    $email = mb_substr(htmlspecialchars(trim($_POST["email"])), 0, 100);
    $dates = mb_substr(htmlspecialchars(trim($_POST["dates"])), 0, 100);
    
    // Select options (names match select attributes in contact.html)
    $groupSize = mb_substr(htmlspecialchars(trim($_POST["group-size"])), 0, 100);
    $experience = mb_substr(htmlspecialchars(trim($_POST["experience"])), 0, 100);
    $rideType = mb_substr(htmlspecialchars(trim($_POST["ride-type"])), 0, 100);
    
    $messageContent = mb_substr(htmlspecialchars(trim($_POST["message"])), 0, 2000);

    // Clean critical fields from injection line-breaks
    $email = str_replace(array("\r", "\n"), '', $email);
    $name = str_replace(array("\r", "\n"), '', $name);

    $isAjax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') || isset($_POST['ajax']);

    $isEmailValid = filter_var($email, FILTER_VALIDATE_EMAIL);

    if (empty($name) || empty($email) || !$isEmailValid || empty($dates)) {
        if ($isAjax) {
            http_response_code(400);
            echo "error_invalid_input";
        } else {
            header("Location: https://bikebratislava.com/contact.html?status=error");
        }
        exit;
    }

    // TARGET RECIPIENT EMAIL (Change this to your actual address)
    $to = "info@bikebratislava.com";
    
    $subject = "New Bike Booking Inquiry - " . $name;

    // Structured Email Layout matching new Visit Bratislava theme
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Booking Inquiry</h2>
        </div>
        <div class="content">
            <p class="intro">Dobrý deň,<br>z webu <strong>bikebratislava.com</strong> bol odoslaný nový dopyt o jazdu:</p>
            <div class="table-wrapper">
                <table>
                    <tr>
                        <td class="label">Name</td>
                        <td class="value">' . $name . '</td>
                    </tr>
                    <tr>
                        <td class="label">Country</td>
                        <td class="value">' . $country . '</td>
                    </tr>
                    <tr>
                        <td class="label">E-mail</td>
                        <td class="value"><a href="mailto:' . $email . '" style="color: #111111; text-decoration: underline;">' . $email . '</a></td>
                    </tr>
                    <tr>
                        <td class="label">Travel Dates</td>
                        <td class="value">' . $dates . '</td>
                    </tr>
                    <tr>
                        <td class="label">Group Size</td>
                        <td class="value">' . $groupSize . '</td>
                    </tr>
                    <tr>
                        <td class="label">Experience</td>
                        <td class="value">' . $experience . '</td>
                    </tr>
                    <tr>
                        <td class="label">Preferred Ride</td>
                        <td class="value">' . $rideType . '</td>
                    </tr>
                </table>
            </div>

            <div class="note-section" style="margin-top: 25px;">
                <div class="note-title" style="font-weight: bold; color: #8E8E8E; font-size: 11px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;">Message / Special Requests:</div>
                <div class="note-box">' . nl2br($messageContent) . '</div>
            </div>
        </div>
        <div class="footer">
            &copy; 2026 BIKE BRATISLAVA
        </div>
    </div>
</body>
</html>';

    $headers = "From: " . $to . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    if (@mail($to, $subject, $message, $headers)) {
        if ($isAjax) {
            echo "success";
        } else {
            header("Location: https://bikebratislava.com/contact.html?status=success");
        }
    } else {
        if ($isAjax) {
            http_response_code(500);
            echo "error";
        } else {
            header("Location: https://bikebratislava.com/contact.html?status=error");
        }
    }
    exit;
} else {
    header("Location: https://bikebratislava.com/");
    exit;
}
?>
