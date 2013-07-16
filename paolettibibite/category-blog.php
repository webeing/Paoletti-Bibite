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
    <section id="blog" class="inner">

			<?php /* Start the Loop */ ?>
            <div id="news-list" class="container clearfix">
                <div class="grid_5 omega">
                    <h2 class="title-slide">


                        <?php _e( 'Blog', 'paolettibibite' ); ?>

                    </h2>
                </div>
                <div class="grid_9">
                <?php while ( have_posts() ) : the_post(); ?>


                            <?php get_template_part( 'content', 'blog' ); ?>



                <?php endwhile; ?>
                </div>
                <?php  echo wp_pagenavi(); ?>
            </div>


    </section> <!--#section-->
		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive' ); ?>

		<?php endif; ?>

<?php get_footer(); ?>