<?php 
namespace App\Http\Controllers;

use Twig_Environment;

use ORM;
use App\Models\City;

class HomeController{
    
    /**
     * @var Twig_Environment
     */
    private $twig;
    
    /**
     * @var ORM (idiorm)
     */
    private $orm;

    public function __construct(Twig_Environment $twig, ORM $orm)
    {
        $this->twig = $twig;
        $this->orm = $orm;
    }
    
    public function getIndex(){
        // var_dump( City::limit(5)->offset(10)->find_many() ); exit;
        return $this->twig->render('home/index.html', []);
    }
}