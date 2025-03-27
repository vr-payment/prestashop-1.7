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

use PrestaShop\PrestaShop\Adapter\ServiceLocator;

class VRPaymentVersionadapter
{
    public static function getConfigurationInterface()
    {
        return ServiceLocator::get('\\PrestaShop\\PrestaShop\\Core\\ConfigurationInterface');
    }

    public static function getAddressFactory()
    {
        return ServiceLocator::get('\\PrestaShop\\PrestaShop\\Adapter\\AddressFactory');
    }

    public static function clearCartRuleStaticCache()
    {
        if (version_compare(_PS_VERSION_, '1.7.3', '>=')) {
            call_user_func(array(
                'CartRule',
                'resetStaticCache'
            ));
        }
    }

    public static function getAdminOrderTemplate()
    {
        if (version_compare(_PS_VERSION_, '1.7.7', '>=')) {
            return 'views/templates/admin/hook/admin_order177.tpl';
        } else {
            return 'views/templates/admin/hook/admin_order.tpl';
        }
    }

    public static function isVoucherOnlyVRPayment($postData)
    {
        if (version_compare(_PS_VERSION_, '1.7.7', '>=')) {
            return
            isset($postData['cancel_product']['voucher'])
            && isset($postData['cancel_product']['voucher_refund_type'])
            && $postData['cancel_product']['voucher'] == 1
            && $postData['cancel_product']['voucher_refund_type'] == 1
            && ! isset($postData['cancel_product']['vrpayment_offline'])
            && ! isset($postData['cancel_product']['credit_slip']);
        } else {
            return
            isset($postData['generateDiscountRefund'])
            && ! isset($postData['reinjectQuantities'])
            && ! isset($postData['vrpayment_offline']);
        }
    }
}
