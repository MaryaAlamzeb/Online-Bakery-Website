<?php



$status = '';


$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"]))

{

    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes))

    {
   
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))

        {
         
 
                $status = "The file ". $fileName. " has been uploaded successfully.";
            }
        

        else{
            $status = "Sorry, there was an error uploading your file.";
        }
    }
    else{
        $status = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
  }
else{
    $status = 'Please select a file to upload.';
}


echo $status;
?>
