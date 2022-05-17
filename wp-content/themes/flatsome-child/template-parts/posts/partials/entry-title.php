<h6 class="entry-category is-xsmall">
	<?php echo get_the_category_list( __( ', ', 'flatsome' ) ) ?>
</h6>

<?php
if ( is_single() ) {
	echo '<h1 class="entry-title text-left">' . get_the_title() . '</h1>';
} else {
	echo '<h2 class="entry-title text-left"><a href="' . get_the_permalink() . '" rel="bookmark" class="plain">' . get_the_title() . '</a></h2>';
}
?>

<?php
$single_post = is_singular( 'post' );
if ( $single_post && get_theme_mod( 'blog_single_header_meta', 1 ) ) : ?>
	<div class="entry-meta uppercase is-xsmall text-left">
		<?php custom_flatsome_posted_on(); ?>
	</div>
<?php elseif ( ! $single_post && 'post' == get_post_type() ) : ?>
	<div class="entry-meta uppercase is-xsmall text-left">
		<?php custom_flatsome_posted_on(); ?>
	</div>
<?php endif; ?>
<div class="social text-left pt-half">
    <a href="https://www.facebook.com/sharer.php?u=<?php echo get_the_permalink() ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
</div>


<div class="entry-divider is-divider small"></div>

