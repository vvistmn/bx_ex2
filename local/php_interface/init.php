<?php
if (file_exists($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/include/function.php"))
    require_once($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/include/function.php");

Bitrix\Main\Loader::registerAutoLoadClasses(null, [
    '\App\Handlers\HighLoadBlockHandlers' => '/local/php_interface/classes/Handlers/HighLoadBlockHandlers.php',
]);
\App\Handlers\HighLoadBlockHandlers::initHandlers();
