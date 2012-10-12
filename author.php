<?php
    get_header();
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

<div id="author-content">
    <div id="author-title">
        <?php echo get_avatar( $curauth->ID, $size = '96'); ?>
        <div id="author-details">
            <h1><?php echo $curauth->display_name; ?></h1>
            <p><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></p>
            <p><?php echo $curauth->description; ?></p>
        </div>
    <div class="cl"></div>
    </div>
    <?php get_template_part('loop', 'category'); ?>
</div>
<?php get_sidebar(); ?>
<div class="cl"></div>
<?php get_footer(); ?>
