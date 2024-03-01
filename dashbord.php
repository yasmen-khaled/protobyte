<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="lib.css">
    <title>DashBoard</title>
</head>
<body>
    <form action="insert.php" method="post" enctype="multipart/form-data">
        <input type="text" placeholder="title" name="title">
        <input type="text" placeholder="description" name="des">
        <input type="text" placeholder="media" name="price">
        <input type="text" placeholder="more" name="price1">
        <input type="file" name="image">
        <button type="submit">Add</button>
        
    </form>
    <form action="Delete.php" method="post" enctype="multipart/form-data">
        <input type="text" placeholder="title" name="title">
        <button type="submit">Delete</button>
    </form>



 <!----------------------------- 
 
 ووه ايقام بيانات  نسلايد الي تختارتي داينتيوي للحقول  فورم نتعديل 
 بشا انتزرد يعني دانتعدلد
 
 ----------------------------- -->
    <?php
include "db1.php";

$stmt = $conn->prepare("SELECT * FROM `new`");
$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo '<img src="' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['title']) . '">';
        echo '<h2>' . htmlspecialchars($row['title']) . '</h2>';
        echo '<p>' . htmlspecialchars($row['des']) . '</p>'; 
        echo '<p>' . htmlspecialchars($row['price']) . '</p>'; 
        echo '<p>' . htmlspecialchars($row['price1']) . '</p>';  
              
        //  ووه  درابط نغ تازمامت ن الابديت  مربوطة سالايديس دايو ماني 
        //ايفل لصفحة ن ابديت دايتوافعل الكود امزوار دايستدعى الايدي الا قلجدول نلقاعدة
        echo '<a href="update.php?id=' . htmlspecialchars($row['ID']) . '" class="btn btn-success">Update</a>';
        echo '</div>';
    }
}

?>
</body>
</html>