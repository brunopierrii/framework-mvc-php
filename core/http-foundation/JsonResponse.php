<?php

namespace Core\HttpFoundation;

class JsonResponse extends Response
{
    protected $data;

    public function __construct(mixed $data = null, int $status = 200, array $headers = [])
    {
        parent::__construct('', $status, $headers, isJson: true);

        $data ??= new \ArrayObject();
        
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

            if (!is_array($data)) {
                throw new \Exception('expected an array type');
            }

            $data = json_encode($data);

            return $this->setJson($data);
            
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update()
    {
        header('Content-Type: application/json');
        $this->sendStatusCode();
        $this->sendHeaders();

        return $this->setContent($this->data)->sendContent();
    }

}