<?php
/**
 * @package paolettibibite
 */

/**
 * if page Prodotti
 * Loop prodotti preview
 */
?>

<article id="post-<?php the_ID(); ?>" class="grid_12 post-news">
    <?php
        if ( has_post_thumbnail() ) {
    ?>
        <div class="thumb grid_3">
            <a class="thumb-archive" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_post_thumbnail('paoletti-cocktail'); ?>
            </a>
        </div>


    <div class="post-content grid_8 omega">
        <?php } else { ?>
    <div class="post-content omega">
    <?php } ?>
            <header>
            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
            <div class="entry-meta"><?php paoletti_entry_meta() ?></div>
        </header>
    </div>


    <div class="entry-content clearfix">
        <?php the_excerpt(); ?>
        <a class="more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Leggi tutto &raquo;</a>
    </div>
    <footer class="meta-data">

    </footer>
</article>