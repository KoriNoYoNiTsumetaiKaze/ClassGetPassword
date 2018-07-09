<?php
require_once 'GetPassword.php';

$pass = new GetPasswordClass();
$pass->setPasswordLen($_POST["LenPas"]);
$pass->setFlagNumber($_POST["FlagNumber"]);
$pass->setFlagBigLetter($_POST["FlagBigLetter"]);
$pass->setFlagSmallLetter($_POST["FlagSmallLetter"]);
$pass->setFlagSpecialSymbol($_POST["FlagSpecialSymbol"]);
echo $pass->getPassword();
?>
