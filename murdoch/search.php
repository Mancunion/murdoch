<?php
    get_header();
?>

    
    <div id="search-content">
    <section id="primary">
            <div id="content" role="main">
            <?php if ( have_posts() ) : ?>
                <header class="page-header">
                    <h1 class="page-title"><?php printf( 'Search Results for: %s', '<span>' . get_search_query() . '</span>' ); ?></h1>
                </header>
                <?php /* Start the Loop */ ?>
                <?php
            get_template_part('loop', 'category'); ?>
            <?php else : ?>
                <article id="post-0" class="post no-results not-found">
                    <header class="entry-header">
                        <h1 class="entry-title">Nothing Found</h1>
                    </header><!-- .entry-header -->
                    <div class="entry-content">
                        <p>'Sorry, but nothing matched your search criteria. Please try again with some different keywords.'</p>
                        <?php get_search_form(); ?>
                    </div><!-- .entry-content -->
                </article><!-- #post-0 -->
            <?php endif; ?>
            </div><!-- #content -->
        </section><!-- #primary -->
    </div>
<?php
    get_sidebar();
?>
    <div class="cl"></div>
<?php

    get_footer();
?>
