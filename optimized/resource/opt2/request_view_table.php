<?php ?>
</div id="request_list">
<table class="table">
  <thead class="table-dark">
    <tr>
      <th scope="col"><button>#</button></th>
      <th scope="col"><button>Date</button></th>
      <th scope="col"><button>Student Number</button></th>
      <th scope="col"><button>Full Name</button></th>
      <th scope="col"><select><option selected>Course/option></select</th>
      <th scope="col"><select><option selected>Year</option></select></th>
      <th scope="col"><select><option selected>Document Name</option></select></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($requests as $i => $request): ?>
      <tr class="clickable text-center" onclick="window.location='php/?request_id=<?php echo $requests['request_id'] ?>'">

        <th scope="row"><?php echo $i + 1 ?></th>
        <td><?php echo $request['request_date']?></td>
        <td><?php echo $request['student_number']?></td>
        <td><?php echo $request['full_name']?></td>
        <td><?php echo $request['course']?></td>
        <td><?php echo $request['year_of_enrollment']?></td>
        <td><?php echo $request['document_name']?></td>

      </tr>
    <?php endforeach ?>
  </tbody>
</table>
</div>