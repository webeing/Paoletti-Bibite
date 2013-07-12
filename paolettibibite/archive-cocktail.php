<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package paolettibibite
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
    <section id="cocktails" class="slide">
        <div class="grid_5 omega">
                    <h2 class="title-slide">


                                <?php _e( 'Archivio cocktail', 'paolettibibite' ); ?>

                    </h2>
        </div>
			<?php /* Start the Loop */ ?>
            <div id="cocktail-list" class="container clearfix">
                <div class="grid_9">
                <?php while ( have_posts() ) : the_post(); ?>


                            <?php get_template_part( 'content', 'cocktail' ); ?>



                <?php endwhile; ?>
                </div>
            </div>
            <?php paolettibibite_content_nav( 'nav-below' ); ?>
    </section> <!--#section-->
		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive' ); ?>

		<?php endif; ?>


<?php get_footer(); ?>