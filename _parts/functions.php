<?php

  function h($string){
    return htmlspecialchars($string, ENT_QUOTES,'UTF-8' );
  }

  $pattern = "/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)*$/";

?>