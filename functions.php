<?php


if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'custom-header', array( 'random-default' => true ) );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'column-image', 190, 100, true );
    add_image_size( 'feature-thumb-image', 100, 50, true);
    add_image_size( 'featured-image', 600, 360, false );
    add_image_size( 'title-image', 600, 360, true );
}

if ( function_exists('register_sidebar') )
{
    register_sidebar();
}

add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'acme_product',
    array(
            'labels' => array(
                'name' => __( 'Products' ),
                'singular_name' => __( 'Product' )
    ),
        'public' => true,
        'has_archive' => true,
    )
    );
}

function the_post_thumbnail_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo '<span>'.$thumbnail_image[0]->post_excerpt.'</span>';
  }
}

function wp_trim_all_excerpt($text) {
    // Creates an excerpt if needed; and shortens the manual excerpt as well
    global $post;
      if ( '' == $text ) {
        $text = get_the_content('');
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]&gt;', $text);
      }
    $text = strip_shortcodes( $text ); // optional
    $text = strip_tags($text);
    $excerpt_length = apply_filters('excerpt_length', 30);
    $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
    $words = explode(' ', $text, $excerpt_length + 1);
      if (count($words)> $excerpt_length) {
        array_pop($words);
        $text = implode(' ', $words);
        $text = $text . $excerpt_more;
      } else {
        $text = implode(' ', $words);
      }
    return $text;
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wp_trim_all_excerpt');

function new_excerpt_more($more) {
       global $post;
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function murdoch_get_blog_time()
{
    $time_zone = get_option( 'timezone_string' );
    if ($time_zone) :
    date_default_timezone_set( $time_zone );
    endif;
    echo date( 'l jS F Y' );
}

function murdoch_get_video_row()
{
    $the_query = new WP_Query( "category_name=video");
    $count = 0;
    while ( $the_query->have_posts() && $count < 1) :
        $the_query->the_post();
        print '<div class="video">';
        the_content();
        print '</div>';
        $count ++;
    endwhile;
}

function murdoch_get_pyramid_column( $section, $excluded_articles=array(), $number_of_articles=3 )
{
    if (empty ( $excluded_articles )):
        $the_query = new WP_Query( array ('category_name' => $section, 'posts_per_page' => $number_of_articles ));
    else:
        $the_query = new WP_Query( array ('category_name' => $section, 'post__not_in' => $excluded_articles, 'posts_per_page' => $number_of_articles));
    endif;
    $cat_name = get_category_by_slug($section)->cat_name;
    $category_link = get_category_link( get_cat_ID( $cat_name ) );
    printf('<a href="%s" class="category-header" ><h2 class="category-name">%s</h2></a>', $category_link, $cat_name);
    $count = 0;
    $closed = false;
    while ( $the_query->have_posts() ) :
        $the_query->the_post();
        $permalink = get_permalink();
        $title = get_the_title();

        if ( $count == 0 ):
            if(has_post_thumbnail()) :
                printf('<li class="section-lead"><div class="section-image">
                            <a href="%s" rel="bookmark" title="%s">
                                %s
                            </a>
                        </div>',
                        $permalink, $title, get_the_post_thumbnail(get_the_ID(), 'column-image'));
            endif;
            print('<h2 class="section-title">');
        elseif ( $count < 5 ):
            if ( $count % 2 == 0):
                print('<li class="section-sub, section-sub-left"><h3 class="section-title">');
            else:
                print('<div class="section-sub-container"><li class="section-sub, section-sub-right"><h3 class="section-title">');
            endif;
        else:
            print('<li>');
        endif;
        printf('<a href="%s" rel="bookmark" title="%s" class="section-title">
                    %s
                </a>',
                $permalink, $title, $title );

        if ($count < 5):
            if ( $count == 0 ):
                print('</h2>');
                printf('<p>%s</p><div class="cl"></div></li>', get_the_excerpt());
            else:
                print('</h3>');
                printf('<p>%s</p></li>', get_the_excerpt());
            endif;
            if ( $count % 2 == 0):
                printf('<div class="cl"></div>');
                if ( $count > 0)
                {
                    print('</div>');
                    $closed = true;
                }
            endif;
        endif;
        $count ++;
    endwhile;
    // Hacky crap to seal it off if there is an even number of posts
    if ( !$closed && $count % 2 == 0)
    {
        print('<div class="cl"></div></div>');
    }
    // Reset Post Data
    wp_reset_postdata();
}

function murdoch_get_author_link()
{
    return '<a href="' . get_author_posts_url() . '">'
            . get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name')
            . '</a>';
}

function murdoch_get_headline( $section, $exclude_posts=array() )
{
    // Get the ID of a given category
    $category = get_category_by_slug( $section );
    
    $category_id = $category->cat_ID;

    // Get the URL of this category
    $category_link = get_category_link( $category_id );
    $the_query = new WP_Query( array( 'category_name' => $section, 
                                          'posts_per_page' => 3,
                                          'post__not_in' => $exclude_posts));
    echo "<div id=$section-section class='other-articles'>";
    if ( $the_query->have_posts() ):
        printf('<a href="%s" class="category-header category-name"><h2>%s</h2></a>', $category_link, $category->cat_name);
    endif;
    while ( $the_query->have_posts() ) : $the_query->the_post();
	    printf ('<a href="%s">', get_permalink());
        echo '<li class="other-articles-item">';
	    the_title();
	    echo '</li></a>';
    endwhile;
    echo "</div>";

    // Reset Post Data
    wp_reset_postdata();
}

// This is to prevent editors from creating admin users
class JPB_User_Caps {

  // Add our filters
  function JPB_User_Caps(){
    add_filter( 'editable_roles', array(&$this, 'editable_roles'));
    add_filter( 'map_meta_cap', array(&$this, 'map_meta_cap'),10,4);
  }

  // Remove 'Administrator' from the list of roles if the current user is not an admin
  function editable_roles( $roles ){
    if( isset( $roles['administrator'] ) && !current_user_can('administrator') ){
      unset( $roles['administrator']);
    }
    return $roles;
  }

  // If someone is trying to edit or delete and admin and that user isn't an admin, don't allow it
  function map_meta_cap( $caps, $cap, $user_id, $args ){

    switch( $cap ){
        case 'edit_user':
        case 'remove_user':
        case 'promote_user':
            if( isset($args[0]) && $args[0] == $user_id )
                break;
            elseif( !isset($args[0]) )
                $caps[] = 'do_not_allow';
            $other = new WP_User( absint($args[0]) );
            if( $other->has_cap( 'administrator' ) ){
                if(!current_user_can('administrator')){
                    $caps[] = 'do_not_allow';
                }
            }
            break;
        case 'delete_user':
        case 'delete_users':
            if( !isset($args[0]) )
                break;
            $other = new WP_User( absint($args[0]) );
            if( $other->has_cap( 'administrator' ) ){
                if(!current_user_can('administrator')){
                    $caps[] = 'do_not_allow';
                }
            }
            break;
        default:
            break;
    }
    return $caps;
  }

}

$jpb_user_caps = new JPB_User_Caps();


?>
