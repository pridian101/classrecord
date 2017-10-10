<?php 

	include 'misc/header.php'; 

	echo "<h3>Profile Information</h3> <br/>";

	$profile = json_decode($_REQUEST['user'], true);

	echo "
		<h4>Personal Information</h4>
		<ul>
			<li>First Name: {$profile['personal_information']['first_name']}</li>
			<li>Last Name: {$profile['personal_information']['last_name']}</li>
			<li>Grade Taught: {$profile['personal_information']['grade']}</li>
		</ul>
		<h4>School Information</h4>
		<ul>
			<li>Region: {$profile['school_information']['region']}</li>
			<li>Division: {$profile['school_information']['division']}</li>
			<li>District: {$profile['school_information']['district']}</li>
			<li>School Name: {$profile['school_information']['school_name']}</li>
			<li>School ID: {$profile['school_information']['school_id']}</li>
		</ul>
	";

	include 'misc/footer.php'; 

?>