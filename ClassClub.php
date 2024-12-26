<?php 
class Club {
    private string $name;
    private string $flag;

    public function __construct($name,$flag)
    {
        $this->setName($name);
        $this->setFlag($flag);
    }
    // setName && getName
    public function setName($name){
        $this->name=$name;
    }
    public function getName(){
        return $this->name;
    }
    // setFlag && getFlag
    public function setFlag($flag){
        $this->flag=$flag;
    }
    public function getFlag(){
        return $this->flag;
    }

    // public function ajouter(){
        
    //     $result = CRD::aj();
    // }
}

?>