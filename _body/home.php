<?php

    require('../_parts/functions.php');
    require('../_parts/dbconnect.php');

    if (!empty($_POST['logout'])){
        session_unset();
        if (session_unset()){
            header("location: start.php");
        }
    } 

    include('../_parts/header.php');
?>

<h4>HOME PAGE</h4>
<p>HELLO :)</p><br>
<form action="" method="post">
    <input type="hidden" name="logout" value="loggedout">
    <button type="submit">Logout</button>
</form>

<?php

include('../_parts/footer.php');