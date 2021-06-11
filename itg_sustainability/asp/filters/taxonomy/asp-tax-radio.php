    
        
           
        <?php foreach ($filter->get() as $kk => $term): ?>
        <?php if ($taxonomy == 'category') : ?>
            <div class="itg_asp_label aligncenter <?php echo $taxonomy; ?>_filter_box itgtagfilter">
                <label>
                 <input type="radio" class="asp_radio"
                        value="<?php echo $term->id; ?>"
                     <?php echo $term->default ? 'data-origvalue="1"' : ''; ?>
                        name='<?php echo $filter->isMixed() ? "termset_single" : "termset[" . $taxonomy . "][]"; ?>'
                     <?php echo $term->selected ? ' checked="checked"' : ''; ?> aria-hidden="true">
                 <?php echo $term->label; ?>
                </label>
            </div>
            
             <?php endif; ?>
            <?php endforeach; ?>
            
            
        <?php if ($taxonomy == 'post_tag') : ?>
        
            <label class="itgtag-filter">
              <a id="itg_tagfilterbtn" href="#">Argomento</a>
            </label>
            <div class="isclearfix"></div>
            <div id="itg_tagfilterresults" class="column is-12 pt-5" style="display: none;">
              <?php foreach ($filter->get() as $kk => $term): ?>
               <div class="itg_asp_label aligncenter <?php echo $taxonomy; ?>_filter_box itgtagfilter column is-3">
                <label>
                  <input type="radio" class="asp_radio"
                         value="<?php echo $term->id; ?>"
                      <?php echo $term->default ? 'data-origvalue="1"' : ''; ?>
                         name='<?php echo $filter->isMixed() ? "termset_single" : "termset[" . $taxonomy . "][]"; ?>'
                      <?php echo $term->selected ? ' checked="checked"' : ''; ?>  aria-hidden="true">
                  <?php echo $term->label; ?>
                </label>
               </div>
               <?php endforeach; ?>
            </div>
        <?php endif; ?>
         
            
       
         <script type="text/javascript">
          jQuery('#itg_tagfilterbtn').click(function(e){
           jQuery('#itg_tagfilterresults').toggle();
           e.preventDefault();
          });
         </script>