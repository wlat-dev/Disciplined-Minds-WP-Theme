
# Disciplined Minds Tutoring

  

**Contributors:** William Latshaw

**Requires at least:** Wordpress 5.6.1

**Tested up to:** Wordpress 5.6.1

**Requires PHP:** 7.4

  

A custom theme developed for Disciplined Minds tutoring.

  

## Description

  

**[Demo here](demo.disciplinedmindstutoring.com)**.

  

A custom [Understrap](https://understrap.github.io/)(Underscores + Bootstrap) theme developed for Disciplined Minds Tutoring by William Latshaw. All styling completed via Bootstrap 4.6 and SCSS; Advanced Custom Fields Pro used to create fields. 

Note: this project was not finalized due to funding limitations.

Main SCSS file: /sass/theme/_theme.scss

SCSS variables: /sass/theme/_theme_variables.scss

### Landing page
> homepage.php 

- Carousel of published announcement posts.
	
- Published course posts queried and listed.

- Dynamically generated subject term table.

	- Header column consists of parent terms, badges to the right are first-order child terms, and both are only present if there is an active tutor for that subject.


### Tutor Archive

> archive-tutor.php

- Archive of custom tutor post types with custom, hierarchical subject taxonomies. 


![Tutor fields](https://disciplinedmindstutoring.com/wp-content/uploads/2021/02/Screen-Shot-2021-02-16-at-1.39.25-PM.png)  
  - Frontend single tutor visible [here](https://demo.disciplinedmindstutoring.com/?tutor=will-latshaw), archive visible [here](https://demo.disciplinedmindstutoring.com/?post_type=tutor).

### Course Archive

> archive-course.php 

- Published course posts listed with ACF fields for leads.

> content-course.php

- Individual course listing. Displays contents of fields in a hero section, card columns, and table.

![Hero Fields](https://disciplinedmindstutoring.com/wp-content/uploads/2021/02/Screen-Shot-2021-02-16-at-12.51.32-PM.png)

![Meeting Days/Times](https://disciplinedmindstutoring.com/wp-content/uploads/2021/02/Screen-Shot-2021-02-16-at-12.52.02-PM.png)

![Additional Details](https://disciplinedmindstutoring.com/wp-content/uploads/2021/02/Screen-Shot-2021-02-16-at-12.53.47-PM.png)

- Frontend single course visible [here](https://demo.disciplinedmindstutoring.com/?course=spring-sat-group-course), archive visible [here](https://demo.disciplinedmindstutoring.com/?post_type=course). 
	- Nota bene: only cursory styling completed due to limited funding.
  

## Copyright

Disciplined Minds Tutoring Wordpress Theme, Copyright 2021 Disciplined Minds Tutoring.


## Credits

* Font Awesome: http://fontawesome.io/license (Font: SIL OFL 1.1, CSS: MIT License)

* Bootstrap: http://getbootstrap.com | https://github.com/twbs/bootstrap/blob/master/LICENSE (Code licensed under MIT documentation under CC BY 3.0.)

* jQuery: https://jquery.org | (Code licensed under MIT)

* WP Bootstrap Navwalker by Edward McIntyre: https://github.com/twittem/wp-bootstrap-navwalker | GNU GPL

* Bootstrap Gallery Script based on Roots Sage Gallery: https://github.com/roots/sage/blob/5b9786b8ceecfe717db55666efe5bcf0c9e1801c/lib/gallery.php

* Understrap by Holger Koenemann: https://github.com/understrap/understrap | GNU GPL

* Owl Carousel 2: https://owlcarousel2.github.io/OwlCarousel2/ | (Code licensed under MIT)
