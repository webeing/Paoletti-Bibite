<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package paolettibibite
 */

get_header(); ?>

<?php
    // Loop for child page FRONT HOME
    global $parent_slug;
    $front_var = 168; //ID front home page
    $args = array(
        'post_parent'            => $front_var,
        'post_type'              => 'page',
        'order'                  => 'ASC',
        'orderby'                => 'menu_order',
    );

$home_query = new WP_Query( $args );
?>

<?php
    while ( $home_query->have_posts() ) : $home_query->the_post();
    $parent_slug =  the_slug(false);
?>

<section id="<?php the_slug(); ?>" class="slide">
    <div class="bubble">
        <div class="obj1"></div>
        <div class="obj2"></div>
        <div class="obj3"></div>
        <div class="obj4"></div>
        <div class="container clearfix">
            <div class="grid_4"></div>
            <div class="grid_5 omega">
                <h2 class="title-slide"><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </div>
            <div class="grid_3 center">
                <?php
                /**
                 * Post format Quote for child current page
                 */

                $args_child = array(
                    'post_parent'            => $post->ID,
                    'post_type'              => 'page',
                    'order'                  => 'ASC',
                    'orderby'                => 'menu_order',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'post_format',
                            'field' => 'slug',
                            'terms' => array( 'post-format-aside', 'post-format-gallery' )
                        )
                    )
                );

                $home_child = new WP_Query( $args_child );

                while ( $home_child->have_posts() ) : $home_child->the_post();

                    //get_template_part( 'content', get_post_format() );
                    if (has_post_format('aside',$post->ID)){
                        get_template_part( 'content', get_post_format() );
                    }
                endwhile;

                //wp_reset_postdata();
                ?>
            </div>

        </div><!--/container-->

        <?php
        /**
         * Post format Gallery for current page
         */
        rewind_posts();
        while ( $home_child->have_posts() ) : $home_child->the_post();

        if (has_post_format('gallery',$post->ID)){
            get_template_part( 'content', get_post_format() );
        }
        endwhile;
        wp_reset_postdata();
    ?>
        <?php
        /**
         * Loop custom for product
         */
        if ($parent_slug == 'prodotti'){?>
            <div id="catalogo-paoletti" class="container clearfix">
                <br/><br/><br/><br/>
                <!-- Carousel Products -->
                <ul id="gallery-products" class="grid_12 omega bxslider"><!-- gallery-products -->
                  <?php
                    $catalogo_args = array(

                        'posts_per_page' => 30,
                        'post_type'      => 'prodotto',

                    );
                    $catalog_query = new WP_Query( $catalogo_args );
                    while ( $catalog_query->have_posts() ) : $catalog_query->the_post();

                    get_template_part('content', 'catalogo-prodotti');
                    endwhile;
                    wp_reset_postdata();
                 ?>
                </ul>
            </div>
        <?php }
        ?>

        <?php
        /**
         * Loop custom for Blog
         */

        if ($parent_slug == 'blog'){?>
            <div id="news-list" class="container clearfix">
                <div class="grid_9">
                    <?php
                    $blog_args = array(
                        'posts_per_page' => 3,
                        'post_type'      => 'post',
                        'category_name'  => 'blog'

                    );

                    $blog_query = new WP_Query( $blog_args );
                    #var_dump($cocktails_query);
                    while ( $blog_query->have_posts() ) : $blog_query->the_post();
                        get_template_part('content', 'blog');
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
            <?php
        }
        ?>


        <?php
        /**
         * Loop custom for Cocktails
         */

        if ($parent_slug == 'cocktails'){?>
            <div id="cocktail-list" class="container clearfix">
                <div class="grid_9">
                <?php
                    $cocktails_args = array(
                    'posts_per_page' => 6,
                    'post_type'      => 'cocktail',

                    );
                    $cocktails_query = new WP_Query( $cocktails_args );
                        #var_dump($cocktails_query);
                    while ( $cocktails_query->have_posts() ) : $cocktails_query->the_post();

                        get_template_part('content', 'cocktail');
                    endwhile;
                    wp_reset_postdata();
                ?>
                </div>
            </div>
            <?php
        }
        ?>

    </div> <!--.bubble-->
</section> <!--#section-->

<?php endwhile;

wp_reset_postdata(); ?>

<?php get_footer(); ?>