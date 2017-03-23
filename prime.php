<?php
/* Do some operation here, like talk to the database, the file-session
 * The world beyond, limbo, the city of shimmers, and Canada.
 * 
 * AJAX generally uses strings, but you can output JSON, HTML and XML as well. 
 * It all depends on the Content-type header that you send with your AJAX
 * request. */

echo json_encode(42) . '<br/>'; //In the end, you need to echo the result. 
                      //All data should be json_encode()d.

                      //You can json_encode() any value in PHP, arrays, strings,
                      //even objects.
if (isset($_GET['primeMac'])) 
{
$name = $_GET['primeMac'];
echo "This mac was passed" . $name . '<br/>';


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://devnetapi.cisco.com/sandbox/apic_em/api/v1/network-device",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "{\"username\":\"devnetuser\",\n\"password\":\"Cisco123!\"\n}",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: dd95064f-f134-7ddf-ec80-441a0e0bc4df",
    "x-auth-token: ST-1677-GLGkyy7DV0CaSQuM0vVh-cas"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //$json = json_encode($response);
  $json = json_decode($response, true);
  $match = array('type','family','managementIpAddress')
  echo $json['response']['0']['family'] . "\r\n";
  echo print_r($json) . "\r\n";
  for ($i1 = 0; $i1 < count($match); $i1++) {
    for ($i2 = 0; $i2 < count($json); $i2++) {
      echo $json['response'][$i1][$i2] . "\r\n";
    }
    }
  }
}
?>
