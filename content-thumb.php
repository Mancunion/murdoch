<div class="category-sub-content">
    <div class="category-sub-heading">
        <?php if(has_post_thumbnail()) :?>
        <div class="category-sub-content-image">
            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
                <?php echo get_the_post_thumbnail(get_the_ID(), 'column-image') ?>
            </a>
        </div>
        <?php endif; ?>
        <h2 id="post-<?php the_ID(); ?>">
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
    </div><!--category-sub-heading-->
    <small class="category-byline">
        <?php the_author_posts_link(); ?>
    </small>
    <small class="category-byline">
        <?php the_time('F jS, Y') ?>
    </small>
    <div class="entry">
        <?php the_excerpt(); ?>
    </div>
    <div class="cl"></div>
    <!--<?php trackback_rdf(); ?>-->
</div><!-- category-sub-content -->
