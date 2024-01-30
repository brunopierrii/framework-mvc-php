<?php

namespace Database;

abstract class Database
{
    protected function getParametersConnection()
    {
        return [
            'driver' => $this->getDriver(),
            'host' => $this->getHost(),
            'database' => $this->getDbname(),
            'username' => $this->getUsername(),
            'password' => $this->getPassword(),
            'charset' => $this->getCharset(),
            'collation' => $this->getCollation(),
            'prefix' => $this->getPrefix()
        ];
    }

    private function getHost()
    {
        return env('host');
    }
    private function getDbname()
    {
        return env('dbname');
    }

    private function getUsername()
    {
        return env('username');
    }

    private function getPassword()
    {
        return env('password');
    }

    public function getDriver()
    {
        return env('driver');
    }

    public function getCharset()
    {
        return env('charset');
    }

    public function getCollation()
    {
        return env('collation');
    }

    public function getPrefix()
    {
        return env('prefix');
    }
}