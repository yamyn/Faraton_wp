<?php
/*
Template Name: Новости
*/
?>

<?php get_header(); ?>
		</div>
</div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="site-content-wrap site-content-wrap2 contaner clear-self">
				<div class="site-content">
					<?php get_sidebar(); ?>
					<div class="site-content-middle">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();


		endwhile; // End of the loop.
		?>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
