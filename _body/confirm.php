<?php

require('../_parts/functions.php');

$name = trim(filter_input(INPUT_POST, "name"));
$email = trim(filter_input(INPUT_POST, "email"));
$password = trim(filter_input(INPUT_POST, "password"));

$pattern = "/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)*$/";

include('../_parts/header.php');

?>


<?php if ( preg_match($pattern, $email) ): ?>
    <p>Enter Valid Email Address</p>
<?php else : ?>

    <h4>Hello, <?= $name ?> !</h4>
    <p>Conform Your Email Address<br>
    <?= h($email); ?></p>

    <form action="welcome.php" method="post">
        <input type="hidden" name="name" value="<?php echo $name; ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="password" value="<?php echo $password?>">
        <button>Conform</button>
    </form> 
<?php endif; ?>

<p><a href="signin.php">Back</a></p>



<?php

include('../_parts/footer.php');