#!/usr/bin/php
<?php
header("Access-Control-Allow-Origin: *");
require('/var/www/html/monkwch.php');
  
   $outputkwch = array(
                "kwchingress"=>"banana",
                "kwchinitial"=>"apple",
                "kwchconn"=>"strawberry",
                "kwchdesc"=>"orange",
                "kwchfin"=>"berry",
                "kwchcomp"=>"oat"
            );
            
    $kwchstatus = kwchstatus($kwchanswer);

        $outputkwch['kwchingress']=$kwchstatus['kwchingress'];
        $outputkwch['kwchinitial']=$kwchstatus['kwchinitial'];
        $outputkwch['kwchconn']=$kwchstatus['kwchconn'];
        $outputkwch['kwchdesc']=$kwchstatus['kwchdesc'];
        $outputkwch['kwchfin']=$kwchstatus['kwchfin'];
        $outputkwch['kwchcomp']=$kwchstatus['kwchcomp'];
   
        if($outputkwch['kwchconn']!='200') {
#you can define your email here - it has to be fully qualified though
            $headers= "From: systemalert@wwc.mail" . "\r\n";
                    
            $msg=implode("\n", $outputkwch);
                    
            $msg= wordwrap($msg,70);
                    
                    
            mail("email", "Service Unavailable",$msg,$headers);
                }

    #echo 'Adding to csv file ';
    $csv = '/var/www/html/recordkwch.csv';
    
    chmod($csv, 0765);
        $csv = fopen($csv, 'a+');
        fputcsv($csv,$outputkwch);
        fclose($csv);
        
        echo file_get_contents("/var/www/html/recordkwch.csv");
   
    exit();
