<?php

echo"<br><br><br>";

echo"<h1>Pendiente de Aprobacion</h1>";

echo"<pre>";
print_r($_POST);
echo"</pre>";

echo"<pre>";
print_r($_FILES);
echo"</pre>";

$logo = $_FILES['files1'];
$banner = $_FILES['files2'];

echo"<pre>";
print_r($logo);
echo"</pre>";

echo"<pre>";
print_r($banner);
echo"</pre>";

?>