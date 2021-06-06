

<?php //Follow bem syntax for css class naming http://getbem.com/naming/ ?>
<div id="itg_block_<?php echo $block_id; ?>" class="container itgBlock__ItgSample <?php echo $enviroment; ?>">
  <div class="itgBlock__ItgSample--text container">
    <div class="itgBlock__ItgSample--text-normal">
      <?php
        echo get_sub_field('title', $acf_id);
      ?>
    </div>
    <div class="itgBlock__ItgSample--text-bold">
      <?php
        echo '<strong>' . get_sub_field('title', $acf_id) . '</strong>';
      ?>
    </div>    
  </div>
</div> 