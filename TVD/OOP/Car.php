<?php
    class car{
        var $name;
        var $color;

        public function __construct ( $name, $color){
            $this->name = $name;
            $this->color = $color;

        }

        public function running(){
            echo 'Name: '.$this -> name.'- Color: '.$this->color.' - is running';
        }
        public function stop(){
            echo $this -> name.' - is stop';
        }
    }

