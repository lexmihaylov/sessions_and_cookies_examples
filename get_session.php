<?php

include __DIR__ . '/libs/Session.php';

Session::init();

echo Session::get('first_name') . " " . Session::get('last_name') . ' is ' . Session::get('alias');

Session::close();
?>
