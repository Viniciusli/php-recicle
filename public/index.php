<?php

use PSR4\router\HandleRequest;

require_once '../vendor/autoload.php';
require_once '../routes/web.php';

$handle = new HandleRequest();
$handle->handle();
