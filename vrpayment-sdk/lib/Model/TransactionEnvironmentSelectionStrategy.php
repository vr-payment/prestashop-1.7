<?php
/**
 * VRPay SDK
 *
 * This library allows to interact with the VRPay payment service.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */


namespace VRPayment\Sdk\Model;
use \VRPayment\Sdk\ObjectSerializer;

/**
 * TransactionEnvironmentSelectionStrategy model
 *
 * @category    Class
 * @description 
 * @package     VRPayment\Sdk
 * @author      VR Payment GmbH
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 */
class TransactionEnvironmentSelectionStrategy
{
    /**
     * Possible values of this enum
     */
    const FORCE_TEST_ENVIRONMENT = 'FORCE_TEST_ENVIRONMENT';
    const FORCE_PRODUCTION_ENVIRONMENT = 'FORCE_PRODUCTION_ENVIRONMENT';
    const USE_CONFIGURATION = 'USE_CONFIGURATION';
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::FORCE_TEST_ENVIRONMENT,
            self::FORCE_PRODUCTION_ENVIRONMENT,
            self::USE_CONFIGURATION,
        ];
    }
}


