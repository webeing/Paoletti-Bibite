<?php
/**
 * Funzioni Webeing.net per il sito Paoletti
 */

/**
 * Crea l'oggetto prodotto
 */
add_action( 'init', 'bp_prodotto_setup');
function bp_prodotto_setup(){
    $bp_prodotti = new BPProdotti();
}
/**
 * Class Prodotti
 */
class BPProdotti{

    public function BPProdotti(){



        add_action( 'add_meta_boxes', array('BPProdotti','bp_add_custom_box_scheda_prodotto'));
        add_action( 'save_post', array('BPProdotti','bp_save_scheda_prodotto'));


        $this->bp_register_scheda_prodotto();
        $this->bp_create_bevande_taxonomies();
        $this->bp_create_fomato_taxonomies();
    }

    //registro il CPT prodotto
    public function bp_register_scheda_prodotto() {

        $bp_scheda_labels = array(
            'name'               => __('Scheda Prodotti','bp'),
            'singular_name'      => __('Scheda Prodotto','bp'),
            'add_new'            => __('Aggiungi Prodotto','bp'),
            'add_new_item'       => __('Nuovo Prodotto','bp'),
            'edit_item'          => __('Modifica Prodotto','bp'),
            'new_item'           => __('Nuovo Prodotto','bp'),
            'all_items'          => __('Elenco Prodotti','bp'),
            'view_item'          => __('Visualizza Prodotto','bp'),
            'search_items'       => __('Cerca Prodotti','bp'),
            'not_found'          => __('Prodotto non trovato','bp'),
            'not_found_in_trash' => __('Prodotto non trovato nel cestino','bp'),
        );

        $bp_scheda_cpt = array(
            'labels'             => $bp_scheda_labels,
            'public'             => true,
            'rewrite'            => array('slug' => 'scheda-prodotto', 'with_front' => false),
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 5,
            'supports'           => array(
                'title',
                'editor',
                'thumbnail'
            ),
        );

        register_post_type('prodotto', $bp_scheda_cpt);

        $this->flush_rewrite_rules();
    }



    /**
     * Aggiungo scheda prodotto
     */
    public function bp_add_custom_box_scheda_prodotto() {

        add_meta_box(
            'scheda_id',
            __( 'Scheda Prodotto', 'bp' ),
            array(__CLASS__,'bp_print_custom_box_scheda_prodotto'),
            'prodotto',
            'advanced',
            'high'
        );

    }

    public function bp_print_custom_box_scheda_prodotto( $post ) {
        $bp_valore_img_scritta = get_post_meta( $post->ID, 'bp_img_scritta_salvato', true);
        $bp_valore_formato_visualizzato = get_post_meta( $post->ID, 'bp_formato_visualizzato_salvato', true);
        $bp_valore_link = get_post_meta( $post->ID, 'bp_link_salvato', true);
        $bp_valore_calorie = get_post_meta( $post->ID, 'bp_calorie_salvato', true);
        $bp_valore_zuccheri = get_post_meta( $post->ID, 'bp_zuccheri_salvato', true);
        $bp_valore_carboidrati = get_post_meta( $post->ID, 'bp_carboidrati_salvato', true);
        $bp_valore_grassi = get_post_meta( $post->ID, 'bp_grassi_salvato', true);
        $bp_valore_galleria = get_post_meta( $post->ID, 'bp_galleria_salvato', true);

        wp_nonce_field( 'bp_prodotti_nonce', 'nonce_prodotti' );

        echo '<ul class="alternate">';

        BPUploadimage::bp_print_input_upload_media('scritta', $bp_valore_img_scritta, 'Immagine scritta: ');

        if($bp_valore_formato_visualizzato){
            $bp_args = array('selected'           => $bp_valore_formato_visualizzato,
                'show_option_none'   => 'Seleziona un formato',
                'order'              => 'ASC',
                'name'               => 'bp_formato_visualizzato',
                'id'                 => 'bp_formato_visualizzato_id',
                'hide_empty'         => 0,
                'taxonomy'           => 'formato');
        }else{
            $bp_args = array('show_option_none'   => 'Seleziona un formato',
                'order'              => 'ASC',
                'name'               => 'bp_formato_visualizzato',
                'id'                 => 'bp_formato_visualizzato_id',
                'hide_empty'         => 0,
                'taxonomy'           => 'formato');
        }

        echo '<li class="left"><label for="formato-visualizzato">Indicare il formato del prodotto visualizzato: </label></li><li>';
        wp_dropdown_categories( $bp_args );
        echo '</li>';

        echo '<li class="left"><label for="bp_link">';
        _e("Link pagina shop: ", 'bp' );
        echo '</label></li>';
        echo '<li><input type="text" name="bp_link" id="bp_link_id" value="'.$bp_valore_link.'" /></li>';

        echo '</br><li class="left"><label for="bp_valore_nutrionali">';
        echo '<strong>';
        _e("Valore nutrizionali: ", 'bp' );
        echo '</strong>';
        echo '</li>';

        echo '<li class="left"><label for="bp_calorie">';
        _e("Calorie: ", 'bp' );
        echo '</label></li>';
        echo '<li><input type="text" name="bp_calorie" id="bp_calorie_id" value="'.$bp_valore_calorie.'" /></li>';

        echo '<li class="left"><label for="bp_zuccheri">';
        _e("Zuccheri: ", 'bp' );
        echo '</label></li>';
        echo '<li><input type="text" name="bp_zuccheri" id="bp_zuccheri_id" value="'.$bp_valore_zuccheri.'" /></li>';

        echo '<li class="left"><label for="bp_carboidrati">';
        _e("Carboidrati: ", 'bp' );
        echo '</label>';
        echo '<li><input type="text" name="bp_carboidrati" id="bp_carboidrati_id" value="'.$bp_valore_carboidrati.'" /></li>';

        echo '<li class="left"><label for="bp_grassi">';
        _e("Grassi: ", 'bp' );
        echo '</label></li>';
        echo '<li><input type="text" name="bp_grassi" id="bp_grassi_id" value="'.$bp_valore_grassi.'" /></li>';

        echo '</br><li class="left"><label for="bp_galleria_prodotti">';
        _e("Galleria: ", 'bp' );
        echo '</label></li>';
        wp_editor( $bp_valore_galleria, 'bp_galleria', array('textarea_rows' =>10));
        echo '</li>';

        echo '</ul>';

    }

