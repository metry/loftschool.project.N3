<?php get_header(); ?>
<?php if ( have_posts() ) :	while ( have_posts() ) : the_post(); ?>
    <h1 class="title-page"><?php the_title(); ?></h1>
    <?php if (get_the_post_thumbnail_url()) : ?>
    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="aligncenter">
    <?php endif; ?>
    <div class="single-content">
        <?php if (get_post_type() == 'actions'): ?>
            <p><?php echo get_field('action_short_desctiption');  ?> </p>
        <?php else: ?>
            <?php the_content(); ?>
        <?php endif; ?>
    </div>
    <div class="clearfix"></div>
    <div class="page-navigation">
        <?php previous_post_link('%link', '<i class="icon icon-angle-double-left"></i>Предыдущая'); ?>
        <?php next_post_link('%link', 'Следующая<i class="icon icon-angle-double-right"></i>'); ?>
    </div>
<?php endwhile; else: ?>
    <p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>
