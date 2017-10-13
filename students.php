<?php 
require_once( 'student_profile.php' );
$s=new Student();
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
				if (!empty($sprofile)) {
					foreach ($sprofile as $key => $value) { 
			?>
						<tr>
							<td> <?php echo $value['lrn']; ?> </td>
							<td> <?php echo $value['last_name'].', '.$value['first_name'].' '.$value['middle_name']; ?> </td>
						<td>
							<p id="hiddenkey" hidden><?php echo $key; ?></p>
							<button class='button' data-toggle='modal' data-id=<?php echo $value['lrn']; ?> data-fname=<?php echo $value['first_name']; ?> data-lname=<?php echo $value['last_name']; ?> data-key=<?php echo $key; ?> href='#myModal' data-target='#myModal'>Delete
							</button>
						</td></tr>

			<?php 	}
				}	
			?>
		</tbody>
	</table>

	<form action="test.php">
		<input type='hidden' name='test' value='123'>
		<button>Submit</button>
	</form>

	<!-- Button trigger modal -->
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h6 class="modal-title">Delete student record</h6>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
			 <table class="table table-bordered">
			 	<tbody>
			        <tr>
			        	<td style="font-weight: bold; width: 30%">Student LRN: </td>
			        	<td id="blrn"> </td>
			        </tr>
			        <tr>
			        	<td style="font-weight: bold; width: 30%">Key: </td>
			        	<td id="skey"> </td>
			        </tr>
			        <tr>
			        	<td style="font-weight: bold; width: 30%">Student name: </td>
			        	<td id="sname"> </td>
			        </tr>
			    </tbody>   	
			</table> 
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	        <button type="button" class="btn btn-primary" id="delete">Delete</button>
	      </div>
	    </div>
	  </div>
	</div>

    <form id="studentForm">
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
    student.create=true;
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
<script>
$(document).ready(function() {
$('#myModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var lrn = button.data('id')
  var fname = button.data('fname')
  var lname = button.data('lname')
  var key = button.data('key')
  var modal = $(this)
  modal.find('.modal-body #blrn').text(lrn)
  modal.find('.modal-body #skey').text(key)
  modal.find('.modal-body #sname').text(lname + ', ' + fname)

  var student= {};
    student.delete=true;
    student.key = key;

    console.log(JSON.stringify(student));

$('#delete').click(function(){
  $.ajax
    ({
      type: "POST",
      dataType : 'json',
      async: true,
      url: 'student_profile.php',
      data: student,
      success: function () {console.log("Success!");},
      failure: function() {console.log("Error!");}
    });
    $('#delete').modal('toggle');
    window.location.reload(true);
    });
});
}); 
</script>

<?php include 'misc/footer.php' ?>