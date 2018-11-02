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
        '/vendor/simple-mde/inline-attachment.js',
        '/vendor/simple-mde/codemirror-4.inline-attachment.js',
        '/vendor/simple-mde/simplemde.min.js',
    ];

    public function render()
    {
        $this->script = <<<EOT
            
        var simplemde = new SimpleMDE({
            spellChecker: false,
            autosave: {
                enabled: true,
                delay: 5000,
                unique_id: '{$this->id}'
            },
            forceSync: true
        });
        
        inlineAttachment.editors.codemirror4.attach(simplemde.codemirror, {
            uploadUrl: 'http://zhenblog.test/admin/upload_image',
            extraParams: {
              '_token': LA.token,
            },
            onFileUploadResponse: function(xhr) {
                var result = JSON.parse(xhr.responseText),
                filename = result[this.settings.jsonFieldName];
                if (result && filename) {
                    var newValue;
                    if (typeof this.settings.urlText === 'function') {
                        newValue = this.settings.urlText.call(this, filename, result);
                    } else {
                        newValue = this.settings.urlText.replace(this.filenameTag, filename);
                    }
                    var text = this.editor.getValue().replace(this.lastValue, newValue);
                    this.editor.setValue(text);
                    this.settings.onFileUploaded.call(this, filename);
                }
                return false;
            }
        });
EOT;

        return parent::render();
    }
}