
<!-- date range filter -->
             <div id="itg_dateRangefilterresults" class="columns is-vcentered pt-5 itg_tagdatefilterdateresults itg-mt-32 itg-mb-32">
               <div class="columns is-mobile is-centered">
             
                <div class="column is-4 itg_columndaterange">
                 <a class="itg_activecolumn itg_recentpost activerange" ><?php _e('Recenti'); ?></a>
                    <div class="asp_<?php echo esc_attr($date->name); ?>">
                    <?php if ( $date->label != "" ): ?>
                    <legend><?php echo esc_html($date->label); ?></legend>
                    <?php endif; ?>
                     
                    </div>
                </div>
                
                <div class="column is-4 itg_columndaterange">
                 <a class="itg_activecolumn itg_periodposts"><?php _e('Seleziona periodo'); ?></a>
                 <?php foreach($filter->get() as $date): ?>
                    <div class="asp_<?php echo esc_attr($date->name); ?>">
                    <?php if ( $date->label != "" ): ?>
                    <legend><?php echo esc_html($date->label); ?></legend>
                    <?php endif; ?>
                    
                    </div>
                <?php endforeach; ?>
                </div>
               
               <div class="column is-4 itg_columndaterange">
                <a class="itg_activecolumn itg_yearpost"><?php _e('Seleziona anno'); ?></a>
                 <?php foreach($filter->get() as $date): ?>
                    <div class="asp_<?php echo esc_attr($date->name); ?>">
                    <?php if ( $date->label != "" ): ?>
                    <legend><?php echo esc_html($date->label); ?></legend>
                    <?php endif; ?>
                    
                    </div>
                <?php endforeach; ?>
                </div>
               </div>
               
               <div class="is-clearfix"></div>
               <div class="columns is-mobile is-centered itg-mt-32">
                <div class="column is-narrow itg_applyfilters aligncenter">
									            <button type='submit'
									                   aria-hidden="true"
									                   aria-label="<?php echo esc_html(asp_icl_t('Hidden button', 'Hidden button')); ?>"
									                  >
									                   Applica filtri
									            </button>
                </div>
                <div class="column is-narrow aligncenter itg_resetfilters">
                 <button onclick="clearForm()" value="clear form">Azzera filtri 
                 <img src="<?php bloginfo('template_directory'); ?>/dist/src/images/icons/burger_menu_close.svg" width="18" height="18" border="0" /></button>
                </div>
               </div>