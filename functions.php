<?php

if (! function_exists('sensive_project_setup'))
{
  function sensive_project_setup(){
    // добавлеяем пользовательский логотип
    add_theme_support( 'custom-logo', [
        'height'      => 26,
        'width'       => 122,
        'flex-width'  => false,
        'flex-height' => false,
        'header-text' => '',
        'unlink-homepage-logo' => false, // WP 5.5
      ]);

    // добавляем динамический тег title
    add_theme_support('title-tag');
    // включаем миниаютуры для постам и страниц
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 750, 400, true );
  }
  add_action( 'after_setup_theme', 'sensive_project_setup');
}



/*
Подключение стилей и скриптов
*/

add_action( 'wp_enqueue_scripts', 'sensive_project_scripts' );

function sensive_project_scripts() {
	wp_enqueue_style( 'main', get_stylesheet_uri() );
  // ,array('main'),); мой файил css будет подлючаться после файла main
  //      bootstrap
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/vendors/bootstrap/bootstrap.min.css',array('main'),null);
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/vendors/fontawesome/css/all.min.css',array('main'),null);
	wp_enqueue_style( 'themify', get_template_directory_uri() . '/vendors/themify-icons/themify-icons.css',array('main'),null);
	wp_enqueue_style( 'linericon', get_template_directory_uri() . '/vendors/linericon/style.css',array('main'),null);
	wp_enqueue_style( 'default', get_template_directory_uri() . '/vendors/owl-carousel/owl.theme.default.min.css',array('main'),null);
	wp_enqueue_style( 'carousel', get_template_directory_uri() . '/vendors/owl-carousel/owl.carousel.min.css',array('main'),null);
	wp_enqueue_style( 'modifications', get_template_directory_uri() . '/css/modifications.css',array('main'),null);
	wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css',array('main'),null);


  // отлючаем jquery (переподключаем) подключили наш собственный jquery
  wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/vendors/jquery/jquery-3.2.1.min.js');
	wp_enqueue_script( 'jquery');

  // подключаем скрипты
	wp_enqueue_script( 'bundle' ,get_template_directory_uri() . '/vendors/bootstrap/bootstrap.bundle.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'carousel' ,get_template_directory_uri() . '/vendors/owl-carousel/owl.carousel.min.js', array('bundle'), '1.0.0', true );
	wp_enqueue_script( 'ajaxchimp' ,get_template_directory_uri() . 'js/jquery.ajaxchimp.min.js', array('bundle'), '1.0.0', true );
	wp_enqueue_script( 'mail_script' ,get_template_directory_uri() . '/js/mail-script.js', array('bundle'), '1.0.0', true );
	wp_enqueue_script( 'main' ,get_template_directory_uri() . '/js/main.js', array('bundle'), '1.0.0', true );


}

// регитстрируем пока одно  меню
function sensive_project_menus() {

  // регистрируем  область меню
		register_nav_menus( [
		'header_menu' => 'Меню в шапке'
	] );
}
// добавяем меню к событию
add_action('init','sensive_project_menus');

class bootstrap_4_walker_nav_menu extends Walker_Nav_menu {

    function start_lvl( &$output, $depth = 0, $args = array()){ // ul
        $indent = str_repeat("\t",$depth); // indents the outputted HTML
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
    }

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){ // li a span

    $indent = ( $depth ) ? str_repeat("\t",$depth) : '';

    $li_attributes = '';
        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = ($item->current || $item->current_item_anchestor) ? 'active' : '';
        $classes[] = 'nav-item';
        $classes[] = 'nav-item-' . $item->ID;
        if( $depth && $args->walker->has_children ){
            $classes[] = 'dropdown-menu';
        }

        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';

        $attributes .= ( $args->walker->has_children ) ? ' class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="nav-link"';

        $item_output = $args->before;
        $item_output .= ( $depth > 0 ) ? '<a class="dropdown-item"' . $attributes . '>' : '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

    }

}

