<?php

	require __DIR__.'/vendor/autoload.php';

	use Kreait\Firebase\Factory;
	use Kreait\Firebase\ServiceAccount;
	use Kreait\Firebase;

	/**
	*  This class is intended for user creation and profile retrieval
	*/
	class Teacher
	{
		
		function __construct()
		{
			// Initialize firebase 
			$this->serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/google-service-account.json');
			$this->apiKey = 'AIzaSyAbRxSiIbQ9BD0FTYB4-JOICDtzGstGKlI';

			$this->firebase = (new Factory)
			    ->withServiceAccountAndApiKey($this->serviceAccount, $this->apiKey)
			    ->withDatabaseUri('https://eclassrecord-wj.firebaseio.com')
			    ->create();

			$this->database = $this->firebase->getDatabase();
			
		}

		public function CreateProfile()
		{
			extract($_POST);
			$newUser = $this->database
		    ->getReference('users')
		    ->push([
		    	'login'=>
		    	[
		    		'email' => $email,
		    		'password' => $password
			    ],
			    'personal_information'=>
			    [
		    		'first_name' => $first_name,
		    		'last_name' => $last_name,
		    		'grade' => $grade
			    ],
			    'school_information'=>
			    [
		    		'region' => $region,
		    		'division' => $division,
		    		'district' => $district,
		    		'school_name' => $school_name,
		    		'school_id' => $school_id,
			    ]
		    ]);

		    $key = $newUser->getKey();

		    $newSection = $this->database
		    ->getReference('sections')
		    ->push([
		    	'uid' => $key,
		    	'section' => $section,
		    	'academic_year' => $academic_year
		    ]);

		    $user = $this->database->getReference("users/{$key}");
			$profile = $user->getValue();
			unset($profile['login']);
			header("Location: profile.php?user=".json_encode($profile));
			exit;
		}
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$user = new Teacher();
		$user->CreateProfile();
	} 
			
?>