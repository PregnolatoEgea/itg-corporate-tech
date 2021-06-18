<?php //Follow bem syntax for css class naming http://getbem.com/naming/

$background_color = get_sub_field('background_color');
$eyelet = get_sub_field('eyelet');
$eyelet_style = get_sub_field('eyelet_heading_style_heading_style');
$title = get_sub_field('title');
$title_style = get_sub_field('title_heading_style_heading_style');
$image = get_sub_field('image');

?>
<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock__ItgSocialSection itg-mb-80 container <?php echo $enviroment; ?>">
  <div class="columns itg-mb-56">
    <div class="column is-7-desktop is-10-touch">
      <?php
      if($eyelet){
        ?>
          <div class="itgBlock__ItgSocialSection--eyelet itg-mb-24 <?php echo $eyelet_style; ?>"><<?php echo $eyelet_style; ?>><?php echo $eyelet; ?></<?php echo $eyelet_style; ?>></div>
        <?php
      }
        ?>
        <?php
          if($title){
        ?>
          <div class="itgBlock__ItgSocialSection--title <?php echo $title_style; ?>"><<?php echo $title_style; ?>><?php echo $title; ?></<?php echo $title_style; ?>></div>
        <?php
        }
        ?>
    </div>
    <?php
      // Check rows exists.
      if( have_rows('social_icons') ):
        ?>
          <div class="columns is-touch is-hidden-desktop is-hidden-widescreen">
            <div class="column is-7-desktop is-8-touch is-flex itgBlock__ItgSocialSection--socials">
              <div class="columns is-flex-wrap-wrap">
                <?php

                // Loop through rows.
                while( have_rows('social_icons') ) : the_row();

                  ?>
                    <div class="column is-4-desktop">
                  <?php

                      require "atoms/ItgAtomSocialIcon.php";

                      // End loop.
                  ?>
                    </div>
                  <?php
                      endwhile;

                    ?>
              </div>
            </div>
          </div>
        <?php
      endif;
    if($image){
      ?>
        <div class="column is-5-desktop is-10-touch image">
          <?php
            if($image){
              ?>
                <img class="itgBlock__ItgSocialSection--image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
              <?php
            }
          ?>
        </div>
        </div>
      <?php
    }
      // Check rows exists.
      if( have_rows('social_icons') ):
        ?>
          <div class="is-widescreen is-hidden-touch columns">
            <div class="column is-7-desktop is-8-touch is-flex itgBlock__ItgSocialSection--socials">
              <div class="columns is-flex-wrap-wrap">
                <?php

                // Loop through rows.
                while( have_rows('social_icons') ) : the_row();

                  ?>
                    <div class="column is-4-desktop is-6-touch">
                  <?php

                      require "atoms/ItgAtomSocialIcon.php";

                      // End loop.
                  ?>
                    </div>
                  <?php
                      endwhile;

                    ?>
              </div>
            </div>
          </div>
        <?php
      endif;
    ?>
</div>