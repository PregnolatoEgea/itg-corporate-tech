<?php foreach ($filter->get() as $kk => $term): ?>
<?php if ($term->taxonomy != 'post_tag'): ?>

<div class="asp_option_cat asp_option asp_option asp_option_cat_level-0 asp_option_selectall itg_option_cat is-narrow itg_asp_label">
    <div class="asp_option_inner">
        <input id="asp_<?php echo $ch_class; ?>_all<?php echo $id; ?>" aria-label="<?php echo asp_icl_t("Select all text [" . $taxonomy . "]" . " ($real_id)", $term->label, true); ?>" type="checkbox" data-targetclass="asp_<?php echo $ch_class; ?>_checkbox" <?php echo $term->default ? 'data-origvalue="1"' : ''; ?> <?php echo($term->selected ? 'checked="checked"' : ''); ?> />
        <label aria-hidden="true" for="asp_<?php echo $ch_class; ?>_all<?php echo $id; ?>">
            <?php echo asp_icl_t("Select all text [" . $taxonomy . "]" . " ($real_id)", $term->label); ?>
        </label>
    </div>

</div>
<?php endif; ?>

<?php endforeach; ?>


<?php foreach ($filter->get() as $kk => $term): ?>

<?php if ($term->taxonomy === 'post_tag') : ?>
<div class="column is-2 itgtag-filter is-pulled-right">
    <a id="itg_tagfilterbtn" class="itg_tagfilterbtn">Argomento</a>
</div>

<div class="container fullwidth">
    <div class="columns">
        <div id="itg_tagfilterresults" class="columns pt-5 is-mobile is-centered itg_tagfilterresults">
            <div class="column is-12">
                <div class="columns is-mobile is-centered">
                    <?php foreach ($filter->get() as $kk => $term): ?>
                    <div class="asp_option_cat asp_option asp_option asp_option_cat_level-<?php echo $term->level; ?> itg_option_cat is-narrow itg_asp_label" data-lvl="<?php echo $term->level; ?>" asp_cat_parent="<?php echo $term->parent; ?>">
                    <div class="asp_option_inner">
                        <input type="checkbox" value="<?php echo $term->id; ?>" class="asp_<?php echo $ch_class; ?>_checkbox" aria-label="<?php echo esc_html($term->label); ?>" <?php if (isset($filter->data['custom_name'])): ?> name="<?php echo $filter->data['custom_name']; ?>" <?php else: ?> name="<?php echo "termset[" . $term->taxonomy . "]"; ?>[]" <?php endif; ?> id="<?php echo $id; ?>termset_<?php echo $term->id; ?>" <?php echo $term->default ? 'data-origvalue="1"' : ''; ?> <?php echo($term->selected ? 'checked="checked"' : ''); ?> />
                        <label aria-hidden="true" for="<?php echo $id; ?>termset_<?php echo $term->id; ?>">
                            <?php echo $term->label; ?>
                        </label>
                    </div>
                </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
        </div>
    </div>
</div>




<?php endif; ?>
<?php endforeach; ?>