## отключаем создание миниатюр файлов для указанных размеров
add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );
function delete_intermediate_image_sizes( $sizes ){
	// размеры которые нужно удалить
	return array_diff( $sizes, [
		'medium_large',
		'large',
		'1536x1536',
		'2048x2048',
	] );
}

// удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){


	return '
	<nav class="navigation justify-content-center d-flex blog-pagination  %1$s" role="navigation">
      %3$s
	</nav>
	';
}
// выводим пагинацию
the_posts_pagination( array(
	'end_size' => 2,
) );


add_action('widgets_init' , 'sensive_project_widgets_init');

function sensive_project_widgets_init() {
    register_sidebar( array(
    'name'          => esc_html__('Сайдбар блога','sensive_project' ),
    'id'            => "sidebar-blog",
    'before_widget' => '<div id="%1$s" class="single-sidebar-widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="single-sidebar-widget__title">',
    'after_title'   => '</h4>'
    ) );
    register_sidebar( array(
    'name'          => esc_html__('Сайдбар в подвале','sensive_project' ),
    'id'            => "sidebar-footer",
    'before_widget' => '<div class="col-lg-3 col-md-6 col-sm-6"><div id="%1$s" class="single-footer-widget %2$s">',
    'after_widget'  => '</div></div>',
    'before_title'  => '<h6>',
    'after_title'   => '</h6>',
    ) );
}

add_shortcode( 'test_example', 'test_example_func' );

function test_example_func() {

		global $post;
		$str = "";

		$posts = get_posts( array(
			'numberposts' => 3,
			'orderby'     => 'comment_count',
			'order'       => 'DESC',
			'post_type'   => 'post'
		) );

		foreach( $posts as $post ){
			setup_postdata($post);
      $comment = get_comments_number_text();
			$dt = get_the_date('M d');
      $img = get_the_post_thumbnail_url();
			$title = get_the_title();
			$author = get_the_author();
			$link = get_the_permalink();
			$str .= "
      <div class='single-post-list'>
        <div class='thumb'>
         <img class='card-img rounded-0' src='$img' />
        <ul class='thumb-info'>
          <li><a href='#'>$author</a></li>
          <li><a href='#'>$dt</a></li>
        </ul>
        </div>
        <div class='details mt-20'>
          <a href='$link'>
            <h6>$title  </h6>
          </a>
        </div>
    </div>
";

}
wp_reset_postdata(); // сброс
return $str;
}

// регистрируем поле в адмике с социальными сетями
add_action( 'init', 'register_social_link' );
function register_social_link(){
	register_post_type( 'social_link', [
		'label'  => null,
		'labels' => [
			'name'               => __('Социальные сети'), // основное название для типа записи
			'singular_name'      => __('Социальная сеть'), // название для одной записи этого типа
			'add_new'            => __('Добавить социальную сеть'), // для добавления новой записи
			'add_new_item'       => __('Добавление Социальной сети'), // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => __('Редактирование социальной сеть'), // для редактирования типа записи
			'new_item'           => __('Новое социальная сеть'), // текст новой записи
			'view_item'          => __('Смотреть социальну сеть'), // для просмотра записи этого типа.
			'search_items'       => __('Искать социальную сеть'), // для поиска по этим типам записи
			'not_found'          => __('Не найдено социальных сетей'), // если в результате поиска ничего не было найдено
			'not_found_in_trash' => __('Не найдено в корзине социальных сетей'), // если не было найдено в корзине
			'parent_item_colon'  => __(''), // для родителей (у древовидных типов)
			'menu_name'          => __('Социальные сети'), // название меню
		],
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
    'menu_icon'          => 'dashicons-admin-links',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 7,
		'supportvs'           => array('title','editor','excerpt')
	] );
}
// Добавляем шорткод для социльных сетей чтоб добавить их потом в виджет
add_shortcode( 'social', 'social_shortcode' );

function social_shortcode( $atts ){
  ob_start();
    get_template_part('template-parts/content', 'social');
    $ret = ob_get_contents();
    ob_end_clean();
    return $ret;
}