<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package paolettibibite
 */
?>

<article id="post-<?php the_ID(); ?>" class="grid_8">
	<header class="entry-header">
		<h1 class="entry-title title-slide"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'paolettibibite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php // edit_post_link( __( 'Edit', 'paolettibibite' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
