<?php
/**
 * Faraton functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Faraton
 */

if ( ! function_exists( 'faraton_com_ua_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function faraton_com_ua_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Faraton, use a find and replace
		 * to change 'faraton-com-ua' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'faraton-com-ua', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'faraton-com-ua' ),
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
		add_theme_support( 'custom-background', apply_filters( 'faraton_com_ua_custom_background_args', array(
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
			'height'      => 165,
			'width'       => 200,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'faraton_com_ua_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function faraton_com_ua_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'faraton_com_ua_content_width', 640 );
}
add_action( 'after_setup_theme', 'faraton_com_ua_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function faraton_com_ua_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'faraton-com-ua' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'faraton-com-ua' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'faraton_com_ua_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function faraton_com_ua_scripts() {
	wp_enqueue_style( 'faraton-com-ua-style', get_stylesheet_uri() );
// origin style faraton
	wp_register_style( 'styles-css', get_template_directory_uri() . ( '/styles.css' ) );
	wp_enqueue_style( 'styles-css' );

	wp_register_style( 'styles-articles-css', get_template_directory_uri() . ( '/styles_articles_tpl.css"' ) );
	wp_enqueue_style( 'styles-articles-css' );

	wp_register_style( 'highslide-css', get_template_directory_uri() . ( '/highslide.min.css' ) );
	wp_enqueue_style( 'highslide-css' );

	wp_register_style( 'calendar-css', get_template_directory_uri() . ( '/calendar.css' ) );
	wp_enqueue_style( 'calendar-css' );

	wp_register_style( 'styles-bdr', get_template_directory_uri() . ( '/styles_bdr.scss.css' ) );
	wp_enqueue_style( 'styles-bdr' );
//end style

	wp_enqueue_script( 'faraton-com-ua-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'faraton-com-ua-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	//origin scripts faraton
	wp_register_script( 'highslide-full', get_template_directory_uri() . ( '/highslide-full.packed.js' ));
	wp_enqueue_script( 'highslide-full' );

	wp_register_script( 'flowplayer-3', get_template_directory_uri() . ( '/flowplayer-3.2.9.min.js' ));
	wp_enqueue_script( 'flowplayer-3' );

	wp_register_script( 'ru-js', get_template_directory_uri() . ( '/ru.js' ));
	wp_enqueue_script( 'ru-js' );

	wp_register_script( 'cookie', get_template_directory_uri() . ( '/cookie.js' ));
	wp_enqueue_script( 'cookie' );

	wp_register_script( 'widgets-js', get_template_directory_uri() . ( '/widgets.js@v=8' ));
	wp_enqueue_script( 'widgets-js' );

	wp_register_script( 'calendar-packed-js', get_template_directory_uri() . ( '/calendar.packed.js' ));
	wp_enqueue_script( 'calendar-packed-js' );

	wp_register_script( 'html5-3', get_template_directory_uri() . ( '/html5-3.7.0.js' ));
	wp_enqueue_script( 'html5-3' );

	wp_register_script( 'jquery-1', get_template_directory_uri() . ( '/jquery-1.10.2.min.js'));
	wp_enqueue_script( 'jquery-1' );

	wp_register_script( 'map2-js', get_template_directory_uri() . ( '/map2.js' ));
	wp_enqueue_script( 'map2-js' );

	wp_register_script( 'link-top', get_template_directory_uri() . ( '/link_top.js' ));
	wp_enqueue_script( 'link-top' );

	wp_register_script( 'googleapis', '//maps.googleapis.com/maps/api/js?key=AIzaSyBj5qNusIPNEJ7T7bVTlmoXtAS4m7iNLcs' );
	wp_enqueue_script( 'googleapis' );

	wp_register_script( 'site-min', get_template_directory_uri() . ( '/site.min.js@1523354661' ));
	wp_enqueue_script( 'site-min' );


}
add_action( 'wp_enqueue_scripts', 'faraton_com_ua_scripts' );

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

// Записи
## rename «записи» like «новости»
//$labels = apply_filters( "post_type_labels_{$post_type}", $labels );
add_filter('post_type_labels_post', 'rename_posts_labels');
function rename_posts_labels( $labels ){

	/* оригинал
		stdClass Object (
			'name'                  => 'Записи',
			'singular_name'         => 'Запись',
			'add_new'               => 'Добавить новую',
			'add_new_item'          => 'Добавить запись',
			'edit_item'             => 'Редактировать запись',
			'new_item'              => 'Новая запись',
			'view_item'             => 'Просмотреть запись',
			'search_items'          => 'Поиск записей',
			'not_found'             => 'Записей не найдено.',
			'not_found_in_trash'    => 'Записей в корзине не найдено.',
			'parent_item_colon'     => '',
			'all_items'             => 'Все записи',
			'archives'              => 'Архивы записей',
			'insert_into_item'      => 'Вставить в запись',
			'uploaded_to_this_item' => 'Загруженные для этой записи',
			'featured_image'        => 'Миниатюра записи',
			'set_featured_image'    => 'Задать миниатюру',
			'remove_featured_image' => 'Удалить миниатюру',
			'use_featured_image'    => 'Использовать как миниатюру',
			'filter_items_list'     => 'Фильтровать список записей',
			'items_list_navigation' => 'Навигация по списку записей',
			'items_list'            => 'Список записей',
			'menu_name'             => 'Записи',
			'name_admin_bar'        => 'Запись',
		)
	*/
	$new = array(
		'name'                  => 'Новости',
		'singular_name'         => 'Новость',
		'add_new'               => 'Добавить новость',
		'add_new_item'          => 'Добавить новость',
		'edit_item'             => 'Редактировать новость',
		'new_item'              => 'Свежая новость',
		'view_item'             => 'Просмотреть новость',
		'search_items'          => 'Поиск новостей',
		'not_found'             => 'Новостей не найдено.',
		'not_found_in_trash'    => 'Новостей в корзине не найдено.',
		'parent_item_colon'     => '',
		'all_items'             => 'Все новости',
		'archives'              => 'Архивы новостей',
		'insert_into_item'      => 'Вставить в новость',
		'uploaded_to_this_item' => 'Загруженные для этой новости',
		'featured_image'        => 'Миниатюра новости',
		'filter_items_list'     => 'Фильтровать список новостей',
		'items_list_navigation' => 'Навигация по списку новостей',
		'items_list'            => 'Список новостей',
		'menu_name'             => 'Новости',
		'name_admin_bar'        => 'Новость', // пункте "добавить"
		'taxonomies'            => array(),
	);

	return (object) array_merge( (array) $labels, $new );
}

// add_filter('post_type_labels_post', 'filter_category');
// function filter_category( label ){
// 	'taxonomies'          => null,
// 	return 'taxonomies';
// }
// create type - "Товар"
add_action( 'init', 'register_post_types' );
function register_post_types(){
	register_post_type('Goods', array(
		'label'  => Товары,
		'labels' => array(
			'name'               => 'Товары', // основное название для типа записи
			'singular_name'      => 'Товар', // название для одной записи этого типа
			'add_new'            => 'Добавить товар', // для добавления новой записи
			'add_new_item'       => 'Добавление товаров', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование товара', // для редактирования типа записи
			'new_item'           => 'Новый товар', // текст новой записи
			'view_item'          => 'Смотреть товар', // для просмотра записи этого типа.
			'search_items'       => 'Искать товар в каталоге', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в каталоге', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Товары', // название меню
		),
		'description'         => 'Товары которые реализует компания',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-cart', 
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => true,
		'supports'            => array('title','editor'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array(),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );
}
