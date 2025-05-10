<?php
// src/Core/Request.php

namespace App\Core;

class Request {
    public string $uri;
    public string $method;
    public array $query;
    public array $request;

    public function __construct($server, $get, $post) {
        // Extract the path part after the base directory
        $fullUri = $server['REQUEST_URI'];
        $basePath = '/BigProjects/Fullstack3Month';

        // Remove the base path from the URI
        if (str_starts_with($fullUri, $basePath)) {
            $this->uri = substr($fullUri, strlen($basePath)) ?: '/';
        } else {
            $this->uri = $fullUri;
        }

        $this->method = $server['REQUEST_METHOD'];
        $this->query = $get;
        $this->request = $post;
    }
}