<html>
<head>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53996814-1', 'auto');
  ga('send', 'pageview');

</script>

<?php

// Create connection
 $con1= mysqli_connect("espprod.cwll6n3zrnry.us-west-2.rds.amazonaws.com","esp_admin","3spsqlDBpass01", "UpshotDB");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
} 

//GET request details

$key = $_GET['key'];
$url = $_GET['url'];
$data = $_GET['data'];

$urlfmt = 'http://esp.intelitecht.net/dev/apireturn.php';

$apisearch = mysqli_query($con1,"SELECT * FROM api_keys");
while($row = mysqli_fetch_array($apisearch)) {

//echo "key:" . $row['apikey'];

 if($key == $row['apikey']) { echo "key accepted<p>"; } else {echo "valid key required<p>"; $stop = 1;}
} 

if(!isset($_GET['url'])){echo "target URL required<p>"; $stop = 1;}
//if(!isset($_GET['data'])) {echo "data selection required<p>"; $stop = 1;}

 if($stop == 1) { exit("unable to process request");}

//Initiate cURL.
$ch = curl_init($url);
 
$search1 = mysqli_query($con1,"SELECT * FROM Seg_touchpoints");
$o = 0;

$arraylist = array();

while($row = mysqli_fetch_array($search1)) {

  $arraylist[$o][custid] = $row['cust_id'];
  $arraylist[$o][segid] = $row['Seg_ID'];
  $arraylist[$o][touchpoint] = $row['Touchpoint_name'];
  $arraylist[$o][caetgory] = $row['Categ_Name'];
  $arraylist[$o][channel] = $row['Channel_Name'];
  $arraylist[$o][value] = $row['value'];
 $o++;
 } 
mysqli_close($con1);

 
//Encode the array into JSON.
$jsonDataEncoded = json_encode($arraylist);
 
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);
 
//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
 
//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

echo "JSON data posted to $url<p>";
  
  //Execute the request
$result = curl_exec($ch);

  //echo "<pre>";
  //print_r($arraylist);

?>
</head>
