<?php

/**
 * @noinspection PhpMultipleClassDeclarationsInspection
 */

if (PHP_VERSION_ID < 80100 && ! class_exists('ReturnTypeWillChange', false)) {

    /**
     * Most non-final internal methods now require overriding methods to declare
     * a compatible return type, otherwise a deprecated notice is emitted during
     * inheritance validation. In case the return type cannot be declared for an
     * overriding method due to PHP cross-version compatibility concerns, a
     * `#[\ReturnTypeWillChange]` attribute can be added to silence the
     * deprecation notice.
     *
     * @noinspection PhpLanguageLevelInspection
     */
    #[Attribute(Attribute::TARGET_METHOD)]
    final class ReturnTypeWillChange
    {

        /**
         * Constructs a new {@see ReturnTypeWillChange} instance.
         *
         * @return void
         */
        public function __construct() {}
    }

}
