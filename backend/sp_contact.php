<?php
if ( $_SERVER["HTTP_HOST"] == "localhost" ) {
    include $_SERVER["DOCUMENT_ROOT"] . "/godspower/backend/config.php";
} else {
    include $_SERVER["DOCUMENT_ROOT"] . "/backend/config.php";
}

// Require The Request Headers File
require_once( SERVER_PATH . "request_header.php" );

include SERVER_PATH . "classes/class_email.php";

echo $email->send();

?>