<?php get_header(); ?>


    <!-- HERO SECTION -->
    <section class="relative min-h-[75vh] flex items-center justify-center bg-brand-luxeDark text-white overflow-hidden">
        <div class="absolute inset-0 z-0">
            <!-- Scale-110 for parallax -->
            <img src="<?php echo get_template_directory_uri(); ?>/assets/pictures/corporate-group.jpg" 
                 alt="Our guides header background group ride slovakia" 
                 class="w-full h-full object-cover object-center opacity-45 scale-110" id="hero-img" style="will-change: transform;">
            <div class="absolute inset-0 bg-gradient-to-t from-brand-luxeDark via-brand-luxeDark/35 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center flex flex-col items-center">
            <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-6 block opacity-0 fade-in-up editable">The Team</span>
            <h1 class="font-serif text-5xl md:text-7xl font-light mb-6 opacity-0 fade-in-up animation-delay-200 editable">Meet The People Behind The Ride</h1>
            <p class="text-stone-400 text-sm md:text-base font-light max-w-2xl mx-auto leading-relaxed tracking-wider opacity-0 fade-in-up animation-delay-400 editable">
                Great rides are created by great people.
            </p>
        </div>
    </section>    <!-- SECTION: GUIDES PROFILE CARDS -->
    <section class="relative overflow-hidden bg-gradient-to-r from-emerald-50 via-teal-50 to-cyan-50 parallax-section">
        <div class="parallax-bg concrete"></div>
        <div class="max-w-7xl mx-auto py-32 px-6 lg:px-12 relative z-10">
            <div class="space-y-32">
                
                
<?php
$args = array('post_type' => 'guide', 'posts_per_page' => -1, 'order' => 'ASC');
$guides_query = new WP_Query($args);
$count = 0;
if ($guides_query->have_posts()) :
    while ($guides_query->have_posts()) : $guides_query->the_post();
        $count++;
        $is_even = ($count % 2 === 0);
        $role = get_field('role');
        $languages = get_field('languages');
        $years_riding = get_field('years_riding');
        $favourite_route = get_field('favourite_route');
        $coffee_stop = get_field('coffee_stop');
        $quote = get_field('quote');
        $img = get_post_meta(get_the_ID(), '_fallback_image', true);
        
        $card_class = $is_even ? 'bg-brand-luxeDark text-white p-8 lg:p-12 shadow-2xl relative' : '';
        $text_class = $is_even ? 'text-white' : 'text-brand-luxeDark';
        $subtext_class = $is_even ? 'text-stone-300' : 'text-stone-600';
        $label_class = $is_even ? 'text-brand-luxeGold' : 'text-stone-400';
        $border_class = $is_even ? 'border-white/10' : 'border-stone-200/60';
        $quote_class = $is_even ? 'text-stone-400' : 'text-stone-500';
        $btn_class = $is_even ? 'text-white hover:text-stone-300' : 'text-brand-luxeDark hover:text-brand-luxeGold';
?>
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center scroll-reveal <?php echo $card_class; ?>">
            <div class="lg:col-span-5 <?php echo $is_even ? 'lg:order-2' : ''; ?>">
                <div class="aspect-[3/4] overflow-hidden">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700 ease-out">
                </div>
            </div>
            <div class="lg:col-span-7 <?php echo $is_even ? 'lg:order-1' : ''; ?>">
                <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-2 block"><?php echo esc_html($role); ?></span>
                <h2 class="font-serif text-3xl md:text-4xl lg:text-5xl font-light <?php echo $text_class; ?> mb-6"><?php the_title(); ?></h2>
                
                <div class="grid grid-cols-2 gap-6 py-6 border-y <?php echo $border_class; ?> mb-8 text-xs font-sans tracking-wide">
                    <div>
                        <span class="text-[10px] <?php echo $label_class; ?> block font-bold uppercase mb-1">Languages</span>
                        <span class="font-medium <?php echo $text_class; ?>"><?php echo esc_html($languages); ?></span>
                    </div>
                    <div>
                        <span class="text-[10px] <?php echo $label_class; ?> block font-bold uppercase mb-1">Years Riding</span>
                        <span class="font-medium <?php echo $text_class; ?>"><?php echo esc_html($years_riding); ?></span>
                    </div>
                    <div>
                        <span class="text-[10px] <?php echo $label_class; ?> block font-bold uppercase mb-1">Favourite Route</span>
                        <span class="font-medium <?php echo $text_class; ?>"><?php echo esc_html($favourite_route); ?></span>
                    </div>
                    <div>
                        <span class="text-[10px] <?php echo $label_class; ?> block font-bold uppercase mb-1">Coffee Stop & Local Place</span>
                        <span class="font-medium <?php echo $text_class; ?>"><?php echo esc_html($coffee_stop); ?></span>
                    </div>
                </div>

                <?php if($quote): ?>
                <blockquote class="font-serif italic <?php echo $quote_class; ?> mb-8 border-l border-brand-luxeGold pl-6 text-base md:text-lg font-light leading-relaxed">
                    "<?php echo esc_html($quote); ?>"
                </blockquote>
                <?php endif; ?>

                <div class="<?php echo $subtext_class; ?> font-light leading-relaxed text-sm md:text-base tracking-wide font-sans mb-8">
                    <?php the_content(); ?>
                </div>
                
                <a href="<?php echo home_url('/contact'); ?>?guide=<?php echo urlencode(get_the_title()); ?>" class="inline-flex items-center space-x-2 text-[10px] font-bold uppercase tracking-widest <?php echo $btn_class; ?> transition-colors">
                    <span>Request <?php the_title(); ?> as Guide</span>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>
        </div>
<?php
    endwhile;
    wp_reset_postdata();
else:
    echo '<p>No guides found.</p>';
endif;
?>
</div>
        </div>
    </section>

            <?php get_footer(); ?>
