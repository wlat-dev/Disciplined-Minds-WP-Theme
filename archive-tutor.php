<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');


$terms = get_terms(array(
		'post_type' => 'tutor',
		'post_status' => 'publish',
		'taxonomy' => 'subject',
		'hide_empty' => true,
		'parent' => 0,
));


?>

	<div class="wrapper" id="archive-wrapper">
		<div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">
			<header class="">

			</header>

			<main class="site-main" id="main">
				<div class="col-lg-2 position-fixed overflow-auto vh-100">
					<div class="row font-weight-bold">
						<h4>
							Filter By Subject Type
						</h4>
					</div>
					<div class="row">
							<ul class="cat-list px-1">
								<?php
								foreach ($terms as $term) {
									?>
									<li class="cat-item">
										<a class="text-dark" href="<?php echo esc_url(get_term_link($term)) ?>">
											<?php echo $term->name; ?>
										</a>
									</li>
									<?php
								}
								?>
							</ul>
					</div>
				</div>
				<div class="col-lg-10 offset-2">
					<div class="row justify-content-center ">
						<h1 class="display-4 font-weight-bold">
							Our Tutors
						</h1>
					</div>
					<div class="row row-cols-md-2">
						<?php
						if (have_posts()) {
							?>
							<?php
							// Start the loop.
							while (have_posts()) {
								the_post();
								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part('loop-templates/content', 'tutor-card');
							}
						} else {
							get_template_part('loop-templates/content', 'none');
						}
						?>
					</div>

				</div>
			</main> <!-- #main -->


			<?php
			// Display the pagination component.
			understrap_pagination();
			// Do the right sidebar check.
			get_template_part('global-templates/right-sidebar-check');
			?>


		</div><!-- #content -->

	</div><!-- #archive-wrapper -->

<?php
get_footer();
