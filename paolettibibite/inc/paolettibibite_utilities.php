<?php
/**
 * Funzioni di utilità su paoletti bibite
 */

add_action( 'init', 'bp_utilities_setup');
function bp_utilities_setup(){
$bp_utilities = new BPUtilities();
}
/**
* Class utilities
*/
class BPUtilities{

    public function BPUtilities(){


        add_action('paolettibibite_copy', array('BPUtilities','paolettibibite_footer_copy'));

     }

    /**
     * Function for relative path link for ajax loader product information
     */
    public function paolettibibite_get_path($postid){
        $url_endpoint = get_permalink($postid);
        $url_endpoint = parse_url( $url_endpoint );
        $url_endpoint = $url_endpoint['path'];
        return $url_endpoint;
    }

    public function paolettibibite_footer_copy(){
        ?>
        <div class="grid_3" id="copy">
            <h4><?php echo get_bloginfo('name') ?></h4>
            <small>E. Paoletti e Figli | <?php echo date('Y') ?> &copy; Tutti i diritti riservati</small>
        </div>
    <?php
    }

    /**
     * loop for query blog, prodotti, home
     */

    public function paolettibibite_loop($args, $template){

        $query = new WP_Query( $args );
        while ( $query->have_posts() ) : $query->the_post();

            get_template_part('content', $template);
        endwhile;
        wp_reset_postdata();

    }

}