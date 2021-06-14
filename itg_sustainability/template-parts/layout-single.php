<?php

if(is_single() || is_page()){

  $acf_id = get_queried_object()->ID;

  if(is_page()){

      $enviroment = ' enviromentSingular-page ';

  }else{

      $enviroment = ' enviromentSingular-single ';

  }

}elseif(is_tax()){

  $acf_id = get_queried_object()->taxonomy.'_'.get_queried_object()->term_id;

  $enviroment = ' enviromentTax ';

}elseif(is_term( get_queried_object()->term_id )){

  $acf_id = get_queried_object()->taxonomy.'_'.get_queried_object()->term_id;

  $enviroment = ' enviromentTerm ';

};

// Check value exists.
$block_id = 0;
$section_id = 0;
?>
<?php
$categories = get_the_category();
$cls = '';

if ( ! empty( $categories ) ) {
    foreach ( $categories as $cat ) {
        $cls .= $cat->slug . ' ';
    }
}
?>
<header class="entry-header">
    &nbsp;
</header>
    <div class="category-<?php echo $cls ?>">
        <?php
        if ( is_singular() ) :
            echo '<div class="itg__single_category ">'; the_category(); echo '</div>';
            the_title( '<h3 class="itg__entry_title">', '</h3>' ); ?>
        <?php else :
            the_title( '<h2 class="itg__entry_title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif; ?>
    </div>
    <div class="itg__entry_date has-text-centered"><?php echo get_the_date(); ?></div>

<?php
if( have_rows('layout_builder_posts') ):

  while( have_rows('layout_builder_posts') ) : the_row();
  $section_background_image = get_sub_field('background_image', $acf_id);
  $section_background_color = get_sub_field('background_color', $acf_id);
  $section_wave_border = get_sub_field('has_wave_border', $acf_id);
  $wave_border_type = get_sub_field('wave_border_type', $acf_id);
  $section_blob_effect = get_sub_field('has_blue_blobs', $acf_id);
  $section_blob_color_one = get_sub_field('blobs_color_one', $acf_id);
  $section_blob_color_two = get_sub_field('blobs_color_two', $acf_id);
  $section_blob_number = get_sub_field('blobs_number', $acf_id);
  $has_no_padding = get_sub_field('has_no_padding', $acf_id);

  if( have_rows('layout', $acf_id) ):

    if($section_wave_border && $wave_border_type === ''){

      require 'ItgWaveBorders.php';

    }

    ?>

      <div style="<?php if($section_wave_border && $wave_border_type === ''){ ?> clip-path:url(#wave_<?php echo $section_id; ?>); margin-top: -70px; padding-top: 180px; <?php } if($section_background_image){ ?> background-image:url(<?php echo $section_background_image['url']; ?>); <?php } ?>"  class="ItgLayoutSection section<?php echo ($section_background_color) ? " itg--background-color-$section_background_color" : '' ; echo ($section_blob_effect) ? " hasBlobsContainer" : '' ; echo ($has_no_padding) ? " has-no-padding" : ''; ?>">

      <?php
      if($section_blob_effect){
        ?>
          <div class="bubbleWrap" data-color1="<?php echo $section_blob_color_one; ?>" data-color2="<?php echo $section_blob_color_two; ?>" data-ballsNumber="<?php echo $section_blob_number; ?>">
            <canvas class="bubble" id="bubble<?php echo $section_id;?>"></canvas>
          </div>
        <?php
      }
      ?>
      <?php

        if ($section_wave_border && $wave_border_type === '0') {
          ?>
            <img class="Itg__wavedBorder" src="<?php echo get_template_directory_uri() . '/dist/src/images/Blue.svg'; ?>" alt="Border">
          <?php
        }elseif ($section_wave_border && $wave_border_type === '1') {
          ?>
            <img class="Itg__wavedBorder" src="<?php echo get_template_directory_uri() . '/dist/src/images/Dark_Blue.svg'; ?>" alt="Border">
          <?php
        }elseif ($section_wave_border && $wave_border_type === '2') {
          ?>
            <img class="Itg__wavedBorder" src="<?php echo get_template_directory_uri() . '/dist/src/images/Light_Azure.svg'; ?>" alt="Border">
          <?php
        }elseif ($section_wave_border && $wave_border_type === '3') {
          ?>
            <img class="Itg__wavedBorder" src="<?php echo get_template_directory_uri() . '/dist/src/images/White.svg'; ?>" alt="Border">
          <?php
        }

        // Loop through rows.
        while ( have_rows('layout', $acf_id) ) : the_row();


        //switch between blocks layout with following these examples

            // Case: Sample layout.
            switch (get_row_layout()) {
                case 'sample':
                    require 'blocks/ItgSample.php';
                    break;
                case 'carousel_image_card':
                    require 'blocks/ItgCarouselImageCard.php';
                    break;
                case 'intro_section':
                    require 'blocks/ItgIntroSection.php';
                    break;
                case 'quote':
                    require 'blocks/ItgQuote.php';
                    break;
                case 'social_section':
                    require 'blocks/ItgSocialSection.php';
                    break;
                case 'stories':
                    require 'blocks/ItgStories.php';
                    break;
                case 'report_list':
                    require 'blocks/ItgReportList.php';
                    break;
                case 'video':
                    require 'blocks/ItgVideo.php';
                    break;
                case 'lancio':
                    require 'blocks/ItgLancio.php';
                    break;
                case 'single_launch':
                    require "blocks/ItgSingleLaunch.php";
                    break;
                case 'hero_image':
                    require 'blocks/ItgHeroImage.php';
                    break;
                case 'video_&_texts':
                    require 'blocks/ItgVideoAndTexts.php';
                    break;
                case 'carousel_numbers':
                    require 'blocks/ItgCarouselNumbers.php';
                    break;
                case 'related_launches_type_3':
                    require 'blocks/ItgRelatedLauchesType3.php';
                    break;
                case 'text_block':
                    require 'blocks/ItgTextBox.php';
                    break;
                case 'accordion':
                    require 'blocks/ItgAccordion.php';
                    break;
                case 'tab_years':
                    require 'blocks/ItgTabYears.php';
                    break;
                case 'icon_&_text_type_1':
                    require 'blocks/ItgIconTextType1.php';
                    break;
                case 'download':
                    require 'blocks/ItgDownload.php';
                    break;
                case 'icon_&_text_type_2-3':
                    require 'blocks/ItgIconTextType23.php';
                    break;
                case 'lancio_rating_esg':
                    require 'blocks/ItgLancioRatingESG.php';
                    break;
                case 'infogram':
                    require 'blocks/ItgInfogram.php';
                    break;
                case 'carousel_launches':
                    require 'blocks/ItgCarouselLaunches.php';
                    break;
                case 'logo_wall':
                    require 'blocks/ItgLogoWall.php';
                    break;
                case 'content_carousel':
                    require 'blocks/ItgContentCarousel.php';
                    break;
                case 'matrix':
                    require 'blocks/ItgMatrix.php';
                    break;
                case 'related_launches_type_1_e_2':
                    require 'blocks/ItgRelatedLauchesType12.php';
                    break;
                case 'icon_list_type_1_e_2':
                    require 'blocks/ItgIconList.php';
                    break;
                case 'accordion_carousel':
                    require 'blocks/ItgAccordionCarousel.php';
                    break;
                case 'stakeholder':
                    require 'blocks/ItgStakeholder.php';
                    break;
                case 'table':
                    require 'blocks/ItgTable.php';
                    break;

                default:
                break;
        }

          $block_id++;

        // End loop.
        endwhile;

      ?>

      </div>

    <?php

  endif;

  $section_id++;

  endwhile;

endif;



?>