#!/usr/bin/php
<?php

    header("Access-Control-Allow-Origin: *");
    require('/var/www/html/monkwc.php');


            $outputkwc = array(
                "kwcingress"=>"banana",
                "kwcinitial"=>"apple",
                "kwcconn"=>"strawberry",
                "kwcdesc"=>"orange",
                "kwcfin"=>"berry",
                "kwccomp"=>"oat"
            );
           

            $kwcstatus = kwcstatus($kwcanswer);


                $outputkwc['kwcingress']=$kwcstatus['kwcingress'];
                $outputkwc['kwcinitial']=$kwcstatus['kwcinitial'];
                $outputkwc['kwcconn']=$kwcstatus['kwcconn'];
                $outputkwc['kwcdesc']=$kwcstatus['kwcdesc'];
                $outputkwc['kwcfin']=$kwcstatus['kwcfin'];
                $outputkwc['kwccomp']=$kwcstatus['kwccomp'];
                
            if($outputkwc['kwcconn']!='200') {
        #you can define your email here - it has to be fully qualified though
                $headers= "From: systemalert@wwc.mail" . "\r\n";
                    
                $msg=implode("\n", $outputkwc);
                    
                $msg= wordwrap($msg,70);
                    
                    mail("01brojack@gmail.com", "Service Unavailable",$msg,$headers);
                }
                
                
            #echo 'Adding to csv file ';
            $csv = '/var/www/html/recordkwc.csv';
            
            chmod($csv, 0765);
                $csv = fopen($csv, 'a+');
                fputcsv($csv,$outputkwc);
                fclose($csv);
                
                echo file_get_contents("/var/www/html/recordkwc.csv");
                
            exit();