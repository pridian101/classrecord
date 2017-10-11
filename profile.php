<?php 

	include 'misc/header.php'; 

	$profile = json_decode($_REQUEST['user'], true);

	echo "

		<div class='card' style='width:50%'>
			<div class='card-header'>
				<div class='row'>
					<div class='col-10'><p style='font-weight:bold'>Personal Information</p></div>
					<div class='col'><button>Edit</button></div>
				</div>
			</div>

			<div class='card-body'>
				<table class='table table-bordered'>
					<tbody>
						<tr>
							<td style='width:40%; font-weight:bold'>First Name: </td>
							<td>{$profile['profile']['personal_information']['first_name']}</td>
						</tr>
						<tr>	
							<td>Last Name: 
							<td>{$profile['profile']['personal_information']['last_name']}</td>
						</tr>
						<tr>
							<td>Grade Taught: 
							<td>{$profile['profile']['personal_information']['grade']}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<br>
		<div class='card' style='width:50%'>
			<div class='card-header'>
				<div class='row'>
					<div class='col-10'><p style='font-weight:bold'>School Information</p></div>
					<div class='col'><button>Edit</button></div>
				</div>
			</div>
			<div class='card-body'>
				<table class='table table-bordered'>
					<tbody>
						<tr>
							<td style='width:40%'>Region: 
							<td>{$profile['profile']['school_information']['region']}</td>
						</tr>
						<tr>
							<td>Division: 
							<td>{$profile['profile']['school_information']['division']}</td>
						</tr>
						<tr>
							<td>District: 
							<td>{$profile['profile']['school_information']['district']}</td>
						</tr>
						<tr>
							<td>School Name: 
							<td>{$profile['profile']['school_information']['school_name']}</td>
						</tr>
						<tr>
							<td>School ID: 
							<td>{$profile['profile']['school_information']['school_id']}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	";

	include 'misc/footer.php'; 

?>