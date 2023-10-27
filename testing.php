<?php

require_once './database/Database.php';
require_once './class/Employee.php';


$dbObj = new Database();

$mysqli = $dbObj->getConnection();

$empObj = new Employee($mysqli);

// $empObj->name = 'linh nguyen';
// $empObj->email = 'nvlinh@gmail.com';
// $empObj->address = 'thu duc';

// $empObj->store();
$arrEmployee = $empObj->index();
echo '<pre style="color: red;font-weight:bold">';
print_r($arrEmployee->fetch_all());
echo '</pre>';

$empObj->id = 1;
$emp1 = $empObj->show();
echo '<pre style="color: red;font-weight:bold">';
print_r($emp1->fetch_row());
echo '</pre>';