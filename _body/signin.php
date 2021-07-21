<?php

require('../_parts/functions.php');

include('../_parts/header.php');

?>


<h3>Creat Your Account</h3>
<form action="confirm.php" method="post">
    <label for="name">Name :</label>
    <input type="text" name="name" required placeholder="enter your fullname"> <br>
    <label for="email">Email Address :</label>
    <input type="email" name="email" required size="30" placeholder="ex)abc-d@efg.hij"> <br>
    <label for ="password">Password :</label>
    <input type="text" name="password" required minlength="8" placeholder="minimam 8 characters"> <br>
    <button>Next</button>
</form>



<?php

include('../_parts/footer.php');