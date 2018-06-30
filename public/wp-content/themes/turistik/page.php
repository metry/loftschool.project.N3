<?php get_header(); ?>
    <?php if ( have_posts() ) :	while ( have_posts() ) : the_post(); ?>
        <h1 class="title-page"><?php the_title(); ?></h1>
        <?php if (get_the_post_thumbnail_url()) : ?>
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="aligncenter">
        <?php endif; ?>
        <div class="single-content">
            <?php the_content(); ?>
        </div>
    <?php endwhile; else: ?>
        <p><?php _e('Ничего не найдено'); ?></p>
    <?php endif; ?>
<?php get_footer(); ?>