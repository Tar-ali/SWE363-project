
<?php
$p = $_GET['p'];
// echo "$p";

if(isset($_POST["submit"])){
  header("Location:../LV/edit.php?p=$p");
}
?>
<!DOCTYPE php>
<php>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title>Portfoliation</title>

    <link
      href="https://cdn.quilljs.com/1.3.6/quill.snow.css"
      rel="stylesheet"
    />
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Bitter:400,700"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Cabin+Condensed"
    />
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css" />
    <link rel="stylesheet" href="assets/css/styles.min.css" />
    <link
      rel="stylesheet"
      href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  </head>

  <body>
    <!-- Start: Header Dark -->
    <div>
      <div class="header-dark">
        <nav
          class="navbar navbar-dark navbar-expand-lg navigation-clean-search"
          style="background-color: rgba(33, 74, 128, 0.38);"
        >
          <div class="container">
            <a class="navbar-brand" href="LV/home.php">Portfoliation</a
            ><button
              data-toggle="collapse"
              class="navbar-toggler"
              data-target="#navcol-1"
            >
              <span class="sr-only">Toggle navigation</span
              ><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
              <ul class="nav navbar-nav">
                <li class="nav-item" role="presentation">
                  <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" href="account.php">Account</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" href="about.php">About</a>
                </li>
              </ul>
              <form class="form-inline mr-auto" target="_self">
                <div class="form-group"><label for="search-field"></label></div>
              </form>
              <span class="navbar-text"></span>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <!-- End: Header Dark -->
    <div
      class="body-dark"
      style="background-image: url('assets/img/gray.jpg');"
    >
      <div class="container hero">
        <h1 style="padding:13px">Edit Portfolio &nbsp;</h1>
      </div>

     
      <!--Start of Editing Container-->
      <div id="sec">
      <section style="width: 80%; margin: auto;"
        id="editor-container"
      >
      <!-- <div id="editing_container" style="display:block"> -->
        
        <script src="ckeditor/ckeditor.js"></script>
        <form id="form" method="post" action="sub.php" style="width: 80%; margin: auto;">
          <input style="margin-right:0 ;" id="sub" class="btn btn-primary" type="submit" name="submit" value="SAVE"/> 
          <button class="btn btn-primary" type="button"  onclick="myFunction()">
            CANCEL
          </button><br><br><br>

        
         
          <?php

require 'dbh.inc.php';
$sql = 'SELECT * FROM (section as sec  join share as s on sec.portID=s.portID) WHERE sharelink="'.$p.'" AND secStatus=True;';
$resultkhamis = mysqli_query($conn, $sql);
$rowSec = mysqli_fetch_array($resultkhamis);


$sel = "SELECT secID FROM section ORDER BY secID DESC LIMIT 1";
$result = $conn->query($sel);
$row = $result->fetch_assoc();
$port = null;
if($row==null){
  $port = 1;}
    else{
      $port =(int)$row["secID"]+1;}

if($rowSec == null){
echo'



<label style="font-size: xx-large" for="">Add title: <textarea style="width: 80% " name="200" id="200" cols="" rows="1"></textarea></label>
<textarea name="'.$port.'" id="'.$port.'"
rows="10" cols="80"></textarea>



  <div style="margin:18px 0;">        
  <button type="button" style="background-color:transparent;border:none" onclick="addSec(this)" class="fa fa-plus fa-2x"></button>
    <button type="submit" value="Delete" name="'.$port.'" 
id="'.$port.'" style="background-color:transparent;border:none" onclick="rmvSec(this);"  class="fa fa-minus fa-2x"></button></div>
</div>
<script>CKEDITOR.replace("'.$port.'");</script> 
';

}
else{
while ($rowSec = mysqli_fetch_array($resultkhamis)){

$nn = (int)$rowSec['secID']+200;
echo '<label style="font-size: xx-large" for="">Add title:<textarea style="width: 80% " name="'.$nn.'" id="'.$nn.'" cols="" rows="1">'.$rowSec['secTitle'].'</textarea></label>
          <textarea name="'.$rowSec['secID'].'" id="'.$rowSec['secID'].'"rows="10" cols="80">'.$rowSec['secContent'].'</textarea>
          <script>CKEDITOR.replace("'.$rowSec['secID'].'");</script> 
            <div style="margin:18px 0;">        
            <button type="button" style="background-color:transparent;border:none" onclick="addSec(this)" class="fa fa-plus fa-2x"></button>
              <button type="submit" value="Delete" name="'.$rowSec['secID'].'" 
          id="'.$rowSec['secID'].'" style="background-color:transparent;border:none" onclick="rmvSec(this);"  class="fa fa-minus fa-2x"></button></div>';
        }
      }    
             ?>
             <div id="di">

             </div>
          <input style="margin-right:0 ;" id="sub" class="btn btn-primary" type="submit"  name="submit"  value="SAVE"/>
          <button class="btn btn-primary" type="button"  onclick="myFunction()">
            CANCEL
          </button>
         
          
        </form>
      
        <?php

        
$p = $_GET['p'];
// echo "$p";

///////////////////////////////////////////////////////////////////////////



require_once 'dbh.inc.php';





$editorContent = $statusMsg = "";
     $titleContent = "";

$n = 1;
$n1 = 200;
$n10 = 1;

//////////////////////////////////////////////////////

