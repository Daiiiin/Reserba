<?php

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{

    /********************************
     *  TEST ID:    TC_Login_001    *
     *  TEST NAME:  Valid Account   *
     ********************************/

    public function testCorrectEmailAndPassword()
    {
        $mockConnection = $this->getMockBuilder(mysqli::class)
            ->disableOriginalConstructor()
            ->getMock();
 
        $_REQUEST['email'] = 'hanpork@mail.com'; // valid email
        $_REQUEST['password'] = 'radmin123'; // valid password
 
        include './src/php/login_action.php';
 
        $this->assertTrue($isValid);
        $this->assertEquals('Success.', $retVal);
        $this->assertEquals(200, $status);
    }

    /********************************
     *  TEST ID:    TC_Login_002    *
     *  TEST NAME:  Invalid Email   *
     ********************************/

    // public function testInputValidationInvalidEmail()
    // {
    //     $mockConnection = $this->getMockBuilder(mysqli::class)
    //         ->disableOriginalConstructor()
    //         ->getMock();

    //     $_REQUEST['email'] = 'usera@mail.com';  // invalid email
    //     $_REQUEST['password'] = 'user123';  // valid password

    //     // Include your PHP code file
    //     include './src/php/login_action.php';

    //     // Assertions for the expected behavior based on invalid email
    //     $this->assertTrue($isValid);
    //     $this->assertEquals('Account does not exist.', $retVal);
    // }

    /**********************************
     *  TEST ID:    TC_Login_003      *
     *  TEST NAME:  Invalid Password  *
     **********************************/

    // public function testIncorrectPassword()
    // {
    //     $mockConnection = $this->getMockBuilder(mysqli::class)
    //         ->disableOriginalConstructor()
    //         ->getMock();
            
    //     $_REQUEST['email'] = 'user@mail.com';   // valid email
    //     $_REQUEST['password'] = 'user1234';  // invalid password

    //     include './src/php/login_action.php';

    //     $this->assertTrue($isValid);
    //     $this->assertEquals('You may have entered a wrong email or password.', $retVal);
    // }

    /********************************
     *  TEST ID:    TC_Login_004    *
     *  TEST NAME:  Invalid Account *
     ********************************/
    
    // public function testInvalidEmailAndPassword()
    // {
    //     $mockConnection = $this->getMockBuilder(mysqli::class)
    //         ->disableOriginalConstructor()
    //         ->getMock();

    //     $_REQUEST['email'] = 'usera@mail.com'; // invalid email
    //     $_REQUEST['password'] = 'user1234'; // invalid password

    //     include './src/php/login_action.php';

    //     $this->assertTrue($isValid);
    //     $this->assertEquals("Account does not exist.", $retVal);
    // }

}

?>
