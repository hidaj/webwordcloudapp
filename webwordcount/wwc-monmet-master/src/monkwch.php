<?php



function kwchstatus($kwchanswer){
        
                    
    $initial = 'Test initialised at: '.date('d-M-y     H:i:s.v  ');
    $time_milli_start = (int) round(microtime(true)*1000000);

    $kwchhttp = 'http://keywordsearch.40313770.qpc.hal.davecutting.uk/';



    function get_http_response_code($kwchhttp) {
        $headers = get_headers($kwchhttp);
        return substr($headers[0], 9, 3);
    }
    
    
    
        $status = get_http_response_code($kwchhttp);
        $expected = 200;
        $expectedc = 404;
        $expecteds = 500;
        $clienterror = 404;
        $servererror = 500;
       
        
 //           for ($count = 0; $count <= 4; $count++){
                if ($status==$expected)
                   {
                        
                        $connectivity = $status;
                        $desc ='Service available';
                        $fintime ='Test completed at: '.date('d-M-y    H:i:s.v').'';
                        $time_milli_end = (int) round(microtime(true)*1000000);
                        $time_milli_diff = ($time_milli_end - $time_milli_start);
                        $comptime ='Test completed in :    '.$time_milli_diff.' us';
                        
                        $kwchanswer=array();     
                            
                        $kwchanswer=array(
                            'kwchingress'=>$kwchhttp,
                            'kwchinitial'=>$initial,
                            'kwchconn'=>$connectivity,
                            'kwchdesc'=>$desc,
                            'kwchfin'=>$fintime,
                            'kwchcomp'=>$comptime
                            );
                  
                   return $kwchanswer;
                   }

                   
                   
                       if ($status==$clienterror)
                        {
                            $expected = $expectedc;
                            
                                $connectivity =$status;
                                $desc ='Server cannot find the requested resource';
                                $fintime ='Service failed at: '.date('d-M-y    H:i:s.v').'';
                                $time_milli_end = (int) round(microtime(true)*1000000);
                                $time_milli_diff = ($time_milli_end - $time_milli_start) ;
                                $comptime ='Test completed in :    '.$time_milli_diff.' us';
                            
                            $kwchanswer=array();     
                                
                            $kwchanswer=array(
                                'kwchingress'=>$kwchhttp,
                                'kwchinitial'=>$initial,
                                'kwchconn'=>$connectivity,
                                'kwchdesc'=>$desc,
                                'kwchfin'=>$fintime,
                                'kwchcomp'=>$comptime
                                );
                                
                            return $kwchanswer;
                   }

                       
                       if ($status==$servererror)
                        {
                            $expected = $expecteds;
                               
                                $connectivity = $status;
                                $desc ='Server cannot find the requested resource';
                                $fintime ='Service failed at: '.date('d-M-y    H:i:s.v').'';
                                $time_milli_end = (int) round(microtime(true)*1000000);
                                $time_milli_diff = ($time_milli_end - $time_milli_start) ;
                                $comptime ='Test completed in :    '.$time_milli_diff.' us';
                            
                            $kwchanswer=array();     
                                
                            $kwchanswer=array(
                                'kwchingress'=>$kwchhttp,
                                'kwchinitial'=>$initial,
                                'kwchconn'=>$connectivity,
                                'kwchdesc'=>$desc,
                                'kwchfin'=>$fintime,
                                'kwchcomp'=>$comptime
                                );
                                
                            return $kwchanswer;
                   }
            }
        
        
