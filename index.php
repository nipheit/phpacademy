<?php
require_once 'core/init.php';

$user = DB::getInstance()->update('users', 2, array(
  'username' => 'Billy',
  'password' => 'billiespass',
  'salt' => 'salt',
  'name' => 'billy de man'
));