<?php if(!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <div>
                <?php echo $error ?>
                </div>
            <?php endforeach?>
        </div>
    <?php endif ?>

<form action="" method="post" style="position: absolute; width: 1000px; height: 500px; left: 475px; top: 250px; bottom: 200px; filter: drop-shadow(10px 10px 2px rgba(0, 0, 0, 0.25)); background-color: #87CEEB;">
    <h1 style="text-align: center; font-size: 65px; position: absolute; top: 15px; left: 57.5px;">REGISTER ACCOUNT</h1>    
    <label>Student Number</label>
    <div>
    <input type="text" class="form-control" style="position: absolute; width: 32.5%; left: 15px; top: 150px;" name="student_number" placeholder="Enter Student Number" value="<?php echo $student_number ?>">
    </div>
    <label>Password</label>
    <div>
    <input type="password" class="form-control" style="position: absolute; width: 32.5%; left: 15px; top: 150px;" name="acc_password" id="acc_pass" placeholder="Enter Password" value="<?php echo $acc_password ?>">
    </div>
    <div class="mb-3">
    <input type="checkbox" onclick="toggle_pass()">&nbsp;Show Password
    </div>
    <label>Confirm Password</label>
    <div>
    <input type="password" class="form-control" style="position: absolute; width: 32.5%; left: 15px; top: 150px;" name="confirm_pass" placeholder="Confirm Password" value="<?php echo $confirm_pass ?>">
    </div>
    
    <label>Last Name</label>
    <div>
    <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" value="<?php echo $last_name ?>">
    </div>
    <label>First Name</label>
    <div>
    <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" value="<?php echo $first_name ?>">
    </div>
    <label>Middle Name</label>
    <div>
    <input type="text" class="form-control" name="middle_name" placeholder="Enter Middle Name" value="<?php echo $middle_name ?>">
    </div>
    <label>Course</label>
    <div>
    <select class="form-select" name="course">
        <option selected value ="default">--Select One--</option>
        <option value="BSIT">Bachelor of Science in Information Technology</option>
        <option value="BSENT">Bachelor of Science in Entrepreneurship</option>
        <option value="BSEE">Bachelor of Science in Electronic Engineering</option>
        <option value="BSIE">Bachelor of Science in Industrial Engineering</option>
        <option value="BSA">Bachelor of Science in Accountancy</option>
        <option value="SHS">Senior High School</option>
        <option value="GENED">General Education</option>
        <option value="TECHVOC">Technical Vocational</option>
    </select>
    </div>
    <label>Year of Admission</label>
    <div>
    <input type="text" class="form-control" name="year_of_enrollment" placeholder="Enter Year" value="<?php echo $year_of_enrollment ?>">
    </div>
    <div hidden>
    <input type="text" class="form-control" name="date_created"  value="<?php echo date('Y-m-d') ?>" >
    </div>

    <br />
    
    <button type="submit" class="btn btn-primary" style="position: absolute; left: 475px; bottom: 10px;">Submit</button>
    
</form>