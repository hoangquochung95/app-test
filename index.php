<?php

$myApp = dirname(__FILE__).'/MyApp.php';
require_once($myApp);

MyApp::run()->runAction();