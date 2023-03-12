<?php
session_start();
echo "Logging you out. Please wait....";

session_destroy();
header("Location: https://idiscuss-coding-forum07.000webhostapp.com/");
?>