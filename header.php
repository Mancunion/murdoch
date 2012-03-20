<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Mancunion
 * @subpackage Murdoch
 * @since Murdoch 0.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title>
    <?php
        /*
        * Print the <title> tag based on what is being viewed.
        */
        global $page, $paged;

        $separator = '>';

        wp_title( $separator, true, 'right' );

            // Add the blog name.
        bloginfo( 'name' );

            // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
            if ( $site_description && ( is_home() || is_front_page() ) )
        echo " $separator $site_description";

        // Add a page number if necessary:
        if ( $paged >= 2 || $page >= 2 )
        echo " $separator " . sprintf( 'Page %s', max( $paged, $page ) );
    ?>
    </title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/image/favicon.ico" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php
        /* We add some JavaScript to pages with the comment form
         * to support sites with threaded comments (when in use).
         */
        if ( is_singular() && get_option( 'thread_comments' ) )
            wp_enqueue_script( 'comment-reply' );

        /* Always have wp_head() just before the closing </head>
         * tag of your theme, or you will break many plugins, which
         * generally use this hook to add elements to <head> such
         * as styles, scripts, and meta tags.
         */
        wp_head();
    ?>
<!--<link rel="stylesheet" type="text/css" href="//webputty.commondatastorage.googleapis.com/agtzfmNzc2ZpZGRsZXIMCxIEUGFnZRiT2CkM.css" />
<script type="text/javascript">(function(w,d){if(w.location!=w.parent.location||w.location.search.indexOf('__preview_css__')>-1){var t=d.createElement('script');t.type='text/javascript';t.async=true;t.src='http://www.webputty.net/js/agtzfmNzc2ZpZGRsZXIMCxIEUGFnZRiT2CkM';(d.body||d.documentElement).appendChild(t);}})(window,document);</script>
<script type="text/javascript" src="<?php bloginfo('template_directory')?>/js/jquery-1.6.2.js"></script>-->
 <script type="text/javascript">
 $(document).ready(function() {
       $(".feature-wrapper").click(function() {
         alert("Hello world!");
       });
     });
 </script>
    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-25601882-1']);
      _gaq.push(['_trackPageview']);
      
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
                          
  </script>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed">
    <header id="branding" role="banner">
        <div id="branding-top">
            <?php
                // Has the text been hidden?
                if ( 'blank' == get_header_textcolor() ) :
            ?>
                <div class="only-search<?php if ( ! empty( $header_image ) ) : ?> with-image<?php endif; ?>">
                <?php get_search_form(); ?>
                </div>
            <?php
                else :
            ?>
                <?php get_search_form(); ?>
            <?php endif; ?>
            <div id="branding-top-date">
            <?php
                murdoch_get_blog_time() ?>
                | Manchester, UK
            </div>
        </div>
        <div class="cl"></div>
        <div id="branding-bottom">
            <hgroup>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                    <img src="<?php bloginfo('template_directory'); ?>/image/mancunion-logo.png" title="" alt="" />
                </a>
            </hgroup>

            <?php
                // Check to see if the header image has been removed
                $header_image = get_header_image();
                if ( ! empty( $header_image ) ) :
            ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php
                    // The header image
                    // Check if this is a post or page, if it has a thumbnail, and if it's a big one
                    if ( is_singular() &&
                            has_post_thumbnail( $post->ID ) &&
                            ( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( HEADER_IMAGE_WIDTH, HEADER_IMAGE_WIDTH ) ) ) &&
                            $image[1] >= HEADER_IMAGE_WIDTH ) :
                        // Houston, we have a new header image!
                        echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
                    else : ?>
                    <img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
                <?php endif; // end check for featured image or standard header ?>
            </a>
            <?php endif; // end check for removed header image ?>
            
        <div id="description">
        <?php echo get_bloginfo ('description'); ?>
        </div>
        </div>
        <div id="ad-banner">
            <img src="<?php bloginfo('template_directory'); ?>/image/mobile-ad.jpg"/>
        </div>
        <div class="cl"></div>

    </header><!-- #branding -->

    <script type="text/javascript">
    $(document).ready(function() {
        $("#main-menu  > li").hover(function() {
            $(this).find("ul.children").stop(true, true).show(); 
            $(this).hover(function() {
            }, function() {
                $(this).find("ul.children").stop(true, true).hide();
            });
        });
    });
    </script>
    <div id="main-menu">
		<li class="cat-item"><a href="/" title="Home">Home</a></li>
        <?php wp_list_categories( array('exclude' => '4122,4813,3836', 'title_li' => '', 'hierarchical' => True, 'depth' => 2) ); ?>
    </div>
<div id="main">
