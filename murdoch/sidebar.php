<div id="side-info">
<ul id="sidebar">
<?php
    // Editors note link on homepage. Disabled by Aryeh
    $enDisabled = true;
    if ( is_home() && !$enDisabled)
    {
    // Get the link to the editor's blog
    $category_id = get_cat_ID( 'The editor\'s note' );
    $category_link = get_category_link( $category_id );
    echo '<a href="';
    echo esc_url( $category_link );
    echo '" title="The editor\'s note">';
    echo '<img src="';
    echo bloginfo('template_directory');
    echo '/image/editors-note.jpg"/></a>';
    }
?>
<li class="widget">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" style="width:200px;height:200px" id="fcfedded-f81b-af0e-c6cc-6a5b90e92fba" ><param name="movie" value="http://static.issuu.com/webembed/viewers/style1/v2/IssuuReader.swf?mode=mini&amp;viewMode=doublePage&amp;shareMenuEnabled=false&amp;printButtonEnabled=false&amp;shareButtonEnabled=false&amp;searchButtonEnabled=false&amp;folderId=c2b31505-50f8-4fe0-94fd-7a6e5450178f" /><param name="allowfullscreen" value="true"/><param name="allowscriptaccess" value="always"/><param name="menu" value="false"/><param name="wmode" value="transparent"/><embed src="http://static.issuu.com/webembed/viewers/style1/v2/IssuuReader.swf" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" menu="false" wmode="transparent" style="width:200px;height:200px" flashvars="mode=mini&amp;viewMode=doublePage&amp;shareMenuEnabled=false&amp;printButtonEnabled=false&amp;shareButtonEnabled=false&amp;searchButtonEnabled=false&amp;folderId=c2b31505-50f8-4fe0-94fd-7a6e5450178f" /></object>
</li>

<!-- FuseFM Widget Link - start -->
<li class="widget">
  <h2>FuseFM</h2>
     <a href="http://fusefm.co.uk/" target="_blank">
        <img src="http://217.70.191.219/wp-content/themes/murdoch/image/fusefm_logo_resized.png" 
             alt="FuseFM"/>
     </a>
</li>
<!-- FuseFM Widget Link - end -->

<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>
<?php endif; ?>
<script src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 4,
  interval: 30000,
  width: 'auto',
  height: 300,
  theme: {
    shell: {
      background: '#c9c9c9',
      color: '#ffffff'
    },
    tweets: {
      background: '#ffffff',
      color: '#5c585c',
      links: '#4b61cf'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: false,
    hashtags: true,
    timestamp: true,
    avatars: false,
    behavior: 'all'
  }
}).render().setUser('mancunion_news').start();
</script>
</ul>
</div>
