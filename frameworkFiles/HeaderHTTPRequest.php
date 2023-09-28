<?php

class HeaderHTTPRequest
{
    public $header = array(
        "Accept"=>"text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7",
        "Accept-Encoding:"=>"gzip, deflate, br",
        "User-Agent"=>"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4464.5 Safari/537.36",
        "Accept-Language"=>"en-US,en;q=0.9,cs;q=0.8",
        "Upgrade-Insecure-Requests"=>"1",
        "Cache-Control"=>"max-age=0",
    );
    public $url;

    public function __toString() {

        $host = $this->getHost();
        $path = $this->getPath();

        $request = "GET $path HTTP/1.1\r\nHost: $host\r\n";

        $headerString = "";
        foreach ($this->header as $key => $value) {
            $headerString .= "$key: $value\r\n";
        }
        return $request . $headerString . "\r\n";
    }
    public function getHost() {
        $urlParts = parse_url($this->url);
        if (!$urlParts || !isset($urlParts['host'])) {
            echo "Invalid URL: " . $this->url;
            return false;
        }

        $host = $urlParts['host'];
        return $host;
    }

    public function getPath() {
        $urlParts = parse_url($this->url);
        if (!$urlParts || !isset($urlParts['host'])) {
            echo "Invalid URL: " . $this->url;
            return false;
        }

        $path = isset($urlParts['path']) ? $urlParts['path'] : '/';
        return $path;
    }
}