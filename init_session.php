<?php
include __DIR__ . '/libs/Session.php';

Session::init();

Session::set('first_name', 'Peter');
Session::set('last_name', 'Parker');
Session::set('alias', 'Spiderman');

Session::close();
?>
