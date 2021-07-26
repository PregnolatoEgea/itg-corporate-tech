    
        
           
<?php foreach ($filter->get() as $kk => $term): ?>
<?php if ($taxonomy === 'category') : ?>
    <div class="itg_asp_label aligncenter <?php echo $taxonomy; ?>_filter_box itcatfilter is-narrow">
        
         <input type="radio" class="asp_radio"
                <?php if (isset($filter->data['custom_name'])): ?>
                name="<?php echo $filter->data['custom_name']; ?>"
            <?php else: ?>
                name="<?php echo $filter->isMixed() ? "termset_single" : "termset[" . $taxonomy . "][]"; ?>"
            <?php endif; ?>
            <?php echo $term->default ? 'data-origvalue="1"' : ''; ?>
            <?php echo $term->selected ? "checked='checked'" : ""; ?> value="-1">
        <?php echo asp_icl_t("Chose one option [" . $taxonomy . "]" . " ($real_id)", $term->label); ?>
       <label for="<?php echo $term->id; ?>"> </label>
    </div>
    
<?php endif; ?>
<?php endforeach; ?>
    
    
       
            
            
               
            

        

         
	