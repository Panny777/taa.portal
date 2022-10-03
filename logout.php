<?php
// Unsetting all cookies
setcookie("admin_email", "", time() - (60 * 60 * 24 * 7), "/");
header("Location: ./");
?>