<?php

namespace Core\HttpFoundation;

class Response
{
    protected $content;

    protected $statusCode;

    protected $headers;

    protected $isJson;

    public function __construct(?string $content = '', int $status = 200, array $headers = [], bool $isJson = false)
    {
        $this->setContent($content);
        $this->setStatusCode($status);
        $this->setHeaders($headers);
        $this->setIsJson($isJson);

        !empty($headers) ?: $this->sendHeaders();
    }

    protected function setContent(string $content = '')
    {
        $this->content = $content;
        
        if ($this->getIsJson()) {
            return $this;
            
        }

        return $this->sendContent();
    }

    protected function getContent()
    {
        return $this->content;
    }

    protected function setStatusCode(int $statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    protected function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setHeaders(array $headers)
    {
        $this->headers = $headers;

        return $this;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getIsJson()
    {
        return $this->isJson;
    }
    
    public function setIsJson($isJson)
    {
        $this->isJson = $isJson;

        return $this;
    }

    protected function sendStatusCode()
    {
        http_response_code($this->getStatusCode());

        return $this;
    }

    protected function sendContent()
    {
        echo $this->getContent();

        return $this;
    }

    protected function sendHeaders()
    {
        foreach ($this->getHeaders() as $name => $value) {
            
            $replace = 0 === strcasecmp($name, 'Content-Type');

            header($name .': '.$value, $replace);
        }

        return $this;
    }
}