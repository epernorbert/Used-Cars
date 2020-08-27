<?php

session_start();

if(isset($_POST['submit'])){

    include_once '../action.php';

    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $sql_brand = "SELECT * FROM car_brands WHERE brands_id='$brand'";
    $result_brand = mysqli_query($conn, $sql_brand);
    $resultcheck_brand = mysqli_num_rows($result_brand);

    while($row = mysqli_fetch_assoc($result_brand)){
        $brand_name = $row['brands_name'];
    }

    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $fuel = mysqli_real_escape_string($conn, $_POST['fuel']);
    $cm3 = mysqli_real_escape_string($conn, $_POST['cm3']);
    $horsepower = mysqli_real_escape_string($conn, $_POST['hp']);
    $body_style = mysqli_real_escape_string($conn, $_POST['body_style']);
    $mileage = mysqli_real_escape_string($conn, $_POST['mileage']);
    $euro = mysqli_real_escape_string($conn, $_POST['euro']);
    $colour = mysqli_real_escape_string($conn, $_POST['colour']);
    $transmission = mysqli_real_escape_string($conn, $_POST['transmission']);
    $weight = mysqli_real_escape_string($conn, $_POST['weight']);
    $identification_number = mysqli_real_escape_string($conn, $_POST['identification_number']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    //$image = mysqli_real_escape_string($conn, $_POST['files']); //(Nem törlöm lehet kelleni fog)

    //aktuális felhasználó ID(szám). Aki jelenleg be van jelentkezve.
    $user_id = $_SESSION['u_id'];

    //Image
    $file = $_FILES['files'];
    $fileName = $_FILES['files']['name'];

    //Error handlers
    //Empty fields
    if(empty($brand) || empty($type) || empty($year) || empty($price) || empty($fuel) || empty($cm3) || empty($horsepower)|| empty($body_style)|| empty($mileage)|| empty($euro)|| empty($colour)|| empty($transmission)|| empty($weight)){
        header("Location: ../add.php?empty=fields");

        exit();
    }

    //Insert car into database
    $sql = "INSERT INTO cars (user_id, marka, tipus, évjárat, ar, uzemanyag, kobcenti, loero, body_style, mileage, euro, colour, transmission, weight, identification_number, description) VALUE ('$user_id','$brand_name','$type','$year','$price','$fuel','$cm3','$horsepower', '$body_style', '$mileage', '$euro', '$colour', '$transmission', '$weight', '$identification_number', '$description');";
    mysqli_query($conn, $sql);

    $sql_car_id = "select * from users JOIN cars ON users.user_id=cars.user_id WHERE users.user_id='{$_SESSION['u_id']}'";
    $result = mysqli_query($conn, $sql_car_id);
    $resultcheck = mysqli_num_rows($result);

    while($row = mysqli_fetch_assoc($result)){
        $car_id = $row['car_id'];
    }

    foreach ($_FILES['files']['tmp_name'] as $key => $image){
        $imageName = $_FILES['files']['name'][$key];
        //delete whitespace from image name
        $imageName = str_replace(' ','', $imageName);
        $imageTmpName = $_FILES['files']['tmp_name'][$key];

        //uniq name
        $fileNameNew = uniqid('', true).".".$imageName;
        $fileDestination = '../uploads/'.$fileNameNew;

        //file destination with new uniq name
        $result = move_uploaded_file($imageTmpName, $fileDestination);

        $sql_2 = "INSERT INTO car_images(car_id, image_name) VALUE ('$car_id', '$fileDestination');";
        mysqli_query($conn, $sql_2);

    }

    $checkbox = $_POST['chkl'] ;
    foreach ($checkbox as $key => $value){
        $sql_extras = "INSERT INTO car_extras (extras, car_id) VALUE ('$value', '$car_id')";
        mysqli_query($conn, $sql_extras);
    }

    header("Location: ../add.php?insert=succes=$brand=$type");
    exit();

} else {
    header("Location: ../index.php?need=to=login=user");
}