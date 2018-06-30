<?php get_header(); ?>
<?php
if (is_day()) {
    $dateHtml = 'за день';
} elseif (is_month()) {
    $dateHtml = 'за месяц';
} elseif (is_year()) {
    $dateHtml = 'за год';
}
?>
    <h1 class="title-page">Последние новости и акции <?php echo $dateHtml; ?></h1>
    <div class="posts-list">
        <?php if ( have_posts() ) :	while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/post', 'mini' ); ?>
        <?php endwhile; else: ?>
            <p><?php _e('Ничего не найдено'); ?></p>
        <?php endif; ?>
    </div>
<?php the_posts_pagination(); ?>
<?php get_footer(); ?>