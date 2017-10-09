<?php

	require __DIR__.'/vendor/autoload.php';

	use Kreait\Firebase\Factory;
	use Kreait\Firebase\ServiceAccount;

	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/google-service-account.json');
	$apiKey = 'AIzaSyAbRxSiIbQ9BD0FTYB4-JOICDtzGstGKlI';

	$firebase = (new Factory)
	    ->withServiceAccountAndApiKey($serviceAccount, $apiKey)
	    ->withDatabaseUri('https://eclassrecord-wj.firebaseio.com')
	    ->create();

    $database = $firebase->getDatabase();

	extract($_POST);

	$newUser = $database
    ->getReference('users')
    ->push([
    	'first_name' => $first_name,
		'last_name' => $last_name,
		'grade' => $grade,
		'email' => $email,
		'password' => $password,
		'region' => $region,
		'division' => $division,
		'district' => $district,
		'school_name' => $school_name,
		'school_id' => $school_id,
		'section' => $section,
		'academic_year' => $academic_year
    ]);
?>