<?php
/* vurltool 1.0 */
$vrl = $_SERVER["REQUEST_URI"];
$vrl = preg_replace("/#(.*)$/", "", $vrl);
$vrl = preg_replace("/\?(.*)$/", "", $vrl);
$v = explode("/", $vrl);
unset($v[0]);
$vi = implode("/", $v);
$v = explode("/", $vi);

if ($vi == "") {
  die("á.cf");
} else {
  //die($vi);
  $info = json_decode(file_get_contents("https://[backend]/api.php?root=" . $vi)); // Replace the [backend] with your backend
  if ($info->{"error"} == true) {
    http_response_code(404);
    die("Not found");
  } else {
    header("location: " . $info->{"url"});
    //die($info->{"url"});
  }
}
