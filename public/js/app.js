
$('form.delete-object').submit(function(e) {

	var deleteConfirmed = confirm('Are you sure you want to delete this?!');

	// if "true", submission will be processed
	// if "false", submission will be halted
	return deleteConfirmed;

});