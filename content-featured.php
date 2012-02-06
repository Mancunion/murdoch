<?php if(has_post_thumbnail()) : ?>
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
    <?php echo get_the_post_thumbnail(get_the_ID(), 'featured-image') ?>
</a>
<?php endif; ?>
<h2 id="post-<?php the_ID(); ?>">
    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
        <?php the_title(); ?>
    </a>
</h2>
<small class="category-byline">
    <?php the_author_posts_link(); ?>
</small>
<small class="category-byline">
    <?php the_time('jS F Y') ?>
</small>
<div class="entry">
    <?php echo limit_words(get_the_excerpt(), '50'); ?>... <a href="<?php the_permalink() ?>">Read More</a>
</div>
<div class="cl"></div>
<!--<?php trackback_rdf(); ?>-->
