<?php

namespace Core\HttpFoundation;

class JsonResponse extends Response
{
    protected $data;

    public function __construct(mixed $data = null, int $status = 200, array $headers = [], bool $json = false)
    {
        parent::__construct('', $status, $headers);

        $data ??= new \ArrayObject();

        $this->setStatusCode($status);
        $this->setData($data);
    }

    public function setJson(string $json)
    {
        $this->data = $json;

        return $this->update();
    }

    public function setData(mixed $data = [])
    {
        try {
            $data = json_encode($data);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        return $this->setJson($data);
    }

    public function update()
    {
        header('Content-Type: application/json');
        $this->sendStatusCode();
        $this->sendHeaders();

        return $this->setContent($this->data)->sendContent();
    }

}