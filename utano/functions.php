<?php
/**
 * utano functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package utano
 */

if ( ! function_exists( 'utano_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function utano_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on utano, use a find and replace
		 * to change 'utano' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'utano', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		
		
		
		/*$args = array(
	'width'         => 1000,
	'height'        => 250,
	'default-image' => get_template_directory_uri() . '/img/header-bg.jpg',
	'uploads'       => true,
);
add_theme_support( 'custom-header', $args );*/

/*$defaults = array(
	'default-image'          => get_template_directory_uri() . '/img/header-bg.jpg',
	'random-default'         => false,
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '',
	'header-text'            => true,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );*/



// Add custom header support. https://codex.wordpress.org/Custom_Headers
		add_theme_support(
			'custom-header', array(
				'width' 		=> 1000,
			
				'height'        => 250,
				// Flex
				'flex-width'    => true,
				'flex-height'   => true,
				// Header image
				'default-image' => get_template_directory_uri() . '/img/header-bg.jpg',
				// Header text
				'header-text'   => true,
				'default-text-color'     => 'fff',
			)
		);

		$header_image = array(
			'library' => array(
				'url'           => get_template_directory_uri() . '/img/header-bg.jpg',
				'thumbnail_url' => get_template_directory_uri() . '/img/header-bg.jpg',
				'description'   => 'Library Ceiling',
			),
		);

		register_default_headers( $header_image );
		
		

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'utano' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'utano_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 100,
			'flex-width'  => true,
			'flex-height' => true,

		) );
	}
