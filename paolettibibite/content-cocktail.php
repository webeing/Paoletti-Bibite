<?php
/**
 * @package paolettibibite
 */

/**
 * if page Prodotti
 * Loop prodotti preview
 */
?>

<article id="cok-<?php the_ID(); ?>" class="grid_4 post-type-cocktail box-white">
    <header>
        <a class="thumb-archive" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php
            if ( has_post_thumbnail() ) {
                the_post_thumbnail('paoletti-cocktail');
            }
            ?>
        </a>
        <h3><?php the_title(); ?></h3>
        <div class="meta author"><?php echo get_post_meta( $post->ID, 'bp_autore_salvato', true); ?></div>
        <div class="meta author"><?php echo get_post_meta( $post->ID, 'bp_locale_salvato', true); ?></div>

    </header>
    <div class="entry-content">
        <?php //the_content('20'); ?>
        <a class="more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Leggi tutto &raquo;</a>
    </div>
    <footer class="meta-data">

    </footer>
</article>