<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once './classi/Database.php';
include_once './classi/Cliente.php';

$db = Database::GetIstanza('localhost', 'root', 'antani1234');
$db->chiedi('USE artoo');
