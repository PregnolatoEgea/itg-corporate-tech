<?php
  $title_alignment = get_sub_field('title_alignment');
  $paragraph_alignment = get_sub_field('paragraph_alignment');
  $title = get_sub_field('filter_title');
  $heading_style = get_sub_field('heading_style');
  $paragraph = get_sub_field('paragraph');
  $paragraph_style = get_sub_field('paragraph_style');
  $background_image = get_sub_field('background_image');
  if ($title_alignment === 'is-centered') {
    $title_align = 'has-text-centered';
  } else {
    $title_align = 'has-text-left';
  }
  if ($paragraph_alignment === 'is-centered') {
    $paragraph_align = 'has-text-centered';
  } else {
    $paragraph_align = 'has-text-left';
  }
  $filter_settings = get_sub_field('filter_settings');
  $filter_results = get_sub_field('filter_results_shortcode');
?>
<section class="section">
  <div id="itg_block_<?php echo $block_id; ?>" class="container itgBlock-media-filter">
    <div class="columns is-12-desktop is-10-touch is-multiline">
      <div class="column is-12 itgBlock-media-filter-container">
        <div class="columns is-centered">          
            <div class="itgBlock-media-filter-title has-text-centered h3 itg-pb-48">
                <?php echo $title ?>
            </div>
        </div>
        <div class="columns">
          <div class="column is-12">
            <div>
              <?php echo do_shortcode ( $filter_settings ); ?>
            </div>
          </div>
        </div>
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