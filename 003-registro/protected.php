<?php

session_start();

if (!isset($_SESSION['valido']))
{
 header("Location: index.php");
  
}
echo "Info super secreta";

