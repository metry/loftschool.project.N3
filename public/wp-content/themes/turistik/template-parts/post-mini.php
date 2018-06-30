<!-- post-mini-->
<div class="post-wrap">
    <?php if (get_the_post_thumbnail_url()) : ?>
        <div class="post-thumbnail"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="post-thumbnail__image"></div>
    <?php endif; ?>
    <div class="post-content">
        <div class="post-content__post-info">
            <div class="post-date">
                <?php echo get_the_date(); ?>
            </div>
        </div>
        <div class="post-content__post-text">
            <div class="post-title">
                <?php the_title(); ?>
            </div>
            <div>
                <?php if (get_post_type() == 'actions'): ?>
                    <div class="action-text"><?php echo get_field('action_short_desctiption');  ?> </div>
                <?php else: ?>
                    <?php the_excerpt(); ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="post-content__post-control"><a href="<?php the_permalink(); ?>" class="btn-read-post">Читать далее >></a></div>
    </div>
</div>
<!-- post-mini_end-->