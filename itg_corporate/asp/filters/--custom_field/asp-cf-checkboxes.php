<div id="itg_dateRangefilterresults" class="columns is-vcentered pt-5 itg_tagdatefilterdateresults itg-mt-32 itg-mb-32">
  <div class="columns is-mobile is-centered is-multiline">
    <?php foreach($filter->get() as $date): ?>

    <?php if ($filter->display_mode != 'hidden'): ?>

    <fieldset data-asp_invalid_msg="<?php echo asp_icl_t("CF [".$filter->data['field']."] invalid input text" . " ($real_id)", $filter->data['invalid_input_text'], true); ?>" class="column is-4 asp_custom_f<?php echo in_array($filter->display_mode, array('checkboxes', 'radio')) ? ' asp_sett_scroll' : ''; ?> asp_filter_cf_<?php echo esc_attr($filter->data['field']); ?> asp_filter_id_<?php echo $filter->id; ?> asp_filter_n_<?php echo $filter->position; ?><?php echo $filter->data['required'] ? ' asp_required' : ''; ?>">
      <legend class="itg_columndaterange"><?php echo $filter->label; ?></legend>
      <?php endif; ?>

      <div class="column columnmediafilters is-4">
        <span class="fas fa-caret-left scroll-arrow" id="scroll-arrow-left"></span>
        <div class="itg_option itg_option_cff" hidden>
          <div class="asp_option_inner">
            <input type="checkbox" value="<?php echo esc_attr($checkbox->value); ?>" id="aspf<?php echo $fieldset_id; ?>[<?php echo $field_name; ?>][<?php echo $k; ?>]" aria-label="<?php echo esc_attr( $checkbox->label ); ?>" <?php echo $checkbox->default ? 'data-origvalue="1"' : ''; ?> <?php echo !empty($checkbox->select_all) ?
                       " data-targetclass='asp_cf_select_".esc_attr($field_name_nws)."' " :
                       " class='hidden asp_cf_select_".esc_attr($field_name_nws)."' "; ?> name="<?php echo !empty($checkbox->select_all) ? '' : "aspf[$field_name][$k]"; ?>" <?php echo $checkbox->selected ? ' checked="checked"' : ''; ?>>
            <label aria-hidden="true" for="aspf<?php echo $fieldset_id; ?>[<?php echo $field_name; ?>][<?php echo $k; ?>]">
              <?php echo asp_icl_t('Hidden label', 'Hidden label'); ?>
            </label>
          </div>
          <div class="asp_option_label"><?php echo esc_html($checkbox->label); ?></div>
        </div>
        <span class="fas fa-caret-right scroll-arrow" id="scroll-arrow-right"></span>

    </fieldset>

<?php endforeach; ?>

</div>
</div>
<div class="clear"></div>