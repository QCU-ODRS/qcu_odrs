<?php ?>
</div id="request_list">
<table class="table" style="position: absolute; width: 1825px; left: 40px; top: 300px; filter: drop-shadow(10px 10px 2px rgba(0, 0, 0, 0.25)); background-color: #87CEEB; text-align: center;">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date</th>
      <th scope="col">Student Number</th>
      <th scope="col">Full Name</th>
      <th scope="col">Course</th>
      <th scope="col">Year of Admission</th>
      <th scope="col">Document Name</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  <?php foreach ($requests as $i => $request): ?>
      <tr>
        <th scope="row"><?php echo $i + 1 ?></th>
        <td><?php echo $request['request_date']?></td>
        <td><?php echo $request['student_number']?></td>
        <td><?php echo $request['full_name']?></td>
        <td><?php echo $request['course']?></td>
        <td><?php echo $request['year_of_enrollment']?></td>
        <td><?php echo $request['document_name']?></td>
        <td>
        <a href="view.php?request_number=<?php echo $request['request_number'] ?>"  class="btn btn-sm btn-outline-primary">View</a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
</div>