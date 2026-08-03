<?php
/**
 * Сторінка «не знайдено». Використовує спільні шапку й підвал теми,
 * тому меню й контакти на ній такі самі, як на решті сайту.
 */
get_header();
?>
<div class="top-bar">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="brand">
            <span class="brand-name">BIKE BRATISLAVA</span>
            <span class="brand-sub">by Velocity</span>
        </a>
    </div>

    <main>
        <div class="code">4<span>0</span>4</div>
        <div class="divider"></div>
        <div class="kicker">Off The Route</div>
        <h1>This page doesn't exist</h1>
        <p class="lead">
            Looks like you've taken a wrong turn — the page you're looking for was moved,
            renamed or never existed. Let's get you back on track.
        </p>
        <div class="actions">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">Back To Home</a>
            <a href="<?php echo esc_url(home_url('/tours/')); ?>" class="btn btn-ghost">Tours &amp; Rides</a>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-ghost">Contact Us</a>
        </div>
    </main>

    <div class="bottom-bar">
        <span>&copy; 2026 Bike Bratislava &middot; NEW VELO s. r. o.</span>
        <a href="mailto:silvia@velocity.sk">silvia@velocity.sk</a>
    </div>

<?php get_footer(); ?>
