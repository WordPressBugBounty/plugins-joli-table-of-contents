<?php

/**
 * Slider component
 *
 * @package joli-table-of-contents
 * @var array $data
 * @var array $args
 */

if (! defined('ABSPATH')) {
	exit;
}

$active_post_type = isset($data['active_post_type']) ? $data['active_post_type'] : '';
$is_global        = ! empty($data['is_global']);
$disabled         = (($args['pro'] ?? null) === true || ($active_post_type && $is_global)) ? ' disabled' : '';
$pro_class 		  = ($args['pro'] ?? null) === true ? ' joli-pro' : '';


$values   = $args['values'] ?? [];
$labels   = $args['labels'] ?? [];
// jtocpre($data);
// jtocpre(array_keys($values));
$has_labels = count($labels) > 0;

$nullable = jtoc_isset_or_null($args['nullable']);

$current_value = isset($data['value']) ? (string) $data['value'] : '';

// $current_index = null;
// if ($has_labels) {
// 	$current_index = array_search($current_value, array_keys($values));
// }else{
$current_index = array_search($current_value, array_keys($values));
// }

// jtocpre([$current_value, $current_index, array_keys($values),]);

if ($nullable) {
	if ($has_labels) {
		$values = array_merge(
			['' => ''],
			$values
		);
		$labels = array_merge(
			['' => __('Auto', 'joli-table-of-contents')],
			$labels
		);
	} else {
		$values = array_merge(
			['' => __('Auto', 'joli-table-of-contents')],
			$values
		);
	}
}
$pips = $has_labels ? $labels : $values;

$values_json   = wp_json_encode($values);
$labels_json   = wp_json_encode($labels);
$style_attr = '';
if ($args['style'] ?? null) {
	$style_attr = jtoc_attrify(['style' => jtoc_cssify($args['style'])]);
}
?>


<div class="joli-slider-field<?php echo esc_attr($pro_class); ?>"
	data-name='<?php echo esc_attr($data['name']); ?>'
	data-values='<?php echo esc_attr($values_json); ?>'
	data-labels='<?php echo esc_attr($labels_json); ?>'
	data-current="<?php echo esc_attr($current_value); ?>"
	<?php echo esc_html($disabled); ?>
	<?php echo $style_attr; ?>>

	<div class="joli-slider-wrap">

		<div class="joli-slider-label-wrap">
			<div class="joli-slider-label"></div>
		</div>


		<div class="joli-slider-track">
			<div class="joli-slider-track-fill"></div>

			<div class="joli-slider-pips">
				<?php $i = 0;
				foreach ($pips as $key => $label) : ?>
					<div class="pip" data-index="<?php echo esc_attr($i); ?>">
						<span><?php echo esc_html($label); ?></span>
					</div>
				<?php $i++;
				endforeach; ?>
			</div>

			<input
				type="range"
				class="joli-slider"
				min="0"
				max="<?php echo max(0, count($values) - 1); ?>"
				step="1"
				value="<?php echo esc_attr($current_index); ?>"
				<?php echo esc_html($disabled); ?>
				<?php ($data['data_attrs'] ?? null) && call_user_func($data['data_attrs_fn'], $data['data_attrs']); ?> />
		</div>

	</div>

	<input
		type="hidden"
		id="<?php echo esc_attr($data['name']); ?>"
		name="<?php echo esc_attr($data['name']); ?>"
		value="<?php echo esc_attr($current_value); ?>"
		<?php echo esc_html($disabled); ?> />
</div>