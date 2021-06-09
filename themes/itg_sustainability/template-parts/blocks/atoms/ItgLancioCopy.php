<?php if($eyelet || $title){
  ?>
    <div class="itgAtom__ItgVideo--texts itg-pt-48">
      <?php if($eyelet){
        ?>
        <div class="columns is-marginless">
          <div class="itgAtom__ItgVideo--eyelet column is-offset-1 <?php echo $eyelet_style; ?>"><?php echo $eyelet; ?>
            <img src="<?php echo get_template_directory_uri(  ); ?>/dist/src/images/icons/underline.png" alt="Custom underline">
          </div>
        </div>
        <?php
      } ?>
      <?php if($title){
        ?>
        <div class="columns is-marginless">
          <div class="itgAtom__ItgVideo--title column is-offset-1 <?php echo $title_style;?>"><?php echo $title; ?></div>
        </div>
        <?php
      } ?>
    </div>
  <?php
} ?>