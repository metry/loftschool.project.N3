<?php get_header(); ?>
    <h1 class="title-page">По ключевому слову "<?php single_tag_title(); ?>" найдено:</h1>
    <div class="posts-list">
        <?php if ( have_posts() ) :	while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/post', 'mini' ); ?>
        <?php endwhile; else: ?>
            <p><?php _e('Ничего не найдено'); ?></p>
        <?php endif; ?>
    </div>
    <?php the_posts_pagination(); ?>
<?php get_footer(); ?>
