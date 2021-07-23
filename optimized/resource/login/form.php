<?php if(!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <div>
                <?php echo $error ?>
                </div>
            <?php endforeach?>
        </div>
    <?php endif ?>
<form action="" method="post" style="position: absolute; width: 300px; height: 425px; left: 850px; top: 275px; bottom: 200px; filter: drop-shadow(10px 10px 2px rgba(0, 0, 0, 0.25)); background-color: #87CEEB;">
  <h1 style="text-align: center; font-size: 65px; position: absolute; top: 15px; left: 55px;">LOGIN</h1>
  <div class="mb-3">
    <label class="form-label" style="position: absolute; left: 20px; top: 120px;">Student Number</label>
    <input type="text" class="form-control" name="student_number" style="position: absolute; width: 90%; left: 15px; top: 150px;">
    <div class="form-text"></div>
  </div>
  <div class="mb-3">
    <label class="form-label" style="position: absolute; left: 20px; top: 210px;">Password</label>
    <input type="password" class="form-control" name="acc_pass" id="acc_pass" style="position: absolute; width: 90%; left: 15px; top: 240px;">
  </div>
  <div class="mb-3">
    <input type="checkbox" onclick="toggle_pass()" style="position: absolute; left: 20px; bottom: 110px;">&nbsp;
    <label for="form-label" style="position: absolute; left: 40px; bottom: 105px;">Show Password</label>
  </div>
  <button type="submit" class="btn btn-primary" name="login" style="position: absolute; width: 125px; left: 90px; bottom: 20px;">Submit</button>
  <a href="register.php" style="position: absolute; width: 125px; left: 225px; top: 210px; color: black;">Register</a>
</form>
<br>
