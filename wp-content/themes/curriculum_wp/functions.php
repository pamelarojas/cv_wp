<?php 

function register_enqueue_style(){
	$theme_data = wp_get_theme();

	wp_register_style('boostrap', get_theme_file_uri ('vendor/boostrap/css/bootstrap.min.css'), null, $theme_data->get('Version'),'screen');

	wp_register_style('fontawesome', 'https://use.fontawesome.com/releases/v5.2.0/css/all.css');

    wp_register_style('css', get_theme_file_uri ('css/style.css'), null,$theme_data->get('Version'),'screen');
    


	wp_enqueue_style('boostrap');
	wp_enqueue_style('fontawesome');
	wp_enqueue_style('css');
}

add_action('wp_enqueue_scripts', 'register_enqueue_style');




function register_enqueue_scripts(){
	$theme_data = wp_get_theme();
	

	wp_deregister_script('jquery');
	wp_deregister_script('jquery-migrate');

	wp_register_script('jquery3', get_theme_file_uri ('vendor/jquery/jquery-3.3.1.min.js'), 
     array('jquery_migrate'), null, "3.3.1", true);

    wp_register_script('boostrap', get_theme_file_uri ('vendor/boostrap/js/boostrap.min.js'),
     array('jquery_migrate'), null,"1.0", true);
    
    wp_register_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js', null,"1.14.0", true);

	wp_enqueue_script('jquery3');
	wp_enqueue_script('boostrap');
	wp_enqueue_script('popper');
}

add_action('wp_enqueue_scripts', 'register_enqueue_scripts');

remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );

?>