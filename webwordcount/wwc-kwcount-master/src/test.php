<?php
echo "Test Script Starting\n";
require('keywordcount.php');

$paragraph='This test is a test of this functions ability to test this paragraph by test searching for the keyword test';
$word='test';
$expect=5;

$answer=check($paragraph,$word);

echo "Test Result: ".$paragraph."+".$word."=".$answer." (expected: ".$expect.")\n";

if ($answer==$expect)
{
    echo "Test Passed\n";
    exit(0); // exit code 0 - success
}
else
{
    echo "Test Failed\n";
    exit(1); // exit code not zero - error
}
