<?php

/**
 * @noinspection PhpMultipleClassDeclarationsInspection
 */

if (PHP_VERSION_ID < 80300 && ! class_exists('Override', false)) {

    /**
     * Marking a method with this attribute signifies that it is intended to
     * override the same method in a parent class.
     *
     * If the parent method doesn't exist, a fatal error will be thrown.
     *
     * @noinspection PhpLanguageLevelInspection
     */
    #[Attribute(Attribute::TARGET_METHOD)]
    final class Override
    {
        /**
         * Constructs a new {@see Override} instance.
         *
         * @return void
         */
        public function __construct() {}
    }

}
