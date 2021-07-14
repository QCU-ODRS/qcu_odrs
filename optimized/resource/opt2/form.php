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
      <option disabled selected>--Select One--</option>
      <?php foreach ($rows as $row):?>
      <option value="<?php echo $row['document_id'] ?>"><?php echo $row['document_name'] ?></option>
      <?php endforeach; ?>
    </select>
    </div>
    <br />
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>