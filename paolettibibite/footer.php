<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package paolettibibite
 */
?>

	</div><!-- #main -->

	<footer id="colophon" class="site-footer closing grid_12" role="contentinfo">
        <div class="menu-bar">
            <div class="container clearfix">

                <?php do_action( 'paolettibibite_copy' ); ?>

                <nav class="grid_9 omega uppercase" id="foot-navigation">

                <?php wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => 'clearfix'
                    ) );
                ?>
                </nav>
            </div><!--/container-->
        </div>
		<div class="site-info">
			<?php do_action( 'paolettibibite_credits' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>