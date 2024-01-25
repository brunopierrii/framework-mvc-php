<?php

if (!file_exists('env')) {
    function env(string $key) {
        return $_ENV[$key];
    }
}