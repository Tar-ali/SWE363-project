<?php

$p = $_GET['p'];
// echo "$p";

if (isset($_POST["submit"])) {


  header("Location:edit.php?p=$p");
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <title>Portfoliation</title>

  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet" />
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin+Condensed" />
  <link rel="stylesheet" href="assets/fonts/font-awesome.min.css" />
  <link rel="stylesheet" href="assets/fonts/ionicons.min.css" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body>
  <!-- Start: Header Dark -->
  <?php require 'header.php'; ?>
  <!-- End: Header Dark -->
  <div class="body-dark" style="background-image: url('assets/img/gray.jpg');">
    <div class="container hero">
      <h1 style="padding:13px">Edit Portfolio &nbsp;</h1>
    </div>


    <!--Start of Editing Container-->
    <div id="sec">
      <section style="width: 80%; margin: auto;" id="editor-container">
        <!-- <div id="editing_container" style="display:block"> -->

        <script src="ckeditor/ckeditor.js"></script>
        <form id="form" method="post" action="" style="width: 80%; margin: auto;">
          <input style="margin-right:0 ;" id="sub" class="btn btn-primary" type="submit" name="submit" value="Save" />
          <a href="account.php" class="btn btn-primary" type="button" onclick="myFunction()">
            Cancel
          </a><br><br><br>

          <div id="di">

            <?php
            require_once 'dbh.inc.php';

            $sql = 'SELECT * FROM (section as sec join share as s on sec.portID=s.portID) WHERE sharelink="' . $p . '"';
            $resultkhamis = mysqli_query($conn, $sql);
            // $resultemptyy = mysqli_query($conn, $sql);
            // $emptyy = mysqli_fetch_array($resultemptyy);

            $rowSec = mysqli_fetch_array($resultkhamis);

            $sel = "SELECT secID FROM section ORDER BY secID DESC LIMIT 1";
            $result = $conn->query($sel);
            $row = $result->fetch_assoc();
            
            if ($row == null) {
              $port = 1;
            } else {
              $port = (int)$row["secID"] + 1;
            }

            if ($rowSec == null) {
              $mm = $port +200;
              $dd = $port +100;
              echo '
<div id="di">
 



<label style="font-size: xx-large" for="">Add title: <textarea style="width: 80% " name="'.$mm.'" id="'.$mm.'" cols="" rows="1"></textarea></label>
<textarea name="'.$port.'" id="'.$port.'"
rows="10" cols="80"></textarea>


 
 <div style="margin:18px 0;"> 
 
 <button type="submit" value="Delete" name="'.$dd.'" 
 id="'.$dd.'" style="background-color:transparent;border:none" onclick="rmvSec(this);"  class="fa fa-minus fa-2x"></button></div>
</div>
<script>CKEDITOR.replace("' . $port . '");</script> 
';
            } else {
       
              while ($rowSec) {
                $mm1 = $rowSec['secID']+200;
                $dd1 = $rowSec['secID']+100;
                echo '
                <label style="font-size: xx-large" for="">Add title:<textarea style="width: 80% " name="'.$mm1.'" id="'.$mm1.'" cols="" rows="1">'. $rowSec['secTitle'].'</textarea></label>
                <textarea name="'.$rowSec['secID'].'" id="'.$rowSec['secID'].'"rows="10" cols="80">'. $rowSec['secContent'].'</textarea>
                <script>CKEDITOR.replace("'.$rowSec['secID'].'");</script> 
                  <div style="margin:18px 0;">        
              
                    <button type="submit" value="Delete" name="'.$dd1.'" 
                id="'.$dd1.'" style="background-color:transparent;border:none" onclick="rmvSec(this);"  class="fa fa-minus fa-2x"></button></div>';
                $rowSec = mysqli_fetch_array($resultkhamis);
              }
            }
            ?>

            </div>

          <button type="button" style="" onclick="addSec(this)" class="btn btn-primary">Add section</button>
          <input style="margin-right:0 ;" id="sub" class="btn btn-primary" type="submit" name="submit" value="Save" />
          <a href="account.php" class="btn btn-primary" type="button" onclick="myFunction()">
            Cancel
          </a><br><br><br>


        </form>

        <?php


        $p = $_GET['p'];
        // echo "$p";

        ///////////////////////////////////////////////////////////////////////////



        require_once 'dbh.inc.php';
        include 'delete.inc.php';

        $editorContent = $statusMsg = "";
        $titleContent = "";

        $n = 1;
        $n1 = 0;

        //////////////////////////////////////////////////////

        $sel = "SELECT secID FROM section ORDER BY secID DESC LIMIT 1";
        $result = $conn->query($sel);
        $row = $result->fetch_assoc();
        $n2 = null;
        if ($row == null) {
          $n2 = 1;
        } else {
          $n2 = (int)$row["secID"];
        }


        //////////////////////////////////////////////////////

        $p = $_GET['p'];
        // $p = 'WHdQiRWB';
        $sq = "SELECT portID FROM share WHERE sharelink='$p'";
        $result = $conn->query($sq);
        if ($result == null) {
          $port = 1;
        } else {
          $row = $result->fetch_assoc();
          $port = null;
          if ($row == null) {
            $port = 1;
          } else {
            $port = (int)$row["portID"];
          }
        }



        // If the form is submitted
        if (isset($_POST['submit'])) {
          // Get editor content
          // $editorContent = $_POST['editor'];

          for ($n2 = 0; $n2 < 100; $n2++) {
            $n1 = $n2 + 200;

            if (isset($_POST[$n2])) {

              $editorContent = $_POST[$n2];
              if (isset($_POST[$n1])) {
                $titleContent = $_POST[$n1];
              }
              $editorContent = $editorContent;
              $titleContent = $titleContent;

              echo "printed <br>";

              // Check whether the editor content is empty
              if (!empty($editorContent)) {



                $query =  $conn->query("SELECT * FROM section WHERE secID=$n2 AND portID=$port");

                if ($query->num_rows != 0) {
                  $conn->query("UPDATE section SET secContent='" . $editorContent . "', secTitle='" . $titleContent . "'  WHERE secID=$n2 AND portID=$port");
                } else {



                  // Insert editor content in the database
                  $insert = $conn->query("INSERT INTO section (secID, secContent, secTitle, secStatus, portID) VALUES ('$n2', '" . $editorContent . "', '" . $titleContent . "', True, '$port')");
                }
              }
            }
          }
        }



        ////////////////////////////////////////////////////////////////////////////




        ?>

    </div>
    <!--End of Editing Container-->
    <div class="d-sm-flex d-md-flex align-content-center justify-content-sm-center justify-content-md-center" style="margin-left:7vw; padding: 10px;">
      <div class="btn-group align-content-center" role="group" style="text-align: center;">

        <script>
          function rmvSec(index) {



            index.parentNode.parentNode.previousElementSibling.scrollIntoView() //Focus previous element

            index.parentNode.parentNode.parentNode.removeChild(index.parentNode.parentNode); // Delete this element

            <?php

            include 'delete.inc.php';

            ?>
          }
          
         </script>

       
        <script>
        var c = 1;
        var c1 = 200;
        var c2 = 100;
        var cr = "";
        var cr1 ="";
        var cr2 ="";

        var ib = <?php
          $sel = "SELECT secID FROM section ORDER BY secID DESC LIMIT 1";
          $result = $conn->query($sel);
          $row = $result->fetch_assoc();
          $port = null;
          if($row==null){
            $port = 1;}
              else{
                $port =(int)$row["secID"]+1;}
                echo $port;
          ?>
   
          function addSec(index) {
        ib+=1;
        c+=1;
        c1=200+ib;
        c2=100+ib;
        cr = "" + ib;
        cr1 = "" + c1;
        cr2 = "" + c2;

          // Buttons container
          var cont = document.createElement('div');
          //Make a menu buttons add remove.
          //  var addBtn = document.createElement("button");
          // addBtn.type="button";
          // addBtn.classList.add('fa');
          // addBtn.classList.add('fa-plus');
          // addBtn.classList.add('fa-2x');
          // addBtn.style.backgroundColor="Transparent";
          // addBtn.style.border="none";
          // addBtn.setAttribute("onclick","addSec(this)");
          //  cont.appendChild(addBtn)
          var rmvBtn = document.createElement("button");
          rmvBtn.setAttribute("name", cr2);
          
          rmvBtn.classList.add('fa');
          rmvBtn.classList.add('fa-minus');
          rmvBtn.classList.add('fa-2x');
          rmvBtn.style.backgroundColor="Transparent";
          rmvBtn.style.border="none";
          rmvBtn.setAttribute("onclick","rmvSec(this)");
          cont.appendChild(rmvBtn)
          cont.style.margin="18px 0";

          var tit = document.createElement("label");
          
          var mas = document.createTextNode("Add title: ");
          tit.appendChild(mas);
          tit.style.fontSize="xx-large";
          tit.style.color="white";
          var tit1 = document.createElement("textarea")
          tit1.setAttribute("name", cr1);
          tit1.setAttribute("id", cr1);
          tit1.style.width="80%";
          tit1.rows="1";
          tit.appendChild(tit1);

          var tex = document.createElement("textarea");
          tex.setAttribute("name", cr);
          tex.setAttribute("id", cr);
          tex.required;
          var all = document.createElement("section");
          all.appendChild(tit);
          all.appendChild(tex);
          all.appendChild(cont);
          document.getElementById('di').appendChild(all);
          CKEDITOR.replace(cr);

          
          
  
       //   index.parentNode.parentNode.parentNode.insertBefore(all, index.parentNode.parentNode.nextSibling).scrollIntoView();

    index.parentNode.insert(all, index.parentNode.parentNode.nextSibling).scrollIntoView();// add new element and focus on it.

   // index.parentNode.insert(all, index.parentNode.parentNode.nextSibling).scrollIntoView(); // add new element and focus on it          
       

          }
          </script>
      

        <script>
          CKEDITOR.replace('<?php
                            $sel = "SELECT secID FROM section ORDER BY secID DESC LIMIT 1";
                            $result = $conn->query($sel);
                            $row = $result->fetch_assoc();
                            $port = null;
                            if ($row == null) {
                              $port = 1;
                            } else {
                              $port = (int)$row["secID"] + 1;
                            }
                            echo $port;
                            ?>');
        </script>

      </div>
    </div>

  </div>
  </div>

  <!-- Start: Footer Dark -->
  <?php require 'footer.php'; ?>

  <!-- End: Footer Dark -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/smart-forms.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
  <script src="assets/js/script.min.js"></script>

  <!--Editor Script-->

  <script>
    $(document).ready(function() {
      var delay = 1000 * 2;
      setTimeout(function() {
        location.hash = "#editor-container";
      }, delay);
    });
  </script>
</body>

</html>