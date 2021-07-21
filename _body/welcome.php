<?php

require('../_parts/functions.php');

include('./_parts/header.php');
?>

<h3>Welcome! You are registered!</h3>
<h4>Your Information</h4>
<p>Name : </p><?= $name ?>
<p>Email address : </p><?= h($email); ?>

<p><a href="conform.php">Back</a></p>

<?php
include('./_parts/footer.php');