<?php

use BracketSpace\Notification\Abstracts\Trigger as AbstractTrigger;

/**
 * WooCommerceCouponAdded class
 */
class WooCommerceCouponAdded extends AbstractTrigger {

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct(
			'notification-woocommerce-coupon-added',
			__( 'Coupon Added', 'notification-woocommerce-coupon-added' )
		);

		$this->add_action( 'woocommerce_applied_coupon', 10, 1 );

		$this->set_group( __( 'WooCommmerce', 'notification-woocommerce-coupon-added' ) );

		$this->set_description(
			__( 'Fires when a coupon is applied to a cart', 'notification-woocommerce-coupon-added' )
		);

	}

	/**
	 * Assigns action callback args to object
	 * Return `false` if you want to abort the trigger execution
	 *
	 * You can use the action method arguments as usually.
	 *
	 * @return mixed void or false if no notifications should be sent
	 */
	public function context( $coupon ) {
		$this->coupon = $coupon;
	}

	/**
	 * Registers attached merge tags
	 *
	 * @return void
	 */
	public function merge_tags() {
		$this->add_merge_tag( new \BracketSpace\Notification\Defaults\MergeTag\StringTag( [
			'slug'        => 'coupon',
			'name'        => __( 'Coupon', 'notification-woocommerce-coupon-added' ),
			'resolver'    => function( $trigger ) {
				return $trigger->coupon;
			},
			'description' => __( 'The coupon applied to the cart', 'notification-woocommerce-coupon-added' ),
			'example'     => true,
		] ) );

	}
}