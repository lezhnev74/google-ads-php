<?php
/*
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * This file was generated from the file
 * https://github.com/google/googleapis/blob/master/google/ads/googleads/v2/services/merchant_center_link_service.proto
 * and updates to that file get reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Ads\GoogleAds\V2\Services\Gapic;

use Google\Ads\GoogleAds\V2\Resources\MerchantCenterLink;
use Google\Ads\GoogleAds\V2\Services\GetMerchantCenterLinkRequest;
use Google\Ads\GoogleAds\V2\Services\ListMerchantCenterLinksRequest;
use Google\Ads\GoogleAds\V2\Services\ListMerchantCenterLinksResponse;
use Google\Ads\GoogleAds\V2\Services\MerchantCenterLinkOperation;
use Google\Ads\GoogleAds\V2\Services\MutateMerchantCenterLinkRequest;
use Google\Ads\GoogleAds\V2\Services\MutateMerchantCenterLinkResponse;
use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\PathTemplate;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;

/**
 * Service Description: This service allows management of links between Google Ads and Google
 * Merchant Center.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $merchantCenterLinkServiceClient = new MerchantCenterLinkServiceClient();
 * try {
 *     $customerId = '';
 *     $response = $merchantCenterLinkServiceClient->listMerchantCenterLinks($customerId);
 * } finally {
 *     $merchantCenterLinkServiceClient->close();
 * }
 * ```
 *
 * Many parameters require resource names to be formatted in a particular way. To assist
 * with these names, this class includes a format method for each type of name, and additionally
 * a parseName method to extract the individual identifiers contained within formatted names
 * that are returned by the API.
 *
 * @experimental
 */
class MerchantCenterLinkServiceGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.ads.googleads.v2.services.MerchantCenterLinkService';

    /**
     * The default address of the service.
     */
    const SERVICE_ADDRESS = 'googleads.googleapis.com';

    /**
     * The default port of the service.
     */
    const DEFAULT_SERVICE_PORT = 443;

    /**
     * The name of the code generator, to be included in the agent header.
     */
    const CODEGEN_NAME = 'gapic';

    /**
     * The default scopes required by the service.
     */
    public static $serviceScopes = [
    ];
    private static $merchantCenterLinkNameTemplate;
    private static $pathTemplateMap;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'serviceAddress' => self::SERVICE_ADDRESS.':'.self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__.'/../resources/merchant_center_link_service_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/merchant_center_link_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__.'/../resources/merchant_center_link_service_grpc_config.json',
            'credentialsConfig' => [
                'scopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/merchant_center_link_service_rest_client_config.php',
                ],
            ],
        ];
    }

    private static function getMerchantCenterLinkNameTemplate()
    {
        if (null == self::$merchantCenterLinkNameTemplate) {
            self::$merchantCenterLinkNameTemplate = new PathTemplate('customers/{customer}/merchantCenterLinks/{merchant_center_link}');
        }

        return self::$merchantCenterLinkNameTemplate;
    }

    private static function getPathTemplateMap()
    {
        if (null == self::$pathTemplateMap) {
            self::$pathTemplateMap = [
                'merchantCenterLink' => self::getMerchantCenterLinkNameTemplate(),
            ];
        }

        return self::$pathTemplateMap;
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a merchant_center_link resource.
     *
     * @param string $customer
     * @param string $merchantCenterLink
     *
     * @return string The formatted merchant_center_link resource.
     * @experimental
     */
    public static function merchantCenterLinkName($customer, $merchantCenterLink)
    {
        return self::getMerchantCenterLinkNameTemplate()->render([
            'customer' => $customer,
            'merchant_center_link' => $merchantCenterLink,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - merchantCenterLink: customers/{customer}/merchantCenterLinks/{merchant_center_link}.
     *
     * The optional $template argument can be supplied to specify a particular pattern, and must
     * match one of the templates listed above. If no $template argument is provided, or if the
     * $template argument does not match one of the templates listed, then parseName will check
     * each of the supported templates, and return the first match.
     *
     * @param string $formattedName The formatted name string
     * @param string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     * @experimental
     */
    public static function parseName($formattedName, $template = null)
    {
        $templateMap = self::getPathTemplateMap();

        if ($template) {
            if (!isset($templateMap[$template])) {
                throw new ValidationException("Template name $template does not exist");
            }

            return $templateMap[$template]->match($formattedName);
        }

        foreach ($templateMap as $templateName => $pathTemplate) {
            try {
                return $pathTemplate->match($formattedName);
            } catch (ValidationException $ex) {
                // Swallow the exception to continue trying other path templates
            }
        }
        throw new ValidationException("Input did not match any known format. Input: $formattedName");
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *                       Optional. Options for configuring the service API wrapper.
     *
     *     @type string $serviceAddress
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'googleads.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the client.
     *           For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()}.
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either a
     *           path to a JSON file, or a PHP array containing the decoded JSON data.
     *           By default this settings points to the default client config file, which is provided
     *           in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string `rest`
     *           or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already instantiated
     *           {@see \Google\ApiCore\Transport\TransportInterface} object. Note that when this
     *           object is provided, any settings in $transportConfig, and any $serviceAddress
     *           setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...]
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     * }
     *
     * @throws ValidationException
     * @experimental
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /**
     * Returns Merchant Center links available tor this customer.
     *
     * Sample code:
     * ```
     * $merchantCenterLinkServiceClient = new MerchantCenterLinkServiceClient();
     * try {
     *     $customerId = '';
     *     $response = $merchantCenterLinkServiceClient->listMerchantCenterLinks($customerId);
     * } finally {
     *     $merchantCenterLinkServiceClient->close();
     * }
     * ```
     *
     * @param string $customerId   The ID of the customer onto which to apply the Merchant Center link list
     *                             operation.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Ads\GoogleAds\V2\Services\ListMerchantCenterLinksResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function listMerchantCenterLinks($customerId, array $optionalArgs = [])
    {
        $request = new ListMerchantCenterLinksRequest();
        $request->setCustomerId($customerId);

        $requestParams = new RequestParamsHeaderDescriptor([
          'customer_id' => $request->getCustomerId(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'ListMerchantCenterLinks',
            ListMerchantCenterLinksResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Returns the Merchant Center link in full detail.
     *
     * Sample code:
     * ```
     * $merchantCenterLinkServiceClient = new MerchantCenterLinkServiceClient();
     * try {
     *     $formattedResourceName = $merchantCenterLinkServiceClient->merchantCenterLinkName('[CUSTOMER]', '[MERCHANT_CENTER_LINK]');
     *     $response = $merchantCenterLinkServiceClient->getMerchantCenterLink($formattedResourceName);
     * } finally {
     *     $merchantCenterLinkServiceClient->close();
     * }
     * ```
     *
     * @param string $resourceName Resource name of the Merchant Center link.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Ads\GoogleAds\V2\Resources\MerchantCenterLink
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getMerchantCenterLink($resourceName, array $optionalArgs = [])
    {
        $request = new GetMerchantCenterLinkRequest();
        $request->setResourceName($resourceName);

        $requestParams = new RequestParamsHeaderDescriptor([
          'resource_name' => $request->getResourceName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GetMerchantCenterLink',
            MerchantCenterLink::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Updates status or removes a Merchant Center link.
     *
     * Sample code:
     * ```
     * $merchantCenterLinkServiceClient = new MerchantCenterLinkServiceClient();
     * try {
     *     $customerId = '';
     *     $operation = new MerchantCenterLinkOperation();
     *     $response = $merchantCenterLinkServiceClient->mutateMerchantCenterLink($customerId, $operation);
     * } finally {
     *     $merchantCenterLinkServiceClient->close();
     * }
     * ```
     *
     * @param string                      $customerId   The ID of the customer being modified.
     * @param MerchantCenterLinkOperation $operation    The operation to perform on the link
     * @param array                       $optionalArgs {
     *                                                  Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Ads\GoogleAds\V2\Services\MutateMerchantCenterLinkResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function mutateMerchantCenterLink($customerId, $operation, array $optionalArgs = [])
    {
        $request = new MutateMerchantCenterLinkRequest();
        $request->setCustomerId($customerId);
        $request->setOperation($operation);

        $requestParams = new RequestParamsHeaderDescriptor([
          'customer_id' => $request->getCustomerId(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'MutateMerchantCenterLink',
            MutateMerchantCenterLinkResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }
}
