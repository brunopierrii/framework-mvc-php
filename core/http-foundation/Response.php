<?php

namespace Core\HttpFoundation;

class Response
{
    protected $content;

    protected $statusCode;

    protected $headers;

    public function __construct(?string $content = '', int $status = 200, array $headers = [])
    {
        $this->setContent($content);
        $this->setStatusCode($status);
        $this->setHeaders($headers);

        !empty($headers) ?: $this->sendHeaders();
    }

    protected function setContent(string $content = '')
    {
        $this->content = $content;

        return $this;
    }

    protected function getContent()
    {
        return $this->content;
    }

    protected function getStatusCode()
    {
        return $this->statusCode;
    }

    protected function setStatusCode(int $statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function setHeaders(array $headers)
    {
        $this->headers = $headers;

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