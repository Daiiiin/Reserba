<?php

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    
    // public function testInputValidationEmptyFields()
    // {
    //     $mockConnection = $this->getMockBuilder(mysqli::class)
    //         ->disableOriginalConstructor()
    //         ->getMock();

    //     $_REQUEST['email'] = '';
    //     $_REQUEST['password'] = '';

    //     // Include your PHP code file
    //     include './src/php/login_action.php';

    //     // Assertions for the expected behavior based on empty fields
    //     $this->assertFalse($isValid);
    //     $this->assertEquals('Please fill all fields.', $retVal);
    // }

    // public function testInputValidationInvalidEmail()
    // {
    //     $mockConnection = $this->getMockBuilder(mysqli::class)
    //         ->disableOriginalConstructor()
    //         ->getMock();

    //     $_REQUEST['email'] = 'invalid_email';
    //     $_REQUEST['password'] = 'valid_password';

    //     // Include your PHP code file
    //     include './src/php/login_action.php';

    //     // Assertions for the expected behavior based on invalid email
    //     $this->assertFalse($isValid);
    //     $this->assertEquals('Invalid email.', $retVal);
    // }
    

    // public function testEmailDoesNotExist()
    // {
    //     $mockConnection = $this->getMockBuilder(mysqli::class)
    //         ->disableOriginalConstructor()
    //         ->getMock();

    //     $_REQUEST['email'] = 'nonexistent@example.com';
    //     $_REQUEST['password'] = 'valid_password';

    //     include './src/php/login_action.php';
    //     //include 'initialize.php';

    //     $this->assertTrue($isValid);
    //     $this->assertEquals('Account does not exist.', $retVal);
    // }

    // public function testIncorrectPassword()
    // {
    //     $mockConnection = $this->getMockBuilder(mysqli::class)
    //         ->disableOriginalConstructor()
    //         ->getMock();
            
    //     $_REQUEST['email'] = 'hanpork@mail.com';
    //     $_REQUEST['password'] = 'incorrect_password';

    //     include './src/php/login_action.php';

    //     $this->assertTrue($isValid);
    //     $this->assertEquals('You may have entered a wrong email or password.', $retVal);
    // }

    public function testCorrectEmailAndPassword()
    {
        $mockConnection = $this->getMockBuilder(mysqli::class)
            ->disableOriginalConstructor()
            ->getMock();

        $_REQUEST['email'] = 'hanpork@mail.com';
        $_REQUEST['password'] = 'radmin123';

        include './src/php/login_action.php';

        $this->assertTrue($isValid);
        $this->assertEquals('Success.', $retVal);
        // Add assertions for session variable assignments
        $this->assertEquals(200, $status);
        // Add assertions for other response values
    }

    // Add more test cases for database interactions, session management, etc.
}

?>