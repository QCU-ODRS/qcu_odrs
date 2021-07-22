<?php ?>
</div id="request_list">
<table class="table" style="position: absolute; width: 1825px; left: 40px; top: 300px; filter: drop-shadow(10px 10px 2px rgba(0, 0, 0, 0.25)); background-color: #87CEEB; text-align: center; background-color: #87CEEB;">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date</th>
      <th scope="col">Student Number</th>
      <th scope="col">Last Name</th>
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
        <td><?php echo $request['last_name']?></td>
        <td><?php echo $request['document_name']?></td>
        <td>
        <a href="<?php echo $view.$request['request_number'] ?>"  class="btn btn-sm btn-outline-primary">View Details</a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
</div>