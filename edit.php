<?php
session_start();
$_SESSION["edit"] = $_SESSION["form"];
header("Location: index.php");
exit;
