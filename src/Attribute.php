<?php

/**
 * @noinspection PhpMultipleClassDeclarationsInspection
 */

if (PHP_VERSION_ID < 80000) {

    /**
     * Attributes offer the ability to add structured, machine-readable metadata
     * information on declarations in code: Classes, methods, functions,
     * parameters, properties and class constants can be the target of an
     * attribute. The metadata defined by attributes can then be inspected at
     * runtime using the Reflection APIs. Attributes could therefore be thought
     * of as a configuration language embedded directly into code.
     *
     * @noinspection PhpLanguageLevelInspection
     */
    #[Attribute(Attribute::TARGET_CLASS)]
    final class Attribute
    {
        /**
         * A value in the form of a bitmask indicating the places where
         * this attribute has been defined.
         *
         * @var int
         */
        public $flags;

        /**
         * Marks that attribute declaration is allowed only in classes.
         */
        const TARGET_CLASS = 1;

        /**
         * Marks that attribute declaration is allowed only in functions.
         */
        const TARGET_FUNCTION = 2;

        /**
         * Marks that attribute declaration is allowed only in class methods.
         */
        const TARGET_METHOD = 4;

        /**
         * Marks that attribute declaration is allowed only in class properties.
         */
        const TARGET_PROPERTY = 8;

        /**
         * Marks that attribute declaration is allowed only in class constants.
         */
        const TARGET_CLASS_CONSTANT = 16;

        /**
         * Marks that attribute declaration is allowed only in function or
         * method parameters.
         */
        const TARGET_PARAMETER = 32;

        /**
         * Marks that attribute declaration is allowed anywhere.
         */
        const TARGET_ALL = 63;

        /**
         * Notes that an attribute declaration in the same place is allowed
         * multiple times.
         */
        const IS_REPEATABLE = 64;

        /**
         * Construct a new {@see Attribute} instance.
         *
         * @param  int  $flags  A value in the form of a bitmask indicating the
         *                      places where attributes can be defined.
         * @return void
         */
        public function __construct($flags = self::TARGET_ALL)
        {
            $this->flags = $flags;
        }
    }

}
