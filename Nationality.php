<?php 
class Nationality {
    private string $name;
    private string $drapau;

    public function __construct($name,$drapau)
    {
        $this->setName($name);
        $this->setDrapau($drapau);
    }

    public function setName($name){
        $this->name=$name;
    }
    public function getName(){
        return $this->name;
    }

    public function setDrapau($drapau){
        $this->drapau=$drapau;
    }
    public function getdrapau(){
        return $this->drapau;
    }
}

?>