<?php
function create_articles_cpt() {
    $labels = array(
        'name' => _x( 'Articles', 'Post Type General Name', 'textdomain' ),
        'singular_name' => _x( 'Article', 'Post Type Singular Name', 'textdomain' ),
        'menu_name' => _x( 'Articles', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar' => _x( 'Article', 'Add New on Toolbar', 'textdomain' ),
        'archives' => __( 'Archives Article', 'textdomain' ),
        'attributes' => __( 'Attributs Article', 'textdomain' ),
        'parent_item_colon' => __( 'Parents Article:', 'textdomain' ),
        'all_items' => __( 'Tous Articles', 'textdomain' ),
        'add_new_item' => __( 'Ajouter nouvel Article', 'textdomain' ),
        'add_new' => __( 'Ajouter', 'textdomain' ),
        'new_item' => __( 'Nouvel Article', 'textdomain' ),
        'edit_item' => __( 'Modifier Article', 'textdomain' ),
        'update_item' => __( 'Mettre à jour Article', 'textdomain' ),
        'view_item' => __( 'Voir Article', 'textdomain' ),
        'view_items' => __( 'Voir Articles', 'textdomain' ),
        'search_items' => __( 'Rechercher dans les Article', 'textdomain' ),
        'not_found' => __( 'Aucun Articletrouvé.', 'textdomain' ),
        'not_found_in_trash' => __( 'Aucun Articletrouvé dans la corbeille.', 'textdomain' ),
        'featured_image' => __( 'Image mise en avant', 'textdomain' ),
        'set_featured_image' => __( 'Définir l’image mise en avant', 'textdomain' ),
        'remove_featured_image' => __( 'Supprimer l’image mise en avant', 'textdomain' ),
        'use_featured_image' => __( 'Utiliser comme image mise en avant', 'textdomain' ),
        'insert_into_item' => __( 'Insérer dans Article', 'textdomain' ),
        'uploaded_to_this_item' => __( 'Téléversé sur cet Article', 'textdomain' ),
        'items_list' => __( 'Liste Articles', 'textdomain' ),
        'items_list_navigation' => __( 'Navigation de la liste Articles', 'textdomain' ),
        'filter_items_list' => __( 'Filtrer la liste Articles', 'textdomain' ),
    );
    $args = array(
        'label' => __( 'Article', 'textdomain' ),
        'description' => __( 'Articles du blog', 'textdomain' ),
        'labels' => $labels,
        'menu_icon' => 'dashicons-album',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        //'taxonomies' => array(''),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );
    register_post_type( 'article', $args );
}

function get_articles_by_author( $data ) {
    $posts = get_posts( array(
      'author' => $data['id'],
      'post_type'   => 'articles'
    ) );
      print_r($posts);
  
    if ( empty( $posts ) ) {
      return new WP_Error( 'auteur_invalide', 'Auteur invalide', array( 'status' => 404 ) );
    }
    return $posts[0]->post_title;
  }
  
  


add_action( 'init', 'create_articles_cpt', 0 );
add_action( 'rest_api_init', function () {
    register_rest_route( 'fjord-api/v1', '/articles/auteur/(?P<id>\d+)', array(
      'methods' => 'GET',
      'callback' => 'get_articles_by_author',
      'permission_callback' => '__return_true',
    ) );
});

?>