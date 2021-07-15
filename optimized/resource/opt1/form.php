<?php if(!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <div>
                <?php echo $error ?>
                </div>
            <?php endforeach?>
        </div>
    <?php endif; ?>

  <form action="" method="post">
    <div class="form-group">
      <label>Student Number</label>
      <input type="text" class="form-control" name="student_number" placeholder="Enter Student Number" value="<?php echo $student_number ?>">
    </div>
    <label>Document Name</label>
    <select class="form-select" aria-label="Default select example" name="document_id">
      <option selected disabled>--Select One--</option>
      <?php
      // while ($row = mysqli_fetch_array($result)){
      //   unset($id,$name);
      //   $id = $row['document_id'];
      //   $name = $row['document_name'];
      //   echo '<option value="'.$row['document_id'].'">'.$row['document_name'].'</option>"';
      // }
      ?>
      