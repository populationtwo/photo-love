<?php
/**
 * @package photolove
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php photolove_posted_on(); photolove_entry_footer(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ((has_post_thumbnail() && function_exists('has_post_thumbnail'))) { ?>
			<a href="<?php the_permalink() ?>" class="post-thumbnail"><?php the_post_thumbnail('post-image'); ?> </a>
		<?php } ?>
		<?php the_excerpt(); ?>


	</div><!-- .entry-content -->


</article><!-- #post-## -->