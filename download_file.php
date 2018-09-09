<?php
require 'db_conn.php';
session_start();
echo "hi";
$file = $_GET['file'];
// Quick check to verify that the file exists
if( !file_exists($file) ) die("File not found");
// Force the download
header("Content-Disposition: attachment; filename=$file ");
header("Content-Length: " . filesize($file));
header("Content-Type: application/octet-stream;");
readfile($file);
?>