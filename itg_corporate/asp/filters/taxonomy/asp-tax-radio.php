    
        
           
        <?php foreach ($filter->get() as $kk => $term): ?>
        <?php if ($taxonomy === 'category') : ?>
            <div class="itg_asp_label aligncenter <?php echo $taxonomy; ?>_filter_box itcatfilter is-narrow">
                
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
              <a id="itg_tagfilterbtn" class="itg_tagfilterbtn" href="#">Argomento</a>
            </div>
            <div class="column is-2 itgtag-filter is-pulled-right ">
              <a id="itg_datefilterbtn" class="itg_tagdatefilterbtn" href="#">Periodo</a>
            </div>
												<div class="container">
	            <div class="columns">
		             <div id="itg_tagfilterresults" class="columns pt-5 is-mobile is-centered itg_tagfilterresults">
		              <div class="column is-12">
		               <div class="columns is-mobile is-centered">
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
		              </div>
	              <div class="columns is-mobile is-centered itg-mt-32">
		              
	                <div class="column is-narrow itg_applyfilters aligncenter">
	                 <form action='#' autocomplete="off" aria-label="<?php echo __('Search form', 'ajax-search-pro') . ' ' . $real_id; ?>">
									            
									          
									            <input type='submit'
									                   aria-hidden="true"
									                   aria-label="<?php echo esc_html(asp_icl_t('Hidden button', 'Hidden button')); ?>"
									                   >Applica filtri
									        </form>
	                </div>
	                <div class="column is-narrow itg_resetfilters aligncenter">
	                 <a href="#">Azzera filtri <img src="<?php bloginfo('template_directory'); ?>/dist/src/images/icons/burger_menu_close.svg" width="18" height="18" border="0" /></a>
	                </div>
	               </div>
	             </div>
	            </div>
            </div>
            
            
            <!-- date range filter -->
             <div id="itg_dateRangefilterresults" class="columns is-vcentered pt-5 itg_tagdatefilterdateresults itg-mt-32 itg-mb-32">
               <div class="columns is-mobile is-centered">
             
                <div class="column is-4 itg_columndaterange">
                 <a class="itg_activecolumn itg_recentpost activerange" href="#"><?php _e('Recenti'); ?></a>
                    <div class="asp_<?php echo esc_attr($date->name); ?>">
                    <?php if ( $date->label != "" ): ?>
                    <legend><?php echo esc_html($date->label); ?></legend>
                    <?php endif; ?>
                     <form action='#' autocomplete="off" aria-label="<?php echo __('Search form', 'ajax-search-pro') . ' ' . $real_id; ?>">
                    <?php 
	                    // Default
																					$daterange['post_date_filter'] = array();
																					$daysrange['post_date_filter'] = array();
																					// By year, month, day given separately
																					$daterange['post_date_filter'] = array(
																					    array(
																					        'year'  => 2015,            // year, month, day ...
																					        'month' => 6,
																					        'day'   => 30,
																					        'operator' => 'include',    // include|exclude
																					        'interval' => 'after'      // before|after
																					    )
																					);
																					
																					// By given y-m-d format
																					$daysrange['post_date_filter'] = array(
																					    array(
																					        'date'  => "2021-07-02",     // .. or date parameter in y-m-d format
																					        'operator' => 'include',    // include|exclude
																					        'interval' => 'after'      // before|after
																					    )
																					); 
																					$date_year = $daterange['post_date_filter'][0]['month'];
																					$last_months = $daterange	['post_date_filter'][0]['day'];
																					
																					var_dump($daterange['post_date_filter'][0]['year']);
																					var_dump($r->date);
																					?>
                    
                    	<!-- last 30 days -->
																	    <input type="radio" class="" name="recentsposts" value="<?php echo $date_year; ?>">
																	     <label for="lastdays">Ultimi 30 giorni</label>
																	    
																	    	<!-- last 6 months -->																		    
																		    <input type="radio" class="" name="recentsposts" value="<?php echo $last_months; ?>">
																		    <label for="sixsmonthsrange">Ultimi 6 mesi</label>

                     </form>
                    </div>
                </div>
                
                <div class="column is-4 itg_columndaterange">
                 <a class="itg_activecolumn itg_periodposts" href="#"><?php _e('Seleziona periodo'); ?></a>
                 <?php foreach($filter->get() as $date): ?>
                    <div class="asp_<?php echo esc_attr($date->name); ?>">
                    <?php if ( $date->label != "" ): ?>
                    <legend><?php echo esc_html($date->label); ?></legend>
                    <?php endif; ?>
                    
                    </div>
                <?php endforeach; ?>
                </div>
               
               <div class="column is-4 itg_columndaterange">
                <a class="itg_activecolumn itg_yearpost" href="#"><?php _e('Seleziona anno'); ?></a>
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
                 <form action='#' autocomplete="off" aria-label="<?php echo __('Search form', 'ajax-search-pro') . ' ' . $real_id; ?>">
									            <input type='submit'
									                   aria-hidden="true"
									                   aria-label="<?php echo esc_html(asp_icl_t('Hidden button', 'Hidden button')); ?>"
									                   value=""
									                   >Applica filtri
									        </form>
                </div>
                <div class="column is-narrow aligncenter itg_resetfilters">
                 <a href="#">Azzera filtri <img src="<?php bloginfo('template_directory'); ?>/dist/src/images/icons/burger_menu_close.svg" width="18" height="18" border="0" /></a>
                </div>
               </div>
            

        <?php endif; ?>

         