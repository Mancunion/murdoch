<?php if (have_posts()) : ?>
    
    
    <div id="category-posts">
    <?php $count = 1; ?>
    <div class="category-sub">
        <?php while ( have_posts() && $count < 9 ) :
            the_post();
            get_template_part( 'content', 'thumb' );
            if ( $count % 4 == 0):
                print('<div class="cl"></div>');
            endif;
            $count ++;
        endwhile; ?>
    </div>
    </div>
    <div class="cl"></div>
    <div id="category-more-link">
        <?php posts_nav_link(' - ', '<< newer articles', 'older articles >>') ?>
    </div>
    <div class="cl"></div>
<?php else : ?>
    <h2 class="center">Not Found</h2>
    <p class="center">
        Sorry, but you are looking for something that isn't here.
    </p>
<?php endif; ?>
