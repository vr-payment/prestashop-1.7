<?php
/**
 * VR Payment Prestashop
 *
 * This Prestashop module enables to process payments with VR Payment (https://www.vr-payment.de/).
 *
 * @author customweb GmbH (http://www.customweb.com/)
 * @copyright 2017 - 2025 customweb GmbH
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache Software License (ASL 2.0)
 */

/**
 * This provider allows to create a VRPayment_ShopRefund_IStrategy.
 * The implementation of
 * the strategy depends on the actual prestashop version.
 */
class VRPaymentBackendStrategyprovider
{
    private static $supported_strategies = [
        '1.7.7.4' => VRPaymentBackendStrategy1774::class
    ];

    /**
     * Returns the refund strategy to use
     *
     * @return VRPaymentBackendIstrategy
     */
    public static function getStrategy()
    {
        if (isset(self::$supported_strategies[_PS_VERSION_])) {
            return new self::$supported_strategies[_PS_VERSION_];
        }
        return new VRPaymentBackendDefaultstrategy();
    }
}
