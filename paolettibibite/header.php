<?php /**
*
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package paolettibibite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>
<?php
/**
 * Add loader() function for homepage
 */
if(is_home() || is_front_page()) {
?>
    <body <?php body_class(); ?>>

        <div id="loader" class="bubblingG">
            <span id="bubblingG_1"></span>
            <span id="bubblingG_2"></span>
            <span id="bubblingG_3"></span>
        </div>

        <div class="result">
        </div>
        <?php
            /**
             * Aggiunta banner Paoletti
             */
            ?>
        <?php // do_action( 'birra' );
    /*
        <div id="birra">
            <a href="" class="closed">X</a>
            <a class="clearfix" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>" target="_blank">
                <img src="<?php bloginfo('template_url'); ?>/images/pop-up-birra.gif" alt="La nuova birra paoletti" />
            </a>
        </div>
    */
        ?>
<?php
    }
    else {
?>
    <body <?php body_class(); ?>>
<?php
    }
?>
<?php
/**
 * Main menu Paoletti
 */
?>
<div class="menu">
    <div class="menu-bar">
        <div class="container clearfix">

            <div id="logo" class="grid_2">
                <img src="<?php bloginfo('template_url'); ?>/images/logo-paoletti.png">
            </div>

            <nav id="nav" class="navigation-main grid_8" role="navigation">
                <?php
                /**
                 * Custom Nav for Home
                 */

                if(is_home() || is_front_page()) {

                    wp_nav_menu( array(
                        'theme_location' => 'primary_home',
                        'container'      => false,
                        'menu_class'     => 'navigation'
                    ) );
                } else {
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'navigation'
                    ) );
                } ?>
            </nav>

            <nav id="social-nav" class="navigation-main grid_2 omega">
                <?php
                if ( has_nav_menu( array( 'theme_location' => 'social_top' ) ) ) {

                    wp_nav_menu( array( 'theme_location' => 'social_top' ) );
                }


                ?>
            </nav>
        </div><!--/container-->
    </div><!--/menu-bar-->
    <div class="back-header clearfix"></div>
</div>