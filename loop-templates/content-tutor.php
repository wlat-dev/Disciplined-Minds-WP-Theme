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
    <header class="entry-header d-flex justify-content-center ">

        <div class="d-block mb-3 ">
            <h1 class="entry-title font-weight-bold">
                <?php echo get_the_title(get_the_ID()) ?>
                <!-- list meeting options -->
                <?php $availabilities = get_field('meeting_availability');
				foreach ($availabilities as $availability) {
					if ($availability == 'online') {
						echo '<div class="badge badge-light text-capitalize text-white font-weight-lighter align-middle mb-2 mx-1">ONLINE</div>';
					}
					if ($availability == 'in_person') {
						echo '<div class="badge badge-light text-capitalize text-white font-weight-lighter align-middle mb-2 mx-1">IN-PERSON</div>';
					}
				}
				?>
            </h1>

        </div>
    </header><!-- .entry-header -->

    <div class="row p-3 border">
        <div class="col-lg-3 ">
            <?php echo get_the_post_thumbnail( get_the_ID(), 'large' ); ?>
            <div class="py-3">
                <div class="list-group list-group-flush">
                    <!-- list degrees -->
                    <?php if(have_rows('college_degrees')):
                        while(have_rows('college_degrees')) : the_row();
                        $sub_value = get_sub_field('college_degree'); ?>
                    <li class="list-group-item pl-1 h5"><small><?php echo $sub_value; ?></small></li>
                    <?php endwhile;
                    endif; ?>
                </div>
            </div>
        </div>
        <div class="subjects col-lg-9">
            <h4 class="mt-3 p-1">Subjects Tutored</h4>
            <div class="d-flex flex-wrap">
                <?php foreach (get_the_terms(get_the_ID(), 'subject') as $term) { ?>
                <a class="font-weight-bold p-1" href="<?php echo esc_url( get_term_link( $term ) ) ?>">
                    <?php echo $term->name; ?>
                </a>
                <?php } ?>
            </div>
            <hr />
            <div class="ml-1">
                <p> <?php the_field('long_bio') ?> </p>
            </div>
            <a class="btn btn-secondary" href="/?page_id=880">
                Schedule <?php the_title() ?>
            </a>
        </div>

    </div>
    <div class="entry-content">
        <?php the_content(); ?>

        <?php wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		); ?>

    </div><!-- .entry-content -->

    <footer class="entry-footer">

        <?php understrap_entry_footer(); ?>

    </footer><!-- .entry-footer -->

</article><!-- #post-## -->
