<?php

require('../_parts/functions.php');
require('../_parts/dbconnect.php');
include('../_parts/header.php');

// echo $_SERVER[http_referer];

if (!empty($_POST['signin'])) {
    $userid = $_POST['userid'];
    $password = $_POST['password'];

    if (trim($userid) === ""){
        echo "UserID is not filled."; 
        $error['userid'] = "blank";
    }

    if (trim($password) === ""){
        echo "Password is not filled.";
        $error['password'] = "blank";
    }

    if (!isset($error)){
// 
        try {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE userid = :userid");
            $stmt->bindValue(':userid', $userid, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }

        if (empty($row['userid'])){
            echo "The UserID you entered is not registered or correct.";
        } 

        if (password_verify($password, $row['password'])) {
            // session_regenerate_id(true);
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['userid'] = $_POST['userid'];
            header("location: home.php");
        } else {
            echo "UserID or Password is not correct.";
        }

    } else {
        exit();
    }
}

?>

<h3>Sign-in to Your Account</h3>
<form action="" method="post">
    <input type="hidden" name="signin" value="signedin">
    <label for="userid">ID : </label>
    <input type="text" name="userid" required> <br>
    <label for="password">Password : </label>
    <input type="password" name="password" required minlength="8"> <br>
    <button type="submit">Sign In</button>
</foam>

<p><a href="signup.php">Creat Your Account</a></p>

<?php

include('../_parts/footer.php');