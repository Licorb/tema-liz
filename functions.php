<?php

add_theme_support('menus');
add_theme_support('post-thumbnails');


function liz_excerpt_length( $length ){
	return 16;
}
add_filter ('excerpt_length', 'liz_excerpt_length', 999);


function register_theme_menus() {

	register_nav_menus(
		array(
			'primary-menu' 	=> __( 'Primary Menu', 'treehouse-portfolio' )			
		)
	);

}
add_action( 'init', 'register_theme_menus' );


function liz_theme_styles() {

	//Importar estilos de padronização
	wp_enqueue_style( 'foundation_css', get_template_directory_uri() . '/css/foundation.css' );
	//wp_enqueue_style( 'normalize_css', get_template_directory_uri() . '/css/normalize.css');

	//Google Fonts - Roboto
	wp_enqueue_style( 'googlefonts_css', 'http://fonts.googleapis.com/css?family=Roboto:400,500,300' );
	//Importar CSS
	wp_enqueue_style( 'style_css', get_template_directory_uri() . '/style.css');
}

//chamar função acima
add_action( 'wp_enqueue_scripts', 'liz_theme_styles');

function liz_theme_js () {
	//Importar modernizr
	wp_enqueue_script( 'modernizr_js',  get_template_directory_uri() . '/js/modernizr.js', '', false );
	//Importar functions do Foundation no rodapé
	wp_enqueue_script( 'foundation_js',  get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '', true );
	//Main JS
	wp_enqueue_script( 'main_js',  get_template_directory_uri() . '/js/app.js', array('jquery', 'foundation_js'), '', true );
}
//chamar função acima
add_action ('wp_enqueue_scripts', 'liz_theme_js')

?>