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
    <input type="hidden" class="asp_datepicker_hidden" name="<?php echo esc_attr($date->name); ?>" value="">
    </div>
<?php endforeach; ?>

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