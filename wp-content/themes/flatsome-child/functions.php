<?php
// Add custom Theme Functions here

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );
@ini_set('upload_max_filesize','128M');

function remove_jquery_enqueue() {
    wp_deregister_script('mailchimp-woocommerce-public.min.js');
    wp_register_script('jquery', "https://code.jquery.com/jquery-3.6.0.min.js", false, null);
    wp_enqueue_script('jquery');
}
add_action("wp_enqueue_scripts", "remove_jquery_enqueue", 11);

function your_theme_enqueue_scripts() {
    // all styles
    wp_enqueue_style( 'fontawesome_css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css' );
    wp_enqueue_style( 'fontawesome_css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js' );
    wp_enqueue_script( 'flatsome_script', get_stylesheet_directory_uri().'/assets/js/flatsome_custom.js' );

}
add_action( 'wp_footer', 'your_theme_enqueue_scripts' );

// remmove breadcrumb
remove_action( 'flatsome_after_header','flatsome_category_header', 20, 0);
// remmove blogheader
remove_action( 'flatsome_after_header','flatsome_single_page_header', 25, 0);
// 
remove_action( 'woocommerce_after_main_content', 'flatsome_pages_in_search_results', 10 );

function flatsome_pages_in_search_results_only_product(){
    if(!is_search() || !get_theme_mod('search_result', 1)) return;
    
    
    global $post;
    ?>
    <?php if( get_search_query() ) : ?>
    <?php
      /**
       * Include pages and posts in search
       */
      query_posts( array( 'post_type' => array( 'post'), 's' => get_search_query() ) );

      $posts = array();
      while ( have_posts() ) : the_post();
        array_push($posts, $post->ID);
      endwhile;

      wp_reset_query();
;
      // Get pages
      query_posts( array( 'post_type' => array( 'page'), 's' => get_search_query() ) );
      $pages = array();
      while ( have_posts() ) : the_post();
        $wc_page = false;
        if($post->post_type == 'page'){
          foreach (array('shop', 'cart', 'checkout', 'view_order', 'terms') as $wc_page_type) {
            if( $post->ID == wc_get_page_id($wc_page_type) ) $wc_page = true;
          }
        }
        if( !$wc_page ) array_push($pages, $post->ID);
      endwhile;

      wp_reset_query();

		// if ( ! empty( $posts ) ) {
		// 	echo '<hr/><h4 class="uppercase">' . esc_html__( 'Posts found', 'flatsome' ) . '</h4>';
		// 	echo flatsome_apply_shortcode( 'blog_posts', array(
		// 		'columns'      => '3',
		// 		'columns__md'  => '3',
		// 		'columns__sm'  => '2',
		// 		'type'         => get_theme_mod( 'search_result_style', 'slider' ),
		// 		'image_height' => '56.25%',
		// 		'show_date'    => get_theme_mod( 'blog_badge', 1 ) ? 'true' : 'false',
		// 		'ids'          => implode( ',', $posts ),
		// 	) );
		// }

		// if ( ! empty( $pages ) ) {
		// 	echo '<hr/><h4 class="uppercase">' . esc_html__( 'Pages found', 'flatsome' ) . '</h4>';
		// 	echo flatsome_apply_shortcode( 'ux_pages', array(
		// 		'columns'      => '3',
		// 		'columns__md'  => '3',
		// 		'columns__sm'  => '2',
		// 		'type'         => get_theme_mod( 'search_result_style', 'slider' ),
		// 		'image_height' => '56.25%',
		// 		'ids'          => implode( ',', $pages ),
		// 	) );
		// }
		?>
    <?php endif; ?>

    <?php
}
//add_action( 'woocommerce_after_main_content', 'flatsome_pages_in_search_results_only_product', 10 );

// # hook theme footer

function shortcode_absolute_footer(){
    return wc_get_template_part( 'layouts/footer/footer-2');
}

add_shortcode('absolute_footer','shortcode_absolute_footer');

if ( ! function_exists( 'custom_flatsome_posted_on' ) ) :

  // Prints HTML with meta information for the current post-date/time and author.
  function custom_flatsome_posted_on() {
      $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
      if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
          $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
      }
  
      $time_string = sprintf( $time_string,
          esc_attr( get_the_date( 'c' ) ),
          esc_html( get_the_date() ),
          esc_attr( get_the_modified_date( 'c' ) ),
          esc_html( get_the_modified_date() )
      );
  
      $posted_on = sprintf(
          esc_html_x( '%s', 'post date', 'flatsome' ),
          '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
      );
  
      $byline = sprintf(
          esc_html_x( 'bởi %s', 'post author', 'flatsome' ),
          '<span class="meta-author vcard"><a class="url fn n"> Smarthome </a></span>'
      );
  
      echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';
  
  }
endif;

function overwrite_blog_posts_shortcode() {
  require __DIR__ . '/inc/shortcodes/blog_posts.php';

  remove_shortcode('blog_posts');
  add_shortcode('blog_posts', 'custom_shortcode_latest_from_blog');
}

add_action('wp_loaded', 'overwrite_blog_posts_shortcode');