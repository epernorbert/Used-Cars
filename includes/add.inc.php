<?php

session_start();

if(isset($_POST['submit'])){

    include_once '../action.php';

    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $fuel = mysqli_real_escape_string($conn, $_POST['fuel']);
    $cm3 = mysqli_real_escape_string($conn, $_POST['cm3']);
    $horsepower = mysqli_real_escape_string($conn, $_POST['hp']);
    //$image = mysqli_real_escape_string($conn, $_POST['file']); //(Nem törlöm lehet kelleni fog)

    //aktuális felhasználó ID(szám). Aki jelenleg be van jelentkezve.
    $user_id = $_SESSION['u_id'];

    //Error handlers
    //Empty fields
    if(empty($brand) || empty($type) ||empty($year) ||empty($price) ||empty($fuel) ||empty($cm3) ||empty($horsepower)){
        header("Location: ../add.php?empty=fields");
        exit();
    }


    //Check image validation
    //Image - 1
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    //Image - 2
    $file_2 = $_FILES['file_2'];
    $fileName_2 = $_FILES['file_2']['name'];
    $fileTmpName_2 = $_FILES['file_2']['tmp_name'];
    $fileSize_2 = $_FILES['file_2']['size'];
    $fileError_2 = $_FILES['file_2']['error'];
    $fileType_2 = $_FILES['file_2']['type'];

    $fileExt_2 = explode('.', $fileName_2);
    $fileActualExt_2 = strtolower(end($fileExt_2));

    //Image - 3
    $file_3 = $_FILES['file_3'];
    $fileName_3 = $_FILES['file_3']['name'];
    $fileTmpName_3 = $_FILES['file_3']['tmp_name'];
    $fileSize_3 = $_FILES['file_3']['size'];
    $fileError_3 = $_FILES['file_3']['error'];
    $fileType_3 = $_FILES['file_3']['type'];

    $fileExt_3 = explode('.', $fileName_3);
    $fileActualExt_3 = strtolower(end($fileExt_3));

    //Image - 4
    $file_4 = $_FILES['file_4'];
    $fileName_4 = $_FILES['file_4']['name'];
    $fileTmpName_4 = $_FILES['file_4']['tmp_name'];
    $fileSize_4 = $_FILES['file_4']['size'];
    $fileError_4 = $_FILES['file_4']['error'];
    $fileType_4 = $_FILES['file_4']['type'];

    $fileExt_4 = explode('.', $fileName_4);
    $fileActualExt_4 = strtolower(end($fileExt_4));

    //Image - 5
    $file_5 = $_FILES['file_5'];
    $fileName_5 = $_FILES['file_5']['name'];
    $fileTmpName_5 = $_FILES['file_5']['tmp_name'];
    $fileSize_5 = $_FILES['file_5']['size'];
    $fileError_5 = $_FILES['file_5']['error'];
    $fileType_5 = $_FILES['file_5']['type'];

    $fileExt_5 = explode('.', $fileName_5);
    $fileActualExt_5 = strtolower(end($fileExt_5));

    // accept image type
    $allowed = array('jpg', 'jpeg', 'bmp');

    if(in_array($fileActualExt, $allowed) && in_array($fileActualExt_2, $allowed) && in_array($fileActualExt_3, $allowed) && in_array($fileActualExt_4, $allowed) && in_array($fileActualExt_5, $allowed)){
        if($fileError === 0 && $fileError_2 === 0 && $fileError_3 === 0 && $fileError_4 === 0 && $fileError_5 === 0){
            if($fileSize < 6000000 && $fileSize_2 < 6000000 && $fileSize_3 < 6000000 && $fileSize_4 < 6000000 && $fileSize_5 < 6000000){ //6MB
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = '../uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                $fileNameNew_2 = uniqid('', true).".".$fileActualExt_2;
                $fileDestination_2 = '../uploads/'.$fileNameNew_2;
                move_uploaded_file($fileTmpName_2, $fileDestination_2);

                $fileNameNew_3 = uniqid('', true).".".$fileActualExt_3;
                $fileDestination_3 = '../uploads/'.$fileNameNew_3;
                move_uploaded_file($fileTmpName_3, $fileDestination_3);

                $fileNameNew_4 = uniqid('', true).".".$fileActualExt_4;
                $fileDestination_4 = '../uploads/'.$fileNameNew_4;
                move_uploaded_file($fileTmpName_4, $fileDestination_4);

                $fileNameNew_5 = uniqid('', true).".".$fileActualExt_5;
                $fileDestination_5 = '../uploads/'.$fileNameNew_5;
                move_uploaded_file($fileTmpName_5, $fileDestination_5);

                //Insert car into database
                $sql = "INSERT INTO cars (user_id, marka, tipus, évjárat, ar, uzemanyag, kobcenti, loero, kep, image_2, image_3, image_4, image_5) VALUE ('$user_id','$brand','$type','$year','$price','$fuel','$cm3','$horsepower', '$fileNameNew', '$fileNameNew_2', '$fileNameNew_3', '$fileNameNew_4', '$fileNameNew_5');";
                mysqli_query($conn, $sql);


                header("Location: ../add.php?insert=succes=$brand=$type");
                exit();

            }else{
                header("Location: ../add.php?file=is=to=big");
                exit();
            }
        }else{
            header("Location: ../add.php?There=was=an=error=uploading=your=file");
            exit();
        }
    }else{
        header("Location: ../add.php?you=cant=upload=this=files=of=this=type");
        exit();
    }


} else {
    header("Location: ../index.php?need=to=login=user");
}