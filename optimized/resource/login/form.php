<?php if(!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <div>
                <?php echo $error ?>
                </div>
            <?php endforeach?>
        </div>
    <?php endif ?>
<form action="" method="post" style="position: absolute; width: 300px; height: 400px; left: 850px; top: 275px; bottom: 200px; filter: drop-shadow(10px 10px 2px rgba(0, 0, 0, 0.25)); background-color: #87CEEB;">
  <div class="mb-3">
    <label class="form-label">Student Number</label>
    <input type="text" class="form-control" name="student_number">
    <div class="form-text"></div>
  </div>
  <div class="mb-3">
    <label class="form-label" style="position: absolute; left: 20px; top: 180px;">Password</label>
    <input type="password" class="form-control" name="acc_pass" id="acc_pass" style="position: absolute; width: 90%; left: 15px; top: 210px;">
  </div>
  <div class="mb-3">
    <input type="checkbox" onclick="toggle_pass()" style="position: absolute; left: 20px; bottom: 130px;">&nbsp;
    <label for="form-label" style="position: absolute; left: 40px; bottom: 125px;">Show Password</label>
  </div>
  <button type="submit" class="btn btn-primary" name="login" style="position: absolute; width: 125px; left: 90px; bottom: 20px;">Submit</button>
</form>
<br>
<a href="register.php">Register</a>