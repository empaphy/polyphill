<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class BasicFunctionsTest extends TestCase
{
    public function test_import_request_variables_none()
    {
        $ok = \import_request_variables('n', 'test_import_none_');
        $this->assertFalse($ok);
    }

    public function test_import_request_variables_get()
    {
        $getVar    = 'test_import_get_var';
        $postVar   = 'test_import_post_var';
        $filesVar  = 'test_import_files_var';
        $cookieVar = 'test_import_cookie_var';

        $_GET[$getVar]       = "{$getVar}_value";
        $_POST[$postVar]     = "{$postVar}_value";
        $_FILES[$filesVar]   = "{$filesVar}_value";
        $_COOKIE[$cookieVar] = "{$cookieVar}_value";

        $prefix = 'get_test_lowercase_';

        // Double check that `$GLOBALS` does not contain the variables we are about to import.
        $this->assertNotContains($prefix . $getVar, $GLOBALS);
        $this->assertNotContains($prefix . $postVar, $GLOBALS);
        $this->assertNotContains($prefix . $filesVar, $GLOBALS);
        $this->assertNotContains($prefix . $cookieVar, $GLOBALS);

        $ok = import_request_variables('g', $prefix);
        $this->assertTrue($ok);

        $this->assertEquals($GLOBALS[$prefix . $getVar], $_GET[$getVar]);
        $this->assertNotContains($prefix . $postVar, $GLOBALS);
        $this->assertNotContains($prefix . $filesVar, $GLOBALS);
        $this->assertNotContains($prefix . $cookieVar, $GLOBALS);

        $prefix = 'get_test_uppercase_';

        $ok = import_request_variables('G', $prefix);
        $this->assertTrue($ok);

        $this->assertEquals($GLOBALS[$prefix . $getVar], $_GET[$getVar]);
    }

    public function test_import_request_variables_post()
    {
        $getVar    = 'test_import_get_var';
        $postVar   = 'test_import_post_var';
        $filesVar  = 'test_import_files_var';
        $cookieVar = 'test_import_cookie_var';

        $_GET[$getVar]       = "{$getVar}_value";
        $_POST[$postVar]     = "{$postVar}_value";
        $_FILES[$filesVar]   = "{$filesVar}_value";
        $_COOKIE[$cookieVar] = "{$cookieVar}_value";

        $prefix = 'post_test_lowercase_';

        // Double check that `$GLOBALS` does not contain the variables we are about to import.
        $this->assertNotContains($prefix . $getVar, $GLOBALS);
        $this->assertNotContains($prefix . $postVar, $GLOBALS);
        $this->assertNotContains($prefix . $filesVar, $GLOBALS);
        $this->assertNotContains($prefix . $cookieVar, $GLOBALS);

        \import_request_variables('p', $prefix);

        $this->assertEquals($GLOBALS[$prefix . $postVar], $_POST[$postVar]);
        $this->assertEquals($GLOBALS[$prefix . $filesVar], $_FILES[$filesVar]);
        $this->assertNotContains($prefix . $getVar, $GLOBALS);
        $this->assertNotContains($prefix . $cookieVar, $GLOBALS);

        $prefix = 'post_test_uppercase_';
        \import_request_variables('P', $prefix);

        $this->assertEquals($GLOBALS[$prefix . $postVar], $_POST[$postVar]);
        $this->assertEquals($GLOBALS[$prefix . $filesVar], $_FILES[$filesVar]);
    }

    public function test_import_request_variables_cookie()
    {
        $getVar    = 'test_import_get_var';
        $postVar   = 'test_import_post_var';
        $filesVar  = 'test_import_files_var';
        $cookieVar = 'test_import_cookie_var';

        $_GET[$getVar]       = "{$getVar}_value";
        $_POST[$postVar]     = "{$postVar}_value";
        $_FILES[$filesVar]   = "{$filesVar}_value";
        $_COOKIE[$cookieVar] = "{$cookieVar}_value";

        $prefix = 'cookie_test_lowercase_';

        // Double check that `$GLOBALS` does not contain the variables we are about to import.
        $this->assertNotContains($prefix . $getVar, $GLOBALS);
        $this->assertNotContains($prefix . $postVar, $GLOBALS);
        $this->assertNotContains($prefix . $filesVar, $GLOBALS);
        $this->assertNotContains($prefix . $cookieVar, $GLOBALS);

        \import_request_variables('c', $prefix);

        $this->assertEquals($GLOBALS[$prefix . $cookieVar], $_COOKIE[$cookieVar]);
        $this->assertNotContains($prefix . $getVar, $GLOBALS);
        $this->assertNotContains($prefix . $postVar, $GLOBALS);
        $this->assertNotContains($prefix . $filesVar, $GLOBALS);

        $prefix = 'cookie_test_uppercase_';
        \import_request_variables('C', $prefix);

        $this->assertEquals($GLOBALS[$prefix . $cookieVar], $_COOKIE[$cookieVar]);
    }
}
