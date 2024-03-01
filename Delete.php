<?php
include "db1.php";

if (isset($_POST["title"])) {
    $t = $_POST["title"];
    
    // الاسم نطاولة غيري هههههه
    $stmt = $conn->prepare("DELETE FROM `new` WHERE `Title` = ?");

    
    $stmt->bind_param("s", $t);

    
    $stmt->execute();

  
    $stmt->close();
header("location: index.php");
exit();
}