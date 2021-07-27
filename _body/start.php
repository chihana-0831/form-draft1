<?php

require('../_parts/functions.php');
require('../_parts/dbconnect.php');
include('../_parts/header.php');

?>

<h3>Sign-in to Your Account</h3>
<form action="home.php" method="post">
    <label for="userid">ID : </label>
    <input type="text" name="userid" required> <br>
    <label for="password">Password : </label>
    <input type="password" name="password" required minlength="8"> <br>
    <button type="submit">Sign In</button>
</foam>

<p><a href="signup.php">Creat Your Account</a></p>

<?php

include('../_parts/footer.php');