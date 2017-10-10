<?php 
require_once( 'student_profile.php' );
$s=new Profile();
$sprofile = json_decode($s -> ShowStudents(), true);
include 'misc/header.php' ?>

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>LRN</th>
				<th>Student</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($sprofile as $key => $value) {
					echo "<tr><td> {$value['lrn']} </td>";
					echo "<td> {$value['last_name']}, {$value['first_name']} {$value['middle_name']} </td></tr>";
				}
			?>
		</tbody>
	</table>

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