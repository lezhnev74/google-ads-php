<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v0/errors/adx_error.proto

namespace Google\Ads\GoogleAds\V0\Errors\AdxErrorEnum;

/**
 * Enum describing possible adx errors.
 *
 * Protobuf type <code>google.ads.googleads.v0.errors.AdxErrorEnum.AdxError</code>
 */
class AdxError
{
    /**
     * Enum unspecified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * The received error code is not known in this version.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * Attempt to use non-AdX feature by AdX customer.
     *
     * Generated from protobuf enum <code>UNSUPPORTED_FEATURE = 2;</code>
     */
    const UNSUPPORTED_FEATURE = 2;
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdxError::class, \Google\Ads\GoogleAds\V0\Errors\AdxErrorEnum_AdxError::class);
