<?php /**
 * paolettibibite functions and definitions
 *
 * @package paolettibibite
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'paolettibibite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function paolettibibite_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on paolettibibite, use a find and replace
	 * to change 'paolettibibite' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'paolettibibite', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
    add_image_size( 'paoletti-cocktail', 240, 160, true );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
        'primary_home' => __('Menu Home', 'paolettibibite'),
		'primary' => __( 'Menu pagine interne', 'paolettibibite' ),
        'social_top' => __('Social link & e-commerce','paolettibibite'),
        'footer' => __('Secondary menu on footer','paolettibibite'),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'gallery' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'paolettibibite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // paolettibibite_setup
add_action( 'after_setup_theme', 'paolettibibite_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function paolettibibite_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'paolettibibite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'paolettibibite_widgets_init' );

/**
 * @param $items
 * @param $args
 * @return string
 *
 * Add custom item facebook to Footer Menu Nav
 */
function paoletti_add_facebook_like ( $items, $args ) {
    if ($args->theme_location == 'footer') {
        $fburl = PAOLETTI_FB_URL;
        $fbhtml = <<<FB

    <li>
        <div class="fb-like"
            data-href="$fburl"
            data-send="false"
            data-layout="button_count"
            data-width="150"
            data-show-faces="false">
        </div>
    </li>
FB;

        $items .= $fbhtml;
    }
    return $items;
}
//Activate for Facebook
//add_filter( 'wp_nav_menu_items', 'paoletti_add_facebook_like', 10, 2 );

/**
 * Add Social Script to start buttons
 */
function paoletti_add_social_scripts(){
    ?>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/it_IT/all.js#xfbml=1&appId=570338933010783";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <?php
}
//Activate for Facebook
//add_action('paolettibibite_copy','paoletti_add_social_scripts');


/**
 * Paoletti Entry Meta
 */
if ( ! function_exists( 'paoletti_entry_meta' ) ) :
    /**
     * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
     *
     * Create your own paoletti_entry_meta() to override in a child theme.
     *
     * @since Twenty Twelve 1.0
     */
    function paoletti_entry_meta() {
        // Translators: used between list items, there is a space after the comma.
        $categories_list = get_the_category_list( __( ', ', 'paolettibibite' ) );

        // Translators: used between list items, there is a space after the comma.
        $tag_list = get_the_tag_list( '', __( ', ', 'paolettibibite' ) );

        $date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
            esc_url( get_permalink() ),
            esc_attr( get_the_time() ),
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() )
        );

        $author = sprintf( '<span class="author vcard">%3$s</span>',
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
            esc_attr( sprintf( __( 'View all posts by %s', 'paolettibibite' ), get_the_author() ) ),
            get_the_author()
        );

        // Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
        if ( $tag_list ) {
            $utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'paolettibibite' );
        } elseif ( $categories_list ) {
            $utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'paolettibibite' );
        } else {
            $utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'paolettibibite' );
        }

        printf(
            $utility_text,
            $categories_list,
            $tag_list,
            $date,
            $author
        );
    }
endif;


/**
 * Deactive admin bar wp
 */
function paolettibibite_admin_bar(){
    return false;
}
add_filter( 'show_admin_bar' , 'paolettibibite_admin_bar');

// add post-formats to post_type 'page'
add_post_type_support( 'page', 'post-formats' );


/**
 * Function for return current post slug
 * @return post slug
 */
function the_slug($echo=true){
    $slug = basename(get_permalink());
    do_action('before_slug', $slug);
    $slug = apply_filters('slug_filter', $slug);
    if( $echo ) echo $slug;
    do_action('after_slug', $slug);
    return $slug;
}


add_action('wp_enqueue_scripts', 'paolettibibite_custom_scripts');
/**
 * Enqueue scripts and styles
 */

function paolettibibite_custom_scripts() {
    wp_enqueue_style( 'paolettibibite-style', get_stylesheet_uri() );
    wp_enqueue_style( 'jqueryui-style', 'http://code.jquery.com/ui/1.10.3/themes/blitzer/jquery-ui.css');
    wp_enqueue_style( 'paolettibibite-style', get_template_directory_uri() . '/js/jquery.bxslider.css' );

    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-dialog');
    wp_enqueue_script( 'paolettibibite-parallax', get_template_directory_uri() . '/js/jquery.parallax-1.1.3.js', array('jquery'), null, true );
    wp_enqueue_script( 'paolettibibite-localscroll', get_template_directory_uri() . '/js/jquery.localscroll-1.2.7-min.js', array('jquery'), null, true );
    wp_enqueue_script( 'paolettibibite-scrollTo', get_template_directory_uri() . '/js/jquery.scrollTo-1.4.6-min.js', array('jquery'), null, true );

    wp_enqueue_script( 'paolettibibite-bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery', 'jquery-ui-core'), null, true );
    wp_enqueue_script( 'paolettibibite-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery', 'jquery-ui-core'), null, true );

    wp_enqueue_script( 'paoletti-script', get_template_directory_uri() . '/js/paolettibibite-script.js', array('jquery', 'jquery-ui-core', 'jquery-ui-dialog', 'paolettibibite-parallax', 'paolettibibite-localscroll', 'paolettibibite-scrollTo', 'paolettibibite-bxslider', 'paolettibibite-easing'), null, true );

}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Load Jetpack compatibility file.
 */
//require get_template_directory() . '/inc/jetpack.php';

/**
 * Add Custom Paoletti Bibite function
 */
require get_template_directory() . '/inc/paolettibibite_utilities.php';
/**
 * Add prodotti cpt
 */
require get_template_directory() . '/inc/paolettibibite_prodotti.php';
/**
 * Add cocktail cpt
 */
require get_template_directory() . '/inc/paolettibibite_cocktail.php';
/**
 * Add upload cpt
 */
require get_template_directory() . '/inc/paolettibibite_upload_image.php';
/**
 * Add upload cpt
 */
require get_template_directory() . '/inc/paolettibibite_init.php';