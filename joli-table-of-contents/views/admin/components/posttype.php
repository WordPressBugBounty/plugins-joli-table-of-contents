<?php

/**
 * Post type selection component
 *
 * @package joli-table-of-contents
 * @var array $data
 * @var array $args
 */
if ( !defined( 'ABSPATH' ) ) {
    exit;
    // Exit if accessed directly
}
$pt_args = [
    'public'   => true,
    '_builtin' => true,
];
$post_types = get_post_types( $pt_args, 'objects' );
$active_post_type = ( isset( $data['active_post_type'] ) ? $data['active_post_type'] : '' );
$is_global = !empty( $data['is_global'] );
$enabled = ( $args['pro'] ? ' disabled' : '' );
$enabled = ( $active_post_type && $is_global ? ' disabled' : '' );
?>

<fieldset<?php 
echo esc_attr( $enabled );
?>>
	<?php 
foreach ( $post_types as $post_type => $pt_object ) {
    ?>
		<?php 
    $checked = false;
    if ( is_array( $data['value'] ) ) {
        $checked = in_array( $post_type, $data['value'], true );
    }
    ?>
		<div class="<?php 
    echo esc_attr( $data['classes'] );
    ?>">
			<input
				type="checkbox"
				id="<?php 
    echo esc_attr( $data['name'] . '[' . $post_type . ']' );
    ?>"
				name="<?php 
    echo esc_attr( $data['name'] );
    ?>[]"
				value="<?php 
    echo esc_attr( $post_type );
    ?>"
				class="joli-checkbox"
				<?php 
    checked( $checked );
    ?>
			/>
			<label for="<?php 
    echo esc_attr( $data['name'] . '[' . $post_type . ']' );
    ?>">
				<?php 
    // Translators: %1$s = Post type label, %2$s = Post type key.
    echo esc_html( sprintf( __( '%1$s [ %2$s ]', 'joli-table-of-contents' ), $pt_object->label, $post_type ) );
    ?>
			</label>
		</div>
	<?php 
}
?>
</fieldset>
