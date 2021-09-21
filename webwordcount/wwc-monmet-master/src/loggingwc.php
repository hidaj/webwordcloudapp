#!/usr/bin/php
<?php

header("Access-Control-Allow-Origin: *");
#header("Content-type: application/json");
require('/var/www/html/monwc.php');

    $outputwc = array(
        "wcingress"=>"banana",
        "wcinitial"=>"apple",
        "wcconn"=>"strawberry",
        "wcdesc"=>"orange",
        "wcfin"=>"berry",
        "wccomp"=>"oat"
            );
            

    $wcstatus = wcstatus($wcanswer);


        $outputwc['wcingress']=$wcstatus['wcingress'];
        $outputwc['wcinitial']=$wcstatus['wcinitial'];
        $outputwc['wcconn']=$wcstatus['wcconn'];
        $outputwc['wcdesc']=$wcstatus['wcdesc'];
        $outputwc['wcfin']=$wcstatus['wcfin'];
        $outputwc['wccomp']=$wcstatus['wccomp'];

            if($outputwc['wcconn']!='200') {
        #you can define your email here - it has to be fully qualified though
                    $headers= "From: systemalert@wwc.mail" . "\r\n";
                    
                    $msg=implode("\n", $outputwc);
                    
                    $msg= wordwrap($msg,70);
                    
                    
                    mail("email", "Service Unavailable",$msg,$headers);
                }

    #echo 'Adding to csv file ';
    
    $csv = '/var/www/html/recordwc.csv';
    
    chmod($csv, 0765);
        $csv = fopen($csv, 'a+');
        #$csv=fopen('php://temp/maxmemory:'. (5*1024*1024), 'a+');
        fputcsv($csv, $outputwc);
        fclose($csv);
        
        #rewind($csv);
        #$output = stream_get_contents($csv);
        echo file_get_contents("/var/www/html/recordwc.csv");
        
    #echo 'Added to csv file ';
    # $subject="Checking PHP mail";
    # $message="PHP mail works just fine";
    #  $from="me@example.com";
    #  $headers="From:" . $from;
    # if(mail($to, $subject, $message, $headers)) {
    #     echo 'The email was sent.';
     # } else {
     #     echo 'The email was not sent.';
     # }
    #echo json_encode($outputwc); 
    
    exit();
    
