<?php
function connectDB()
{
  try {
    $conn = new PDO('mysql:host=localhost;dbname=project', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    
  }
  return $conn;
}