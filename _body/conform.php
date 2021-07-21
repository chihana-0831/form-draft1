<?php

require('../_parts/functions.php');

$name = trim(filter_input(INPUT_POST, "name"));
$email = trim(filter_input(INPUT_POST, "email"));
$password = trim(filter_input(INPUT_POST, "password"));

include('../_parts/header.php');

?>


<?php if ( $name === '' || $email === '' || $password === '' ): ?>
    <p>Enter Valid Information</p>
<?php else : ?>

    <p>Hello, <?= $name ?> !</p>
    <p>Conform Your Email Address<br>
    <?= h($email); ?></p>

    <form action="welcome.php" method="post">
        <button>Conform</button>
    </form> 
<?php endif; ?>

<p><a href="signin.php">Back</a></p>



<?php

include('../_parts/footer.php');