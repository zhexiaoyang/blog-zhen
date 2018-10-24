<?php

namespace App\Admin\Extensions;

use Encore\Admin\Form\Field;

class SimpleMDE extends Field
{
    protected $view = 'admin.simple-mde';

    protected static $css = [
        '/vendor/simple-mde/simplemde.min.css',
    ];

    protected static $js = [
        '/vendor/simple-mde/simplemde.min.js',
    ];

    public function render()
    {
        $this->script = <<<EOT
            var simplemde = new SimpleMDE({
                element: document.getElementById('{$this->id}'),
                autofocus: true,
                autosave: {
                    enabled: true,
                    delay: 5000
                },
                spellChecker: false,
            });
EOT;

        return parent::render();
    }
}