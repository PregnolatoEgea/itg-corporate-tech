
<?php 

$last_update_color = get_sub_field("last_update_color_text_color"); 
$last_update_force_date = get_sub_field("last_update_date_time");
$u_modified_time = get_the_modified_time('U');
$u_time = get_the_modified_time('U');


if($u_modified_time > $u_time_time){
    $updated_date = strftime('%e %B %Y - %H:%M %Z',$u_modified_time);
} else {    
    $updated_date = strftime('%e %B %Y - %H:%M %Z',$u_time);
}

if($last_update_force_date){
    $updated_date = $last_update_force_date.= " GMT";
}

?>
<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock-lastUpdate <?php echo $enviroment; ?>">
    <div class="columns is-mobile is-multiline is-centered is-gapless itgBlock-lastUpdate__container  is-vcentered">
        <div class="column is-narrow">
            <span class="itgBlock-lastUpdate__label itg--color-<?php echo $last_update_color; ?>">
                <?php echo _e('Ultimo aggiornamento'); ?>:&nbsp;
            </span>
        </div>
        <div class="column is-narrow">
            <span class="itgBlock-lastUpdate__date itg--color-<?php echo $last_update_color; ?>">                    
                <?php echo $updated_date; ?>
            </span>
        </div>        
  </div>
</div>