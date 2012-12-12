<?php
require_once '../../require/dbUpdateFunctions.php';
$refDir = '../../upload/server/php/files/';
updateNewFiles($refDir);
echo "All your new files are now updated and available for analysis. Please wait while we redirect you"
?>
<body onLoad="parent.location.href = '../';"></body>