<?php
/**
 * Shopper functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Shopper
 */

 /*
*
* Defino variables de sistema
*
*/
define('TEMPPATH', get_bloginfo('stylesheet_directory'));
define('IMAGES', TEMPPATH."/assets/images");

/**
 * Assign the shopper version to a var
 */
$shopper_theme              = wp_get_theme( 'shopper' );
$shopper_version = $shopper_theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	
	$content_width = 980; /* pixels */
}

$shopper = (object) array(
	'version' => $shopper_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require_once 'inc/class-shopper.php',
	'customizer' => require_once 'inc/customizer/class-shopper-customizer.php',
);


require_once 'inc/shopper-functions.php';
require_once 'inc/shopper-template-hooks.php';
require_once 'inc/shopper-template-functions.php';
require_once 'inc/customizer/include-kirki.php';
require_once  'inc/customizer/class-shopper-pro-kirki.php';

if ( is_admin() ) {
	
	$shopper->admin = require 'inc/admin/class-shopper-admin.php';
}

/**
 * All for WooCommerce functions
 */
if ( shopper_is_woocommerce_activated() ) {
	
	$shopper->woocommerce = require_once 'inc/woocommerce/class-shopper-woocommerce.php';

	require_once 'inc/woocommerce/shopper-wc-template-hooks.php';
	require_once 'inc/woocommerce/shopper-wc-template-functions.php';
}

/**
* Funciones para agregar campos personalizados
*Select
*/
function claserama_add_cuit_field($checkout){
	woocommerce_form_field('dnifield',array(
        'type' => 'text', //textarea, text,select, radio, checkbox, password
        'required' => true, //este parámetro no valida, solo agrega un "*" al campo
        'class' => array('form-row-wide'), // un array puede ser la clase 'form-row-wide', 'form-row-first', 'form-row-last'
		'label' => 'DNI',
		'priority' => 33,
        ), $checkout->get_value('dnifield')
	);
	woocommerce_form_field('cuitfield',array(
        'type' => 'text', //textarea, text,select, radio, checkbox, password
        'required' => true, //este parámetro no valida, solo agrega un "*" al campo
        'class' => array('form-row-wide'), // un array puede ser la clase 'form-row-wide', 'form-row-first', 'form-row-last'
		'label' => 'CUIT/CUIL',
		'priority' => 34,
        ), $checkout->get_value('cuitfield')
	);
}
add_action('woocommerce_after_checkout_billing_form','claserama_add_cuit_field');

/**
* Guardar los campos adicionales cuando el usuario termine el proceso de checkout
*/
function claserama_save_additional_fields_checkout($order_id){
    if( !empty( $_POST['cuitfield'] ) )
		update_post_meta( $order_id, 'cuitfield', sanitize_text_field( $_POST['cuitfield'] ) );
	
	if( !empty( $_POST['dnifield'] ) )
        update_post_meta( $order_id, 'dnifield', sanitize_text_field( $_POST['dnifield'] ) );

}
add_action('woocommerce_checkout_update_order_meta','claserama_save_additional_fields_checkout');

/**
* Mostrar los valores de los campos personalizados adicionales en la vista de la orden en el administrador
*/
function claserama_show_custom_fields_order($order){
    echo '<p><strong>'.__('DNI').':</strong> ' . get_post_meta( $order->id, 'dnifield', true ) . '</p>';
    echo '<p><strong>'.__('CUIT/CUIL').':</strong> ' . get_post_meta( $order->id, 'cuitfield', true ) . '</p>';
}
add_action('woocommerce_admin_order_data_after_billing_address','claserama_show_custom_fields_order');

/**
* Mostrar los valores de los campos personalizados adicionales en la vista de la orden en la página de gracias y en la página de Orden en la página "Mi cuenta" del usuario
*/
function claserama_show_custom_fields_thankyou($order_id){
    echo '<p><strong>'.__('DNI').':</strong> ' . get_post_meta( $order_id, 'dnifield', true ) . '</p>';
    echo '<p><strong>'.__('CUIT/CUIL').':</strong> ' . get_post_meta( $order_id, 'cuitfield', true ) . '</p>';
}
add_action('woocommerce_thankyou','claserama_show_custom_fields_thankyou', 20);
add_action('woocommerce_view_order','claserama_show_custom_fields_thankyou', 20);

/**
 * Añade comentario de checkout de WooCommerce
 */
add_action( 'woocommerce_before_checkout_form', 'mi_contenido_checkout', 11 );

function mi_contenido_checkout() {
	wc_print_notice( __( '<div class="custom-msj-checkout d-flex justify-content-between"><div>Para compras fuera de la Ciudad de Corrientes se coordinará flete/transporte a cargo del cliente.<br> Si tenés dudas consultá a nuestro whatsapp</div>
	<div><a href="https://wa.me/5493794542798?text=Hola%20Luzzi%20tengo%20una%20consulta%20de%20la%20web.%20Quiero%20hacer%20una%20compra" target="_blank"><img src="'. IMAGES.'/whatsapp.png" width="60px"></a></div></div>', 'woocommerce' ), 'notice' );
}