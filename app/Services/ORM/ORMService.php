<?php 
namespace App\Services\ORM;

use DI\Container;
use ORM;
use PDO;

class ORMService{
    
    public function register(Container $container){
        ORM::configure([
            'connection_string'     => 'mysql:host=mariadb;dbname=world',
            'username'              => 'root',
            'password'              => 'root'
        ]);
        
        // ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES latin1'));
        
        return ORM::for_table('');
    }
}