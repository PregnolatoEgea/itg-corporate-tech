<?php
  $text_color = get_sub_field('text_color');
  $title = get_sub_field('title');
  $subtitle = get_sub_field('subtitle');
  $heading_style = get_sub_field('heading_style');
  $subtitle_paragraph_style = get_sub_field('subtitle_paragraph_style');
  $active_tab_background_color = get_sub_field('active_tab_background_color');
?>
<div
  id="itg_block_<?php echo $block_id; ?>"
  class="container itgBlock-tab-years <?php echo ($text_color) ? "itg--color-$text_color" : ''; ?>"
>
  <div class="columns is-variable is-6 is-multiline">
    <div class="itgBlock-tab-years__title column is-8 is-offset-2 has-text-centered">
      <div class="<?php echo $heading_style ?>">
      <<?php echo $heading_style ?>>
        <?php echo $title ?>
      </<?php echo $heading_style ?>>  
      </div>
    </div>
    <div class="itgBlock-tab-years__subtitle column is-8 is-offset-2 has-text-centered">
      <div class="<?php echo $subtitle_paragraph_style ?>">
        <?php echo $subtitle ?>
      </div>
    </div>
    <div class="itgBlock-tab-years__list column is-8 is-offset-2">
      <?php
        if (have_rows('years')):
          $counter = 0;
          while( have_rows('years') ) : the_row();
            $year = get_sub_field('year');
            $counter++;
      ?>
        <div
          data-year="<?php echo $year; ?>"
          class="itgBlock-tab-years__list-year <?php echo ($text_color) ? "itg--color-$text_color" : ''; ?> <?php echo ($counter === 1) ? 'active' : '' ?> <?php echo ($active_tab_background_color) ? "hover-color-$active_tab_background_color" : ''; ?> <?php echo ($counter === 1) ? 'active' : '' ?>"
          style="border-color: <?php echo $text_color; ?>"
        >
          <?php echo $year; ?>
        </div>
      <?php
          endwhile;
        endif;
      ?>
    </div>
    <div class="itgBlock-tab-years__list-numbers column is-12">
      <?php
          if (have_rows('years')):
            $counterYear = 0;
            while( have_rows('years') ) : the_row();
              $year = get_sub_field('year');
              $counterYear++;
            ?>
              <div data-year="<?php echo $year; ?>" class="itgBlock-tab-years__list-numbers-year is-variable is-flex is-6 is-multiline is-centered <?php echo ($counterYear !== 1) ? 'hidden' : ''; ?>">
                <?php
                while( have_rows('numbers') ) : the_row();
                ?>
                  <div>
                    <?php
                      require 'atoms/ItgNumber.php';
                    ?>
                  </div>
              <?php
              endwhile;
              ?>
              </div>
        <?php
            endwhile;
          endif;
        ?>
    </div>
  </div>
</div>
