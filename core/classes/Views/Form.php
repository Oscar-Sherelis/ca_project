<?php

namespace Core\Views;

class Form extends \Core\View {  // view class holds $data = array
    
    // even with overriding we can use parent methods with same method name
    public function render($template_path = ROOT . '/core/templates/form/form.tpl.php') {
        return parent::render($template_path);
    }
}

// composer install
// if was project without Vendor folder after "composer install" 
// command in will generate everything automatically from composer.json file
// can update project manually???

// Session destroy isstrina tik faila is serverio, bet ne pacia sesija

// in setcookie / means that it will work on all page

// __DIR__ all directory where it is called
// for example I am in index.php var_dump(__DIR__);
// it will show ....public_html 

// use \App\App is same as \App\App;
// now when we use App::call();
// it will use App.php file class as default
// Also can use in same file App\Drinks\Drink(); in this example it will take App as App/classes location not file*

// now.sh cannot use DB must be like Firebase
// heroku with Node.js can use

// id = 0 if(id) will be false
// solution if(id !== false)

// git clone .   . means that it will take files from github in location, where we are, without make aditional folder

// Abstract classes can have abstract methods and simple properties
// Abstract methods cannot be private