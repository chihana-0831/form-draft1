<?php

require('../_parts/functions.php');
require('../_parts/dbconnect.php');

// unset($_SESSION['name'], $_SESSION['email'], $_SESSION['userid'], $_SESSION['password']);

include('../_parts/header.php');

?>

<h3>Welcome, <?= $_SESSION['name'] ?>!</h3>
<h3>You are registered!</h3>
<p><a href="start.php">Start</a></p>

<?php
include('./_parts/footer.php');