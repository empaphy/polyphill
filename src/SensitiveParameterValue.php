<?php

if (PHP_VERSION_ID <  80200 && ! class_exists('SensitiveParameterValue', false)) {

    /**
     * The {@see SensitiveParameterValue} class allows wrapping sensitive values
     * to protect them against accidental exposure.
     *
     * Values of parameters having the SensitiveParameter attribute will
     * automatically be wrapped inside a {@see SensitiveParameterValue} object
     * within stack traces.
     *
     * @template TValue of mixed
     */
    final class SensitiveParameterValue
    {
        /**
         * The sensitive value to be protected against accidental exposure.
         *
         * @readonly
         * @var TValue
         */
        private $value;

        /**
         * Constructs a new {@see SensitiveParameterValue} object.
         *
         * @param  TValue  $value  An arbitrary value that should be stored
         *                         inside the SensitiveParameterValue object.
         */
        public function __construct($value)
        {
            $this->value = $value;
        }

        /**
         * Returns the sensitive value.
         *
         * @return TValue The sensitive value.
         */
        public function getValue()
        {
            return $this->value;
        }

        /**
         * Protects the sensitive value against accidental exposure.
         *
         * Returns an empty array to protect the sensitive value against
         * accidental exposure when using {@see var_dump()}.
         *
         * @return array An empty {@see array}.
         *
         * @noinspection MagicMethodsValidityInspection
         */
        public function __debugInfo()
        {
            return array();
        }

        /**
         * @return array
         * @throws \Exception
         *
         * @noinspection MagicMethodsValidityInspection
         * @noinspection ThrowRawExceptionInspection
         */
        public function __sleep()
        {
            throw new Exception("Serialization of 'SensitiveParameterValue' is not allowed");
        }

        /**
         * @return void
         * @throws \Exception Unserialization of 'SensitiveParameterValue' is not allowed
         *
         * @noinspection ThrowRawExceptionInspection
         */
        public function __wakeup()
        {
            throw new Exception("Unserialization of 'SensitiveParameterValue' is not allowed");
        }
    }

}