$sel = "SELECT secID FROM section ORDER BY secID DESC LIMIT 1";
$result = $conn->query($sel);
$row = $result->fetch_assoc();
$n2 = null;
if($row==null){
    $n2 = 1;}
    else{
$n2 =(int)$row["secID"];}


//////////////////////////////////////////////////////

$p = $_GET['p'];
// $p = 'WHdQiRWB';
$sq ="SELECT portID FROM share WHERE sharelink='$p'";
$result = $conn->query($sq);
if($result == null){
  $port = 1;
}else{
$row = $result->fetch_assoc();
$port = null;
if($row==null){
    $port = 1;}
    else{
$port =(int)$row["portID"];}
    }



// If the form is submitted
if(isset($_POST['submit'])){

    // Get editor content
    // $editorContent = $_POST['editor'];

    // for($n2; $n2<100; $n2++){
      for($n10; $n10<100; $n10++, $n2++){

    if(isset($_POST[$n10])){

      
     
    $editorContent = $_POST['35'];

    echo $editorContent;
    if(isset($_POST[$n1])){
    $titleContent = $_POST[$n1];}
    $n1+=1;
    $editorContent = base64_encode($editorContent); 
    $titleContent = base64_encode($titleContent); 

    echo "printed <br>";
    
    // Check whether the editor content is empty
    if(!empty($editorContent)){



        $query =  $conn->query("SELECT * FROM section WHERE secID='$n10' AND portID='$p'");
        
        if($query->num_rows != 0)
        {
            $conn->query("UPDATE section SET secContent='".$editorContent."', secTitle='".$titleContent."'  WHERE secID='$n10' AND portID='$p'");
        }
        else
        {


       
        // Insert editor content in the database
        $insert = $conn->query("INSERT INTO section (secID, secContent, secTitle, secStatus, portID) VALUES ('$n2', '".$editorContent."', '".$titleContent."', True, '$p')");
      
}
}
    }
}
}



////////////////////////////////////////////////////////////////////////////




?>

    </div>
      <!--End of Editing Container-->
      <div
        class="d-sm-flex d-md-flex align-content-center justify-content-sm-center justify-content-md-center"
        style="margin-left:7vw; padding: 10px;"
      >
        <div
          class="btn-group align-content-center"
          role="group"
          style="text-align: center;"
        >

        <script>


          function rmvSec(index){



           index.parentNode.parentNode.previousElementSibling.scrollIntoView() //Focus previous element

           index.parentNode.parentNode.parentNode.removeChild(index.parentNode.parentNode);// Delete this element

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
          var addBtn = document.createElement("button");
          addBtn.type="button";
          addBtn.classList.add('fa');
          addBtn.classList.add('fa-plus');
          addBtn.classList.add('fa-2x');
          addBtn.style.backgroundColor="Transparent";
          addBtn.style.border="none";
          addBtn.setAttribute("onclick","addSec(this)");
          cont.appendChild(addBtn)
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

          
          
        index.parentNode.parentNode.parentNode.insertBefore(all, index.parentNode.parentNode.nextSibling).scrollIntoView();// add new element and focus on it.
          
       

          }
          </script>

<script>
  CKEDITOR.replace('<?php 
          $sel = "SELECT secID FROM section ORDER BY secID DESC LIMIT 1";
          $result = $conn->query($sel);
          $row = $result->fetch_assoc();
          $port = null;
          if($row==null){
            $port = 1;}
              else{
                $port =(int)$row["secID"]+1;}
          echo $port;
          ?>');
</script>

        </div>
      </div>
   
    </div>
    </div>
    
    <!-- Start: Footer Dark -->
    <div class="footer-dark">
      <footer>
        <div class="container">
          <div class="row">
            <!-- Start: Social Icons -->
            <div class="col item social">
              <a href="#"><i class="icon ion-social-facebook"></i></a
              ><a href="#"><i class="icon ion-social-twitter"></i></a
              ><a href="#"><i class="icon ion-social-snapchat"></i></a
              ><a href="#"><i class="icon ion-social-instagram"></i></a>
            </div>
            <!-- End: Social Icons -->
          </div>
          <!-- Start: Copyright -->
          <p class="copyright">Portfoliation © 2020</p>
          <!-- End: Copyright -->
        </div>
      </footer>
    </div>
    <!-- End: Footer Dark -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <script src="assets/js/script.min.js"></script>

    <!--Editor Script-->
    <script>
      var toolbarOptions = [
        [{ font: [] }],
        [{ header: [1, 2, 3, 4, 5, 6, false] }],
        ["bold", "italic", "underline", "strike"], // toggled buttons
        [{ color: [] }, { background: [] }], // dropdown with defaults from theme
        [{ script: "sub" }, { script: "super" }], // superscript/subscript
        ["blockquote", "code-block"],
        [
          { list: "ordered" },
          { list: "bullet" },
          { indent: "-1" },
          { indent: "+1" },
        ],
        [{ direction: "rtl" }, { align: [] }], // text direction
        ["link", "image", "video", "formula"],
        ["clean"], // remove formatting button
      ];

      var quill = new Quill("#editor", {
        modules: {
          toolbar: toolbarOptions,
        },
        theme: "snow",
      });
    </script>
    <script>
    $(document).ready(function() {
      var delay = 1000 * 2;
    setTimeout(function() {
        location.hash = "#editor-container";
    }, delay);
    });

    </script>
  </body>
</php>
