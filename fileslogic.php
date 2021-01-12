<?php
if(isset($_POST['save'])){
    
	echo '<script>alert("hello")</script>';
    $filename='res'.$_FILES['myfile']['name'];
    $destination='uploads/'.$filename;
    $extension= pathinfo($filename, PATHINFO_EXTENSION);
    $file= $_FILES['myfile']['tmp_name'];
    $size= $_FILES['myfile']['size'];

    if(!in_array($extension,['pdf','doc','docx'])){
        echo '<script>alert("Welcome to Geeks for Geeks")</script>';
    }
    // if($_FILES['myfile']['size']>10*1048576){
    //     echo "file is too large";
    // }
    else{
        if(move_uploaded_file($file, $destination)){
            $sql= "INSERT INTO file_uploads (filename) VALUES (:name)";
            
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':name' => $filename));
        }
    }
}
?>