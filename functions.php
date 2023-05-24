<?php

// Action qui permet de charger des scripts dans notre thème
add_action('wp_enqueue_scripts', 'theme_enqueue_styles', 20);
function theme_enqueue_styles()
{
    // Chargement du fichier css qui lie le thème parent generatepress
    wp_enqueue_style('parent-style', get_stylesheet_directory_uri() . '/style.css');
    // Chargement du fichier css
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/CSS/theme.css'));
    // Chargement du fichier script
    wp_enqueue_script('theme-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array(), '1.0', true);
}

// Fonction qui ajoute les emplacements menus au thème et option logo
function motaphoto_supports()
{
    register_nav_menus(
        array(
            'header' => 'Navigation du header',
            'footer' => 'Navigation du footer'
        )
    );
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

// fonction qui ajoute la taxonomie et le CPT.
function motaphoto_init()
{
    register_taxonomy('categorie', '{custom_post_type}', [
        'labels' => [
            'name' => 'Catégorie',
            'singular_name' => 'Catégorie',
            'plural_name' => 'Catégories',
            'search_items' => 'Rechercher des catégories',
            'all_item' => 'Toutes les catégories',
            'edit_item' => 'Editer la catégorie',
            'update_item' => 'Mettre à jour la catégories',
            'add_new_item' => 'Ajouter une nouvelle catégorie',
            'new_item_name' => 'Ajouter une nouvelle catégorie',
            'menu_name' => 'Catégorie',
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true
    ]);
    register_taxonomy('format', '{custom_post_type}', [
        'labels' => [
            'name' => 'Format',
            'singular_name' => 'Format',
            'plural_name' => 'Formats',
            'search_items' => 'Rechercher des formats',
            'all_item' => 'Toutes les formats',
            'edit_item' => 'Editer le format',
            'update_item' => 'Mettre à jour le format',
            'add_new_item' => 'Ajouter un nouveau format',
            'new_item_name' => 'Ajouter un nouveau format',
            'menu_name' => 'Format',
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true
    ]);
    register_post_type('photo', [
        'label' => 'Photo',
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-camera',
        'supports' => ['title', 'thumbnail', 'custom-fields'],
        'taxonomies' => ['categorie', 'format'],
        'has_archive' => true,
    ]);
}

add_action('init', 'motaphoto_init');
add_action('after_setup_theme', 'motaphoto_supports');

// Hook pour ajouter Tous droits réservés au menu footer
function footer_txt($items, $args)
{
    if ($args->theme_location == 'footer') {
        $items .= '<li id="menu-item-13" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-13"><span>Tous droits réservés</span></li>';
    }
    return $items;
}

add_filter('wp_nav_menu_items', 'footer_txt', 10, 2);