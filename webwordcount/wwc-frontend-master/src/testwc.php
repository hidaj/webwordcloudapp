    <?php
            echo "Test Script Starting \n";
            echo "Test initialised at: ".date("d-M-y     H:i:s.v  ");
    $time_milli_start = (int) round(microtime(true)*1000000);
    
    $wchttp = "http://wordcount.40313770.qpc.hal.davecutting.uk/";


    function get_http_response_code($wchttp) {
        $headers = get_headers($wchttp);
    return substr($headers[0], 9, 3);
    }
    
            $status = get_http_response_code($wchttp);
            $expected = 200;
            $expectedc = 404;
            $expecteds = 500;
            $clienterror = 404;
            $servererror = 500;
    
                if ($status==$expected)
                   {
                              echo "\n Test word count connectivity: \n    current status: ".$status." ( expected status: ".$expected.")\n";
                              echo " Test Passed  \n";
                              echo "Test completed at: ".date("d-M-y    H:i:s.v  \n");
                        $time_milli_end = (int) round(microtime(true)*1000000);
                        $time_milli_diff = ($time_milli_end - $time_milli_start) ;
                              echo "Test completed in :    $time_milli_diff ms \n";
                        exit(0); // exit code 0 - success

                   }
                   else
                   {
                       if ($status==$clienterror){
                        $expected = $expectedc;
                               echo "\n Test word count connectivity: \n    current status: ".$status." ( expected status: ".$expected.")\n";
                               echo " Server cannot find the requested resource \n";
                               echo " Test Failed \n";
                        $time_milli_end = (int) round(microtime(true)*1000000);
                        $time_milli_diff = ($time_milli_end - $time_milli_start) ;
                               echo "Test completed in :    $time_milli_diff ms \n";
                        exit(1); // exit code not zero - error
                       }
                       
                       if ($status==$servererror){
                        $expected = $expecteds;
                               echo "\n Test word count connectivity: \n    current status: ".$status." ( expected status: ".$expected.")\n";
                               echo " Internal Server error \n";
                               echo " Test Failed \n";
                        $time_milli_end = (int) round(microtime(true)*1000000);
                        $time_milli_diff = ($time_milli_end - $time_milli_start) ;
                               echo "Test completed in :    $time_milli_diff ms \n";
                        exit(1); // exit code not zero - error
                       }
                       
                   }
                
                


    
