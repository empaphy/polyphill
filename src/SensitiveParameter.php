<?php

/**
 * @noinspection PhpMultipleClassDeclarationsInspection
 */

if (PHP_VERSION_ID < 80200 && ! class_exists('SensitiveParameter', false)) {

    /**
     * This attribute is used to mark a parameter that is sensitive and should
     * have its value redacted if present in a stack trace.
     *
     * @noinspection PhpLanguageLevelInspection
     */
    #[Attribute(Attribute::TARGET_PARAMETER)]
    final class SensitiveParameter
    {
        /**
         * Constructs a new {@see SensitiveParameter} instance.
         *
         * @return void
         */
        public function __construct() {}
    }

}
