<?php foreach ( $filter->get() as $ck => $cpt_field ): ?>
    <?php if ( $cpt_field->value == -1 ): ?>
    <div class="asp_option asp_option_cat asp_option_selectall">
        <div class="asp_option_inner">
            <input type="checkbox" id="<?php echo $id; ?>customset_selectall"
                   aria-label="<?php echo esc_attr($cpt_field->label); ?>"
                   data-targetclass="asp_post_type_checkbox" checked="checked"/>
            <label aria-hidden="true" for="<?php echo $id; ?>customset_selectall">
                <?php echo asp_icl_t('Hidden label', 'Hidden label'); ?>
            </label>
        </div>
        <div class="asp_option_label">
            <?php echo esc_attr($cpt_field->label); ?>
        </div>
    </div>
    <?php else: ?>
    <div class="asp_option">
        <div class="asp_option_inner">
            <input type="checkbox" value="<?php echo esc_attr($cpt_field->value); ?>" id="<?php echo $id; ?>customset_<?php echo $id . $ck; ?>"
                   aria-label="<?php echo esc_attr($cpt_field->label); ?>"
                   class="asp_post_type_checkbox"
                   <?php echo $cpt_field->default ? 'data-origvalue="1"' : ''; ?>
                   name="customset[]" <?php echo $cpt_field->selected ? 'checked="checked"' : ''; ?>/>
            <label aria-hidden="true" for="<?php echo $id; ?>customset_<?php echo $id . $ck; ?>">
                <?php echo asp_icl_t('Hidden label', 'Hidden label'); ?>
            </label>
        </div>
        <div class="asp_option_label">
            <?php echo esc_attr($cpt_field->label); ?>
        </div>
    </div>
    <?php endif; ?>
<?php endforeach; ?>