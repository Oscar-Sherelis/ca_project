<?php

namespace App\Views;

use App\App;

class Navigation extends \Core\View {

    // @param $data array - data to generate navigation
    public function __construct($data = []) {
        parent::__construct($data);

        $this->addLink('left', '/', 'Titulinis');
        $this->addLink('left', '/feedback.php', 'Apie Mus');

        if (App::$session->userLoggedIn()) {
            $name = (App::$session->getUser())->getName();
            
            $this->addLink('right', '/logout.php', "Logout ($name)");
        } else {
            $this->addLink('right', '/login.php', 'Prisijungti');
            $this->addLink('right', '/register.php', 'Registruotis');            
        }
    }

    public function addLink($section, $url, $title) {
        $link = ['url' => $url, 'title' => $title];
        
        if ($_SERVER['REQUEST_URI'] == $link['url']) {
            $link['active'] = true;
        }
        
        $this->data[$section][] = $link;
    }

    public function render($template_path = ROOT . '/app/templates/navigation.tpl.php') {
        return parent::render($template_path);
    }

}
