<?php
//Student Creates Requests with validation of 1


//error array for blank fields validation
$errors = [];
//empty variable placeholders for empty fields
$student_number ='';
$document_id = '';
$remarks = '';
$upfile ='';
$request_status = 'PENDING';
$request_date = date('Y-m-d H:i:s');

//SQL database connection
$conn = new mysqli('localhost','root', '', 'qcu_ords',3306);
$sql ="SELECT document_name FROM documents ORDER BY document_id DESC";

//fetching records from database
$result = $conn->query($sql);
while ($row = mysqli_fetch_array($result)){
    $rows[] = $row;
}
//PDO database connection
require_once "../../opt1/database.php";

//check if the information is posting
echo '<pre>';
var_dump($_POST);
echo '</pre>';

//make sure that the request method is 'post'
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //apply validate script
  require_once "../../opt1/validate.php";
//make sure that there are no errors
if(empty($errors)){
//prepare the query and the variable it
$statement = $pdo->prepare("INSERT INTO document_request (student_number, document_id, request_date, request_status, remarks, upfile) VALUES (:student_number, :document_id, :request_date, :request_status, :remarks, :upfile)");
//bind values to placeholders
$statement->bindValue(':student_number', $student_number);
$statement->bindValue(':document_id', $document_id);
$statement->bindValue(':reuest_date', $request_date);
$statement->bindValue(':request_status', $request_status);
$statement->bindValue(':remarks', $remarks);
$statement->bindValue(':upfile', $upfile);
$statement->execute();
//go back to dashboard
header('Location: pending_requests.php');
    }
}

//refer header
require_once "../../opt1/header.php";
//refer navigation bar
require_once "../../opt1/nav.php";
?>






<!-- contents -->
<h1>NEW REQUEST</h1>
<!-- refer form -->
<?php include_once "../../opt1/form.php"; ?>
<!-- document records (options) fetched from the database -->
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
