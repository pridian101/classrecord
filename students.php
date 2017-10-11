<?php 
require_once( 'student_profile.php' );
$s=new Profile();
$sprofile = json_decode($s -> ShowStudents(), true);

include 'misc/header.php' ?>

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>LRN</th>
				<th colspan="2">Student</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($sprofile as $key => $value) {
					echo "
						<tr><td> {$value['lrn']} </td>
						<td> {$value['last_name']}, {$value['first_name']} {$value['middle_name']} </td>
						<td>
							<button class='open-details-modal' data-toggle='modal' 
								lrn='{$value['lrn']}' href='#myModal' data-target='#myModal'>Delete</button>
						</td></tr>";

				}
			?>
		</tbody>
	</table>

	<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lrn">Delete this record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        LRN:
        <br>
        First name:
        <br>
        Middle name:
        <br>
        Last name:
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Delete</button>
      </div>
    </div>
  </div>
</div>

    <form class="login-form" id="studentForm">
			      <input type="text" name="lrn" id="lrn" placeholder="Student LRN"/>
			      <input type="text" name="first_name" id="first_name" placeholder="First Name"/>
			      <input type="text" name="middle_name" id="middle_name" placeholder="Middle Name"/>
			      <input type="text" name="last_name" id="last_name" placeholder="Last Name"/>
			      <button type="submit" id="saveStudent">Add student</button>
			    </form>


<script>
$(document).ready(function() {
  $("#saveStudent").click(function(){
    var lrn = $("#lrn").val();
    var first_name = $("#first_name").val();
    var middle_name = $("#middle_name").val();
    var last_name = $("#last_name").val();

    var student= {};
    student.lrn = lrn;
    student.first_name = first_name;
    student.middle_name = middle_name;
    student.last_name = last_name;

    console.log(JSON.stringify(student));

    $.ajax
    ({
      type: "POST",
      dataType : 'json',
      async: true,
      url: 'student_profile.php',
      data: student,
      success: function () {console.log("Thanks!"); },
      failure: function() {console.log("Error!");}
    });
  });
}); 
</script>

<?php include 'misc/footer.php' ?>
