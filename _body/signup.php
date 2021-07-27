<?php

require('../_parts/functions.php');
require('../_parts/dbconnect.php');
include('../_parts/header.php');

if (!empty($_POST)) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $userid = $_POST['userid'];
    $password = $_POST['password'];

    if (trim($name) === ""){
        $error['name'] = "blank";
    }
    if (trim($email) === ""){
        $error['email'] = "blank";
    }
    if (trim($userid) === ""){
        $error['userid'] = "blank";
    }
    if (trim($password) === ""){
        $error['password'] = "blank";
    }

    if (!preg_match($pattern_email, $email)){
        echo 'The email address is invalid.<br />';
        $error['email'] = "invalid";
    }
    
    if (preg_match($pattern_pass, $password)){
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    } else {
        echo 'Password must be at least 8 characters containing both alphabetic character and number.<br />';
        $error['password'] = "invalid";
    }

    if (!isset($error)){
        $user = $pdo->prepare('SELECT COUNT(*) as cnt FROM users WHERE email=?');
        $user->execute(array($_POST['email']));
        $record = $user->fetch();
        if ($record['cnt'] > 0){
            $error['email'] = 'double';
        }
    }

    if (!isset($error)){
        $_SESSION['posts'] = $_POST;
        header('location: confirm.php');
        exit();
    }
} 

?>


<h3>Creat Your Account</h3>
<form action="" method="post">
    <label for="name">Name :</label>
    <input type="text" name="name" required placeholder="Enter your fullname"> <br>
    <label for="email">Email Address :</label>
    <input type="email" name="email" required size="30" placeholder="ex)abc-d@efg.hij"> <br>
    <label for="userid">User ID :</label>
    <input type="text" name="userid" required> <br>
    <label for ="password">Password :</label>
    <input type="text" name="password" required minlength="8"> <br>
    <button type="submit"　name="subm">Submit</button>
</form>


<?php

include('../_parts/footer.php');