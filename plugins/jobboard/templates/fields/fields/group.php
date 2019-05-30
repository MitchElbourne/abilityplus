<?php
/**
 * The Template for displaying dynamical group fields.
 *
 * This template can be overridden by copying it to yourtheme/jobboard/fields/fields/group.php.
 *
 * HOWEVER, on occasion JobBoard will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @author 		TuanNA
 * @package 	JobBoard/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if(!function_exists('jb_template_group_dynamic_field') || !isset($fields)){
    exit;
}

$editable = isset($editable)?$editable:true;

$var_fields_data = 'group_fields_'.round(microtime(true) * 1000);
foreach ($fields as $field_key => $field){
    $fid = $field['id'];
    $field['id'] = $name . '-' . $fid;
    $field['name'] = $name . '[' . $fid . ']';
    ob_start();
    jb_template_group_dynamic_field($name, $field);
    $template = ob_get_clean();
    $fields[$field_key] = $field;
    $fields[$field_key]['template'] = $template;
}
wp_localize_script( 'group-field-js', $var_fields_data, $fields );
?>
<table class="table form-table field-group-table">
    <thead>
        <tr>
            <?php
                foreach ($fields as $field):
            ?>
                <th class="group-field-<?php echo esc_attr($field['type']); ?>">
                    <?php echo esc_html($field['title']); ?>
                </th>
            <?php
                endforeach;
            ?>
            <?php if($editable): ?>
            <th class="group-field-delete"></th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
    <?php
        if(!empty($value)):
            $row_keys = array();
            foreach ($value as $item){
                $row_keys = array_keys($item);
                break;
            }
            foreach($row_keys as $i):
    ?>
            <tr data-id="<?php echo esc_attr($i); ?>">
                <?php
                    foreach ($fields as $field_key => $field):
                ?>
                    <td class="group-field-<?php echo esc_attr($field['type']); ?>">
                        <div class="field-<?php echo esc_attr($field['type']); ?>">
                <?php
                    $field['id'] = $field['id'] . '-' . $i;
                    $field['name'] = $field['name'] . '[' . $i . ']';
                    $field['value'] = isset($value[$field_key][$i])?$value[$field_key][$i]:'';
                    jb_template_group_dynamic_field($name, $field);
                ?>
                        </div>
                    </td>
                <?php
                    endforeach;
                ?>
                <?php if($editable): ?>
                <td class="group-field-delete">
                    <a href="javascript:void(0);" class="delete" data-target="<?php echo esc_attr($i); ?>">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </a>
                </td>
                <?php endif; ?>
            </tr>
    <?php
            endforeach;
        endif;
    ?>
    </tbody>
    <?php if($editable): ?>
    <tfoot>
        <tr>
            <td colspan="<?php echo esc_attr(count($fields)+1); ?>" class="actions">
                <button type="button" class="btn button add" data-fields="<?php echo esc_attr($var_fields_data); ?>">
                    <?php esc_html_e('ADD', JB_TEXT_DOMAIN)?>
                </button>
            </td>
        </tr>
    </tfoot>
    <?php endif; ?>
</table>
