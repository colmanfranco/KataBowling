<?php

use PHPUnit\Framework\TestCase;
use App\Model\User;

class UserModelTest extends TestCase
{
    public function testIfFunctionGetIdReturnsInt()
    {
        $user = new User();
        $user->userId = 1;
        $int = $user->getId();

        $this->assertIsInt($int);
    }

    public function testIfFunctionGetNameReturnsString()
    {
        $user = new User();
        $user->userName = 'Franco';
        $string = $user->getName();

        $this->assertIsString($string);
    }

    public function testIfFunctionGetNameReturnsTheNameIExpect()
    {
        $expected = 'Franco';
        $user = new User();
        $user->userName = 'Franco';
        $name = $user->getName();

        $this->assertEquals($expected, $name);
    }

    public function testIfFunctionGetAllCodersReturnsArray()
    {
        $user = new User();
        $array = $user->getAllUsers();

        $this->assertIsArray($array);
    }

    public function testIfFunctionGetAllCodersReturnsArrayContainingUsers()
    {
        $expected = 'Franco';
        $user = new User();
        $array = $user->getAllUsers();
        $franco = $array[0]['userName'];

        $this->assertEquals($expected, $franco);
    }

    public function testIfFunctionChangeUserStatusReturnsArray()
    {
        $id = 2;
        $user = new User();
        $true = $user->changeUserStatus($id);

        $this->assertTrue($true);
    }

    public function testIfSelectPlayingUsersReturnsArray()
    {
        $user = new User();
        $array = $user->selectPlayingUsers();

        $this->assertIsArray($array);
    }

    public function testIfFunctionResetAllUsersReturnsTrue()
    {
        $user = new User();
        $true = $user->resetAllUsers();

        $this->assertTrue($true);
    }

    
}