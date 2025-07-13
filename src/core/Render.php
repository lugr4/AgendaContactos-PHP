<?php

namespace Lua\Core;

class Render {

    public function view(string $view, array $data = []) {
        $viewPath = __DIR__ . '/../../public_html/views/' . $view . '.php';

        if (file_exists($viewPath)) {
            extract($data);
            require $viewPath;
        } else {
            // Handle view not found
            echo "View not found: {$viewPath}";
        }
    }
}
