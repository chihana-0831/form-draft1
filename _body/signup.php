<?php

require('../_parts/functions.php');

include('../_parts/header.php');

session_start();

try{
    $pdo = new PDO(
        'mysql:host=localhost;dbname=mylogin;charset=utf8mb4',
        'root',
        'root',
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    echo $e->getMessage() . PHP_EOL;
    exist;
}

// if (preg_match($pattern, $_POST['email'])){
//     echo 'The email address is invalid.';
//     return false;
// }

// if (preg_match($pattern, $_POST['password'])){
//     $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
// } else {
//     echo 'Password must be at least 6 characters containing both alphabetic character and number.';
//     return false;
// }

try {
    $stmt = $pdo->prepare("INSERT INTO mylogin(name, email, userid, password) VALUES(?, ?, ?, ?)");
    $stmt->execute([$name, $email, $userid, $password]);
    echo 'Your Information is saved!';
} catch(Exception $e) {
    echo 'Email adress you entered is already registered.';
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
    <button>Next</button>
</form>


<?php

include('../_parts/footer.php');