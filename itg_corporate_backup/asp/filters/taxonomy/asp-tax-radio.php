    
        
           
        <?php foreach ($filter->get() as $kk => $term): ?>
        <?php if ($taxonomy === 'category') : ?>
            <div class="is-2 itg_asp_label aligncenter <?php echo $taxonomy; ?>_filter_box itcatfilter">
                
                 <input type="radio" class="asp_radio"
                        value="<?php echo $term->id; ?>"
                     <?php echo $term->default ? 'data-origvalue="1"' : ''; ?>
                        name='<?php echo $filter->isMixed() ? "termset_single" : "termset[" . $taxonomy . "][]"; ?>'
                     <?php echo $term->selected ? ' checked="checked"' : ''; ?> aria-hidden="true">
                 <?php echo $term->label; ?>
               <label for="<?php echo $term->id; ?>"> </label>
            </div>
            
             <?php endif; ?>
            <?php endforeach; ?>
            
            
        <?php if ($taxonomy === 'post_tag') : ?>
            <div class="column is-2 itgtag-filter is-pulled-right">
              <a id="itg_tagfilterbtn" href="#">Argomento</a>
            </div>
           <!-- <div class="column is-2 itgtag-filter is-pulled-right">
              <a id="itg_datefilterbtn" href="#">Periodo</a>
            </div>-->
            <div class="is-clearfix"></div>
            <div class="container">
             <div id="itg_tagfilterresults" class="columns pt-5" style="display: none;">
              <div class="column is-10 is-offset-2">
               <div class="columns">
                 <?php foreach ($filter->get() as $kk => $term): ?>
                   <div class="itg_asp_label aligncenter <?php echo $taxonomy; ?>_filter_box itgtagfilter column is-3">
                    <input id="itg_<?php echo $ch_class; ?>_sub-<?php echo $term->id; ?>" type="checkbox" class="asp_checkbox"
                          value="<?php echo $term->id; ?>"
                       <?php echo $term->default ? 'data-origvalue="1"' : ''; ?>
                          name='<?php echo $filter->isMixed() ? "termset_single" : "termset[" . $taxonomy . "][]"; ?>'
                       <?php echo $term->selected ? ' checked="checked"' : ''; ?>  aria-hidden="true">
                   
                       <label for="itg_<?php echo $ch_class; ?>_sub-<?php echo $term->id; ?>"><?php echo $term->label; ?></label>
                     </div>
                  <?php endforeach; ?>
               </div>
               <div class="columns">
                <div class="column is-3 is-offset-3 itg_applyfilters aligncenter">
                 <a href="#">Applica filtri</a>
                </div>
                <div class="column is-3 is-offset-3 itg_resetfilters aligncenter">
                 <a href="#">Azzera filtri X</a>
                </div>
               </div>
              </div>
             </div>
            </div>
            
            
            <!-- date range filter -->
             <div id="itg_dateRangefilterresults" class="columns pt-5" style="display: none;">
               <div class="columns">
                <div class="column is-4">
                
                </div>
                
                <div class="column is-4">
                 <?php foreach($filter->get() as $date): ?>
                    <div class="asp_<?php echo esc_attr($date->name); ?>">
                    <?php if ( $date->label != "" ): ?>
                    <legend><?php echo esc_html($date->label); ?></legend>
                    <?php endif; ?>
                    <textarea class="asp_datepicker_format"
                              aria-hidden="true"
                              aria-label="<?php echo esc_attr($date->label); ?>"
                              style="display:none !important;"><?php echo esc_html($date->format); ?></textarea>
                    <input type="text"
                           aria-label="<?php echo esc_attr($date->label); ?>"
                           placeholder="<?php echo esc_attr($date->placeholder); ?>"
                           class="asp_datepicker"
                           name="<?php echo esc_attr($date->name); ?>_real"
                           data-origvalue="<?php echo esc_attr($date->default); ?>"
                           value="<?php echo esc_attr($date->value); ?>">
                    <input type="" class="asp_datepicker_hidden" name="<?php echo esc_attr($date->name); ?>" value="">
                    </div>
                 <?php endforeach; ?>
                </div>
                
                <div class="column is-4">
                 <?php foreach($filter->get() as $date): ?>
                    <div class="asp_<?php echo esc_attr($date->name); ?>">
                    <?php if ( $date->label != "" ): ?>
                    <legend><?php echo esc_html($date->label); ?></legend>
                    <?php endif; ?>
                    <textarea class="asp_datepicker_format"
                              aria-hidden="true"
                              aria-label="<?php echo esc_attr($date->label); ?>"
                              style="display:none !important;"><?php echo esc_html($date->format); ?></textarea>
                    <input type="text"
                           aria-label="<?php echo esc_attr($date->label); ?>"
                           placeholder="<?php echo esc_attr($date->placeholder); ?>"
                           class="asp_datepicker"
                           name="<?php echo esc_attr($date->name); ?>_real"
                           data-origvalue="<?php echo esc_attr($date->default); ?>"
                           value="<?php echo esc_attr($date->value); ?>">
                    <input type="" class="asp_datepicker_hidden" name="<?php echo esc_attr($date->name); ?>" value="">
                    </div>
                <?php endforeach; ?>
                </div>
               </div>
               
               <div class="is-clearfix"></div>
               <div class="columns">
                <div class="column is-3 is-offset-3 itg_applyfilters aligncenter">
                 <a href="#">Applica filtri</a>
                </div>
                <div class="column is-3 is-offset-3 itg_resetfilters aligncenter">
                 <a href="#">Azzera filtri X</a>
                </div>
               </div>
            
        <?php endif; ?>

         <script type="text/javascript">
          jQuery('#itg_tagfilterbtn').click(function(e){
           jQuery(this).toggleClass('active');
           jQuery('#itg_tagfilterresults').toggle();
           jQuery('#itg_dateRangefilterresults').hide();
           jQuery('#itg_datefilterbtn').removeClass('active');
           e.preventDefault();
          });
          
          jQuery('#itg_datefilterbtn').click(function(e){
           jQuery(this).toggleClass('active');
           jQuery('#itg_dateRangefilterresults').toggle();
           jQuery('#itg_tagfilterresults').hide();
           jQuery('#itg_tagfilterbtn').removeClass('active');
           e.preventDefault();
          });
         </script>