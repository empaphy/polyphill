<?php

namespace Empaphy\Polyphill\Zend;

/**
 * Zend builtin functions.
 */
final class Builtin
{
    /**
     * @todo Implement {@see key()}
     */

    /**
     * @todo Implement {@see current()}
     */

    /**
     * @todo Implement {@see next()}
     */

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
     */
    public static function each(array &$array)
    {
        $key   = key($array);
        $value = current($array);

        if (null === $key) {
            // key() returns null if the array pointer is beyond the list of element or if the array is empty. If the
            // same scenario occurred in the each() function, a false was returned instead. Hence returning false here
            return false;
        }

        // Advance the array pointer before returning
        next($array);

        return array(
            1       => $value,
            'value' => $value,
            0       => $key,
            'key'   => $key
        );
    }
}
