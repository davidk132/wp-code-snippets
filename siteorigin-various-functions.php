<?php

/*

This file contains various random functions, hooks, and stuff useful on WordPress sites built on the SiteOrigin framework.
These may make reference to specific SiteOrigin functions so they won't work on other sites.

*/

// This function makes a shortcode to put the feature image anywhere on the page. Good for SO's dynamic CPT templates
// It only works inside the Loop i.e. on a post, page or CPR
// Makes use of SO function siteorigin_corp_entry_thumbnail
// Come to think of it, in this writing it doesn't use the SO function after all because the SO function acts like an action
// hook and doesn't return anything. Also it generates a big mess of code more appropriate for an actual blog post header

function dk_get_entry_thumbnail( $atts ) {
  // attribute defaults to title so that is returned it no atts are given
  global $post;
  $img= '';
  $a = shortcode_atts( array(
		'imagesize' => 'medium',
	 ), $atts );
  if ( has_post_thumbnail() ) { // check if the post has a featured image
    $alt = esc_html( get_the_title() );
    $img = wp_get_attachment_image( get_post_thumbnail_id(), $a['imagesize'], false, array( 'alt' => $alt ) );
  }
  return $img;
}
add_shortcode( 'getfeatureimage', 'dk_get_entry_thumbnail' );
