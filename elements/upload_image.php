<?php

$image = 0;
if ($_FILES["file"]["error"] > 0) {
    echo "Error: " . $_FILES["file"]["error"] . "<br>";
} else {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Stored in: " . $_FILES["file"]["tmp_name"];
}

$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
} else {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("../upload/" . $_FILES["file"]["name"] . '.' . $extension)) {
        echo $_FILES["file"]["name"] . " already exists. ";
    } else {
        $targetPath = dirname(__FILE__) . '/../upload/';
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetPath . $_FILES["file"]["name"])) {

            $sql = "INSERT INTO image(name, type, extension, size) VALUES ('" . $_FILES["file"]["name"] . "', '" . $_FILES["file"]["type"] . "', '" . $extension . "', '" . $_FILES["file"]["size"] / 1024 . "')";
            mysql_query($sql);

            $image = mysql_insert_id();
            echo "The file " . basename($_FILES['file']['name']) .
            " has been uploaded";
        } else {
            echo "There was an error uploading the file, please try again!";
        }
    }
}
?> 