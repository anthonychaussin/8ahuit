<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.fr.carrefour.io/v1/openapi/items",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 100,
  CURLOPT_TIMEOUT => 300,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"filters\":[]}",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "content-type: application/json",
    "x-ibm-client-id: 51afa321-86bf-47f9-9ab3-955ff2ec98ff",
    "x-ibm-client-secret: E0eC0aO5pB4vK2yG1eN1jP5fK8mA1rJ7gE2pD6cU6qW6hK8gI8"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  print_r($response);
}


$t = $_GET;
if (isset($t["uri"]))     $t["uri"] = "#".$t["uri"];
if (isset($t["oturi"]))   $t["oturi"] = "#".$t["oturi"];

$lesCatego = array(
  "getApi" => array(),
  "mesProd" => array(),
  "getOntoterminology" => array("uri"),
  "getConcepts" => array("uri"),
  "getConceptInOT" => array("oturi","uri"),
  "getConcept" => array("uri"),
  "get" => array("uri")
);

$mesProd = array();

  
    
    
    $mesProd[] = $response;
  
echo "<h1>Ceci est un test <h1/>";
print_r($mesProd);

/*if ($t["service"] == "mesProd") {
    $res = array();
    foreach($mesProd as $uri => $ontoterminology) {
      $res[$uri] = $ontoterminology["list];
      $res[$uri]["uri"] = $uri;
    }
    echo json_encode($res);
  }*/
/*  if ($t["service"] == "mesProd") {
    if (isset($reponse[$t["uri"]])) {
      $ot = $ontoterminologies[$t["uri"]];
      foreach($ot["concepts"] as $uric=>$concept)
        $ot["concepts"][$uric]["uri"] = $uric;
      echo json_encode($ot);
    }
    else
      error("Unknown URI: ".$t["uri"]);
  }*/