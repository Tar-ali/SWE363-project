<!DOCTYPE html>
<html>
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

<script>



   function checkfor(){
//     const formr = document.getElementById('form')
//     const errorElement = document.getElementById('di')
//     formr.addEventListener('submit', (e)=>{
// let masg =[]

var num2 = 1;
var num22 = '';
var num3 = 20;
var num33 = '';
    for(num2; num2<20; num2++, num3++){
      num22 = ''+num2
      num33 = ''+num3
      if(document.getElementById(num22)){
        if(document.getElementById(num22).value=="" || document.getElementById(num33).value==""){
         
         alert("Fill the content/s of empty section/s")
          return false;
        }

    //     if (messages.length > 0) {
    // e.preventDefault()
    // errorElement.innerText = messages.join(', ')
  } else {break;}

}
    }

    // })
   



  // }
</script>

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
            <a class="navbar-brand" href="home.html">Portfoliation</a
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
                  <a class="nav-link" href="home.html">Home</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" href="account.html">Account</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" href="about.html">About</a>
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
        <form id="form" method="post" action="" style="width: 80%; margin: auto;">
          <input style="margin-right:0 ;" id="sub" class="btn btn-primary" type="submit" name="submit" value="SUBMIT"/> 
          <button class="btn btn-primary" type="button"  onclick="myFunction()">
            CANCELE
          </button><br><br><br>

          <div id="di">
          
         <label style="font-size: xx-large" for="">Add title: <textarea style="width: 80% " name="20" id="20" cols="" rows="1"></textarea></label>
          <textarea name="1" id="1" rows="10" cols="80" required></textarea>


        
            <div style="margin:18px 0;">        
            <button type="button" style="background-color:transparent;border:none" onclick="addSec(this)" class="fa fa-plus fa-2x"></button>
              <button type="submit" value="Delete" name="40" id="40" style="background-color:transparent;border:none" onclick="rmvSec(this);"  class="fa fa-minus fa-2x"></button></div>
          </div>
  
          <input style="margin-right:0 ;" id="sub" class="btn btn-primary" type="submit" onsubmit="return checkfor()" name="submit" value="SUBMIT"/> 
          <button class="btn btn-primary" type="button"  onclick="myFunction()">
            CANCELE
          </button>
         
          
        </form>
      
        <?php

include 'submit.inc.php';
include 'delete.inc.php';

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

// include 'submit.inc.php';
include 'delete.inc.php';

?>
          }

          </script>

          <script>
        var c = 1;
        var c1 = 20;
        var c2 = 40;
        var cr = "";
        var cr1 ="";
        var cr2 ="";
   
          function addSec(index) {
        c+=1;
        c1+=1;
        c2+=1;
        cr = "" + c;
        cr1 = "" + c1;
        cr2 = "" + c2;
          // var node = document.createElement("section");
          // var dv = document.createElement("div");
          // var dv1 = document.createElement("div");

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



          // document.getElementById('di').appendChild(tex);
          // CKEDITOR.replace("cr");

          // //  dv.setAttribute("id", "toolbar");
          // // dv1.setAttribute("id","<'edi" + num + "'>");
          // dv1.setAttribute("id",cr);
          // dv1.style.background="#f5fffa";
          // dv1.style.height="57vh";
          
          
          // all.appendChild(dv1);
          
          
        index.parentNode.parentNode.parentNode.insertBefore(all, index.parentNode.parentNode.nextSibling).scrollIntoView();// add new element and focus on it.
          
       
  
  //  var quill = new Quill("#<'edi" + num + "'>", {
    // var quill = new Quill(cr1, {
     
    //     modules: {
          
    //       toolbar: toolbarOptions,
    //     },
    //     theme: "snow",
        
    //   });
      // cr+=1;
      // cr1+=1;
          }
          </script>

<script>
  CKEDITOR.replace("1");
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
</html>
