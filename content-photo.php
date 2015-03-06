<?php
/**
 * @package photolove
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('photo'); ?>>

	<?php if ((has_post_thumbnail() && function_exists('has_post_thumbnail'))) { ?>
		<?php the_post_thumbnail('featured-photo-image'); ?>
	<?php } ?>


	<div class="overlay">>
		<a href="#" class="expand">		<?php the_title() ?>
		</a>
		<a class="close-overlay hidden">x</a>
	</div>
</div>


