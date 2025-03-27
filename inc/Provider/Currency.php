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
 * Provider of currency information from the gateway.
 */
class VRPaymentProviderCurrency extends VRPaymentProviderAbstract
{
    protected function __construct()
    {
        parent::__construct('vrpayment_currencies');
    }

    /**
     * Returns the currency by the given code.
     *
     * @param string $code
     * @return \VRPayment\Sdk\Model\RestCurrency
     */
    public function find($code)
    {
        return parent::find($code);
    }

    /**
     * Returns a list of currencies.
     *
     * @return \VRPayment\Sdk\Model\RestCurrency[]
     */
    public function getAll()
    {
        return parent::getAll();
    }

    protected function fetchData()
    {
        $currencyService = new \VRPayment\Sdk\Service\CurrencyService(
            VRPaymentHelper::getApiClient()
        );
        return $currencyService->all();
    }

    protected function getId($entry)
    {
        /* @var \VRPayment\Sdk\Model\RestCurrency $entry */
        return $entry->getCurrencyCode();
    }
}
