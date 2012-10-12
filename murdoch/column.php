<a href="<?php $category_link ?>" ><h2 class="category-name"><?php echo $cat_name; ?></h2></a>
<?php
    $first_time = true;
    while ( $the_query->have_posts() ) : 
        $the_query->the_post();
?>
        <li>
<?php
        if ( $first_time ):
            if(has_post_thumbnail()) :
?>
                <div class="section-image">
                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
                        <?php the_post_thumbnail('column-image') ?>
                    </a>
                </div>
<?php
            endif;
?>
                 <div class="section-lead">
                <h3 class="section-title">
<?php
        endif;
?>
                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
                    <?php the_title(); ?>
                </a>
<?php
        if ( $first_time ):
?>
                </h3>
                <?php the_excerpt(); ?>
            
            </div>
            <div class="cl"></div>
<?php
            $first_time = false;
        endif;
?>
        </li>
<?php
    endwhile;

    // Reset Post Data
    wp_reset_postdata();
?>
