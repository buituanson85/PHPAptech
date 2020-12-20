<?php

class HCN extends HinhHoc{
    var $a;
    var $b;

    public function nhap (){
        $this -> tenhinh = 'HCN';
        $this -> socanh = 4;
        $this -> a = 2;
        $this -> b = 4;
    }

    public function inKQ (){
        echo $this -> tenhinh.'<br/>';
        echo $this -> socanh.'<br/>';
    }

    public function tinhchuvi(){
        echo  'chu vi hcn: '.(2*($this->a+$this->b));
    }
    public function dientich(){
        echo 'diem tich hcn = '.($this->a*$this->b);
    }
}