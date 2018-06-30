</div>
<!-- sidebar-->
<div class="sidebar">
    <div class="sidebar__sidebar-item">
        <div class="sidebar-item__title">Теги</div>
        <div class="sidebar-item__content">
            <ul class="tags-list">
                <?php
                $tags = get_tags();
                foreach ( $tags as $tag ) :
                    ?>
                    <li class="tags-list__item">
                        <a href="<?php echo get_tag_link( $tag->term_id ); ?>" class="tags-list__item__link"><?php echo $tag->name; ?> ( <?php echo $tag->count; ?> )</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="sidebar__sidebar-item">
        <div class="sidebar-item__title"><a href="/actions">Все акции</a></div>
        <div class="sidebar-item__content">
            <ul class="category-list">
                <?php
                $actions = get_terms('actiontypes', 'orderby=name&hide_empty=0');
                foreach ($actions as $action) :
                    ?>
                    <li class="category-list__item">
                        <a href="<?php echo get_term_link($action->term_id); ?>" class="category-list__item__link">
                            <?php echo $action->name; ?> ( <?php echo $action->count; ?> )
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="sidebar__sidebar-item">
        <div class="sidebar-item__title">Календарь</div>
        <div class="sidebar-item__content">
            <?php the_widget( 'WP_Widget_Calendar' ); ?>
        </div>
    </div>
</div>
</div>
</div>
<footer class="main-footer">
    <div class="content-footer">
        <?php wp_nav_menu(); ?>
        <div class="copyright-wrap">
            <div class="copyright-text">Туристик<a href="/" class="copyright-text__link"> loftschool <?php the_time('Y'); ?></a></div>
        </div>
    </div>
</footer>
</div>
<!-- wrapper_end-->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/main.js"></script>
<?php wp_footer(); ?>
</body>
</html>