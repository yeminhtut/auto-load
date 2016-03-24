<?php /* Template Name: Page Widget */ ?>
<?php
$dest = $_SERVER['REQUEST_URI'];
$t_dest = explode('?', $dest);
$multiple_dest = urldecode($t_dest[1]);
$dest_arr = explode('&', $multiple_dest);
$destination = $dest_arr[0];
$refresh_url = $destination;
$main_url = 'http://magazine.tripzilla.com/widget-page';

// $statusCode = 301;
// if (strlen($multiple_dest)>20) { 
//   header('Location: ' . $mainurl, true, $statusCode);
//   die();
// }

/*mapping united states */
if ($destination == 'usa') {
    $destination = 'united states';
}
/*mapping south aferica */
if ($destination == 'south%20africa') {
    $destination = 'africa';
}


$idObj = get_category_by_slug($destination); 
$cat_id = $idObj->term_id;

$offset = 0;
$num = 5;
if (isset($t_dest[2])) {$offset = $t_dest[2];}
if (is_numeric($offset) && isset($cat_id)) {
  $post_ids = get_posts(array(
                'numberposts'   => 20, // get all posts.
                'tax_query'     => array(
                    array(
                        'taxonomy'  => 'category',
                        'field'     => 'id',
                        'terms'     => array($cat_id),
                    ),
                ),
                'fields'        => 'ids', // Only get post IDs
            ));
  $articles_count =  count($post_ids); 
  $total_url = ceil($articles_count / 5);  
  $refresh_time = (5 * $total_url) - 5;
  $args = array( 'posts_per_page' => '5', 'offset'=> $offset,'tag__not_in'=>array(299),'category__and' => array($cat_id));
}
else{
  $args = array( 'posts_per_page' => 5 ,'orderby' => 'date', 'offset'=> 0, 'category__and' => array(309));
}
$myposts = get_posts( $args );

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php 
      $refresh_time = (int)$refresh_time;
      $offset = (int)$offset;
      $next_offset = $offset + (int)$num;
      $next_url = $main_url.'?'.$refresh_url.'?'.$next_offset;     
      $refresh_count = $refresh_time - $offset;      
      if ($refresh_count > 0) {?>
      <meta http-equiv="refresh" content="40;URL= <?php echo $next_url ?>">
      <?php } ?>
    <title></title>
    <style>
a{text-decoration:none; color : inherit;}
#article_wrapper{position: relative; width: 100%; padding: 10px 0; text-align: center; background: none repeat scroll 0px 0px rgb(197, 229, 242); font-weight: bold; color: #41aad3; line-height: 1; cursor: default; }
#thumb_wrapper { margin: 5px 0px 0 0px;/*padding-left: 10px;*/}
#link_wrapper { margin-top:5px; color: #000;font-size: 12px; font-weight: normal;padding-right:10px;margin-bottom: 10px; }
.sectionOnecaption{
  color: #f5f5f5;
  position: absolute;
  bottom: 4px;
  background: rgba(0,0,0,.4);
  text-shadow: 0 1px 1px #666;
  width: 100%;
  height: auto;
  padding: 6px 10px 6px 4px;
  text-align: left;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  z-index: 1;
  font-size: 12px;
}
</style>
<script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-18745286-16', 'tripzilla.com');
          ga('require','displayfeatures');
          ga('send', 'pageview');
        </script>
</head>
<body>
    <div id="wrapper" style="min-width:250px; margin:0px auto;cursor: pointer; margin-left:-8px; background: #FFF; font-family: Helvetica Neue,Helvetica,Arial,sans-serif;">
    
    <?php foreach ( $myposts as $post ) : setup_postdata( $post );
        $post_thumbnail_id = get_post_thumbnail_id( $post->ID );
        $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(320,240), false, '' );
        $thumbnail_url =  $src[0];
    ?>
        <a href="<?php the_permalink(); ?>" target="_blank">
            <article style="position:relative;">
                <div id="thumb_wrapper"><img src="<?php echo $thumbnail_url; ?>" width="100%"></div>
                <div class="sectionOnecaption"><span><?php the_title() ?></span></div>
                <div class="clear" style="clear:both;"></div>
            </article>
        </a>    
    <?php endforeach; wp_reset_postdata();?>
</div>
<div style="height:10px;"></div>
</body>
</html>

