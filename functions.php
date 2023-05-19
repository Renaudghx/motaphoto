<?php

// Action qui permet de charger des scripts dans notre thème
add_action('wp_enqueue_scripts', 'theme_enqueue_styles', 20);
function theme_enqueue_styles()
{
    // Chargement du fichier css qui lie le thème parent generatepress
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    // Chargement du fichier css
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/CSS/theme.css'));
    // Chargement du fichier script
    wp_enqueue_script('theme-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array(), '1.0', true);
}

// Fonction qui ajoute les emplacements menus au thème
function motaphoto_supports()
{
    register_nav_menu('header', 'Navigation du header');
    register_nav_menu('footer', 'Navigation du footer');
    add_theme_support( 'custom-logo' );
}

add_action('after_setup_theme', 'motaphoto_supports');