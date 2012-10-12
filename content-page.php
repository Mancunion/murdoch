<div id="single-title">
    <h1 id="post-<?php the_ID(); ?>">
        <?php the_title(); ?>
    </h1>
</div>
<div id="single-social">
    <a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal">
        Tweet
    </a>
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <div id="fb-root"></div>
    <script src="http://connect.facebook.net/en_US/all.js#appId=253427268023694&amp;xfbml=1"></script>
    <fb:like href="" send="false" layout="button_count" width="450" show_faces="true" action="recommend" font="arial"></fb:like>
    <div id="single-social-google-plus-one">
        <!-- Place this tag where you want the +1 button to render -->
        <g:plusone size="small"></g:plusone>

        <!-- Place this render call where appropriate -->
        <script type="text/javascript">
          window.___gcfg = {lang: 'en-GB'};

          (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            po.src = 'https://apis.google.com/js/plusone.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
          })();
        </script>
    </div>
</div>
<div class="cl"></div>
<div id="single-side">
    <h2 style="font-size: 1.4em">Other articles</h2>
    <?php $categories = get_categories(); ?>
    <?php 
    
    // The following categories shouldn't be displayed in the other articles section (to the right of the article) 
    // or the category header (to the top of the article). Aryeh
    $hiddenCategories = array("uncategorized", "editor approved", "sub-editor approved", "section editor approved");
            
    foreach ( $categories as $category ) 
    {
      // Ensure category is not a hidden category
		  if (!in_array(strtolower($category->name),$hiddenCategories))
       	murdoch_get_headline( $category->slug, array ( get_the_ID() ) );
    }
    ?>
        
</div>

<div id="single-byline">
    <small>
        <?php the_author_posts_link(); ?>
    </small>
    <small>
        <?php the_time('jS F Y') ?>
    </small>
</div>
<div id="single-main">
    <div class="entry">
        <?php if (has_post_thumbnail( $post->ID ) ): ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-image' ); ?>
            <img width="500px" src="<?php echo $image[0]; ?>">
            <div class="caption">
                <?php the_post_thumbnail_caption(); ?>
            </div>
        <?php endif; ?>
        <?php the_content('Read the rest of this entry &raquo;'); ?>
    </div>
    <p class="postmetadata"></p>
    <?php comments_template( '', true ); ?>
</div>
<!-- <?php trackback_rdf(); ?> -->
