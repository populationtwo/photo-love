<?php
/**
 * The main template file.
 *
 * @package photolove
 */

get_header(); ?>


<div class="content-main">
<div id="hero-header" class="owl-carousel owl-theme">
	<div class="item">
		<div class="color-overlay"></div>
		<figure>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/unsplash_52a1c2d7d6f4f_1.jpg" alt="" />
		</figure>
		<div class="item-desc">
			<p>Etiam massa et</p>

			<p><strong>Vivamus posuere auctor commodo </strong></p>

			<p><a class="cta" href="">Learn More</a></p>
		</div>
	</div>
	<div class="item">
		<div class="color-overlay"></div>
		<figure>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/photo-1424847651672-bf20a4b0982b.jpg" alt="" />
		</figure>
		<div class="item-desc">
			<p>Maecenas nunc nisi</p>

			<p><strong>Volutpat a pharetra et, pulvinar id</strong></p>

			<p><a class="cta" href="">Learn More</a></p>
		</div>
	</div>
	<div class="item">
		<div class="color-overlay"></div>
		<figure>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/JaI1BywIT5Or8Jfmci1E_zakopane.jpg" alt="" />
		</figure>
		<div class="item-desc">
			<p>Aenean ultricies massa</p>

			<p><strong>Nec enim porta, quis sagittis purus faucibus</strong></p>

			<p><a class="cta" href="">Learn More</a></p>
		</div>
	</div>
	<div class="item">
		<div class="color-overlay"></div>
		<figure>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/f9c22c58.jpg" alt="" />
		</figure>
		<div class="item-desc">
			<p>Aliquam malesuada</p>

			<p><strong>Urna consequat molestie elementum</strong></p>

			<p><a class="cta" href="">Learn More</a></p>
		</div>
	</div>
</div>
<!-- end .hero-header -->

<div class="page-content">
<section id="featured-photos" class="section-wrap">
	<div class="container">

		<div class="featured-photos-intro">
			<h2>Latest shots</h2>

			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad architecto aspernatur
				distinctio esse fugit in laboriosam magnam officia perferendis, quae, quam quas quis
				quisquam! Aut dicta earum iusto omnis veniam.</p>
		</div>
	</div>
	<div class="featured-photos-content">

		<?php
		$the_query = new WP_Query( array( 'post_type' => 'photo', 'post_per_page' => 8 ) );
		if ( $the_query->have_posts() ) : /* Start the Loop */ {
			while ( $the_query->have_posts() ) : $the_query->the_post();
				get_template_part( 'content', get_post_type() );
			endwhile;
		} else :
			get_template_part( 'content', 'none' );
		endif;
		wp_reset_postdata();
		?>

	</div>
</section>
<section id="blog-posts" class="section-wrap alt">
	<div class="container">
		<div class="blog-intro">
			<h2>From my blog</h2>

			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad architecto aspernatur
				distinctio esse fugit in laboriosam magnam officia perferendis, quae, quam quas quis
				quisquam! Aut dicta earum iusto omnis veniam.</p>
		</div>
		<div class="blog-content">

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>


		</div>
	</div>


</section>
<section id="stats" class="section-wrap alt">

	<div class="container">
		<div class="stats-intro">
			<h2>Consectetur Adipisicing</h2>

			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloremque exercitationem nam
				praesentium ratione reprehenderit sapiente vero voluptas! A animi consequatur fuga neque officia
				ut veritatis.
			</p>

		</div>
		<ul class="stats-content">
			<li class="stat">
				<div class="number">86K</div>
				<span class="type">shutters count</span>
			</li>
			<li class="stat">
				<div class="number">201</div>
				<span class="type">happy clients</span>
			</li>
			<li class="stat">
				<div class="number">658</div>
				<span class="type">projects</span>
			</li>
			<li class="stat">
				<div class="number">16K</div>
				<span class="type">hours spent</span>
			</li>
		</ul>

	</div>


</section>

<?php get_footer(); ?>