<?php

    require __DIR__.'/vendor/autoload.php';

    use Kreait\Firebase\Factory;
    use Kreait\Firebase\ServiceAccount;
    use Kreait\Firebase;

    /**
    *  This class is intended for user creation and profile retrieval
    */
    class Profile
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
            ->getReference('sections/-Kw4FQ-gTP9R1PKZ3Uwa/students')
            ->push([
                'lrn' => $lrn,
                'first_name' => $first_name,
                'middle_name' => $middle_name,
                'last_name' => $last_name
            ]);

        }

        function ShowStudents()
        {
            $reference = $this->database->getReference('sections/-Kw4FQ-gTP9R1PKZ3Uwa/students');
            $studentprofile = $reference->getValue(); 
            return json_encode($studentprofile);
        }

        public function DeleteSudent()
        {   
            extract($_REQUEST);
            $reference = "sections/-Kw4FQ-gTP9R1PKZ3Uwa/students/".$key;
            $this->database->getReference($reference)->remove();

        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        # code...
    
        $profile = new Profile();
        $profile->CreateProfile();
    } elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        $profile = new Profile();
        $profile->DeleteSudent();
    } else {
        $profile = new Profile();
        $profile->ShowStudents();
    }

            
?>