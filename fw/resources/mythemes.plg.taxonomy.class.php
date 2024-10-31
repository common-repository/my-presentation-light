<?php
if( !class_exists( 'mythemes_plg_taxonomy' ) ){

class mythemes_plg_taxonomy
{
    static function run()
    {
        $posts_taxonomies = mythemes_plg_cfg::get_taxonomies();

        /* IF NOT EMPTY */
        if( empty( $posts_taxonomies ) || !is_array( $posts_taxonomies ) ){
            return null;
        }
        
        foreach( $posts_taxonomies as $postSlug => $post_taxonomies ){
            foreach( $post_taxonomies as $taxSlug => $tax ){

                $labels = array(
                    'name' => _x( $tax[ 'pluralTitle' ] , 'taxonomy general name' ),
                    'singular_name' => _x( $tax[ 'singularTitle' ] , 'taxonomy singular name' ),
                    'menu_name' => _x( $tax[ 'pluralTitle' ] , 'taxonomy general name' ),
                    'search_items' => __( 'Search' , 'myThemes' ) . ' ' . $tax[ 'pluralTitle' ],
                    'all_items' => __( 'All' , 'myThemes' ) . ' ' . $tax[ 'pluralTitle' ],
                    'parent_item' =>  __( 'Parent' , 'myThemes' ) . ' ' . $tax[ 'singularTitle' ],
                    'parent_item_colon' => __( 'Parent' , 'myThemes' ) . ' ' . $tax[ 'singularTitle' ],
                    'edit_item' => __( 'Edit' , 'myThemes' ) . ' ' . $tax[ 'singularTitle' ],
                    'update_item' => __( 'Update' , 'myThemes' ) . ' ' . $tax[ 'singularTitle' ],
                    'add_new_item' => __( 'Add New' , 'myThemes' ) . ' ' . $tax[ 'singularTitle' ],
                    'new_item_name' => __( 'New', 'myThemes' ) . ' ' . $tax[ 'singularTitle' ] . ' ' .__( ' name' , 'myThemes' ),
                );

                if( $tax[ 'hierarchical' ] ){
                    $data = array(
                        'hierarchical' => true,
                        'rewrite' => array(
                            'slug' => $taxSlug,
                            'hierarchical' => true,
                        ),
                        'labels' => $labels
                    );
                }else{
                    $data = array(
                        'rewrite' => array(
                            'slug' => $taxSlug
                            ),
                        'labels' => $labels
                    );
                }
                 
                register_taxonomy( $taxSlug , array( $postSlug ) , $data );
            }
        }
    }
}

add_action( 'init', array( 'mythemes_plg_taxonomy' , "run" ) );

} /* END IF CLASS EXISTS */
?>