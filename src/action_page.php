<?php

// Create an array of elements
$fieldA = $_POST["date"];
$fieldB = $_POST["cname"];
$fieldC = $_POST["address"];
$fieldD = $_POST["fcode"];
$fieldE = $_POST["qnty"];
$fieldF = $_POST["qntp"];
$fieldG = $_POST["fname"];
$fieldH = $_POST["prvcus"];
$fieldI = $_POST["slrp"];
$fieldJ = $_POST["pmd"];
$fieldK = $_POST["invsq"];

$list = array([$fieldA,$fieldB,$fieldC,$fieldD,$fieldE,$fieldF,$fieldG,$fieldH,$fieldI,$fieldJ,$fieldK]); //THIS IS WHERE YOU PUT THE FORM ELEMENTS ex: array('$fieldA','$fieldB',etc)

// Open a file in write mode ('a')
$fp = fopen('persons.csv', 'a');

// Loop through file pointer and a line
foreach ($list as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);
?>