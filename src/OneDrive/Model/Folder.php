<?php
namespace OneDrive\Model;

use OneDrive\Model\Client;

class Folder extends Client
{
    const PREFIX = "u!";

    const SUFFIX = "root?expand=children";

    public $folder;

    public $files = array();

    public $numberOfFiles;

    public function __construct($shareUrl)
    {
        $this->shareUrl = $shareUrl;
        $this->folder = json_decode($this->get()->getBody());
        $this->loadFiles();
    }

    protected function loadFiles()
    {
        foreach ($this->folder->children as $file) {
            $this->files[] = $file->{"@content.downloadUrl"};
        }

        $this->numberOfFiles = count($this->files);
    }



}
/*
$apiUrl = "https://api.onedrive.com/v1.0";
$endpoint = "shares";
$prefix = "u!";
$suffix = "";
$shareUrl = "https://1drv.ms/f/s!AmrVmjAdc7P2oeITmO1fiARZCo3BhA";
$shareUrlEncoded = base64_encode($shareUrl);

$queryUrl = $apiUrl . '/' . $endpoint . '/' . $prefix . $shareUrlEncoded . '/' . $suffix;

echo $queryUrl;
 */
