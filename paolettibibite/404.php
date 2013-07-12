<?php
/**
 * The template for 404
 *
 * @package paolettibibite
 */

get_header(); ?>

<section class="slide page" id="page">
    <div class="bubble">
        <div class="container clearfix">


            <h2 class="title-slide">


                <?php _e( 'Nessuna pagina trovata', 'paolettibibite' ); ?>

            </h2>

            <?php get_sidebar(); ?>
        </div><!-- .container -->
    </div><!-- .bubble-->
</section><!-- .page -->


<?php get_footer(); ?>
