<?php
add_action( 'cmb2_init', 'cmb2_add_metabox' );
function cmb2_add_metabox() {

	$prefix = '_cmb_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . '',
		'title'        => __( 'Metabox Title', 'cmb2' ),
		'object_types' => array( 'page', 'post' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );

	$cmb->add_field( array(
		'name' => __( 'My Little Box', 'cmb2' ),
		'id' => $prefix . 'my_little_box',
		'type' => 'text',
	) );

}
?>