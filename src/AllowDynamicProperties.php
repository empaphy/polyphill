<?php

/**
 * @noinspection PhpMultipleClassDeclarationsInspection
 */

if (PHP_VERSION_ID < 80200 && ! class_exists('AllowDynamicProperties', false)) {

    /**
     * This attribute is used to mark classes that allow dynamic properties.
     *
     * @noinspection PhpLanguageLevelInspection
     */
    #[Attribute(Attribute::TARGET_CLASS)]
    final class AllowDynamicProperties
    {
        /**
         * Construct a new {@see AllowDynamicProperties} attribute instance.
         */
        public function __construct() {}
    }

}
