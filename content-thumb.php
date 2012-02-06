<div class="category-sub-content">
    <div class="category-sub-heading">
        <?php if(has_post_thumbnail()) :?>
        <div class="category-sub-content-image">
            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
                <?php echo get_the_post_thumbnail(get_the_ID(), 'column-image') ?>
            </a>
        </div>
        <?php endif; ?>
        <h2 id="post-<?php the_ID(); ?>" style="margin-top: 2px; margin-bottom: 3px">
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
    </div><!--category-sub-heading-->
    <small class="category-byline">
        <?php the_author_posts_link(); ?>
    </small>
    <small class="category-byline" style="margin-bottom: 4px">
        <?php the_time('jS F Y') ?>
    </small>
    <div class="entry">
    	<?php echo limit_words(get_the_excerpt(), '10'); ?>... <a href="<?php the_permalink() ?>">Read More</a>
    </div>
    <div class="cl"></div>
    <!--<?php trackback_rdf(); ?>-->
</div><!-- category-sub-content -->
