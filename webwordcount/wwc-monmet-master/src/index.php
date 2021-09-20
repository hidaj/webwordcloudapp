<?php

    //open front end conectivity record
        $endpointfe = "recordfe.csv";
        $contentsfe = fopen($endpointfe, "r");
        
    //open keywordcount conectivity record
        $endpointkwc = "recordkwc.csv";
        $contentskwc = fopen($endpointkwc, "r");
        
    //open keyword check conectivity record    
        $endpointkwch = "recordkwch.csv";
        $contentskwch = fopen($endpointkwch, "r");
        
     //open word count conectivity record   
        $endpointwc = "recordwc.csv";
        $contentswc = fopen($endpointwc, "r");

?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>monitoringMetrics-WWC</title>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/picnic">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        </head>
         
        <script>
                                                                        
             function feFunction() {
                                                                            
                }
                
            function kwcFunction() {
                                                                            
                }
                
            function kwchFunction() {
                                                                            
                }
                
            function wcFunction() {
                                                                            
                }
                                                                            
        </script>
        
<body>
    
    <div id="jumbo center">
        <article class="card center">
            
                <h1>Monitoring Metrics</h1>
            
        </article>
    </div>
    
    <div id="container center">
            <div id="dynamic center">  
            
                    <article class="card center">
                        <div class="tabs four flex one two-500 four 1000">
                              <input id='tab-1' type='radio' name='tabgroupB' checked />
                                    <label class="pseudo button toggle" for="tab-1">Frontend Service Log</label>
                              <input id='tab-2' type='radio' name='tabgroupB'>
                                    <label class="pseudo button toggle" for="tab-2">Keyword Counter Service Log</label>
                              <input id='tab-3' type='radio' name='tabgroupB'>
                                    <label class="pseudo button toggle" for="tab-3">Keyword Checker Service Log</label>
                              <input id='tab-4' type='radio' name='tabgroupB'>
                                    <label class="pseudo button toggle" for="tab-4">Word Counting Service Log</label>
                              
                                <div class="row">
                                    
                                    <div>
                                            <?php 
                                                while (($row = fgetcsv($contentsfe))  !== FALSE) {
                                              
                                                   $url= $row[0];
                                                   $starttime= $row[1];
                                                   $status= $row[2];
                                                   $description= $row[3];
                                                   $endtime= $row[4];
                                                   $duration= $row[5];
                                                   
                                                   $state = $status;
                                                   if ($state=='200'){
                                                       $state='success';
                                                   };
                                                   if ($state=='404'){
                                                       $state='warning';
                                                   };
                                                   if ($state=='500'){
                                                       $state='error';
                                                   };
                                            
                                                        echo "
                                                            <div class='center'>
                                                                
                                                                    <details  ontoggle='feFunction()'>
                                                                    
                                                                        <summary class='center toggle  pseudo '>
                                                                        <h2><span class='label $state'> $starttime </span></h2>
                                                                        </summary>
                                                                                <p>       Server Status: $status : $description</p>
                                                                                <p>       $endtime Server Test duration: $duration </p>
                                                                                <br>
                                                                    </details>
                                                                
                                                                       
                                                                    
                                                            </div>
                                                        ";
                                                }
                                            ?>
                                    </div>
                                
                                    <div>
                                            <?php 
                                                while (($row = fgetcsv($contentskwc))  !== FALSE) {
                                              
                                                   $url= $row[0];
                                                   $starttime= $row[1];
                                                   $status= $row[2];
                                                   $description= $row[3];
                                                   $endtime= $row[4];
                                                   $duration= $row[5];
                                            
                                                   $state = $status;
                                                   if ($state=='200'){
                                                       $state='success';
                                                   };
                                                   if ($state=='404'){
                                                       $state='warning';
                                                   };
                                                   if ($state=='500'){
                                                       $state='error';
                                                   };
                                            
                                                        echo "
                                                            <div class='center'>
                                                                
                                                                    <details  ontoggle='kwcFunction()'>
                                                                    
                                                                        <summary class='center toggle  pseudo '>
                                                                        <h2><span class='label $state'> $starttime </span></h2>
                                                                        </summary>
                                                                                <p>       Server Status: $status : $description</p>
                                                                                <p>       $endtime Server Test duration: $duration </p>
                                                                                <br>
                                                                    </details>
                                                                
                                                                       
                                                                    
                                                            </div>
                                                        ";
                                                }
                                            ?>
                                    </div>
                                
                                    <div>
                                            <?php 
                                                while (($row = fgetcsv($contentskwch))  !== FALSE) {
                                              
                                                   $url= $row[0];
                                                   $starttime= $row[1];
                                                   $status= $row[2];
                                                   $description= $row[3];
                                                   $endtime= $row[4];
                                                   $duration= $row[5];
                                            
                                                    
                                                   $state = $status;
                                                   if ($state=='200'){
                                                       $state='success';
                                                   };
                                                   if ($state=='404'){
                                                       $state='warning';
                                                   };
                                                   if ($state=='500'){
                                                       $state='error';
                                                   };
                                            
                                                        echo "
                                                            <div class='center'>
                                                                
                                                                    <details  ontoggle='kwchFunction()'>
                                                                    
                                                                        <summary class='center toggle  pseudo '>
                                                                        <h2><span class='label $state'> $starttime </span></h2>
                                                                        </summary>
                                                                                <p>       Server Status: $status : $description</p>
                                                                                <p>       $endtime Server Test duration: $duration </p>
                                                                                <br>
                                                                    </details>
                                                                
                                                                       
                                                                    
                                                            </div>
                                                        ";
                                                }
                                            ?>
                                    </div>
                                    <div>
                                            <?php 
                                                while (($row = fgetcsv($contentswc))  !== FALSE) {
                                              
                                                   $url= $row[0];
                                                   $starttime= $row[1];
                                                   $status= $row[2];
                                                   $description= $row[3];
                                                   $endtime= $row[4];
                                                   $duration= $row[5];
                                            
                                                        
                                                   $state = $status;
                                                   if ($state=='200'){
                                                       $state='success';
                                                   };
                                                   if ($state=='404'){
                                                       $state='warning';
                                                   };
                                                   if ($state=='500'){
                                                       $state='error';
                                                   };
                                            
                                                        echo "
                                                            <div class='center'>
                                                                
                                                                    <details ontoggle='wcFunction()'>
                                                                    
                                                                        <summary class='center toggle  pseudo '>
                                                                        <h2><span class='label $state'> $starttime </span></h2>
                                                                        </summary>
                                                                                <p>       Server Status: $status : $description</p>
                                                                                <p>       $endtime Server Test duration: $duration </p>
                                                                                <br>
                                                                    </details>
                                                                
                                                                       
                                                                    
                                                            </div>
                                                        ";
                                                }
                                            ?>
                                    </div>
                                        
                                  </div>
                              
                            </div>  
                        </article>
                        
                        
            </div> 
        </div> 
        
        
    </body>
</html>