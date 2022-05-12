<?php
// Replace this with a string with your backend's URL
// Example: "https://api.example.com/"
$backend  = $_ENV["backend"];
// The name of your website
// This will appear on your root directory
$name     = "á.cf";



/* vurltool 1.0 */
$vrl = $_SERVER["REQUEST_URI"];
$vrl = preg_replace("/#(.*)$/", "", $vrl);
$vrl = preg_replace("/\?(.*)$/", "", $vrl);
$v = explode("/", $vrl);
unset($v[0]);
$vi = implode("/", $v);
$v = explode("/", $vi);

if ($vi == "") {
  die($name);
} else {
  //die($vi);
  $info = json_decode(file_get_contents($backend . "/api.php?root=" . $vi)); // Replace the [backend] with your backend
  if ($info->{"error"} == true) {
    http_response_code(404);
    die("Not found");
  } else {
    header("location: " . $info->{"url"});
    //die($info->{"url"});
  }
}
