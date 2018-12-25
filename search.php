<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Faraton
 */

get_header();
?>
				</div><!--.end for header.php-->
			</div><!--.end for header.php-->
	<section id="primary" class="content-area">
		<main id="main" class="site-main">
				<div class="site-content-wrap site-content-wrap2 contaner clear-self">
				<div class="site-content">
					<?php get_sidebar(); ?>
					<div class="site-content-middle">
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Результат поиска для: %s', 'faraton-com-ua' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
						</div>
					</div>
				</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
