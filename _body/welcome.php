<?php

require('../_parts/functions.php');
require('../_parts/dbconnect.php');

if (!empty($_POST['done'])){
    unset($_SESSION['posts']);
    header("Location: start.php");
} 


include('../_parts/header.php');

?>

<form action="" method="POST">
    <input type="hidden" name="done" value="done">
    <h3>Welcome, <?= $_SESSION['posts']['name'] ?>!</h3>
    <h3>You are registered!</h3>

    <button type="submit">Home</button>
</form>

<?php
include('./_parts/footer.php');