endif;
add_action( 'after_setup_theme', 'utano_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function utano_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'utano_content_width', 640 );
}
add_action( 'after_setup_theme', 'utano_content_width', 0 );



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function utano_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'utano' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'utano' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'utano_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function utano_scripts() {
	wp_enqueue_style( 'utano-style', get_stylesheet_uri() );
	
	/* Adding bootstrap 3*/

	wp_register_style( 'bootstrap-style', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css', array(), '1', 'all' );
	wp_enqueue_style( 'bootstrap-style' );
	
	/* Adding agency*/

	wp_register_style( 'agency-style', get_template_directory_uri() . '/css/agency.min.css', array(), '1', 'all' );
	wp_enqueue_style( 'agency-style' );
	
	/* Adding font-awesome*/

	wp_register_style( 'font-awesome-style', get_template_directory_uri() . '/vendor/font-awesome/css/font-awesome.min.css', array(), '1', 'all' );
	wp_enqueue_style( 'font-awesome-style' );
	

	wp_enqueue_script( 'utano-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	
	
	
	/*Adding bootstrap scripts*/
	
	wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'bootstrap-js' );
	
	/*Adding easing scripts*/
	
	wp_register_script( 'easing-js', get_template_directory_uri() . '/vendor/jquery-easing/jquery.easing.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'easing-js' );
	
	/*Adding jqBootstrapValidation scripts*/
	
	wp_register_script( 'jqBootstrapValidation-js', get_template_directory_uri() . '/js/jqBootstrapValidation.js', array('jquery'), null, true );
	wp_enqueue_script( 'jqBootstrapValidation-js' );
	
	/*Adding contact_me scripts*/
	
	wp_register_script( 'contact_me-js', get_template_directory_uri() . '/js/contact_me.js', array('jquery'), null, true );
	wp_enqueue_script( 'contact_me-js' );
	
	/*Adding agency scripts*/
	
	wp_register_script( 'agency-js', get_template_directory_uri() . '/js/agency.js', array('jquery'), null, true );
	wp_enqueue_script( 'agency-js' );
	
	/*Adding customizer scripts*/
	
	wp_register_script( 'customizer-js', get_template_directory_uri() . '/js/customizer.js', array('jquery'), null, true );
	wp_enqueue_script( 'customizer-js' );
	
	/*navigation*/
	wp_register_script( 'navigation-js', get_template_directory_uri() . '/js/navigation.js', array('jquery'), null, true );
	wp_enqueue_script( 'navigation-js' );




	
	wp_enqueue_script( 'utano-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'utano_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Load TGM Plugins.
 */
require get_template_directory() . '/tgm/utano.php';
 

function register_menu_page_setting() {
	add_menu_page('Theme Settings', 'Additionally', 'administrator', 'settings_page.php', 'themes_settings');
}

add_action('admin_menu', 'register_menu_page_setting');

function themes_settings() {
?>
<div class="wrap">
<h2>Theme Settings</h2>

<form method="post" action="options.php" enctype="multipart/form-data">
	<?php settings_fields('nedw-settings-group') ?>
	<table class="form-table">
		<tr valign="top">
			<th scope="row">Twitter</th>
			<td> <input type="text" name="twitter" value="<?php echo get_option('twitter'); ?>" /> </td>
		</tr>
		<tr valign="top">
			<th scope="row">Facebook</th>
			<td> <input type="text" name="facebook" value="<?php echo get_option('facebook'); ?>" /> </td>
		</tr>
		<tr valign="top">
			<th scope="row">LinkedIn</th>
			<td> <input type="text" name="linkedin" value="<?php echo get_option('linkedin'); ?>" /> </td>
		</tr>
		<tr valign="top">
			<th scope="row">Copyright</th>
			<td> <input type="text" name="copy" value="<?php echo get_option('copy'); ?>" /> </td>
		</tr>
		<tr valign="top">
			<th scope="row">Link to Privacy Policy page</th>
			<td> <input type="text" name="privacy" value="<?php echo get_option('privacy'); ?>" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row">Link to Terms of Use page</th>
			<td> <input type="text" name="terms" value="<?php echo get_option('terms'); ?>" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row">Contact E-mail</th>
			<td> <input type="text" name="c_email" value="<?php echo get_option('c_email'); ?>" /> </td>
		</tr>
		<tr valign="top">
			<th scope="row">E-mail address for generated message</th>
			<td> <input type="text" name="send_email" value="<?php echo get_option('send_email'); ?>" placeholder="noreply@sitename.com" /> </td>
		</tr>
	</table>
	<p class="submit">
	<input type="submit" class="button-primary" value="<?php _e( 'Save Changes' )?>" />
	</p>
</form>

</div>
<?php
}

add_action( 'admin_init', 'register_nedwsettings' );
function register_nedwsettings() {
	register_setting( 'nedw-settings-group', 'twitter' );
	register_setting( 'nedw-settings-group', 'facebook' );
	register_setting( 'nedw-settings-group', 'linkedin' );
	register_setting( 'nedw-settings-group', 'copy' );
	register_setting( 'nedw-settings-group', 'privacy' );
	register_setting( 'nedw-settings-group', 'terms' );
	register_setting( 'nedw-settings-group', 'c_email' );
	register_setting( 'nedw-settings-group', 'send_email' );
}

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'advantages', array('labels' =>array('name' => __( 'Advantages' ), 'singular_name' => __( 'Advantage' ), 'add_new' => 'Add new Advantage', 'add_new_item' => 'New Advantage',), 'rewrite' => true, 'public' => true, 'has_archive' => true, 'supports' => array('title'), ) );
	register_post_type( 'about', array('labels' =>array('name' => __( 'About' ), 'singular_name' => __( 'About Item' ), 'add_new' => 'Add new About Item', 'add_new_item' => 'New About Item',), 'rewrite' => true, 'public' => true, 'has_archive' => true, 'supports' => array('title', 'thumbnail'), ) );
	register_post_type( 'partners', array('labels' =>array('name' => __( 'Partners' ), 'singular_name' => __( 'Partner' ), 'add_new' => 'Add new Partner', 'add_new_item' => 'New Partner',), 'rewrite' => true, 'public' => true, 'has_archive' => true, 'supports' => array('title', 'thumbnail'), ) );
	register_post_type( 'classes', array('labels' =>array('name' => __( 'Classes' ), 'singular_name' => __( 'Class' ), 'add_new' => 'Add new Class', 'add_new_item' => 'New Class',), 'rewrite' => true, 'public' => true, 'has_archive' => true, 'supports' => array('title', 'thumbnail'), ) );
	register_post_type( 'team', array('labels' =>array('name' => __( 'Team' ), 'singular_name' => __( 'Coach' ), 'add_new' => 'Add new Coach', 'add_new_item' => 'New Coach',), 'rewrite' => true, 'public' => true, 'has_archive' => true, 'supports' => array('title', 'thumbnail'), ) );
	register_post_type( 'posts_titles', array('labels' =>array('name' => __( 'Posts Titles' ), 'singular_name' => __( 'Post Title' ), 'add_new' => 'Add new Post Title', 'add_new_item' => 'New Post Title',), 'rewrite' => true, 'public' => true, 'has_archive' => true, 'supports' => array('title', 'thumbnail'), ) );
	register_post_type( 'memberships', array('labels' =>array('name' => __( 'Memberships' ), 'singular_name' => __( 'Membership' ), 'add_new' => 'Add new Membership', 'add_new_item' => 'New Membership',), 'rewrite' => true, 'public' => true, 'has_archive' => true, 'supports' => array('title'), ) );
	register_post_type( 'privacy_policy', array('labels' =>array('name' => __( 'Privacy Policy' ), 'singular_name' => __( 'Privacy Policy' ), 'add_new' => 'Add Privacy Policy', 'add_new_item' => 'Privacy Policy',), 'rewrite' => true, 'public' => true, 'has_archive' => true, 'supports' => array('title'), ) );
	register_post_type( 'terms_of_use', array('labels' =>array('name' => __( 'Terms of Use' ), 'singular_name' => __( 'Terms of Use' ), 'add_new' => 'Add Terms of Use', 'add_new_item' => 'Terms of Use',), 'rewrite' => true, 'public' => true, 'has_archive' => true, 'supports' => array('title'), ) );
	
}
?>



<?php
function my_jquery_scripts() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js' );
	wp_enqueue_script( 'jquery' );
}

add_action( 'wp_enqueue_scripts', 'my_jquery_scripts' );
 ?>