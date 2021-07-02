<?php
  $title = get_sub_field('filter_title');
  
  $filter_settings = get_sub_field('filter_settings');
  $filter_results = get_sub_field('filter_results_shortcode');
?>
<section class="section">
  <div id="itg_block_<?php echo $block_id; ?>" class="container itgBlock-media-filter">
    <div class="columns is-12-desktop is-10-touch is-multiline">
      <div class="container itgBlock-media-filter-container">
        <div class="columns is-centered">          
            <div class="itgBlock-media-filter-title has-text-centered h3 itg-pb-48">
                <?php echo $title ?>
            </div>
        </div>
        <div class="columns is-centered">
          <div class="column is-12">
            <div>
              <?php echo do_shortcode ( $filter_settings ); ?>
            </div>
          </div>
        </div>
      </div>
        <div class="container">
	        <div class="columns">
	          <div class="column is-12">
	            <div>
	              <?php echo do_shortcode ( $filter_results ); ?>
	            </div>
	          </div>
	        </div>
        </div>
    </div>
  </div>
</section>