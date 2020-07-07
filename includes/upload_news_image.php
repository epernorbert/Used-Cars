<?php

if(isset($_FILES['upload']['name'])){

    $file = $_FILES['upload']['name'];
    $filetmp = $_FILES['upload']['tmp_name'];

    // uniq image name with image_name_time
    $new_file_name = time()."_".$file;

    move_uploaded_file($filetmp, '../news_image/'.$new_file_name);
    $function_number=$_GET['CKEditorFuncNum'];
    $url='news_image/'.$new_file_name;
    $message = '';
    echo "<script>window.parent.CKEDITOR.tools.callFunction('".$function_number."', '".$url."', '".$message."')</script>";

}

?>