<?php if(!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <div>
                <?php echo $error ?>
                </div>
            <?php endforeach?>
        </div>
<?php endif; ?>

  <form action="" method="post" enctype="multipart/form-data"> 
    <div class="form-group">
      <label>Student Number</label>
      <input type="text" class="form-control" placeholder="Enter Student Number" value="<?php echo $student_number ?>" disabled>
    </div>
    <label>Document Name</label>
    <div>
    <select class="form-select" aria-label="Default select example" name="document_id" onchange="change_value()">
    
      <option selected value = "default">--Select One--</option>
      <?php
      // while ($row = mysqli_fetch_array($result)){
      //   unset($id,$name);
      //   $id = $row['document_id'];
      //   $name = $row['document_name'];
      //   echo '<option value="'.$row['document_id'].'">'.$row['document_name'].'</option>"';
      // }
      ?>
      