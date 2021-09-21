<?php

function checkcsv($service){

    //$hb=fopen("availableServices.csv", "r");
    
    $names = file("availableServices.csv", FILE_IGNORE_NEW_LINES);
   /* $names = array("wc"=>"http://wordcount.40313770.qpc.hal.davecutting.uk/",
             "kwch"=>"http://keywordsearch.40313770.qpc.hal.davecutting.uk/",
             "kwc"=>"http://keywordcount.40313770.qpc.hal.davecutting.uk/");
    */
    list($end) = array_keys(array_slice($names, -1, 1, true));
  foreach($names as $index => $name_line) {
      
    if($index == $service){
        return $name_line;
        break; // Stop searching after we found the name
    }
         
   
    
    if($index == $end){
        return "1";
    }
    
  }    

}
    
    
    
    
    
