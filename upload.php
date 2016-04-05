
<?php
require_once("config.php");
if(isset($_POST['btn_upload']))
{
  
  $error=array();
  $extension=array("jpeg","jpg","png","gif");
  foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name)
  {
    $fileName=$_FILES["files"]["name"][$key];
    $fileTmp=$_FILES["files"]["tmp_name"][$key];
    $fileType=$_FILES["files"]["type"][$key];
    $fileSize=$_FILES["files"]["size"][$key];
    $ext=pathinfo($fileName,PATHINFO_EXTENSION);

    if($fileSize > 2097152){
      $errors[]="File size must be less than 2MB";
    }


    $sql="INSERT INTO dataimage (name,imgPath,imgType)
     VALUES ('$filename','$filepath','$filetype')";


     $dir="photo";

     if(empty($errors)== true)
     {
       move_uploaded_file($fileTmp,"photo/".$fileName);
       $result=$con->query($sql);
     }else
       {
         print_r($errors);
       }

       if(empty($errors))
       {
         echo"Picture upload success";
       }
    // if(in_array(ext,$extension))
    // {
    // if(!file_exists("photo/".$fileName))
    // {
    //   move_uploaded_file($fileTmp=$_FILES["files"]["tmp_name"][$key],"photo/".$fileName);
    // }
    // else {
    //   {
    //     echo "no";
    //   }
    // }
    // }
  }
  // $i=0;
  // while($i<count($_FILES['file_img']['name']))
  // {
  //   move_uploaded_file($_FILES['file_img']['tmp_name'][$i],
  //   $_FILES["file_img"]["name"][$i],
  //   $_FILES["file_img"]["type"][$i]);
  //   $i++;
  // }



  // $filetmp=$_FILES["file_img"]["tmp_name"];
  // $filename=$_FILES["file_img"]["name"];
  // $filetype=$_FILES["file_img"]["type"];
  // $filepath="photo/".$filename;
  //
  // move_uploaded_file($filetmp,$filepath);
  // $sql="INSERT INTO dataimage (name,imgPath,imgType)
  //  VALUES ('$filename','$filepath','$filetype')";
  //  $result=$con->query($sql);

}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="myJs.js"></script>
    <link rel="stylesheet" type="text/css" href="myStyle.css">

    </script>
    <title>Police</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-12" id="firstTitle">
          POLICE <small>( upload images )</small>
        </div>

        <!-- second row ,first navi  -->
        <div class="row" id="firstNav">
          <ul class="nav nav-pills">
            <li><a href="index.html">Home</a></li>
            <li class="active"><a href="upload.php">Upload</a></li>
          </ul>
        </div>

        <div class="row" id="myContainer" >
          <div class="col-lg-12">
            <form class="" action="upload.php" method="post" enctype="multipart/form-data">
                  <input type="file" name="file_img"  multiple/>
                  <input type="submit" name="btn_upload" value="Upload"/>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<script type="text/javascript">

</script>
