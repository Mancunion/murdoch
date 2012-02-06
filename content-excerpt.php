<div class="content-excerpt">
    <div class="content-excerpt-image">
        <?php if(has_post_thumbnail()) : ?>
        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
            <?php echo get_the_post_thumbnail(get_the_ID(), 'column-image') ?>
        </a>
        <?php endif; ?>
    </div>
    <div class="content-excerpt-content">
        <h2 id="post-<?php the_ID(); ?>">
            <a href="<?php the_permalink() ?>" rel="bookmark"
                title="Permanent Link to <?php the_title(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
        <small>
            <?php the_time('jS F Y') ?> by <?php the_author_posts_link(); ?>
        </small>
        <div class="entry">
            <?php the_excerpt(); ?>
        </div>
        <p class="postmetadata">
            <?php comments_popup_link('No Comments »', '1 Comment »', '% Comments »'); ?>
        </p>
    </div>
    <div class="cl"></div>
</div>
<!--<?php trackback_rdf(); ?>-->
