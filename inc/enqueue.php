<?php 
function toast_enqueue_scripts(){

    $js_files = scandir(get_template_directory() . '/react-app/build/static/js/');

    foreach($js_files as $js_file):
        if(! str_contains($js_file, 'chunk') && ! str_contains($js_file, 'map') && ! str_contains($js_file, 'txt') && strlen($js_file) > 3):
            $js_file_name = $js_file;
        endif;
    endforeach;

    $css_files = scandir(get_template_directory() . '/react-app/build/static/css/');

    foreach($css_files as $css_file):
        if(! str_contains($css_file, 'chunk') && ! str_contains($css_file, 'map') && ! str_contains($css_file, 'txt') && strlen($css_file) > 3):
            $css_file_name = $css_file;

        endif;
    endforeach;

    wp_enqueue_style('toast', get_stylesheet_directory_uri().'/style.css');
    wp_enqueue_script('react-script', get_stylesheet_directory_uri().'/react-app/build/static/js/'.$js_file_name, array(), null, true);
    wp_enqueue_style('react-style', get_stylesheet_directory_uri().'/react-app/build/static/css/'.$css_file_name);
    
}
add_action('wp_enqueue_scripts', 'toast_enqueue_scripts');