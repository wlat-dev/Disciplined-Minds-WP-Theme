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
	<header class="entry-header">
		<div class=""
		<?php if( get_field('course_background_image') ):
				$image = get_field('course_background_image'); ?>
				style="background-image: radial-gradient(circle, rgba(44,127,179,.3) 0%, rgba(192,217,232,1) 100%), url('<?php echo $image ?>'); background-repeat: no-repeat; background-size: cover;"
		<?php endif; ?>
		>
			<div class="h1 display-4 font-weight-bold"><?php the_title(); ?></div>
			<p class="primary-lead lead font-weight-bold"><?php the_field('primary_lead') ?></p>
			<hr class="my-4">
			<p class="secondary-lead"><?php the_field('secondary_lead') ?></p>
			<p class="lead">
				<?php if (get_field('link_to_woocommerce')): ?>
					<?php $link = get_permalink(get_field('link_to_woocommerce')); ?>
					<a href="<?php echo $link ?>" class="btn btn-primary btn-lg" role="button">Register Today</a>
				<?php endif; ?>
			</p>
		</div>
		<div class="alert alert-secondary">
			<?php the_field('alert') ?>
		</div>
	</header><!-- .entry-header -->
	<div class="row mt-4 justify-content-center">
		<?php if (get_field('recurring_or_single') == 'single'): ?>
			<?php if (have_rows('single_meetings')): ?>
				<?php while (have_rows('single_meetings')): the_row(); ?>
					<div class="col-md-5">
						<div class="card">
							<div class="card-header text-center">
								<h3>
									<?php
									$meeting_types = get_sub_field('meeting_type');
									foreach ($meeting_types as $meeting):
										echo esc_html($meeting);
									endforeach;
									?>
									<?php
									$subjects = get_sub_field('subjects');
									if ($subjects):
										foreach ($subjects as $subject):
											echo esc_html($subject->name);
										endforeach;
									endif;
									?>
								</h3>
							</div>
							<div class="card-body text-center">
								<h3 class="card-title">
									<?php the_sub_field('meeting_date'); ?>
								</h3>
								<?php the_sub_field('meeting_start_time'); ?>
								- <?php the_sub_field('meeting_end_time'); ?>
							</div>
						</div>
					</div>
				<?php endwhile ?>
			<?php endif ?>


		<?php endif ?>


	</div>
	<div class="pricing row justify-content-center my-5">
		<?php if (have_rows('price_details')): ?>
			<?php while (have_rows('price_details')): the_row();
				?>
				<div class="col-md-4">
					<div class="card shadow">
						<div class="card-header bg-light text-white text-center">
							<h4 class="card-title">
								<?php the_sub_field('heading') ?>
							</h4>
							<p class="card-text lead">
								<?php the_sub_field('lead') ?>
							</p>
						</div>
						<div class="card-body text-center">
							<h1 display-2>
								<div class="badge text-primary">
									$<?php the_sub_field('price') ?>.00
								</div>
							</h1>
						</div>
					</div>
				</div>

				<?php ?>
			<?php endwhile ?>
		<?php endif; ?>
	</div>
	<div class="entry-content">
		<div class="row justify-content-center">
			<table class="table-light border">
				<tbody>
				<?php if (get_field('practice_tests')): ?>
					<?php if (have_rows('practice_test_list')): ?>
						<tr class="table-active">
							<th scope="row" class="h3 text-dark p-3 border-right font-italic">Practice Tests</th>
							<td class="p-3">
								<?php $pt_count = 1 ?>
								<?php while (have_rows('practice_test_list')): the_row(); ?>
									<?php $practice_test_date = get_sub_field('practice_test_date'); ?>
									<?php echo 'Practice Test ' . $pt_count . ': ' . $practice_test_date . '<br>'; ?>
									<?php $pt_count++ ?>
								<?php endwhile; ?>
							</td>
						</tr>
					<?php endif; ?>
				<?php endif ?>
				<?php if (get_field('introduction_days')):
					$online_introduction_day = get_field('online_introduction_day');
					$in_person_introduction = get_field('in_person_introduction'); ?>
					<tr class="table-active border ">
						<th scope="row" class="h3 text-dark p-3 font-italic">Introduction Days</th>
						<td>
							<table>
								<?php if ($in_person_introduction['date']): ?>
									<?php $date = DateTime::createFromFormat('Ymd', $in_person_introduction['date']); ?>
									<tr class="table-primary">
										<td class="h5 p-3">In-Person</td>
										<td class="p-3"><?php echo $date->format('l') . ' ' . $date->format('F j, Y'); ?></td>
										<td class="p-3"><?php echo $in_person_introduction['start_time'] ?>
											- <?php echo $in_person_introduction['end_time'] ?></td>
									</tr>
								<?php endif ?>
								<?php if ($online_introduction_day['date']): ?>
									<?php $date = DateTime::createFromFormat('Ymd', $online_introduction_day['date']); ?>
									<tr class="table-secondary">
										<td class="h5 p-3">Online</td>
										<td class="p-3"><?php echo $date->format('l') . ' ' . $date->format('F j, Y'); ?></td>
										<td class="p-3"><?php echo $online_introduction_day['start_time'] ?>
											- <?php echo $online_introduction_day['end_time'] ?></td>
									</tr>
								<?php endif ?>
							</table>
						</td>
					</tr>
				<?php endif ?>
				<?php if (get_field('recurring_or_single') == 'single'): ?>
					<?php if (have_rows('single_meetings')): ?>
						<?php while (have_rows('single_meetings')): the_row(); ?>
							<tr>
								<th scope="row">
									<h3>
										<?php
										$meeting_types = get_sub_field('meeting_type');
										foreach ($meeting_types as $meeting):
											echo esc_html($meeting);
										endforeach;
										?>
										<?php
										$subjects = get_sub_field('subjects');
										if ($subjects):
											foreach ($subjects as $subject):
												echo esc_html($subject->name);
											endforeach;
										endif;
										?>
									</h3>
								</th>
								<td><?php the_sub_field('meeting_date'); ?></td>
								<td><?php the_sub_field('meeting_start_time'); ?>
									- <?php the_sub_field('meeting_end_time'); ?></td>
							</tr>
						<?php endwhile ?>
					<?php endif ?>
				<?php endif ?>
				<?php if (get_field('recurring_or_single') == 'recurring'): ?>
					<?php if (have_rows('recurring_meetings')): ?>
						<?php while (have_rows('recurring_meetings')): the_row(); ?>
							<?php $meeting_type = get_sub_field('meeting_type') ?>
							<?php $subjects = get_sub_field('subjects'); ?>
							<?php
							$isOnline = false;
							$meeting_type == 'Online' ? $isOnline = true : $isOnline = false;
							?>
							<tr class="<?php echo $isOnline ? 'table-secondary' : 'table-primary' ?>">


								<th scope="row" class="h3 text-dark p-3">
									<?php if ($subjects):
										foreach ($subjects as $subject):
											echo esc_html($subject->name);
										endforeach;
									endif; ?>

									<h3>
										<?php the_sub_field('meeting_type'); ?>

									</h3>
								</th>
								<td class="p-3">
									<?php
									if (have_rows('days_and_times')):
										while (have_rows('days_and_times')): the_row();
											echo '<span class="text-primary font-weight-bold mr-1">';
											the_sub_field('day');
											echo '</span> ';
											the_sub_field('start_time');
											echo ' - ';
											the_sub_field('end_time');
											?> <br> <?php
										endwhile;
									endif;
									?>
								</td>
							</tr>
						<?php endwhile ?>
					<?php endif ?>
				<?php endif ?>
				</tbody>
			</table>
		</div>




		<?php the_content(); ?>

	</div><!-- .entry-content -->


	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
