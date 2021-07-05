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
?>


<section>
  <div id="itg_block_<?php echo $block_id; ?>" class="container itgBlock-posts-filter">
    <div class="columns is-12-desktop is-10-touch is-multiline">
      <div class="itgBlock-posts-filter-container">
       <?php
       $itg_postsfilter = get_sub_field('posts_filter');
       if( $itg_postsfilter ):
       
        ?>
        <?php foreach( $itg_postsfilter as $itg_postfilter ): 
              $permalink = get_permalink( $itg_postfilter->ID );
              $title = get_the_title( $itg_postfilter->ID );
              $custom_field = get_field( 'field_name', $itg_postfilter->ID );
              $itg_postsdate = $itg_postfilter->post_date;
              $itg_poststhumbnail = get_the_post_thumbnail_url($itg_postfilter->ID);
              $itg_postexcerpt = $itg_postfilter->post_content;
              
          ?>
          <div class="columns itgitem is-multiline">
             <div class="column is-2 itgcatdatecol is-flex is-justify-content-space-between is-flex-direction-column">
              <div class="columns is-multiline">
               <?php
               $itgcatname = get_the_category($itg_postfilter->ID);
               foreach($itgcatname as $itgpost){
                $itgcatname = $itgpost->cat_name;
                $itglowcatname = strtolower($itgcatname);
                $itgpostid = $itgpost->term_id;
                $itgcaticon = get_field('upload_category_icon', 'term_' . $itgpost->term_id );

               ?>
               <?php if ($itgcaticon) : ?>
                <div class="column is-12-desktop is-one-quarter-mobile is-hidden-desktop is-hidden-tablet">
                  <div class="itgcatimage-<?php echo $itglowcatname ?>">
                   <img src="<?php echo $itgcaticon; ?>" width="60" height="70" border="0" alt="<?php echo $itgcatname; ?>" />
                  </div>
                </div>
                 <?php endif; ?>
                <div class="column is-12 is-three-quarter-mobile ">
                 <span class="itgmediacat is-size-4">
                     <?php echo $itgcatname; ?>
                 </span>
                </div>
                <?php if ($itgcaticon) : ?>
                <div class="column is-12 is-hidden-mobile itg_imgcat_wrapper">
                  <div class="itgcatimage-<?php echo $itglowcatname ?>">
                   <img src="<?php echo $itgcaticon; ?>" width="60" height="70" border="0" alt="<?php echo $itgcatname; ?>" />
                  </div>
                </div>
                 <?php endif; ?>
                 <?php
                  }
                 ?>

                <div class="column is-three-quarter-mobile is-hidden-desktop is-hidden-tablet itg_date_wrapper">
                    <span class='itg_asp_date'><?php echo explode(',', $itg_postsdate)[0] . ', '. date_format(new \Datetime($itg_postsdate), 'Y'); ?></span>
                    <span class='itg_asp_date has-text-weight-light is-size-7'><?php echo date_format(new \DateTime($itg_postsdate), 'H.i e'); ?></span>
                </div>
                </div>
                <div class="column is-12 is-half-mobile is-hidden-mobile itg_date_wrapper">
                    <span class='itg_asp_date'><?php echo explode(',', $itg_postsdate)[0] . ', '. date_format(new \Datetime($itg_postsdate), 'Y'); ?></span>
                    <span class='itg_asp_date has-text-weight-light is-size-7'><?php echo date_format(new \DateTime($itg_postsdate), 'H.i e'); ?></span>
                </div>

           </div>
           <?php if ( $itg_poststhumbnail ) { ?>
            <div class="column is-4">
                   <a class='itg_aspres_image_url' href='<?php echo $permalink; ?>'>
                       <div class='itg_aspimage' data-src="<?php echo $itg_poststhumbnail; ?>" style='background-image: url("<?php echo $itg_poststhumbnail; ?>");'>
                           <div class='void'></div>
                       </div>
                   </a>
            </div>
            <div class="column is-5">
            <h3><a class="itg_aspres_url" href='<?php echo $permalink; ?>' target='_blank'>
                    <?php echo $title; ?>
                    <span class='overlap'></span>
            </a></h3>
                    <span class="itg_excerpt">
                        <?php echo wp_trim_words( $itg_postexcerpt, 20,  '...' );  ?>
                    </span>
           </div>
            <?php } else { ?>
            <div class="column is-9 post_excerpt_container">
            <h3><a class="itg_aspres_url" href='<?php echo $permalink; ?>' target='_blank'>
                    <?php echo $title; ?>
                    <span class='overlap'></span>
            </a></h3>
                    <span class="itg_excerpt">
                        <?php echo wp_trim_words( $itg_postexcerpt, 35,  '...' );  ?>

                    </span>
            </div>
            <?php } ?>
           
          </div>
           <?php endforeach; ?>
          <?php endif; ?>

        </div>
      </div>      
    </div>
  </div>
</section>
