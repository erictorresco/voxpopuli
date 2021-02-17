<?php

/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$context          = Timber::context();
$templates        = array('index.twig');
if (is_front_page()) {
	$latestArgs = [
		'posts_per_page' => 5,
		'post_type' => 'post',
		'orderby' => 'date',
		'order'   => 'DESC',
		'suppress_filters' => true
	];
	$opinionArgs = [
		'posts_per_page' => 3,
		'category_name' => 'opinion',
		'orderby' => 'date',
		'order'   => 'DESC',
		'suppress_filters' => true
	];
	$context['latest'] = Timber::get_posts($latestArgs);
	$context['opinion'] = Timber::get_posts($opinionArgs);
	array_unshift($templates, 'front-page.twig');
}


Timber::render($templates, $context);
