<?php
session_start();


$errors = [];

$upfile ='';
$upfile_name = '';
$request_status = 'PENDING';
$purpose ='';
$details = '';
require_once "../../resource/opt1/database.php";

$id =$_GET['request_number'] ?? null;

if (!$id){
    header('Location: resubmit_request.php');
    exit;
}

$statement = $pdo->prepare('SELECT request_number, purpose, details, upfile, upfile_name FROM document_request WHERE request_number = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$requests = $statement->fetch(PDO::FETCH_ASSOC);

// echo '<pre>';
// var_dump($requests);
// echo '</pre>';


$file_dir = $requests['upfile'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //validate
  $upfiles = $_FILES['upfile'] ?? null;
  // echo '<pre>';
  // var_dump($_FILES);
  // echo '</pre>';
  // exit;
  if(empty($errors)){
    if($requests['upfile_name'] != NULL ){
      $arr_name = explode(' ',$requests['upfile_name']);

      for($j = 0; $j < count($arr_name); $j++){
        $dir_file = $requests['upfile'].'/'.$arr_name[$j];
        if(file_exists($dir_file)){
          unlink($dir_file);
        }
        
      }
    }
      
  
    
    if ($upfiles){
      
      if (!is_dir($file_dir)){
        mkdir($file_dir);
      }

      $name_arr = [];
      $tmp_arr = [];
      
      foreach($upfiles['name'] as $key => $up_file) {
        
        $name_arr[$key] = $up_file;
      }
      foreach ($upfiles['tmp_name'] as $key => $up_file){
        $tmp_arr[$key] = $up_file;
        //echo $up_file;
      }
      // foreach($tmp_arr as $name){
      //   echo $name;
      // }
      $upfile = $file_dir;
      for($j = 0; $j < count($upfiles['name']); $j++){
        move_uploaded_file($tmp_arr[$j], $file_dir.'/'.$name_arr[$j]);
        $upfile_name .= $name_arr[$j]." ";
      }
    }
    $statement = $pdo->prepare("UPDATE document_request SET purpose = :purpose, details = :details request_status = :stat, upfile = :upfile, upfile_name = :upfile_name WHERE request_number = :id");

    $statement->bindValue(':purpose', $purpose);
    $statement->bindValue(':details', $details);
    $statement->bindValue(':stat', $request_status);
    $statement->bindValue(':upfile', $upfile);
    $statement->bindValue(':upfile_name', $upfile_name);
    $statement->bindValue(':id', $id);
    $statement->execute();

    header('Location: pending_request.php');
  }
}


require_once "../../resource/opt1/header.php";

?>
<title>Edit Attachments</title>
  </head>
  <body>
<?php require_once "../../resource/opt1/nav.php";?>
<h1>UPDATE REQUEST</h1>
  <form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
      <label>Purpose</label>
      <input type="text" class="form-control" name ="purpose" placeholder="Enter Purpose" value="<?php echo $purpose ?>">
    </div>
    <div class="form-group">
      <label>Details</label>
      <textarea class="form-control" name = "details" placeholder="Enter Details and Indications"><?php echo $details ?></textarea>
    </div>
    <label>File/s</label>
    <div>
    <input type="file" name="upfile[]" id="upfile" class="btn btn btn-outline-dark btn-sm" multiple="multiple">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </body>
</html>
