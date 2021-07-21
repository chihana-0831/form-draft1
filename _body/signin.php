<?php

require('../_parts/functions.php');

include('../_parts/header.php');

?>


<h3>Creat Your Account</h3>
<form action="conform.php" method="post">
    <input type="text" name="name"> 
    <input type="text" name="email"> 
    <input type="text" name="password"> 
    <button>Next</button>
</form>



<?php

include('../_parts/footer.php');