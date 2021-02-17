<?php
/**
 * Single post partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="card mb-5 mx-4">
		<div class="card-body">
			<h2 class="card-title">
				<a href="<?php echo get_permalink(get_the_ID()) ?>"> <?php the_title() ?></a>
				<br>

			</h2>
			<p>
				<?php the_field('primary_lead') ?>
			</p>
			<?php understrap_entry_footer(); ?>

		</div>


	</div>
</article><!-- #post-## -->
