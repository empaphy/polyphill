<?php

if (PHP_VERSION_ID >= 50400 && ! function_exists('import_request_variables')) {

    /**
     * Imports GET/POST/Cookie variables into the global scope.
     *
     * It is useful if you disabled `register_globals`, but would like to see some variables in the global scope.
     *
     * If you're interested in importing other variables into the global scope, such as $_SERVER, consider using extract().
     *
     * @deprecated This function has been _DEPRECATED_ as of PHP 5.3.0 and _REMOVED_ as of PHP 5.4.0.
     *
     * @param  string  $types   Using the `types` parameter, you can specify which request variables to import. You can
     *                          use 'G', 'P' and 'C' characters respectively for GET, POST and Cookie. These characters
     *                          are not case-sensitive, so you can also use any combination of 'g', 'p' and 'c'. POST
     *                          includes the POST uploaded file information.
     *                          > **Note**:
     *                          > Note that the order of the letters matters, as when using "GP", the POST variables
     *                          > will overwrite GET variables with the same name. Any other letters than GPC are
     *                          > discarded.
     * @param  string  $prefix  Variable name prefix, prepended before all variable's name imported into the global
     *                          scope.
     *                          So if you have a GET value named `"userid"`, and provide a prefix `"pref_"`, then you'll
     *                          get a global variable named `$pref_userid`.
     *                          > **Note**:
     *                          > Although the `prefix` parameter is optional, you will get an {@see E_USER_NOTICE}
     *                          > level error if you specify no prefix, or specify an empty string as a prefix. This is
     *                          > a possible security hazard. Notice level errors are not displayed using the default
     *                          > error reporting level.
     * @return bool Returns `true` on success or `false` on failure.
     */
    function import_request_variables($types, $prefix = null)
    {
        $types_len = strlen($types);
        $ok = false;

        if (! $prefix) {
            trigger_error('No prefix specified - possible security hazard', E_USER_NOTICE);
        }

        for ($p = 0; $p < $types_len; $p++) {
            switch ($types[$p]) {
                case 'g':
			    case 'G':
                    array_map(
                        static function ($key) use ($prefix) {
                            $GLOBALS[$prefix . $key] = $_GET[$key];
                        },
                        array_keys($_GET)
                    );
                    $ok = true;
                    break;

                case 'p':
                case 'P':
                    array_map(
                        static function ($key) use ($prefix) {
                            $GLOBALS[$prefix . $key] = $_POST[$key];
                        },
                        array_keys($_POST)
                    );

                    array_map(
                        static function ($key) use ($prefix) {
                            $GLOBALS[$prefix . $key] = $_FILES[$key];
                        },
                        array_keys($_FILES)
                    );
                    $ok = true;
                    break;

                case 'c':
                case 'C':
                    array_map(
                        static function ($key) use ($prefix) {
                            $GLOBALS[$prefix . $key] = $_COOKIE[$key];
                        },
                        array_keys($_COOKIE)
                    );
                    $ok = true;
                    break;
            }
        }

        return $ok;
    }

}
