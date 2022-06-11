<?php
require_once('app/Core_Class.php');
require_once('app/Upload_Class.php');

use App\Core;
use App\Upload;

$core = new Core;
$core->checkIfLogged();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <div class="container">
        <form action="panel.php" method="POST" enctype="multipart/form-data">
            <div><input type="file" name="fileToUpload"></div>
            <div><input type="submit" name="uploadBtn"></div>
            <a href="logout.php">Log out</a>
        </form>
        <?php
        if (isset($_POST['uploadBtn'])) {
            $upload = new Upload;
            $upload->setFileToUpload($_FILES['fileToUpload']);
            $upload->setFileSource();
            $upload->setFileType();
            $upload->checkFileExist();
            $upload->checkFileFormat();
            echo $upload->upload();
        }
        ?>
    </div>

</body>

</html>