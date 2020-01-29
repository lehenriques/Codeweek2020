<?php
session_start();

$mysqli = new mysqli("localhost","pds","09871234","aula");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}