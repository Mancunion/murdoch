<div id="single-title">
   <?php
        $category = get_the_category();
    ?>
    <div class="section" id="<?php echo map_section_name($category[0]->slug) ?>">
       <?php
            $category = array_reverse($category); 
            $cat = array_pop($category);
            echo '<h2 class="category-name" style="border-top: none"><a class="category-header" href=' . get_category_link( $cat->cat_ID  ) . '>' . $cat->cat_name . '</a></h2>';
			/*
            $cat = array_pop($category);
            while ( $cat != NULL ) {
                echo ' > <a href=' . get_category_link( $cat->cat_ID  ) . '>' . $cat->cat_name . '</a>';
                $cat = array_pop($category);
            }
			*/
        ?>
    </div> 
    <h1 id="post-<?php the_ID(); ?>" style="margin: 0px 0px 20px 0px; padding: 0px">
        <?php the_title(); ?>
    </h1>
    <div style="margin-top: -13px; padding-bottom: 5px"><small id="single-small"><?php the_excerpt() ?></small></div>
</div>
<div id="single-social">
    <a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal">Tweet</a>
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
    
    foreach ( $categories as $category ) {
		$parent = get_cat_name($category->category_parent);
		echo "<!-- " . $parent . " -->\n";
		if ((strtolower($parent) == "") && (strtolower($category->name) != "uncategorized")) {
	        murdoch_get_headline( $category->slug, array ( get_the_ID() ) );
		}
     }
    ?>
        
</div>

<div id="single-byline" style="margin-top: -19px">
    <small>
        <?php the_author_posts_link(); ?>
    </small>
    <small>
        <?php the_time('jS F Y') ?>
    </small>
</div>
<div id="single-main" style="margin-top: -7px">
    <div class="entry">
        <?php if (has_post_thumbnail( $post->ID ) ): ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-image' ); ?>
            <img width="500px" src="<?php echo $image[0]; ?>">
            <div class="caption">
                <?php the_post_thumbnail_caption(); ?>
            </div>
        <?php endif; ?>
  	    <?php echo str_replace('<p>', '<p style="margin: 0px 0px 10px 0px; line-height: 17px">', get_the_content_with_formatting('', '', '')); ?>
    </div>
    <p class="postmetadata"></p>
    <?php comments_template( '', true ); ?>
</div>
<!-- <?php trackback_rdf(); ?> -->
