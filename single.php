<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<div id="content" role="main">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php
            $category = get_the_category();
            #echo $category[0]->cat_name; ?>
            
            
        <?php get_template_part( 'content', 'single'); ?>
    <?php endwhile; // end of the loop. ?>
</div><!-- #content -->

<?php get_sidebar(); ?>
<div class="cl"></div>
<?php get_footer(); ?>
