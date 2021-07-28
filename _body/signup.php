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
        echo "Name is not filled.<br />";
        $error['name'] = "blank";
    }
    if (trim($email) === ""){
        echo "Email is not filled.<br />";
        $error['email'] = "blank";
    }
    if (trim($userid) === ""){
        echo "UserID is not filled.<br />";
        $error['userid'] = "blank";
    }
    if (trim($password) === ""){
        echo "Password is not filled.<br />";
        $error['password'] = "blank";
    }

    if (!preg_match($pattern_email, $email)){
        echo 'The email address is invalid.<br />';
        $error['email'] = "invalid";
    }
    
    if (!isset($error)){

        if (preg_match($pattern_pass, $password)){
            echo "pattern matched";
            $password = password_hash($password, PASSWORD_DEFAULT);
        } else {
            echo 'Password must be at least 8 characters containing both alphabetic character and number.<br />';
            $error['password'] = "invalid";
        }

        if (!isset($error)){
            echo "check email";
            $user = $pdo->prepare('SELECT COUNT(*) as cnt FROM users WHERE email=?');
            $user->execute(array($_POST['email']));
            $record = $user->fetch();
            if ($record['cnt'] > 0){
                echo "email not double";
                $error['email'] = 'double';
                echo "Email you entered is already registered.";
            }
        }

        if (!isset($error)){
            echo "no error at all";
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['userid'] = $userid;
            $_SESSION['password'] = $password;
            header('location: confirm.php');
            exit();
        }
    } 

} 
?>

<h3>Creat Your Account</h3>
<form action="" method="post">
    <!-- <input type="hidden" name="signup" value="signedup"> -->
    <label for="name">Name :</label>
    <input type="text" name="name" required placeholder="Enter your fullname"> <br>
    <label for="email">Email Address :</label>
    <input type="email" name="email" required size="30" placeholder="ex)abc-d@efg.hij"> <br>
    <label for="userid">User ID :</label>
    <input type="text" name="userid" required> <br>
    <label for ="password">Password :</label>
    <input type="text" name="password" required minlength="8"> <br>
    <button type="submit">Submit</button>
</form>


<?php

include('../_parts/footer.php');