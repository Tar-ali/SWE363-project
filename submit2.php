<?php
require_once 'dbh.inc.php';
$n = 1;
$sel = "SELECT secID FROM section ORDER BY secID DESC LIMIT 1";
$result = $conn->query($sel);
$row = $result->fetch_assoc();
$n2 = null;
if($row==null){
    $n2 = 1;}
    else{
$n2 =(int)$row["secID"];}
$n1 = 200;
$n10 = 1;
for($n10; $n10<100; $n10++, $n2++){

    if(isset($_POST[$n10])){

      
     $n5 = $n10+200;
    $editorContent = $_POST[$n10];

    echo $editorContent;
    if(isset($_POST[$n5])){
    $titleContent = $_POST[$n5];}
    $n1+=1;
    // $editorContent = base64_encode($editorContent); 
    // $titleContent = base64_encode($titleContent); 

    echo "printed <br>";
    
    // Check whether the editor content is empty
    if(!empty($editorContent)){



        $query =  $conn->query("SELECT * FROM section WHERE secID='$n10'");
        
        if($query->num_rows != 0)
        {
            $conn->query("UPDATE section SET secContent='".$editorContent."', secTitle='".$titleContent."'  WHERE secID='$n10'");
        }
        else
        {


       
        // Insert editor content in the database
        $insert = $conn->query("INSERT INTO section (secID, secContent, secTitle, secStatus, portID) VALUES ('$n2', '".$editorContent."', '".$titleContent."', True, '$p')");
      
}
}
    }

}

?>