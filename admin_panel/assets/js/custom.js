function successMessage(text,url)
{
	swal({
	    title: "Good!",
	    text: text,
	    type: "success"
	}).then(function() {
	    window.location = url;
	});
}