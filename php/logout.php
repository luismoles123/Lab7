<?php
session_start();
session_destroy();
header("Location: ../Html/layoutSinLogin.html");
?>