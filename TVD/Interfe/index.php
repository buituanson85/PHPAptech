<?php
require_once ('HinhHoc.php');
require_once ('HCN.php');
require_once ('HTG.php');

$hcn = new HCN();
$hcn->nhap ();
echo '<br/>';
$hcn->tinhchuvi ();
echo '<br/>';
$hcn->dientich ();
echo '<br/>';
$hcn->inKQ ();