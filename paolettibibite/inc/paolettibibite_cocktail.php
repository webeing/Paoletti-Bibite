<?php /**
 *
 * Funzioni Webeing.net per il sito Paoletti
 * Crea l'oggetto cocktail
 */
add_action( 'init', 'bp_cocktail_setup');
function bp_cocktail_setup(){
    $bp_cocktail = new BPCocktail();
}
/**
 * Class Prodotti
 */
class BPCocktail{

    public function BPCocktail(){



        add_action( 'add_meta_boxes', array('BPCocktail','bp_add_custom_box_info_cocktail'));
        add_action( 'save_post', array('BPCocktail','bp_save_cocktail'));


        $this->bp_register_info_cocktail();
    }

    //registro il CPT cocktail
    public function bp_register_info_cocktail() {

        $bp_info_labels = array(
            'name'               => __('Scheda Cocktail','bp'),
            'singular_name'      => __('Scheda Cocktail','bp'),
            'add_new'            => __('Aggiungi Cocktail','bp'),
            'add_new_item'       => __('Nuovo Cocktail','bp'),
            'edit_item'          => __('Modifica Cocktail','bp'),
            'new_item'           => __('Nuovo Cocktail','bp'),
            'all_items'          => __('Elenco Cocktails','bp'),
            'view_item'          => __('Visualizza Cocktails','bp'),
            'search_items'       => __('Cerca Cocktails','bp'),
            'not_found'          => __('Cocktail non trovato','bp'),
            'not_found_in_trash' => __('Cocktail non trovato nel cestino','bp'),
        );

        $bp_info_cpt = array(
            'labels'             => $bp_info_labels,
            'public'             => true,
            'rewrite'            => array('slug' => 'scheda-cocktail', 'with_front' => false),
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 5,
            'supports'           => array(
                'title',
                'editor',
                'thumbnail'
            ),
        );

        register_post_type('cocktail', $bp_info_cpt);

        $this->flush_rewrite_rules();
    }



    /**
     * Aggiungo scheda cocktail
     */
    public function bp_add_custom_box_info_cocktail() {

        add_meta_box(
            'scheda_id',
            __( 'Scheda cocktail', 'bp' ),
            array(__CLASS__,'bp_print_custom_box_info_cocktail'),
            'cocktail',
            'advanced',
            'high'
        );

    }

    public function bp_print_custom_box_info_cocktail( $post ) {
        $bp_valore_autore = get_post_meta( $post->ID, 'bp_autore_salvato', true);
        $bp_valore_locale= get_post_meta( $post->ID, 'bp_locale_salvato', true);


        wp_nonce_field( 'bp_cocktail_nonce', 'nonce_cocktail' );


        echo '<ul>';
            echo '<li><label for="bp_autore">';
            _e("Autore del cocktail: ", 'bp' );
            echo '</label></li>';
            echo '<li><input type="text" name="bp_autore" id="bp_autore_id" value="'.$bp_valore_autore.'" /></li>';

            echo '<li><label for="bp_locale">';
            _e("Locale del cocktail: ", 'bp' );
            echo '</label></li>';
            echo '<li><input type="text" name="bp_locale" id="bp_locale_id" value="'.$bp_valore_locale.'" /></li>';
        echo '</ul>';


    }

    public function bp_save_cocktail( $post_id ) {

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
            return;
        if ( !wp_verify_nonce( $_POST['nonce_cocktail'], 'bp_cocktail_nonce' ))
            return;

        if (isset($_POST['bp_autore'])) {
            $bp_autore = $_POST['bp_autore'];
        }
        if (isset($_POST['bp_locale'])) {
            $bp_locale = $_POST['bp_locale'];
        }


        update_post_meta($post_id,'bp_autore', $bp_autore);
        update_post_meta($post_id,'bp_locale', $bp_locale);

    }


    public function flush_rewrite_rules() {
        global $wp_rewrite;
        $wp_rewrite->flush_rules();
    }
}

?>