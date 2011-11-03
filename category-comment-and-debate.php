<?php
    get_header();
?>

    
    <div id="category-content">
    <h1 id="category-title"><?php single_cat_title(); ?></h1>
    <?php         
    $paged = $wp_query->get( 'paged' );

    if ( ! $paged || $paged < 2 ):
            // This is not a paginated page (or it's simply the first page of a paginated page/post)
        the_post(); // The lead post
    ?>
        <div id="category-lead">
            <?php get_template_part( 'content', 'featured' ); ?>
        </div>
    <?php endif; ?>
        <?php
            get_template_part('loop', 'category'); ?>
    </div>
<?php
    get_sidebar();
?>
    <div class="cl"></div>
<?php

    get_footer();
?>
