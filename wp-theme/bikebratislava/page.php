<?php get_header(); ?>

<section class="relative min-h-[50vh] flex items-center justify-center bg-brand-luxeDark text-white pt-32 pb-20">
    <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">
        <h1 class="font-serif text-5xl md:text-7xl font-light mb-6"><?php the_title(); ?></h1>
    </div>
</section>

<section class="py-20 bg-stone-50">
    <div class="max-w-4xl mx-auto px-6 font-sans text-stone-600 prose prose-lg prose-stone">
        <?php 
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                the_content();
            endwhile;
        else :
            echo '<p>No content found.</p>';
        endif; 
        ?>
    </div>
</section>

<?php get_footer(); ?>
