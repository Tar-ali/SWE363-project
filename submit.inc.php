<?php
// Include the database configuration file
require_once 'dbh.inc.php';

$editorContent = $statusMsg = "";
     $titleContent = "";

$n = 1;
$n1 = 200;

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
$row = $result->fetch_assoc();
$port = null;
if($row==null){
    $port = 1;}
    else{
$port =(int)$row["secID"];}




// If the form is submitted
if(isset($_POST['submit'])){
    // Get editor content
    // $editorContent = $_POST['editor'];

    for($n2; $n2<100; $n1++, $n2++){

    if(isset($_POST[$n2])){
    $editorContent = $_POST[$n2];
    if(isset($_POST[$n1])){
    $titleContent = $_POST[$n1];}
    $editorContent = base64_encode($editorContent); 
    $titleContent = base64_encode($titleContent); 

    echo "printed <br>";
    
    // Check whether the editor content is empty
    if(!empty($editorContent)){



        $query =  $conn->query("SELECT * FROM section WHERE secID='$n2' AND portID='$port'");
        
        if($query->num_rows != 0)
        {
            $conn->query("UPDATE section SET secContent='".$editorContent."', secTitle='".$titleContent."'  WHERE secID='$n2' AND portID='$port'");
        }
        else
        {


       
        // Insert editor content in the database
        $insert = $conn->query("INSERT INTO section (secID, secContent, secTitle, secStatus, portID) VALUES ('$n2', '".$editorContent."', '".$titleContent."', True, '$port')");
        

        // If database insertion is successful
    //     if($insert){
    //         $statusMsg = "The editor content has been inserted successfully.";
    //     }else{
    //         $statusMsg = "Some problem occurred, please try again.";
         
    //  }
}
}
    }
}
}
?>