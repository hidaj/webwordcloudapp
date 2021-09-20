<?php


function kwcstatus($kwcanswer){
        
                    
    $initial = 'Test initialised at: '.date('d-M-y     H:i:s.v  ');
    $time_milli_start = (int) round(microtime(true)*1000000);

    $kwchttp = 'http://keywordcount.40313770.qpc.hal.davecutting.uk/';


    function get_http_response_code($kwchttp) {
        $headers = get_headers($kwchttp);
        return substr($headers[0], 9, 3);
    }
    
    
        $status = get_http_response_code($kwchttp);
        $expected = 200;
        $expectedc = 404;
        $expecteds = 500;
        $clienterror = 404;
        $servererror = 500;


                if ($status==$expected)
                   {
                        
                        $connectivity =$status;
                        $desc ='Service available';
                        $fintime ='Test completed at: '.date('d-M-y    H:i:s.v').'';
                        $time_milli_end = (int) round(microtime(true)*1000000);
                        $time_milli_diff = ($time_milli_end - $time_milli_start);
                        $comptime ='Test completed in :    '.$time_milli_diff.' us';
                        
                        $kwcanswer=array();     
                            
                        $kwcanswer=array(
                            'kwcingress'=>$kwchttp,
                            'kwcinitial'=>$initial,
                            'kwcconn'=>$connectivity,
                            'kwcdesc'=>$desc,
                            'kwcfin'=>$fintime,
                            'kwccomp'=>$comptime
                            );
                  
                   return $kwcanswer;
                   }
                       if ($status==$clienterror)
                        {
                            $expected = $expectedc;
                            
                                $connectivity = $status;
                                $desc ='Server cannot find the requested resource';
                                $fintime ='Service failed at: '.date('d-M-y    H:i:s.v').'';
                                $time_milli_end = (int) round(microtime(true)*1000000);
                                $time_milli_diff = ($time_milli_end - $time_milli_start) ;
                                $comptime ='Test completed in :    '.$time_milli_diff.' us';
                            
                            $kwcanswer=array();     
                                
                            $kwcanswer=array(
                                'kwcingress'=>$kwchttp,
                                'kwcinitial'=>$initial,
                                'kwcconn'=>$connectivity,
                                'kwcdesc'=>$desc,
                                'kwcfin'=>$fintime,
                                'kwccomp'=>$comptime
                                );
                                
                            return $kwcanswer;
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
                            
                            $kwcanswer=array();     
                                
                            $kwcanswer=array(
                                'kwcingress'=>$kwchttp,
                                'kwcinitial'=>$initial,
                                'kwcconn'=>$connectivity,
                                'kwcdesc'=>$desc,
                                'kwcfin'=>$fintime,
                                'kwccomp'=>$comptime
                                );
                                
                            return $kwcanswer;
                   }
            }

