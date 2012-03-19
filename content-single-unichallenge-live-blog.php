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
    <div class="side-item">
        <h2>Meet the finalists</h2>
        <iframe width="270" height="150" src="http://www.youtube.com/embed/UfVNl62Zpas" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="side-item">
        <h2>Meet the coach</h2>
        <iframe width="270" height="150" src="http://www.youtube.com/embed/5KDEI0uS44c?rel=0" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="side-item">
        <h2 style="font-size:20px;margin-top:10px;">Profiles: the Manchester finalists</h2>
    </div>
    <div class="side-item">
        <h2>Burke</h2>
        <?php
            echo '<img src="';
            echo bloginfo('template_directory');
            echo '/image/burke.jpg"/></a>';
        ?>
        <p>
Tristan Burke likes New York hip-hop collective the Wu-Tang Clan and Beethoven's final piano sonata. If he hadn't been allowed to study English Literature he would have gone for a job in a bookshop instead. In his first year he stayed in Richmond Park halls, and describes it as a "rip off". His least favourite subject at school was P.E.
</p>
    </div>
    <div class="side-item">
        <h2>Joyce</h2>
        <?php
            echo '<img src="';
            echo bloginfo('template_directory');
            echo '/image/joyce.jpg"/></a>';
        ?>
        <p>
        Paul Joyce did one of his undergraduate degrees at Leicester, and says Manchester is "much more interesting".  At school, Joyce disliked studying languages: "I was shit at it", he says. He says he only gets recognized in public when he's with Tristan. His favourite book is Slaughterhouse-Five and he likes Radiohead and Björk. He is an avid fan of gritty detective drama Taggart.
        </p>
    </div>
    <div class="side-item">
        <h2>McKenna</h2>
        <?php
            echo '<img src="';
            echo bloginfo('template_directory');
            echo '/image/mckenna.jpg"/></a>';
        ?>
        <p>
Despite being a University Challenge finalist, Michael McKenna insists he is not intelligent but "good at storing lots of useless trivia". He was a fresh young first-year when the show was recorded last April and stayed in the "cheap and cheerful" Oak House. He caused a sensation among  the hall's residents when he wore a hoody with its logo on it for the semi-final final.
        </p>
    </div>
    <div class="side-item">
        <h2>Kelly</h2>
        <?php
            echo '<img src="';
            echo bloginfo('template_directory');
            echo '/image/kelly.jpg"/></a>';
        ?>
        <p>
        History buff Luke Kelly hails from one of Britain’s great transport hubs, Ashford in Kent, which has been a valuable member of the Eurostar network since 1994. By astonishing coincidence, that is the same year that the BBC revived the University Challenge franchise and the Paxman era of the show began. Ashford is the birthplace of Frederick Forsyth, author of The Day of the Jackal.   
        </p>
    </div>
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

