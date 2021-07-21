<?php

require('../_parts/functions.php');

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

include('../_parts/header.php');

?>

<h3>Welcome, <?= $name ?>! You are registered!</h3>
<h4>Your Information</h4>
<p>Name : <?= $name ?></p>
<p>Email address : <?= h($email); ?></p>

<p><a href="signin.php">Home</a></p>

<?php
include('./_parts/footer.php');