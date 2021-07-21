<?php ?>
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <!-- Navbar content -->
  <a class="navbar-brand" href="../student_dashboard.php">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="pending_request.php">Pending List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="resubmit_request.php">Resubmit List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="in_process_request.php">In-Process List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="for_pick_request.php">For Pick-Up List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Logout</a>
      </li>
    </ul>
  </div>
</nav>