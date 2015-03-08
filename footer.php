<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package photolove
 */
?>

			</div>
			<!-- end .page-content -->
		</div>
		<!-- end .content-main -->

		<div id="about" class="footer-wrapper">

			<footer class="page-footer">
				<div class="page-footer-inner">
					<article class="bio">
						<?php
						$the_query = new WP_Query( 'page_id=15&page_id=39066' );
						while ( $the_query->have_posts() ) : $the_query->the_post();?>
							<h3 class="entry-title"><a href="<?php the_permalink(); ?>"
													   title="<?php printf( esc_attr__( 'Permalink to %s', 'photolove' ), the_title_attribute( 'echo=0' ) ); ?>"
													   rel="bookmark"><?php the_title(); ?></a></h3>
							<div class="post-module">
								<?php if ( ( has_post_thumbnail() && function_exists( 'has_post_thumbnail' ) ) ) { ?>
									<div class="bio-image">
										<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'profile-image' ); ?> </a>
									</div>
								<?php } ?>
								<div class="excerpt_container bio-content">
									<?php echo get_the_content(); ?>
								</div>
							</div>
						<?php
						endwhile;
						wp_reset_postdata();
						?>
					</article>
					<aside class="skills">
						<h3>My Skills</h3>
						<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus adipisci, architecto
						blanditiis culpa, </p>

						<ul class="skills-graph">
							<li class="skill">
								<h3>Photography</h3>
								<progress class="skill-bar" max="100" value="60">
									<strong>Skill Level: 60%</strong>
								</progress>
							</li>
							<li class="skill">
								<h3>Training Dragon</h3>
								<progress class="skill-bar" max="100" value="85">
									<strong>Skill Level: 85%</strong>
								</progress>
							</li>
							<li class="skill">
								<h3>Kung Fu</h3>
								<progress class="skill-bar" max="100" value="70">
									<strong>Skill Level: 70%</strong>
								</progress>
							</li>
						</ul>


					</aside>
				</div>

				<div class="page-footer-bottom">
					<div class="site-info">
						<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'photolove' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'photolove' ), 'WordPress' ); ?></a>
						<span class="sep"> | </span>
						<?php printf( __( 'Theme: %1$s by %2$s.', 'photolove' ), 'photolove', '<a href="" rel="">PhotoLove.me</a>' ); ?>
					</div>
					<!-- .site-info -->
					<div class="footer-links-social">

					<ul class="footer-links">
						<li>
							<a href="" class="icon"><i class="icon-twitter-bird"></i></a>
						</li>
						<li>
							<a href="" class="icon"><i class="icon-facebook"></i></a>
						</li>
						<li>
							<a href="" class="icon"><i class="icon-flickr"></i></a>
						</li>
						<li>
							<a href="" class="icon"><i class="icon-linkedin"></i></a>
						</li>
					</ul>
					</div>

				</div>
			</footer>
			<!-- end .page-footer -->
		</div>


		<footer id="colophon" class="site-footer" role="contentinfo">

		</footer><!-- #colophon -->

	</div>
	<!-- /content-wrap -->

</div>
<!-- /container a -->

<?php wp_footer(); ?>

</body>
</html>
