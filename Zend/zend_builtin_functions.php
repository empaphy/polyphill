<?php

use Empaphy\Polyphill\Zend\Builtin;

require_once dirname(__DIR__) . '/src/Empaphy/Polyphill/Zend/Builtin.php';

if (! function_exists('each')) {

    /**
     * Return the current key and value pair from an array and advance the array cursor.
     *
     * After {@see each()} has executed, the array cursor will be left on the next element of the array, or past the
     * last element if it hits the end of the array. You have to use {@see reset()} if you want to traverse the array
     * again using each.
     *
     * @template TKey of array-key
     * @template TValue
     *
     * @param  array<TKey, TValue>  $array  The input array.
     * @return array{
     *             1:     TValue,
     *             value: TValue,
     *             0:     TKey,
     *             key:   TKey
     *         }|false            Returns the current key and value pair from the array `$array`. This pair is returned
     *                            in a four-element array, with the keys `0`, `1`, `key`, and `value`. Elements `0` and
     *                            `key` contain the key name of the array element, and `1` and `value` contain the data.
     *                            If the internal pointer for the array points past the end of the array contents,
     *                            {@see each()} returns `false`.
     *
     * @deprecated This function has been DEPRECATED as of PHP 7.2.0, and REMOVED as of PHP 8.0.0. Relying on this
     *             function is highly discouraged.
     */
    function each(array &$array)
    {
        return Builtin::each($array);
    }

}
