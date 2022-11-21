<?php
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

 $keys = array($fieldA,$fieldB,$fieldC,$fieldD,$fieldE,$fieldF,$fieldG,$fieldH,$fieldI,$fieldJ,$fieldK); //THIS IS WHERE YOU PUT THE FORM ELEMENTS ex: array('$fieldA','$fieldB',etc)
 $csv_line = $keys;
 foreach( $keys as $key ){
     array_push($csv_line,'' . $_GET[$key]);

 }
 $fname = 'data.csv'; //NAME OF THE FILE
 $csv_line = implode(',',$csv_line);
 if(!file_exists($fname)){$csv_line = $csv_line."\r\n" ;}
 $fcon = fopen($fname,'a');
 $fcontent = $csv_line;
 fwrite($fcon,$csv_line);
 fclose($fcon);
 ?>