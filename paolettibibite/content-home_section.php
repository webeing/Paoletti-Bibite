<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package paolettibibite
 */
?>

<section id="<?php the_slug(); ?>" class="slide">
    <div class="bubble">
        <div class="obj1"></div>
        <div class="obj2"></div>
        <div class="obj3"></div>
        <div class="container clearfix">
            <div class="grid_4"></div>
            <div class="grid_5 omega">
                <h2 class="title-slide"><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </div>
            <div class="grid_3 center"></div>
        </div><!--/container-->

    </div> <!--.bubble-->
</section> <!--#section-->
