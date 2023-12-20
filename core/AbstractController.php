<?php

namespace Core;
use Core\HttpFoundation\JsonResponse;

abstract class AbstractController
{
    protected function json(mixed $data = null, int $status = 200, array $headers = [], array $context = [])
    {
        return new JsonResponse($data, $status, $headers);
    }
}