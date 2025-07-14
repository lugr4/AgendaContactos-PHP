<?php

namespace App\Controllers;

use Lua\Core\Render;

class HomeController {

    private Render $render;

    public function __construct(Render $render) {
        $this->render = $render;
    }

    public function index(): string {
        return $this->render->view('home', ['message' => 'Hello from the view!']);
    }

}
