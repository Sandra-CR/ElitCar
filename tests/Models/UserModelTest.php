<?php
// pour tester utiliser la commande suivante (./vendor/bin/phpunit tests/Models/UserModelTest.php ) dans le terminal ( windows )
use PHPUnit\Framework\TestCase;
require_once "./model/pdo.php"; 
require_once "./model/UserModel.php";
class UserModelTest extends TestCase
{

    public function testGetUserById()
    {
        $userId = 1;
        $expectedUser = ['id_user' => $userId, 'mail' => 'user@example.com', 'psw' => 'hashed_password'];

        $stmtMock = $this->createMock(PDOStatement::class);
        $stmtMock->expects($this->once())->method('execute')->with([':id_user' => $userId]);
        $stmtMock->expects($this->once())->method('fetch')->willReturn($expectedUser);

        $pdoMock = $this->createMock(PDO::class);
        $pdoMock->expects($this->once())->method('prepare')->willReturn($stmtMock);

        $userModel = new UserModel($pdoMock);
        $user = $userModel->getUserById($userId);

        $this->assertEquals($expectedUser, $user);
    }

    public function testEmailExists()
    {
        $email = 'user@example.com';
        $userId = 1;

        $stmtMock = $this->createMock(PDOStatement::class);
        $stmtMock->expects($this->once())->method('execute')->with([':email' => $email, ':id_user' => $userId]);
        $stmtMock->expects($this->once())->method('fetchColumn')->willReturn(1);

        $pdoMock = $this->createMock(PDO::class);
        $pdoMock->expects($this->once())->method('prepare')->willReturn($stmtMock);

        $userModel = new UserModel($pdoMock);
        $exists = $userModel->emailExists($email, $userId);

        $this->assertTrue($exists);
    }

    public function testUpdateEmail()
    {
        $userId = 1;
        $newEmail = 'new@example.com';

        $stmtMock = $this->createMock(PDOStatement::class);
        $stmtMock->expects($this->once())->method('execute')->with([':newEmail' => $newEmail, ':id_user' => $userId])->willReturn(true);
        $stmtMock->expects($this->once())->method('rowCount')->willReturn(1);

        $pdoMock = $this->createMock(PDO::class);
        $pdoMock->expects($this->once())->method('prepare')->willReturn($stmtMock);

        $userModel = new UserModel($pdoMock);
        $updated = $userModel->updateEmail($newEmail, $userId);

        $this->assertTrue($updated);
    }

    public function testVerifyPassword()
    {
        $userId = 1;
        $password = 'password';
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
     
        $stmtMock = $this->createMock(PDOStatement::class);
        $stmtMock->expects($this->once())->method('execute')->with([':id_user' => $userId]);
        $stmtMock->expects($this->once())->method('fetch')->willReturn(['psw' => $hashedPassword]);
     
        $pdoMock = $this->createMock(PDO::class);
        $pdoMock->expects($this->once())->method('prepare')->willReturn($stmtMock);
     
        $userModel = new UserModel($pdoMock);
        $isValid = $userModel->verifyPassword($userId, $password);
     
        $this->assertTrue($isValid);
    }

    public function testIsValidEmail()
    {
        $pdo = $this->createMock(PDO::class);
        $userModel = new UserModel($pdo);
        
        $this->assertTrue($userModel->is_valid_email('test@example.com'));
        $this->assertFalse($userModel->is_valid_email('invalid-email'));
    } 
}
