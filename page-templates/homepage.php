<?php
/**
 * Template Name: Landing Page
 *
 * Landing Page Template
 *
 * @package UnderStrap
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
if (is_front_page() && is_home()) : get_template_part('global-templates/hero'); endif;
?>
<!-- landing page wrapper -->
<div class="homepage--main--wrapper container-fluid">
    <!-- hero -->
    <section class="row justify-content-end align-content-center" id="home-hero">
        <div class="col-md-8 card bg-transparent border-0 ">
            <div class="card-body container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="pr-5 my-5">
                            <!-- slider -->
                            <div class="owl-carousel owl-theme ">
                                <?php
								// queries announcement post types, outputs as carousel
								$args = array(
										'post_type' => 'announcement',
										'status' => 'published',
										'order' => 'ASC',
										'orderby' => 'ID'
								);
								$loop = new wp_Query($args);
								$icons = ['<i class="announcement-icon fa fa-book fa-3x" aria-hidden="true"></i>', '<i class="announcement-icon fa fa-lightbulb-o fa-3x p-3" aria-hidden="true"></i>', '<i class="announcement-icon fa fa-compass fa-3x p-3" aria-hidden="true"></i>', '<i class="announcement-icon fa fa-graduation-cap fa-3x p-3" aria-hidden="true"></i>', '<i class="announcement-icon fa fa-cogs fa-3x p-3" aria-hidden="true"></i>'];
								$i = 0;
								while ($loop->have_posts()) : $loop->the_post();
									$link = get_field('custom_page') ? get_field('link_custom_page') : get_permalink();
									echo '<a href="' . $link . '" class="announcement-link">';
									echo '<div class="item announcement-card text-white text-center pr-5">';
									the_title('<div class="announcement"><h3>', '</h3></div>');
									echo $icons[$i];
									echo '<p class="pt-3">';
									the_field('lead');
									echo '</p></div></a>';
									($i > 3) ? $i = 0 : $i++;
								endwhile;
								wp_reset_query(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="row no-gutters">
        <!-- landing page navigation -->
        <div class="col-md-3 col-lg-2 ">
            <div class="secondary--nav--wrapper bg-transparent sticky-top d-none d-md-block" id="sticky-nav-wrap">
                <nav class="navbar h5 ">
                    <ul class="nav font-weight-bold flex-column">
                        <li class="nav-item span" id="nav-item-1">
                            <a href="#testprep-anchor" class="secondary--nav--link nav-link">
                                <i class="fa fa-line-chart"></i>
                                Test Prep
                            </a>
                        </li>
                        <li class="nav-item span" id="nav-item-2">
                            <a href="#subject-anchor" class="secondary--nav--link nav-link">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Subject Tutoring
                            </a>
                        </li>
                        <li class="nav-item span" id="nav-item-3">
                            <a href="#online-anchor" class="secondary--nav--link nav-link">
                                <i class="fa fa-desktop"></i>
                                Online Option
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- landing page main content -->
        <div class="col-md-9 col-lg-10">
            <!-- testprep -->
            <div class="" id="testprep-anchor"></div>
            <div class="testprep-section container-fluid ">
                <div class="group-course-row row align-items-start ">
                    <div class="group-courses col-md-8 col-lg-7 col-xl-6 ">
                        <div class="group-course-image row d-none d-md-block ">
                            <div class="col-md-10">
                                <img src="https://disciplinedmindstutoring.com/wp-content/uploads/2021/01/undraw_Meeting_re_i53h.png"
                                    alt="">
                            </div>
                        </div>
                        <div class="group-course-card text-left">
                            <h1 class="text-dark display-2 font-weight-bold">Group Courses</h1>
                            <div class="d-block ">
                                <div class="pb-4 lead">
                                    We regularly offer group courses in the Fall, Spring, and Summer that incorporate
                                    proven strategies, simulated test timing, and generous amounts of practice material.
                                    Students receive ample opportunities to practice the skills they develop as part of
                                    each course, with homework regularly assigned.
                                </div>
                                <a class="btn btn-outline-dark btn-lg"
                                    href="<?php echo get_post_type_archive_link('course'); ?>">
                                    Course
                                    Schedule and Registration
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- upcoming courses -->
                    <div class=" col-lg-4 col-md-6 pt-4 mt-3 ml-lg-5 pl-lg-5">
                        <img class="d-none d-md-block w-75"
                            src="https://disciplinedmindstutoring.com/wp-content/uploads/2021/02/undraw_Online_calendar_re_wk3t-1-1.png"
                            alt="">
                        <div class="upcoming-side-section p-3">
                            <div class="text-left text-dark">
                                <h4 class="upcoming-course-header pt-3 "> Upcoming Courses</h4>
                            </div>
                            <div class="upcoming-courses text-left">
                                <?php
								//query published courses, list permalinks
								$args = array(
										'post_type' => 'course',
										'status' => 'published',
										'order' => 'ASC',
										'orderby' => 'ID'
								);
								$loop = new wp_Query($args);
								while ($loop->have_posts()) : $loop->the_post();
									the_title('<div class=""><a href="' . get_permalink() . '" class="upcoming-course-item h5">', '</a></div>');
								endwhile;
								wp_reset_query(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- testprep qualified tutors -->
                <div class="qualified-tutors row align-items-center ">
                    <div class="qualified-tutor ">
                        <img class="rounded ml-2"
                            src="https://disciplinedmindstutoring.com/wp-content/uploads/2021/01/tutor.jpg" alt="">
                    </div>
                    <div class="qualified-tutor-text col-xl-5 offset-xl-1">
                        <div class="card border-0 ">
                            <div class="card-body text-left">
                                <h1 class="h1 font-weight-bold">Highly Qualified Tutors</h1>
                                <p class="card-text py-3">
                                    With over 170 years of combined experience, our tutors are experts at reducing the
                                    anxiety associated with standardized test preparation, providing results-driven,
                                    individually-tailored strategies to make the exam easier and prepare students for
                                    academic success. Our approach, coupled with strong student work ethic, allows
                                    students to reach their goal scores and facilitates acceptance into first choice
                                    schools.
                                </p>
                                <a href=" <?php echo get_post_type_archive_link('tutor'); ?>" role="button"
                                    class="btn btn-outline-dark  shadow-sm ">More
                                    Information About Our Test Prep Experts
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- subjects -->
            <div class="py-3 pt-5" id="subject-anchor">
            </div>
            <div class="subject-section container-fluid">
                <!-- subject qualified tutors -->
                <div class="qualified-tutors row align-items-center" id="specialists-row">
                    <div class="qualified-tutor-text col-xl-5 ml-xl-n4 ">
                        <div class="card border-0">
                            <div class="card-body text-dark text-left">
                                <h1 class="pt-5 pb-1 h1 font-weight-bold">Specialists at Every Level</h1>
                                <p class="card-text py-3">
                                    Our tutors utilize strategies backed by research on the neuroscience of learning to
                                    explain and demonstrate key concepts. Students receive numerous opportunities to
                                    discover their strengths and weaknesses, and in the process, are guided to take
                                    ownership of their own knowledge.
                                </p>
                                <a href=" <?php echo get_post_type_archive_link('tutor'); ?>" role="button"
                                    class="btn btn-outline-dark shadow-sm mb-5">More
                                    Information About Our Subject Specialists
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="tutor-cartoon d-none d-sm-block order-sm-first order-xl-last">
                        <img class="rounded"
                            src="https://disciplinedmindstutoring.com/wp-content/uploads/2021/02/undraw_knowledge_g5gf-4.png"
                            alt="">
                    </div>
                </div>
                <div class="row align-items-end ">
                    <div class="col-md-6 mb-3">
                        <h1 class="display-4 font-weight-bold ">Tutoring in Every Major Subject Area</h1>
                    </div>
                    <div class="col-md-3 offset-md-1 d-none d-md-block">
                        <img src="https://disciplinedmindstutoring.com/wp-content/uploads/2021/01/online-learning-1.png"
                            alt="">
                    </div>
                </div>
                <!-- subject table -->
                <div class="row">
                    <div class="col-md-10 ">
                        <div class="table-responsive">
                            <table class="subject-table table">
                                <tbody>
                                    <?php
								$parent_terms = get_terms('subject', array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => 'true'));
								foreach ($parent_terms as $parent):
									$name = str_replace(' ', '_', $parent->name); ?>
                                    <tr>
                                        <th scope="row" class="text-center align-middle h5"><?php echo $parent->name ?>
                                        </th>
                                        <td>
                                            <?php
											$terms = get_terms('subject', array('parent' => $parent->term_id, 'orderby' => 'slug', 'hide_empty' => true));
											foreach ($terms as $term):
												echo '<a class="badge badge-pill badge-primary-light text-white m-1 p-2" href="' . get_term_link($term) . '">' . $term->name . '</a>';
											endforeach;
											?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-5" id="online-anchor">
            </div>
            <!-- online tutoring -->
            <div class="online-row row justify-content-start  align-items-center">
                <div class="col-md-12">
                    <div class="icon-header-container mb-5 ml-lg-4">
                        <span class="h1 align-middle display-4 font-weight-bold"><i class="fa fa-laptop "></i> Online
                            Tutoring and Courses</span>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4 text-lg-right">
                    <p class="lead">
                        Do you prefer the convenience of online tutoring? Our experienced tutors are trained
                        to interact effectively with students in person or online. Our online tutoring incorporates
                        video, messaging and screen sharing technology to ensure that the interactions are as meaningful
                        and immersive as our in person tutoring.
                    </p>
                    <a class="btn btn-outline-primary" href="/?page_id=882">More
                        Information
                        About Online Tutoring
                    </a>
                </div>
                <div class="col-lg-6 col-xl-4 offset-xl-1 d-none d-lg-block">
                    <img src="https://disciplinedmindstutoring.com/wp-content/uploads/2021/02/undraw_online_video_ivvq.png"
                        alt="" id="cartoon-online" class=" bg-gradient-primary-lighter">
                </div>
            </div>
        </div>
    </section>
    <!-- mailing list -->
    <div class="row justify-content-center py-5 bg-primary-lighter align-items-center">
        <div class="col-md-3 d-md-block d-none">
            <img src="https://disciplinedmindstutoring.com/wp-content/uploads/2021/02/undraw_envelope_n8lc.png" alt="">
        </div>
        <?php
		//TODO: hardcode form
		 echo do_shortcode('[mc4wp_form id="748"]') 
		 ?>
    </div>
    <?php
	get_footer();
	?>
</div>