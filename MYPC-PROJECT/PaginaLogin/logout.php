<?php
session_start();


session_unset();
session_destroy();


header("Location: /MYPC-PROJECT/PAG_HOME.php");
exit();
?>
