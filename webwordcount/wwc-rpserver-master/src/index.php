<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
require('checkcsv.php');



$word=$_REQUEST['word'];

//$word="hi";

$paragraph=$_REQUEST['paragraph'];

//$paragraph="hi bear hi bear hi";

$service=$_REQUEST['service'];

//$service="kwc";


//function rp($word, $paragraph, $service) {

$url=checkcsv($service); #returns URL if present, non-zero if not


//}    

?>



<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="styles/ui.css" >
</head>

<body>
<script type="text/javascript">
{
    if(<?php echo"$url"?> != "1"){
                let xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var t = JSON.parse(this.response);
                        result = t.answer;
                        Display1();
                        //return result;
                        }
                      };

                xhttp.open("POST",<?php echo"$url"?>+"?paragraph="+<?php echo"$paragraph"?>+"&word="+<?php echo"$word"?>+"&service="+<?php echo"$service"?>);
                xhttp.send();
                return;
            }
}
            
</script>

</body>
            
</html>

