
$('form.delete-object').submit(function(e) {

	var deleteConfirmed = confirm('Are you sure you want to delete this?!');

	// if "true", submission will be processed
	// if "false", submission will be halted
	return deleteConfirmed;

});

// toggle comment edit forms when "edit" buttons are clicked
$('.edit-object').click(function(e) {
	var $commentItem = $(this).closest('li');
	var $commentForm = $commentItem.find('form.edit-object-form');
	$commentForm.toggleClass('hide');
});