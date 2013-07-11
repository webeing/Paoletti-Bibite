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
<!--
                    <ul class="clearfix">
                        <li><a title="Gamma prodotti Paoletti Bibite" href="gamma-prodotti.html">Gamma Prodotti</a></li>
                        <li><a title="Diventa distributore di Paoletti bibite" href="distribuzione.html">Distribuzione</a></li>
                        <li><a title="Rassegna stampa Paoletti" href="press.html">Press</a></li>
                        <li><a title="" href="">Area download</a></li>
                        <li><a title="Paoletti Bibite Credits" href="credits.html">Credits</a></li>
                        <li><div data-show-faces="false" data-width="150" data-layout="button_count" data-send="false" data-href="https://www.facebook.com/pages/Paoletti-Bibite/371506946243972" class="fb-like fb_edge_widget_with_comment fb_iframe_widget" fb-xfbml-state="rendered"><span style="height: 20px; width: 103px;"><iframe scrolling="no" id="fbd1c0d6671b5a" name="fa8511bb1b299e" style="border: medium none; overflow: hidden; height: 20px; width: 103px;" title="Like this content on Facebook." class="fb_ltr" src="http://www.facebook.com/plugins/like.php?api_key=570338933010783&amp;locale=it_IT&amp;sdk=joey&amp;channel_url=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D25%23cb%3Df3d33ff28d0dc9e%26origin%3Dhttp%253A%252F%252Flandings.essereweb.net%252Ff300bbee1ee6ec4%26domain%3Dlandings.essereweb.net%26relation%3Dparent.parent&amp;href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FPaoletti-Bibite%2F371506946243972&amp;node_type=link&amp;width=150&amp;layout=button_count&amp;colorscheme=light&amp;show_faces=false&amp;send=false&amp;extended_social_context=false"></iframe></span></div></li>
                    </ul>
    -->            </nav>

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