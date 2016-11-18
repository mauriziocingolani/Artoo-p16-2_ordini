<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once './classi/Database.php';

$GLOBALS['db'] = Database::GetIstanza('localhost', 'root', 'antani1234');
$GLOBALS['db']->chiedi('USE artoo');

require_once './classi/Cliente.php';
