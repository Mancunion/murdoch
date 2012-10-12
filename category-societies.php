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
    <div id="category-lead">
    <div id="calendar-info">
        <h1 id="calendar-title">Events calendar</h1>
        <p>Keep up to date with what's on with this events calendar.</p>
        <p>
    To add your society event here please email your event with a brief
    description including time, date and venue to
    <a href="mailto:societyspotlight@mancunion.com">societyspotlight@mancunion.com</a> with 'Listing' as your email subject.</p>
    </div>
    
    <iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;mode=AGENDA&amp;height=300&amp;wkst=2&amp;src=mancunion.spotlight%40gmail.com&amp;ctz=Europe%2FLondon" style=" border-width:0 " width="550" height="300" frameborder="0" scrolling="no"></iframe>
        <div class="cl"></div>
        </div>
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
