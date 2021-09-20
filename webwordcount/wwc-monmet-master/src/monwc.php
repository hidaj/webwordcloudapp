<?php


function wcstatus($wcanswer){
        
                    
    $initial = 'Test initialised at: '.date('d-M-y     H:i:s.v  ');
    $time_milli_start = (int) round(microtime(true)*1000000);

    $wchttp = 'http://wordcount.40313770.qpc.hal.davecutting.uk/';


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
                        
                        $connectivity =$status;
                        $desc ='Service available';
                        $fintime ='Test completed at: '.date('d-M-y    H:i:s.v').'';
                        $time_milli_end = (int) round(microtime(true)*1000000);
                        $time_milli_diff = ($time_milli_end - $time_milli_start);
                        $comptime ='Test completed in :    '.$time_milli_diff.' us';
                        
                        
                        
                        
                        
                        $wcanswer=array();     
                            
                        $wcanswer=array(
                            'wcingress'=>$wchttp,
                            'wcinitial'=>$initial,
                            'wcconn'=>$connectivity,
                            'wcdesc'=>$desc,
                            'wcfin'=>$fintime,
                            'wccomp'=>$comptime
                            );
                            
                            
                  
                   return $wcanswer;
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
                            
                            $wcanswer=array();     
                                
                            $wcanswer=array(
                                'wcingress'=>$wchttp,
                                'wcinitial'=>$initial,
                                'wcconn'=>$connectivity,
                                'wcdesc'=>$desc,
                                'wcfin'=>$fintime,
                                'wccomp'=>$comptime
                                );
                                
                            return $wcanswer;
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
                            
                            $wcanswer=array();     
                                
                            $wcanswer=array(
                                'wcingress'=>$wchttp,
                                'wcinitial'=>$initial,
                                'wcconn'=>$connectivity,
                                'wcdesc'=>$desc,
                                'wcfin'=>$fintime,
                                'wccomp'=>$comptime
                                );
                                
                            return $wcanswer;
                   }
            }
