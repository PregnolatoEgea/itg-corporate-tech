<?php
/**
 * Template name: Sophia Search
 */
get_header( );
?>
	<div class="itgSearch">
		<iframe src="<?php echo wp_strip_all_tags( get_the_content() ); ?>" title="ITG Sophia Search Module"></iframe>
	</div>
<?php
get_footer( );
?>