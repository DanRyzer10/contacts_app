<?php
require "database.php";
$id = $_GET["id"];
$statement= $conn->prepare("SELECT FROM contacts WHERE id=:id");
$statement->bindParam(":id", $id);
$statement->execute();
if ($statement->rowCount()==0){
  http_response_code(404);
  echo("HTTP 404 Not Found");
  return;
}
$statement= $conn->prepare("DELETE FROM contacts WHERE id=:id");
$statement->bindParam(":id", $id);
$statement->execute();
header("Location: index.php");

