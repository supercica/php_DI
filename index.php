<?php 
require 'vendor/autoload.php';

interface MainIntreface{
    public function mainFunction($par);
}

class First implements MainIntreface{
    public function mainFunction($par){
        return "First: ".$par;
    }
}

class Second implements MainIntreface{
    public function mainFunction($par){
        return "Second: ".$par;
    }
}

class MainService {
    public $mainIntreface;

    public function __construct(MainIntreface $mainIntreface){
        $this->mainIntreface=$mainIntreface;
    }

    public function getResult($parameter){
       echo  $this->mainIntreface->mainFunction($parameter);
    }
}

$container = new DI\Container();
$container->set('MainIntreface', \DI\create('Second'));
$service = $container->get('MainService');

$service->getResult('parameter');
