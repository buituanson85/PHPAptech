<?php

class HinhHoc{
    var $tenhinh;
    var $socanh;

    public function nhap (){
         $this -> tenhinh = 'ten hinh';
         $this -> socanh = 0;
    }

    public function inKQ (){
        echo $this -> tenhinh.'<br/>';
        echo $this -> socanh.'<br/>';
    }
}