    public function bp_save_scheda_prodotto( $post_id ) {

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
            return;

        if ( !wp_verify_nonce( $_POST['nonce_prodotti'], 'bp_prodotti_nonce' ))
            return;

        if (isset($_POST['upload_image_scritta'])) {
            $upload_image_scritta = $_POST['upload_image_scritta'];
        }
        if (isset($_POST['bp_formato_visualizzato'])) {
            $bp_formato_visualizzato = $_POST['bp_formato_visualizzato'];
        }
        if (isset($_POST['bp_link'])) {
            $bp_link = $_POST['bp_link'];
        }
        if (isset($_POST['bp_calorie'])) {
            $bp_calorie = $_POST['bp_calorie'];
        }
        if (isset($_POST['bp_zuccheri'])) {
            $bp_zuccheri = $_POST['bp_zuccheri'];
        }
        if (isset($_POST['bp_carboidrati'])) {
            $bp_carboidrati = $_POST['bp_carboidrati'];
        }
        if (isset($_POST['bp_grassi'])) {
            $bp_grassi = $_POST['bp_grassi'];
        }
        if (isset($_POST['bp_galleria'])) {
            $bp_galleria = $_POST['bp_galleria'];
        }


        update_post_meta($post_id,'bp_img_scritta_salvato', $upload_image_scritta);
        update_post_meta($post_id,'bp_formato_visualizzato_salvato', $bp_formato_visualizzato);
        update_post_meta($post_id,'bp_link_salvato', $bp_link);
        update_post_meta($post_id,'bp_calorie_salvato', $bp_calorie);
        update_post_meta($post_id,'bp_zuccheri_salvato', $bp_zuccheri);
        update_post_meta($post_id,'bp_carboidrati_salvato', $bp_carboidrati);
        update_post_meta($post_id,'bp_grassi_salvato', $bp_grassi);
        update_post_meta($post_id,'bp_galleria_salvato', $bp_galleria);
    }


    public function bp_create_bevande_taxonomies()
    {

        // tassonomia bevanda

        $labels = array(
            'name' => 'Bevanda',
            'singular_name' => 'Bevanda',
            'search_items' => 'Cerca bevanda',
            'popular_items' => 'Bevande più usate',
            'all_items' => 'Tutte le bevande' ,
            'parent_item' => null,
            'parent_item_colon' => null,
            'edit_item' => 'Edit bevanda',
            'update_item' => 'Aggiorna bevanda',
            'add_new_item' => 'Aggiungi nuova bevanda',
            'new_item_name' => 'Nome nuova bevanda',
            'separate_items_with_commas' => 'Separa bevande con le virgole',
            'add_or_remove_items' => 'Aggiungi e Rimuovi bevande',
            'choose_from_most_used' => 'Scegli le bevande più usate',
            'menu_name' => 'Bevanda',
        );

        register_taxonomy('bevanda','prodotto',array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var' => true,
            'rewrite' => array( 'slug' => 'bevanda' ),
        ));

    }
    public function bp_create_fomato_taxonomies()
    {

        // tassonomia formato

        $labels = array(
            'name' => 'Formato',
            'singular_name' => 'Formato',
            'search_items' => 'Cerca formato',
            'popular_items' => 'Formati più usate',
            'all_items' => 'Tutte i formati' ,
            'parent_item' => null,
            'parent_item_colon' => null,
            'edit_item' => 'Edit formato',
            'update_item' => 'Aggiorna formato',
            'add_new_item' => 'Aggiungi nuovo formato',
            'new_item_name' => 'Nome nuovo formato',
            'separate_items_with_commas' => 'Separa formato con le virgole',
            'add_or_remove_items' => 'Aggiungi e Rimuovi formati',
            'choose_from_most_used' => 'Scegli i formati più usati',
            'menu_name' => 'Formato',
        );

        register_taxonomy('formato','prodotto',array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var' => true,
            'rewrite' => array( 'slug' => 'formato' ),
        ));

    }

    public function flush_rewrite_rules() {
        global $wp_rewrite;
        $wp_rewrite->flush_rules();
    }
}
?>