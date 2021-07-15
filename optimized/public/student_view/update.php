<?php


$errors = [];

$student_number ='';
$document_id = '';
$remarks = '';
$upfile ='';
$request_status = 'PENDING';

$conn = new mysqli('localhost','root', '', 'qcu_ords',3306);
$sql ="SELECT document_name FROM documents ORDER BY document_id DESC";
$result = $conn->query($sql);
while ($row = mysqli_fetch_array($result)){
    $rows[] = $row;
}

require_once "../../resource/opt1/database.php";

$id =$_GET['request_number'] ?? null;

if (!$id){
    header('Location: pending_request.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM document_request WHERE request_number = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$requests = $statement->fetch(PDO::FETCH_ASSOC);
echo '<pre>';
var_dump($_POST);
echo '</pre>';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require_once "../../opt1/validate.php";
  
if(empty($errors)){
$statement = $pdo->prepare("INSERT INTO document_request (student_number, document_id, request_date, request_status, remarks, upfile) VALUES (:student_number, :document_id, :request_date, :request_status, :remarks, :upfile)");

$statement->bindValue(':student_number', $student_number);
$statement->bindValue(':document_id', $document_id);
$statement->bindValue(':reuest_date', $request_date);
$statement->bindValue(':request_status', $request_status);
$statement->bindValue(':remarks', $remarks);
$statement->bindValue(':upfile', $upfile);
$statement->execute();

header('Location: pending_requests.php');
    }
}


require_once "../../opt1/header.php";
require_once "../../opt1/nav.php";
?>

<h1>UPDATE REQUEST&nbsp;<b><?php echo $requests['request_number'] ?></b> </h1>
<?php include_once "../../opt1/form.php"; ?>
        <?php foreach ($rows as $row):
         echo '<option value="'.$row['document_id'].'">'.$row['document_name'].'</option>';
        endforeach; ?> 
    </select>
    </div>
    <label>File/s</label>
    <div>
    <button type="button" class="btn btn btn-outline-dark btn-sm"><span>Up</span>load</button>
    </div>
    <br />
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </body>
</html>
