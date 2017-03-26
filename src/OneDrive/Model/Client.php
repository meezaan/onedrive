<?php
namespace OneDrive\Model;

class Client
{
    const ENDPOINT = 'https://api.onedrive.com/v1.0/shares/';

    const PREFIX = 'u!';

    const SUFFIX = 'root?expand=children';

    protected $shareUrl;

    protected $client;

    protected function url()
    {
        return self::ENDPOINT . self::PREFIX . base64_encode($this->shareUrl) . '/' . self::SUFFIX;
    }

    public function get()
    {
        $this->client = new \GuzzleHttp\Client();
        return $this->client->request('GET', self::url());
    }
}
