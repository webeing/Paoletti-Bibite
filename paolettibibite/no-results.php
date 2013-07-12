<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package paolettibibite
 */
?>
<section class="slide page" id="page">
    <div class="bubble">
        <div class="container clearfix">

            <div class="grid_9">
                <h2 class="title-slide">


                    <?php if ( is_search() ) : ?>

                        <?php _e( 'Spiacenti, non ci sono risultati per questa ricerca. Per favore riprovare con un altro termine.', 'paolettibibite' ); ?>


                    <?php else : ?>

                        <?php _e( 'Sembra che non riusciamo a trovare quello che stai cercando.', 'paolettibibite' ); ?>

                    <?php endif; ?>
                </h2>
            </div>
            <?php get_sidebar(); ?>
        </div><!-- .container -->
    </div><!-- .bubble-->
</section><!-- .page -->
