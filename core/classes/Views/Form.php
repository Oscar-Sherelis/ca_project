<?php

namespace Core\Views;

class Form extends \Core\View {  // view class holds $data = array
    
    public function render($template_path = ROOT . '/core/templates/form/form.tpl.php') {
        return parent::render($template_path);
    }
}