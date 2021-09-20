#!/usr/bin/php
<?php

    require('/var/www/html/monfrontend.php');

        $outputfe = array(
                    "feingress"=>"banana",
                    "feinitial"=>"apple",
                    "feconn"=>"strawberry",
                    "fedesc"=>"orange",
                    "fefin"=>"berry",
                    "fecomp"=>"oat"
                    );
                    

        $festatus = festatus($feanswer);


                $outputfe['feingress']=$festatus['feingress'];
                $outputfe['feinitial']=$festatus['feinitial'];
                $outputfe['feconn']=$festatus['feconn'];
                $outputfe['fedesc']=$festatus['fedesc'];
                $outputfe['fefin']=$festatus['fefin'];
                $outputfe['fecomp']=$festatus['fecomp'];

                if($outputfe['feconn']!='200') {
#you can define your email here - it has to be fully qualified though
                    $headers= "From: systemalert@wwc.mail" . "\r\n";
                    
                    $msg=implode("\n", $outputfe);
                    
                    $msg= wordwrap($msg,70);
                    
                    
                    mail("01brojack@gmail.com", "Service Unavailable",$msg,$headers);
                }

 #echo 'Adding to csv file ';
    
    $csv = '/var/www/html/recordfe.csv';
    
    chmod($csv, 0765);
        $csv = fopen($csv, 'a+');
        fputcsv($csv, $outputfe);
        fclose($csv);
      
        echo file_get_contents("/var/www/html/recordfe.csv");
        
        #echo 'Added to csv file ';
        
        
    exit();
    

      
    