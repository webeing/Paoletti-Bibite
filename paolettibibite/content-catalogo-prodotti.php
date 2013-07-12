<?php
/**
 * @package paolettibibite
 */

/**
 * if page Prodotti
 * Loop prodotti preview
 */
?>

        <li class="item-product grid_2 center omega">
            <a class="action" href="<?php echo BPUtilities::paolettibibite_get_path($post->ID) ?>" title="<?php the_title(); ?>">
                <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail();
                }
                ?>
                <span class="title"></span>
            </a>
        </li>
