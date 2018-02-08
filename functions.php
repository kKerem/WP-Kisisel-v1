<?php

add_filter('upload_mimes','external_mimes'); function external_mimes($mimes){   return array_merge($mimes,array ( 'rar' => 'application/x-gettext'    )); }

add_filter( 'wp_mail', 'my_wp_mail_filter' );
function my_wp_mail_filter( $args ) {

	$new_wp_mail = array(
		'to'          => $args['to'],
		'subject'     => $args['subject'],
		'message'     => $args['message'],
		'headers'     => $args['headers'],
		'attachments' => $args['attachments'],
	);

	return $new_wp_mail;
}
function remove_footer_admin () {}
add_filter('admin_footer_text', 'remove_footer_admin');
function my_login_stylesheet() { ?>
    <style type="text/css">
        body {background: #FFF !important;max-width: 400px;width: 95%;margin: 0 auto !important}
        #login {width: 100% !important;padding:50% 0 !important}
        #login_error #login_error {display: none !important}
        #login form {box-shadow: none}
        #login h1 { display: none; }
        #login form input {transition:.3s;}
        #login form input[type="text"]:focus, #login input[type="password"]:focus {outline:2px auto #2076D8;}
        #login input[type="text"], #login input[type="password"] {font-family: 'Segoe UI';transition: .2s;padding: 10px;border: 1px solid #eaecef;background: #FFF !important;box-shadow: none !important;border-radius: 3px;box-sizing: border-box;font-size: 16px;margin-top:15px}
        #login input[type="submit"] {padding: 20px;display: block;background-color: #2076D8;font-weight: 600;color: #FFF;margin-top: 5px;border: none;line-height: 0;width: 100%;margin: 15px 0}
        #login input[type="submit"]:hover {background-color: #0a64ca;cursor: pointer;}
        #login input[type="checkbox"] {box-shadow:none;border-radius: 4px;background: white;border: 1px solid #eaecef;}
        #login .submit {display: block !important;}
        #nav, #backtoblog {display: none}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
/* KATEGORİ PARENT */
function cat_baskan_sablon($sablon) {

    $cat_ID = absint( get_query_var('cat') );
    $category = get_category( $cat_ID );

    $templates = array();

    if ( !is_wp_error($category) )
        $templates[] = "category-{$category->slug}.php";

    $templates[] = "category-$cat_ID.php";

    if ( !is_wp_error($category) ) {
        $category = $category->parent ? get_category($category->parent) : '';

        if( !empty($category) ) {
            if ( !is_wp_error($category) )
                $templates[] = "category-{$category->slug}.php";

            $templates[] = "category-{$category->term_id}.php";
        }
    }

    $templates[] = "category.php";
    $sablon = locate_template($templates);

    return $sablon;
}
add_action('category_template', 'cat_baskan_sablon');
/* KATEGORİ PARENT SON */

function etiket() {
  $say=0;
  if(get_the_tags()) { foreach (get_the_tags() as $etiket) {
    $say++;
    $sonuc=$say+1;
    if($say<=1) {$etiketrenkcalistir=$etiket->name;}

    switch ($etiketrenkcalistir) {
      case 'PHP':
      $etiketrenk="e-php";
      break;
      case 'HTML':
      $etiketrenk="e-html";
      break;
      case 'CSS':
      $etiketrenk="e-css";
      break;
      case 'JS':
      $etiketrenk="e-js";
      break;
      default:
      $etiketrenk="bos";
      break;
    }
  }}
  if(!empty($etiketrenk))
  echo '<i class="fa fa-circle '.$etiketrenk.'" aria-hidden="true"></i>';
  $say=0;
  if (get_the_tags()) {
    foreach(get_the_tags() as $etiket) {
      $say++;
      if( $say >1 ) {
      echo ' ve <a href="'.get_tag_link($etiket->term_id).'">'.$etiket->name.'</a>';
      }
      else {
        echo '<a href="'.get_tag_link($etiket->term_id).'">'.$etiket->name.'</a>';
      }
      if( $say >1 ) break;
    }
   }
}

function mytheme_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body yorumGovde">
    <?php endif; ?>
    <table>
      <tr<?php if ( $comment->comment_approved == '0' ) : ?> class="onaybekliyor"<?php endif; ?>>
        <td><?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?></td>
        <td>
          <div class="yorum-yazar">
        <?php printf( __( '%s' ), get_comment_author_link() ); ?>
        <?php printf( __('<span class="tarih">%1$s at %2$s</span>'), get_comment_date(),  get_comment_time() ); ?>
        <?php edit_comment_link( __( '<span class="link">  <i class="fa fa-pencil" aria-hidden="true"></i> Yorumu Düzenle</span>' ), '  ', '' ); ?>
        <?php echo comment_reply_link( array_merge( $args, array( 'reply_text'=>'<span class="link"><i class="fa fa-reply" aria-hidden="true"></i> Yanıtla</span>','add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
          </div>
      <?php comment_text(); ?>
    </td>
    </tr>

    </table>
    <?php if ( $comment->comment_approved == '0' ) : ?>
         <em class="comment-awaiting-moderation"><?php _e( 'İlk kez yazdığın için herkese açık bir şekilde yayınlanmadan mesajın benim tarafımdan onaylanması gerekiyor.' ); ?></em>
    <?php endif; ?>





    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php
    }


/* Breadcrumb */
function breadcrumb() {
    global $post;
    echo '<ul class="navigation">';
	if (!is_front_page()) {
		echo '<li><a href="';
		echo get_option('home');
		echo '">';
		echo '<i class="fa fa-home" aria-hidden="true"></i>';
		echo "</a></li>";
		if ( is_category() || is_single() ) {
			echo "<li>".the_category(', ')."</li>";
			if ( is_single() ) {
				echo "<li>". the_title() . "</li>";
			}
		} elseif ( is_page() && $post->post_parent ) {
			$anasayfa = get_page(get_option('page_on_front'));
			for ($i = count($post->ancestors)-1; $i >= 0; $i--) {
				if (($anasayfa->ID) != ($post->ancestors[$i])) {
					echo '<li>ss<a href="';
					echo get_permalink($post->ancestors[$i]);
					echo '">';
					echo get_the_title($post->ancestors[$i]);
					echo "</a></li>";
				}
			}
				echo "<li>". the_title() . "</li>";
		} elseif (is_page()) {
      echo "<li>". the_title() . "</li>";
		} elseif (is_404()) {
			echo "404";
		}
	} else {
		echo "<li>".bloginfo('name')."</li>";
	}
	echo '</ul>';
}
/* Breadcrumb SON */

/* BİLEŞEN: GitHub */
add_action( 'widgets_init', 'bilesen_func_github' );
function bilesen_func_github() {
 register_widget( 'bilesen_github' );
}
class bilesen_github extends WP_Widget {
  function bilesen_github() {
   $bilesen_ayar = array( 'classname' => 'bilesen_github');
   $this->WP_Widget( 'bilesen_github', __('Bileşen: Github'), $bilesen_ayar );
  }
  function widget( $args, $instance ) {

    ?>
    <div class="sagmenu rainbow">
          <li><a href="https://github.com" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/img/github.png" alt="GitHub Universe logo" height="32px">
            <h3>Yazılım Platformu <b>GitHub</b></h3>
            <h4>Detaylı bilgi için tıkla</h4>
          </a>
        </div>
    <?php
    echo $after_widget;
  }
}
/* BİLEŞEN: GitHub SON*/

/* BİLEŞEN: coktiklanan */
add_action( 'widgets_init', 'bilesen_func_coktiklanan' );
function bilesen_func_coktiklanan() {
 register_widget( 'bilesen_coktiklanan' );
}
class bilesen_coktiklanan extends WP_Widget {
  function bilesen_coktiklanan() {
   $bilesen_ayar = array( 'classname' => 'bilesen_coktiklanan');
   $this->WP_Widget( 'bilesen_coktiklanan', __('Bileşen: coktiklanan'), $bilesen_ayar );
  }
  function widget( $args, $instance ) {

    ?>
    <div class="sagmenu projeler">
      <h1><i class="fa fa-code-fork" aria-hidden="true"></i> En Çok Tıklanan Projeler</h1>
      <ul>
        <?php
        $coktiklanan = new WP_Query( array('cat' => 3, 'posts_per_page' => 5, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
        while ( $coktiklanan->have_posts() ) : $coktiklanan->the_post('');

        echo '<li><li><a href="';
        echo the_permalink();
        echo '"><svg aria-label="Repository" class="octicon octicon-repo repo-icon" height="16" role="img" version="1.1" viewBox="0 0 12 16" width="12"><path fill-rule="evenodd" d="M4 9H3V8h1v1zm0-3H3v1h1V6zm0-2H3v1h1V4zm0-2H3v1h1V2zm8-1v12c0 .55-.45 1-1 1H6v2l-1.5-1.5L3 16v-2H1c-.55 0-1-.45-1-1V1c0-.55.45-1 1-1h10c.55 0 1 .45 1 1zm-1 10H1v2h2v-1h3v1h5v-2zm0-10H2v9h9V1z"></path></svg>';
        echo mb_strimwidth( get_the_title(), 0,24, '...' );
        echo "<span>".wpb_get_post_views(get_the_ID())."</span></a></li>";
        endwhile;
        ?>
      </ul>
    </div>
    <?php
    echo $after_widget;
  }
}
/* BİLEŞEN: coktiklanan SON*/

/* BİLEŞEN: tf2turkiye */
add_action( 'widgets_init', 'bilesen_func_tf2turkiye' );
function bilesen_func_tf2turkiye() {
 register_widget( 'bilesen_tf2turkiye' );
}
class bilesen_tf2turkiye extends WP_Widget {
  function bilesen_tf2turkiye() {
   $bilesen_ayar = array( 'classname' => 'bilesen_tf2turkiye');
   $this->WP_Widget( 'bilesen_tf2turkiye', __('Bileşen: tf2turkiye'), $bilesen_ayar );
  }
  function widget( $args, $instance ) {

    ?>
    <div class="sagmenu tf2turkiye">
          <li><a href="#">
            <img src="<?php echo get_template_directory_uri(); ?>/img/tf2tr.png" height="32px">
            <h3>Oyun Sunucusu <b>TF2 Turkiye</b></h3>
            <h4>Detaylı bilgi için tıkla</h4>
          </a>
        </div>
    <?php
    echo $after_widget;
  }
}
/* BİLEŞEN: tf2turkiye SON*/

/* BİLEŞEN: KATEGORİ */
add_action( 'widgets_init', 'bilesen_func_kategori' );
function bilesen_func_kategori() {
 register_widget( 'bilesen_kategori' );
}
class bilesen_kategori extends WP_Widget {
  function bilesen_kategori() {
   $bilesen_ayar = array( 'classname' => 'bilesen_kategori');
   $this->WP_Widget( 'bilesen_kategori', __('Bileşen: Kategori'), $bilesen_ayar );
  }
  function widget( $args, $instance ) {
    function wt_get_category_count($input = '') {
      global $wpdb;
      if($input == '')
      {
        $category = get_the_category();
        return $category[0]->category_count;
      }
      elseif(is_numeric($input))
      {
        $SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->term_taxonomy.term_id=$input";
        return $wpdb->get_var($SQL);
      }
      else
      {
        $SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->terms.slug='$input'";
        return $wpdb->get_var($SQL);
      }
    }

    $ayarlar = array ('orderby' => 'id','order' => 'ASC','hide_empty' =>0);
    $kategoriler = get_categories($ayarlar);
    ?>
    <div class="sagmenu projeler">
    <ul>
    <h1><i class="fa fa-list-ul" aria-hidden="true"></i> Diğer Kategoriler</h1>
    <?php foreach ($kategoriler as $kategori) {?>
    <li><li><a href="<?php echo get_category_link($kategori->term_id);?>"><?php echo mb_strimwidth( $kategori->name, 0,35, '...' ); echo "<span>".wt_get_category_count($kategori->term_id)."</span>"; ?></a></li>
    <?php }?>
    </ul>
    </div>
    <?php
    echo $after_widget;
  }
}
/* BİLEŞEN: KATEGORİ SON*/

function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

register_nav_menus(array(
    'ustMenu' => __('Üst Menu', 'blankslate'),
    'altMenu' => __('Alt Menu', 'blankslate')
));

add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);

function special_nav_class($classes, $item)
{
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active ';
    }
    return $classes;
}

function my_search_form($form)
{
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url('/') . '" >
    <div><label class="screen-reader-text" for="s">' . __('Search for:') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="' . esc_attr__('Search') . '" />
    </div>
    </form>';

    return $form;
}

add_filter('get_search_form', 'my_search_form', 100);

add_action('after_setup_theme', 'blankslate_setup');
function blankslate_setup()
{
    load_theme_textdomain('blankslate', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    global $content_width;
    if (!isset($content_width))
        $content_width = 640;

}
add_action('wp_enqueue_scripts', 'blankslate_load_scripts');
function blankslate_load_scripts()
{
    wp_enqueue_script('jquery');
}
add_action('comment_form_before', 'blankslate_enqueue_comment_reply_script');
function blankslate_enqueue_comment_reply_script()
{
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_filter('the_title', 'blankslate_title');
function blankslate_title($title)
{
    if ($title == '') {
        return '&rarr;';
    } else {
        return $title;
    }
}
add_filter('wp_title', 'blankslate_filter_wp_title');
function blankslate_filter_wp_title($title)
{
    return $title . esc_attr(get_bloginfo('name'));
}
add_action('widgets_init', 'blankslate_widgets_init');
function blankslate_widgets_init()
{
    register_sidebar(array(
        'name' => __('Sidebar Widget Area', 'blankslate'),
        'id' => 'primary-widget-area',
        'before_widget' => '<div id="%1$s" class="sagmenu %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<h1>',
        'after_title' => '</h3>'
    ));
}
function blankslate_custom_pings($comment)
{
    $GLOBALS['comment'] = $comment;
?>
<li <?php
    comment_class();
?> id="li-comment-<?php
    comment_ID();
?>"><?php
    echo comment_author_link();
?></li>
<?php
}
add_filter('get_comments_number', 'blankslate_comments_number');
function blankslate_comments_number($count)
{
    if (!is_admin()) {
        global $id;
        $comments_by_type =& separate_comments(get_comments('status=approve&post_id=' . $id));
        return count($comments_by_type['comment']);
    } else {
        return $count;
    }
}
