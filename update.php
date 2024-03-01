<?php
// ده يقاي قالايدي  ن تغوسا الي تخسد استيقد الابديت تحديدا
include "db1.php";

if(isset($_GET['id'])){
    $id = intval($_GET['id']); 
    $query = "SELECT * FROM `new` WHERE `id` = ?";

    
    $do = $conn->prepare($query);
    $do->bind_param("i", $id);
    $do->execute();
    
    $result = $do->get_result();
    if($result->num_rows >  0){
        $row = $result->fetch_assoc();
    } 
}

//وه ايقام البيانات  ن السلايد كول داميوي للفورم الا اتعدلد سيس السلايد
if(isset($_POST['update_user'])){
    $title = $_POST['title'];
    $des = $_POST['des'];
    $price = $_POST['price'];
    $price1= $_POST['price1'];
    $id = intval($_POST['id']);


    if(isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $imageName = basename($_FILES["image"]["name"]);
        $targetDir = "img/"; 
        $targetFile = $targetDir . $imageName;

        if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $image = $targetFile; 
        } else {
            echo "Error uploading image.";
            exit; 
        }
    } else {
        $image = $row['image']; 
    }
    //غير البيانات نالقاعدة
    $query = "UPDATE `new` SET `title` = ?, `des` = ?, `price` = ?, `price1` = ?, `image` = ? WHERE `ID` = ?";
    $do = $conn->prepare($query);
    $do->bind_param("ssiisi", $title, $des, $price, $price1, $image, $id);

    if($do->execute()){
        echo "User updated successfully.";
    } else {
        echo "Error updating user: " . $conn->error;
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="<?php echo $row['title'] ?>"><br>

    <label for="des">Description:</label>
    <input type="text" id="des" name="des" value="<?php echo $row['des'] ?>"><br>

    <label for="price">Price:</label>
    <input type="number" id="price" name="price" value="<?php echo $row['price'] ?>"><br>
    <input type="number" id="price" name="price1" value="<?php echo $row['price1'] ?>"><br>
    <label for="image">Image:</label>
    <input type="file" id="image" name="image"><br>

    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="submit" value="Submit" name="update_user">
</form>
