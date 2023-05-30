<?php

session_start(); // On récupère la session
session_destroy(); // On la détruit

header('location: index.php'); // On revient sur index.php