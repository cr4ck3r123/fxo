<?php

@session_start();
@session_destroy();
exit(header("Location: /"));
//echo "<script>windows.location.href='../index.php';</script>";

?>
