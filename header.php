<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
    <link href="<?php echo get_template_directory_uri(); ?>/font/font-awesome.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/genel.js"></script>
    <meta name="theme-color" content="#24292E">
    <link rel="shortcut icon" type="image/x-png" href="<?php echo get_template_directory_uri(); ?>/img/logoFav.png" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div class="bar">
      <div id="govde">
        <div class="sol">
          <?php wp_nav_menu(array('theme_location' => 'ustMenu', 'container' => false, 'container_id' => false, 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li class="responsiveMenuIcon"><a href="javascript:void(0);" onclick="responsiveMenu()"><i class="fa fa-bars" aria-hidden="true"></i></a></li></ul>')); ?>
          
        </div>

        <div class="sag">
          <div class="arama">
            <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
              <input type="search" class="search-field"
              placeholder="<?php echo esc_attr_x( 'Projelerimde Ara', 'placeholder' ) ?>"
              value="<?php echo get_search_query() ?>" name="s"
              title="<?php echo esc_attr_x( 'Arama Formu', 'label' ) ?>" />
              <input type="hidden" />
            </form>
          </div>
        </div>
        <div class="sil"></div>
      </div>
    </div>
