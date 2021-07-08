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
    <label>Document Title</label>
    <input type="text" class="form-control" name="title" placeholder="Enter Title" value="<?php echo $title ?>">
  </div>
  <div class="form-group">
    <label>Requirements</label>
    <textarea class="form-control" name="requirements" placeholder="Enter Requirements"><?php echo $requirements ?></textarea>
  </div>
  <br />
  <button type="submit" class="btn btn-primary">Submit</button>
    </form>