<?php

namespace Lua\Core;

use eftec\bladeone\BladeOne;

class Render {

    private BladeOne $blade;

    public function __construct() {
        $views = __DIR__ . '/../../public_html/resources/views';
        $cache = __DIR__ . '/../../cache';
        $this->blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);
    }

    /** 
     * Funcción para renderizar una vista con blade.
     * 
     * @param string $template Nombre de archivo del la plantilla.
     * @param array $data Array con datos indexados
     * @return string Retorna el contenido de una plantilla renderizada
    */
    public function view(string $template, array $data = []): string {
        return $this->blade->run($template, $data);
    }
}
