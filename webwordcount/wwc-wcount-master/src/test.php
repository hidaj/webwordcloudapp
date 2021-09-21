<?php
echo "Test Script Starting\n";
require('wordcount.php');

$paragraph='This is a test paragraph';
$expect=5;

$answer=check($paragraph);

echo "Test Result: ".$paragraph."=".$answer." (expected: ".$expect.")\n";

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
