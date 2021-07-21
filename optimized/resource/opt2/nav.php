<?php ?>
<!-- This is the navigation bar for registrar_view -->



<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <!-- Navbar content -->
  <a class="navbar-brand" href="../dashboard.php">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="documents/documents.php">Document List</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="pending_list.php">Pending List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="in_process_list.php">In-Process List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="for_pick_list.php">For Pick-Up List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Logout</a>
      </li>
    </ul>
  </div>
</nav>