<?php
/**
 * Single post partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <div class="card mb-5 mx-4">
        <div class="row no-gutters border mx-0">
            <div class="col-lg-4 text-center">
                <?php echo get_the_post_thumbnail(get_the_ID(), 'medium' ); ?>
            </div>
            <div class="col-lg-8">
                <div class="card-body">
                    <h2 class="card-title">
                        <a href="<?php echo get_permalink(get_the_ID()) ?>"> <?php the_title() ?></a>
						<br>
						<small class="">
							<!-- list meeting options -->
							<?php
							$availabilities = get_field('meeting_availability');
							if ($availabilities) {
								foreach ($availabilities as $availability) {
									if ($availability == 'online') {
										echo '<div class="badge badge-light text-capitalize text-white font-weight-normal  align-middle mb-2 mx-1">ONLINE</div>';
									}
									if ($availability == 'in_person') {
										echo '<div class="badge badge-light text-capitalize text-white font-weight-normal  align-middle mb-2 mx-1">IN-PERSON</div>';
									}
								}
							}
							?>
						</small>
                    </h2>
                    <p> <?php understrap_entry_footer(); ?></p>
                    <p> <?php the_field('short_bio') ?> </p>
                    <a class="btn btn-secondary" href="/?page_id=880">
                        Schedule <?php the_title() ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex flex-wrap py-3">
            <!-- list subjects -->
            <?php foreach (get_the_terms(get_the_ID(), 'subject') as $term) { ?>
            <a class="badge badge-pill m-1 p-1 text-nowrap" href="<?php echo esc_url( get_term_link( $term ) ) ?>">
                <?php echo $term->name; ?>
            </a>
            <?php } ?>
        </div>
    </div>
</article><!-- #post-## -->
