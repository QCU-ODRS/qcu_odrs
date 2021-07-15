<?php
//Student Creates Requests with validation of 1


//error array for blank fields validation
$errors = [];
//empty variable placeholders for empty fields
$student_number ='';
$document_id = '';
$upfile = '2';
$request_date = date('Y-m-d');
$request_status = 'PENDING';

//SQL database connection
$conn = new mysqli('localhost','root', '', 'qcu_ords',3306);
$sql ="SELECT document_name, document_id FROM documents ORDER BY document_id DESC";

//fetching records from database
$result = $conn->query($sql);
while ($row = mysqli_fetch_array($result)){
    $rows[] = $row;
}
//PDO database connection
require_once "../../resource/opt1/database.php";

//check if the information is posting
echo '<pre>';
var_dump($_POST);
echo '</pre>';

//make sure that the request method is 'post'
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //apply validate script
  require_once "../../resource/opt1/validate.php";
//make sure that there are no errors
if(empty($errors)){
//prepare the query and the variable
$statement = $pdo->prepare("INSERT INTO document_request (student_number, document_id, request_date, request_status) VALUES (:student_number, :document_id, :request_date, :request_status)");
//bind values to placeholders
$statement->bindValue(':student_number', $student_number);
$statement->bindValue(':document_id', $document_id);
$statement->bindValue(':request_date', $request_date);
$statement->bindValue(':request_status', $request_status);
//$statement->bindValue(':upfile', $upfile);
$statement->execute();
//go back to dashboard
header('Location: pending_request.php');
    }
}

//refer header
require_once "../../resource/opt1/header.php";
//refer navigation bar
require_once "../../resource/opt1/nav.php";
?>






<!-- contents -->
<h1>NEW REQUEST</h1>
<!-- refer form -->
<?php include_once "../../resource/opt1/form.php"; ?>
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
    <label>Date</label>
    <div>
      <input type="text" name="request_date" value="<?php echo $request_date; ?>" disabled>
      </div>
    <div>
      <input type="text" name="request_status" value="<?php echo $request_status; ?>" disabled hidden>
    </div>
    <br />
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <script>
    function changeValue(){
      Document.getElementID();
    }
  </script>
  </body>
</html>
