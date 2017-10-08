(function () {
	var config = {
		apiKey: "AIzaSyAbRxSiIbQ9BD0FTYB4-JOICDtzGstGKlI",
		authDomain: "eclassrecord-wj.firebaseapp.com",
		databaseURL: "https://eclassrecord-wj.firebaseio.com",
		projectId: "eclassrecord-wj",
		storageBucket: "",
		messagingSenderId: "330072311646"
	};
	firebase.initializeApp(config);

	// Elements
	const txtEmail = document.getElementById('txtEmail');
	const txtPassword = document.getElementById('txtPassword');
	const signup = document.getElementById('signup');

	// Signup
	signup.addEventListener('click', e => {
		// Get email and password
		const email = txtEmail.value;
		const password = txtPassword.value;
		firebase.auth().createUserWithEmailAndPassword(email, password).catch(function(error) {
			// Handle Errors here.
			var errorCode = error.code;
			var errorMessage = error.message;
		});
	});

	// Add realtime listener
	firebase.auth().onAuthStateChanged(firebaseUser => {
		if (firebaseUser) {
			console.log(firebaseUser);
			location.href = "create_profile.php";
		} else {
			console.log('not logged in');
		}
	});
}());