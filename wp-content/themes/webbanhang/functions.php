<?php
function hk_setup_theme(){
  // Cho phép sử dụng ảnh đại diện
  add_theme_support('post-thumbnails');

  // add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
  add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

  // Chuyển trình soạn thảo về phiên bản cũ
  add_filter('use_block_editor_for_post', '__return_false');
  // Chuyển widgets về phiên bản cũ
  add_filter('use_widgets_block_editor', '__return_false');

  // Đăng ký sidebar, car
  if (function_exists('register_sidebar')){
    register_sidebar(array(
      'name'            => __( 'Sidebar', 'webbanhang' ),
      'id'              => 'sidebar',
      'before_widget'   => '<div class="widget">',
      'after_widget'    => "</div>",
      'before_title'    => '<h3 class="title">',
      'after_title'     => "</h3>",
    ));
    register_sidebar(array(
      'name'            => __( 'Cart', 'webbanhang' ),
      'id'              => 'cart'
    ));
  }

  // Đăng ký menu
  register_nav_menus(
    array(
      'top_nav'     => __( 'Menu top', 'webbanhang' ),
      'main_nav'    => __( 'Menu chính', 'webbanhang' ),
      'bottom_nav'  => __( 'Menu footer', 'webbanhang' )
    )
  );
}
add_action('init','hk_setup_theme');

//Tạo menu dashboard (create theme options)
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Tùy chỉnh', // Title hiển thị khi truy cập vào Options page
		'menu_title'	=> 'Tùy chỉnh', // Tên menu hiển thị ở khu vực admin
		'menu_slug' 	=> 'theme-settings', // Url hiển thị trên đường dẫn của options page
		'capability'	=> 'edit_posts',
		'redirect'	  => false
	));
}

//Tạo custom post type thương hiệu cho sản phẩm
function brand_custom_taxonomy() {
  $labels = array(
    'name'      => 'Thương hiệu',
    'singular'  => 'Thương hiệu',
    'menu_name' => 'Thương hiệu'
  );
  $args = array(
    'labels'            => $labels,
    'hierarchical'      => true, 
    'public'            => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'show_in_nav_menus' => true,
    'show_tagcloud'     => true
  );
  register_taxonomy( 'thuong-hieu', 'product', $args );
}
add_action( 'init', 'brand_custom_taxonomy', 0 );

//add plugin woocommerce
function my_custom_wc_theme_support() {
  add_theme_support('woocommerce');
}
add_action( 'after_setup_theme', 'my_custom_wc_theme_support' );

function init_css_js() {

  // CSS Global
  wp_enqueue_style( 'bootstrap-style',        get_template_directory_uri() . '/assets/plugins/bootstrap/css/bootstrap.min.css',                 array(), '1.0' );
  wp_enqueue_style( 'bootstrap-select-style', get_template_directory_uri() . '/assets/plugins/bootstrap-select/css/bootstrap-select.min.css',   array(), '1.0' );
  wp_enqueue_style( 'fontawesome-style',      get_template_directory_uri() . '/assets/plugins/fontawesome/css/font-awesome.min.css',            array(), '1.0' );
  wp_enqueue_style( 'prettyphoto-style',      get_template_directory_uri() . '/assets/plugins/prettyphoto/css/prettyPhoto.css',                 array(), '1.0' );
  wp_enqueue_style( 'carousel2-style',        get_template_directory_uri() . '/assets/plugins/owl-carousel2/assets/owl.carousel.min.css',       array(), '1.0' );
  wp_enqueue_style( 'owl-carousel2-style',    get_template_directory_uri() . '/assets/plugins/owl-carousel2/assets/owl.theme.default.min.css',  array(), '1.0' );
  wp_enqueue_style( 'animate-style',          get_template_directory_uri() . '/assets/plugins/animate/animate.min.css',                         array(), '1.0' );
  // Theme CSS
  wp_enqueue_style( 'theme-style',            get_template_directory_uri() . '/assets/css/theme.css',                                           array(), '1.0' );
  wp_enqueue_style( 'theme-green-1-style',    get_template_directory_uri() . '/assets/css/theme-green-1.css',                                   array(), '1.0' );

  // Head Libs
  wp_enqueue_style( 'modernizr-style',        get_template_directory_uri() . '/assets/plugins/modernizr.custom.js',                             array(), '1.0', false );

  // Footer
  // JS Global
  // wp_enqueue_script( 'jquery-script',           get_template_directory_uri() . '/assets/plugins/jquery/jquery-1.11.1.min.js',                   array(), '1.0' );
  // wp_enqueue_script( 'bootstrap-script',        get_template_directory_uri() . '/assets/plugins/bootstrap/js/bootstrap.min.js',                 array(), '1.0' );
  // wp_enqueue_script( 'bootstrap-select-script', get_template_directory_uri() . '/assets/plugins/bootstrap-select/js/bootstrap-select.min.js',   array(), '1.0' );
  // wp_enqueue_script( 'superfish-script',        get_template_directory_uri() . '/assets/plugins/superfish/js/superfish.min.js',                 array(), '1.0' );
  // wp_enqueue_script( 'prettyPhoto-script',      get_template_directory_uri() . '/assets/plugins/prettyphoto/js/jquery.prettyPhoto.js',          array(), '1.0' );
  // wp_enqueue_script( 'carousel-script',         get_template_directory_uri() . '/assets/plugins/owl-carousel2/owl.carousel.min.js',             array(), '1.0' );
  // wp_enqueue_script( 'sticky-script',           get_template_directory_uri() . '/assets/plugins/jquery.sticky.min.js',                          array(), '1.0' );
  // wp_enqueue_script( 'easing-script',           get_template_directory_uri() . '/assets/plugins/jquery.easing.min.js',                          array(), '1.0' );
  // wp_enqueue_script( 'smoothscroll-script',     get_template_directory_uri() . '/assets/plugins/jquery.smoothscroll.min.js',                    array(), '1.0' );
  // wp_enqueue_script( 'smooth-scrollbar-script', get_template_directory_uri() . '/assets/plugins/smooth-scrollbar.min.js',                       array(), '1.0' );
  // JS Page Level
  // wp_enqueue_script( 'theme-script',            get_template_directory_uri() . '/assets/js/theme.js',                                           array(), '1.0' );
  // wp_enqueue_script( 'cookie-script',           get_template_directory_uri() . '/assets/plugins/jquery.cookie.js',                              array(), '1.0' );

}
add_action( 'wp_enqueue_scripts', 'init_css_js' );

function google_ad(){
  the_field( 'code_header', 'option' );
}
add_action( 'wp_head', 'google_ad' );

// Display short description post
function short_content($limit) {
  $excerpt = explode( ' ', get_the_excerpt(), $limit );
  if (count($excerpt) >= $limit) {
    array_pop($excerpt);
    $excerpt = implode( " ", $excerpt );
  } else {
    $excerpt = implode( " ", $excerpt );
  }
  $excerpt = preg_replace( '`\[[^\]]*\]`', '', $excerpt );
  return $excerpt .' [...]';
} 