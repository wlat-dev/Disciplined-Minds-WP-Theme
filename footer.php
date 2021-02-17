<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>


<div class="wrapper bg-transparent p-3" id="wrapper-footer">

	<div class="<?php echo esc_attr($container); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer mr-5" id="colophon">

					<ul class="text-center" id="contact-info">
						<div class="">
							<a href="https://facebook.com/disciplinedmindstutoring" class="mr-1"><i
										class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
							<a href="https://twitter.com/dmindstutoring" class=""><i
										class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
						</div>
						<div>
							<a href="mailto:disciplinedminds@gmail.com"><i class="fa fa-envelope mr-1"
																		   aria-hidden="true"></i>disciplinedminds@gmail.com</a>
						</div>

						<div>
							<a href="tel:+18132545437"><i class="fa fa-phone-square mr-1" aria-hidden="true"></i>
								(813) 254-5437 </a>
						</div>

						<div>
							<i class="fa fa-address-book-o " aria-hidden="true"></i>
							715 W Platt Street, Tampa Fl. 33606
						</div>

					</ul>
					<div class="site-info ">
						<?php understrap_site_info(); ?>
					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

