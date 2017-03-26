<?php

require_once('vendor/autoload.php');

use OneDrive\Model\Folder;

$folder = new Folder('https://1drv.ms/f/s!AmrVmjAdc7P2oeITmO1fiARZCo3BhA');

$result = [];

$result['start'] = 0;
$result['end'] = $folder->numberOfFiles - 1;
$result['count'] = $folder->numberOfFiles;
$result['files'] = $folder->files;

echo json_encode($result);
