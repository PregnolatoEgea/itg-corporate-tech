<?php
$title_alignment = get_sub_field('title_alignment');
$paragraph_alignment = get_sub_field('paragraph_alignment');
$title = get_sub_field('title');
$heading_style = get_sub_field('heading_style');
$paragraph = get_sub_field('paragraph');
$paragraph_style = get_sub_field('paragraph_style');
$background_image = get_sub_field('background_image');
$arrow_down_centered = get_sub_field('arrow_down_centered');
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

$background_color = '#d3f4ff';

if ($background_image) {
  $background_color = 'transparent';
}
?>
<div id="itg_block_<?php echo $block_id; ?>" class="container itgBlock-hero-image <?php if (get_sub_field('has_reduced_height')) {
                                                                                    echo 'has_reduced_height';
                                                                                  } ?>" style="background-image: url(<?php echo $background_image; ?>); background-color: <?php echo $background_color; ?>">
  <div class="columns is-12-desktop is-hidden-touch is-multiline <?php echo $title_alignment; ?>">
    <div class="column is-12 <?php echo $title_align; ?>">
      <?php
      if (get_field("stampare_breadcrumbs") && $block_id === 0) {
        $breadcrumbs_color = get_field("colore_breadcrumbs") == "nero" ? "#000" : "#fff";

        if (function_exists('yoast_breadcrumb')) {
          yoast_breadcrumb('<p id="breadcrumbs" style="color: ' . $breadcrumbs_color . '">', '</p>');
        }
      }
      ?>
      <div class="<?php echo $heading_style ?>">
        <<?php echo $heading_style ?>>
          <?php echo $title ?>
        </<?php echo $heading_style ?>>
      </div>
    </div>
  </div>
  <div class="columns is-multiline <?php echo $paragraph_alignment; ?>">
    <div class="itgBlock-hero-image__subtitle column is-10 <?php echo $paragraph_align; ?>">
      <div class="<?php echo $paragraph_style ?> itgBlock-hero-image__subtitle--mobile-style">
        <?php echo $paragraph ?>
      </div>
    </div>
  </div>
  <div class="columns is-multiline">
    <div class="itgBlock-hero-image__cta-list column is-5">
      <div class="itgBlock-hero-image__cta-list-inner columns">
        <?php
        while (have_rows('cta_list')) : the_row();
          $is_offset = 'is-offset-0';
          require 'atoms/ItgAtomCta.php';
        endwhile;
        ?>
      </div>
    </div>
  </div>
  <?php if ($arrow_down_centered) { ?>
    <div class="itgBlock-hero-image__arrow-down">
      <a class="itgBlock-hero-image__arrow-down-image" href="#itg_block_<?php echo $block_id + 1; ?>">
      </a>
    </div>
  <?php } ?>
</div>