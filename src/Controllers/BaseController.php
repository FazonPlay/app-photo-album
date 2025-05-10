<?php 

namespace App\Controllers;

use App\Core\Request;

abstract class BaseController {
    
    protected Request $request;



    protected function render(string $filepath, array $context) : string {
        // Extract variables so they're available in the included file
        extract($context);

        // Start output buffering
        ob_start();

        // Include the PHP file directly
        include __DIR__ . '/../../templates/' . $filepath . '.php';

        // Get the buffer content and return it
        return ob_get_clean();
    }

    public function setRequest(Request $request) {
        $this->request = $request;
    }

    protected function getRequest() : Request {
        return $this->request;
    }
}