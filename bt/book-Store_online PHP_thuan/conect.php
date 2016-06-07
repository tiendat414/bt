<?php
define('URL', 'http://localhost');
define('host','localhost');
define('database','book_store');
define('user','root');
define('pass','');
include('adodb5/adodb.inc.php');
$db = ADONewConnection('mysqli'); # eg 'mysql' or 'postgres'
$db->Connect(host, user, pass, database);
$db->setFetchMode(ADODB_FETCH_ASSOC);