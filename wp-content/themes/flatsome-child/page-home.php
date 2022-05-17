<?php
/*
Template name: Page - Inform Price
*/
defined( 'ABSPATH' ) || exit;

if(flatsome_option('pages_template') != 'default') {
	
	// Get default template from theme options.
	get_template_part('page', flatsome_option('pages_template'));
	return;

} else {

get_header();
do_action( 'flatsome_before_page' ); ?>
<div id="content" class="content-area page-wrapper" role="main">
    <?php echo do_shortcode('[ux_slider]') ?>

</div>
<?php
do_action( 'flatsome_after_page' );
get_footer();

}