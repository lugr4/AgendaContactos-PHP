<?php

namespace Lua\Core;

class Render {

    public function view(string $view, array $data = []) {
        $viewPath = __DIR__ . '/../../public_html/views/' . $view . '.php';

        if (file_exists($viewPath)) {
            ob_start();
            extract($data);
            require $viewPath;
            return ob_get_clean();
        } else {
            // Handle view not found
            echo "View not found: {$viewPath}";
        }
    }
}
