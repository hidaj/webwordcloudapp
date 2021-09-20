<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");
require('keywordcount.php');

$output = array(
	"error" => false,
    "string" => "",
	"answer" => 0
);


$paragraph = $_REQUEST['paragraph'];

#$paragraph='hi there hi there bear';

$word = $_REQUEST['word'];

#$word = 'hi';


$answer=check($paragraph,$word);

$output['string']=$paragraph."+".$word."=".$answer;
$output['answer']=$answer;

echo json_encode($output);
exit();
