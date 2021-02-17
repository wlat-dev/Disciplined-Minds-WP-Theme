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

$current_term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
$args = array(
		'child_of' => $current_term->term_id,
		'taxonomy' => $current_term->taxonomy,
		'hierarchical' => true,
		'title_li' => '',
		'show_option_none' => '',
);

$taxonomies = get_terms( array(
		'taxonomy' => 'taxonomy_name',
		'hide_empty' => false
) );


?>

	<div class="wrapper" id="archive-wrapper">
		<div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">
			<header class="mb-3">

			</header>

			<main class="site-main" id="main">
				<div class="col-lg-2 position-fixed overflow-auto vh-100 d-block">
						<ul class="nav " aria-label="breadcrumb">
							<small>
								<ol class="breadcrumb">
									<li class="breadcrumb-item text-capitalize">
										<a href="<?php echo get_post_type_archive_link(tutor); ?>"><?php echo $current_term->taxonomy ?>s</a>
									</li>
									<?php
									$ancestor_ids = array_reverse(get_ancestors( $current_term->term_id, $current_term->taxonomy ));
									$last_ancestor = end($ancestor_ids);
									foreach ($ancestor_ids as $ancestor_id) {
										$ancestor_term = get_term( $ancestor_id )->name;
										$ancestor_link = get_term_link( $ancestor_term, $current_term->taxonomy);
										if ( is_wp_error( $ancestor_link ) ) {
											continue;
										}
										echo '<li class="breadcrumb-item"><a href="' . esc_url( $ancestor_link ) . '">' . $ancestor_term . '</a></li>';
									}
									echo '<li class="breadcrumb-item active">' . $current_term->name . '</a></li>';
									?>
								</ol>
							</small>
						</ul>
					<div class="row">
						<ul class="px-1">
							<?php wp_list_categories($args); ?>
						</ul>
					</div>
				</div>
				<div class="col-lg-10 offset-2">
					<div class="row justify-content-center font-weight-bold">
						<?php
						the_archive_title('<h1 class="page-title display-4">', '</h1>');
						the_archive_description('<div class="taxonomy-description">', '</div>');
						?>
					</div>
					<div class="row row-cols-md-2 mt-3">
						<?php
						if (have_posts()) {
							while (have_posts()) {
								the_post();
								get_template_part('loop-templates/content', 'tutor-card');
							}
						} else {
							get_template_part('loop-templates/content', 'none');
						}
						?>
					</div>
				</div>

			</main><!-- #main -->

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
