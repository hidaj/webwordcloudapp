<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");
require('wordcount.php');

$output = array(
	"error" => false,
    "string" => "",
	"answer" => 0
);

$paragraph = $_REQUEST['paragraph'];

$answer=check($paragraph);

$output['string']=$paragraph."=".$answer;
$output['answer']=$answer;

echo json_encode($output);
exit();
