<?php if(!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <div>
                <?php echo $error ?>
                </div>
            <?php endforeach?>
        </div>
    <?php endif ?>
<form action="" method="post">
  <div class="mb-3">
    <label class="form-label">Student Number</label>
    <input type="text" class="form-control" name="student_number">
    <div class="form-text"></div>
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="acc_pass" id="acc_pass">
  </div>
  <div class="mb-3">
    <input type="checkbox" onclick="toggle_pass()">&nbsp;Show Password
  </div>
  <button type="submit" class="btn btn-primary" name="login">Submit</button>
</form>
<br>
<a href="register.php">Register</a>