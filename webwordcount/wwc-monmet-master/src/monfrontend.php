<?php
                            
    function festatus($feanswer){
        
                    
    $initial = 'Test initialised at: '.date('d-M-y     H:i:s.v  ');
    $time_milli_start = (int) round(microtime(true)*1000000);
    
    $fehttp = 'http://webapp.40313770.qpc.hal.davecutting.uk/';
        
        function get_http_response_code($fehttp) {
            $headers = get_headers($fehttp);
        return substr($headers[0], 9, 3);
        }
    
            $status = get_http_response_code($fehttp);
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
                        
                        $feanswer=array();     
                            
                        $feanswer=array(
                            'feingress'=>$fehttp,
                            'feinitial'=>$initial,
                            'feconn'=>$connectivity,
                            'fedesc'=>$desc,
                            'fefin'=>$fintime,
                            'fecomp'=>$comptime
                            );
                  
                   return $feanswer;
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
                            
                            $feanswer=array();     
                                
                            $feanswer=array(
                                'feingress'=>$fehttp,
                                'feinitial'=>$initial,
                                'feconn'=>$connectivity,
                                'fedesc'=>$desc,
                                'fefin'=>$fintime,
                                'fecomp'=>$comptime
                                );
                                
                              

                            return $feanswer;
                   }
                       
                       
                       if ($status==$servererror)
                       {
                            $expected = $expecteds;
                            
                            
                                $connectivity = $status;
                                $desc = ' Internal Server error ';
                                $fintime = 'Service Failed at : '.date('d-M-y    H:i:s.v ').'';
                                $time_milli_end = (int) round(microtime(true)*1000000);
                                $time_milli_diff = ($time_milli_end - $time_milli_start);
                                $comptime = 'Test completed in :    '.$time_milli_diff.' us';
                            
                            $feanswer=array();     
                                
                            $feanswer=array(
                                'feingress'=>$fehttp,
                                'feinitial'=>$initial,
                                'feconn'=>$connectivity,
                                'fedesc'=>$desc,
                                'fefin'=>$fintime,
                                'fecomp'=>$comptime
                                );
                                
                            return $feanswer;
                        }
        }
                
