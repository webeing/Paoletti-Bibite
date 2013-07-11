<?php
$image_label =  get_post_meta( $post->ID, 'bp_img_scritta_salvato', true); //set image label
$calorie =  get_post_meta( $post->ID, 'bp_calorie_salvato', true); //set meta field calories
$carbohydrate = get_post_meta( $post->ID, 'bp_carboidrati_salvato', true); //set meta field carbohydrate;
$sugar = get_post_meta( $post->ID, 'bp_zuccheri_salvato', true); //set meta field sugar;
$fat = get_post_meta( $post->ID, 'bp_grassi_salvato', true); //set meta field total fat

?>
<div id="prodotto-<?php echo the_slug(); ?>" class="brown product-description">
        <figure class="grid_3 alpha">
            <?php
            /**
             * Load thumbnail full width
             */

            if ( has_post_thumbnail() ) {
                the_post_thumbnail();
            }
            ?>
           <!-- <img alt="Spuma Bibita Paoletti - Buona come una volta" src="images/prodotto/027-01-SPUMA-web.png">-->
        </figure>

        <div class="grid_7">
            <header>
                <?php
                /**
                 * Load field image product label
                 */
                ?>
                <img alt="<?php echo get_the_title();?>" src="<?php echo $image_label;?>">
            </header>

            <div class="alpha entry-content">
                <?php
                /**
                 * Load content CPT Prodotto
                 */
                the_content();
                ?>

            </div>
            <footer class="action-social">
            </footer>
          </div>

        <aside class="grid_2 omega">
            <ul>
                <li>
                    <span class="active"><?php echo $calorie; ?></span>
                    <?php echo __( 'Calorie', 'paolettibibite' ); ?>
                </li>
                <li>
                    <span><?php echo $sugar; ?></span>
                    <?php echo __( 'Zuccheri', 'paolettibibite' ); ?>
                </li>
                <li>
                    <span><?php echo $carbohydrate; ?></span>
                    <?php echo __( 'Carboidrati', 'paolettibibite' ); ?>
                </li>
                <li>
                    <span><?php echo $fat; ?></span>
                    <?php echo __( 'Grassi', 'paolettibibite' ); ?>
                </li>
            </ul>
            <div class="clear"></div>
            <small><?php echo __( 'valori per 100 ml di prodotto', 'paolettibibite' ); ?></small>
        </aside>
</div>

