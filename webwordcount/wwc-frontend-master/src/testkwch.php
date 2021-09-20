<?php

            echo "Test Script Starting \n";
            echo "Test initialised at: ".date("d-M-y     H:i:s.v  ");
        
        $time_milli_start = (int) round(microtime(true)*1000000);
        $kwchURL = "http://keywordsearch.40313770.qpc.hal.davecutting.uk/";
        
    
 //       $to_email = '01brojack@gmail.com';
  //      $subject = 'Testing PHP Mail';
 //       $message = 'This mail is sent using the PHP mail ';
 //       $headers = 'From: monitoring@rancher.ac.uk';
    


    function get_http_response_code($kwchURL) {
        $headers = get_headers($kwchURL);
        return substr($headers[0], 9, 3);
    }
        $status = get_http_response_code($kwchURL);
        $expected = 200;
        $expectedc = 404;
        $expecteds = 500;
        $clienterror = 404;
        $servererror = 500;
       
        
 //           for ($count = 0; $count <= 4; $count++){
                if ($status==$expected)
                   {
                       echo "\n keyword search service connectivity: \n     current status: ".$status." ( expected status: ".$expected.")\n";
                       echo " Test Passed  \n";
                       echo "Test completed at: ".date("d-M-y    H:i:s.v  \n");
                        $time_milli_end = (int) round(microtime(true)*1000000);
                        $time_milli_diff = ($time_milli_end - $time_milli_start) ;
                              echo "Test completed in :    $time_milli_diff ms \n";
  //                            mail($to_email, $subject, $message, $headers);
                        ;
                       exit(0); // exit code 0 - success
                   }
                   else
                   {
                       if ($status==$clienterror){
                        $expected = $expectedc;
                               echo "\n Test keyword search connectivity: \n     current status: ".$status." ( expected status: ".$expected.")\n";
                               echo " Server cannot find the requested resource \n";
                               echo " Test Failed \n";
                        $time_milli_end = (int) round(microtime(true)*1000000);
                        $time_milli_diff = ($time_milli_end - $time_milli_start) ;
                               echo "Test completed in :    $time_milli_diff ms \n";
                        exit(1); // exit code not zero - error
                       }
                       
                       if ($status==$servererror){
                        $expected = $expecteds;
                               echo "\nTest keyword search connectivity: \n     current status: ".$status." ( expected status: ".$expected.")\n";
                               echo " Internal Server error \n";
                               echo " Test Failed \n";
                        $time_milli_end = (int) round(microtime(true)*1000000);
                        $time_milli_diff = ($time_milli_end - $time_milli_start) ;
                               echo "Test completed in :    $time_milli_diff ms \n";
                        exit(1); // exit code not zero - error
                       }
                       
                   }
                
 //           }