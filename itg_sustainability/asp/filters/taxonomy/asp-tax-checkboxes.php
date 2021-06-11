<?php foreach ($filter->get() as $kk => $term): ?>
    <?php if ($term->id == 0): ?>
        <div class="aligncenter itg_option_cat">
            <div class="itg_option_inner">
              <label aria-hidden="true"
                       for="itg_<?php echo $ch_class; ?>_all<?php echo $id; ?>">
                <input id="itg_<?php echo $ch_class; ?>_all<?php echo $id; ?>"
                       aria-label="<?php echo asp_icl_t("Select all text [" . $taxonomy . "]" . " ($real_id)", $term->label, true); ?>"
                       type="checkbox" data-targetclass="asp_<?php echo $ch_class; ?>_checkbox"
                    <?php echo $term->default ? 'data-origvalue="1"' : ''; ?>
                    <?php echo($term->selected ? 'checked="checked"' : ''); ?>  aria-hidden="true"/>
               
                </label>
            </div>
            <div class="itg_option_label"><?php echo asp_icl_t("Select all text [" . $taxonomy . "]" . " ($real_id)", $term->label); ?></div>
        </div>
        <div class="asp_select_spacer"></div>
    <?php else: ?>
        <div class="itg_option_cat aligncenter"
             data-lvl="<?php echo $term->level; ?>"
             asp_cat_parent="<?php echo $term->parent; ?>">
            <div class="itg_option_inner">
                <label aria-hidden="true"
                       for="<?php echo $id; ?>termset_<?php echo $term->id; ?>">
                <input type="checkbox" value="<?php echo $term->id; ?>" class="asp_<?php echo $ch_class; ?>_checkbox"
                       aria-label="<?php echo esc_html($term->label); ?>"
                    <?php if (isset($filter->data['custom_name'])): ?>
                        name="<?php echo $filter->data['custom_name']; ?>"
                    <?php else: ?>
                        name="<?php echo "termset[" . $term->taxonomy . "]"; ?>[]"
                    <?php endif; ?>
                       id="<?php echo $id; ?>termset_<?php echo $term->id; ?>"
                    <?php echo $term->default ? 'data-origvalue="1"' : ''; ?>
                    <?php echo($term->selected ? 'checked="checked"' : ''); ?>  aria-hidden="true"/>
                
                </label>
            </div>
            <div class="itg_option_label">
                <?php echo $term->label; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>