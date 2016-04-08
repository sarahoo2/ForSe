
<?php
require_once("config.php");

if(isset($_POST['Submit']))
{
  $error=array();
  $allowed=array("jpeg","jpg","png","gif","tif");
  $sizeofArray = count($_FILES["files"]["tmp_name"]);
   echo nl2br ($sizeofArray);
  for($key=0;$key<$sizeofArray;$key++)
  {
     $fileName=$_FILES["files"]["name"][$key];
     $fileTmp=$_FILES["files"]["tmp_name"][$key];
     $fileType=$_FILES["files"]["type"][$key];
     $fileSize=$_FILES["files"]["size"][$key];
     $ext=pathinfo($fileName,PATHINFO_EXTENSION);
     $filepath="photo/".$fileName;
    if(in_array($ext,$allowed))
        {
          if($fileSize <=2097152)
          {
            if(!file_exists("photo/".$fileName))
            {
                move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"photo/".$fileName);
                $sql="INSERT INTO dataimage (name,imgPath,imgType)
                 VALUES ('$fileName','$filepath','$fileType')";
                 $result=$con->query($sql);
            }
            else
            {
                // $filename=basename($fileName,$ext);
                // $newFileName=$fileName.time().".".$ext;
                // move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"photo/".$newFileName);
                // $sql="INSERT INTO dataimage (name,imgPath,imgType)
                //  VALUES ('$filename','$filepath','$fileType')";
                //  $result=$con->query($sql);
                 echo" Already Exit. Successfully Uploaded";
            }
          }else
          {
            echo " File is too large.";
          }
        }
    else
    {
        echo"File extension problem ";
        array_push($error,"$fileName, ");
    }
  }
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
    <link href="jqueryFilter/css/jquery.filer.css" type="text/css" rel="stylesheet" />
    <link href="jqueryFilter/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="jqueryFilter/js/jquery.filer.min.js"></script>
    <title>Police</title>



<style type="text/css">

    </style>
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
          <div class="col-lg-6">
            <form action="upload.php" method="post" enctype="multipart/form-data">
              <input type="file" name="files[]" id="filer_input" multiple="multiple">
              <input type="submit" value="Upload" name="Submit">
            </form>
          </div>

            <!-- photo view -->
          <div class="col-lg-6">
                <?php
                $dir ="photo/";
                $file_arr;
                if($opendir = opendir($dir))
                {

                  while(($file=readdir($opendir)) !== FALSE)
                  {

                    if($file != "." && $file != ".." )
                  {


                   echo   "<img id=divId class=imgStyle id=divId src='$dir/$file' height=100 width=100/>" ;


                  }

                  }
                  closedir($opendir);


                }
                if($opendir = opendir($dir))
                {

                if(($file=readdir($opendir)) !== FALSE)

                {
                  // Big image here

                if($file != "." && $file != ".." )

                  echo"hi";
                  echo"  <img id=mainImage  style=\"border:3px solid grey\"
                  src='$dir/$file' height=500 width=540 />";

                }
                }

                ?><br/><br/><br/>
                <input type="button" id="buttonR" name="name" value="Rotate">
               </div>  <!--End of photo view    -->
               <div class="row">
                 <div class="col-lg-12">

                 </div>
               </div>
             </div> <!-- end of container -->
          </div>
      </div>
      </div>
    </div>
  </body>
</html>
<script type="text/javascript">
var angle = 0, img = document.getElementById('mainImage');
document.getElementById('buttonR').onclick = function() {

    angle = (angle+90)%360;
    img.className = "rotate"+angle;
}
</script>
