
<?php 

$itg_image = get_sub_field("image");

?>
<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock__ItgImage <?php echo $enviroment; ?>">
  <div class="container" >
    <div class="columns is-centered is-mobile">
      <div class="column is-10 is-8-tablet is-12-mobile has-text-centered">
      <?php
        if($itg_image):
      ?>
        <img class="itgBlock__ItgImage--image" src="<?php echo $itg_image['url']; ?>" alt="<?php echo $itg_image['alt']; ?>">              
      <?php
        endif;
      ?>        
      </div>
    </div>
  </div>
</div>