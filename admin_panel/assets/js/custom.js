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
function warningMessage(text,url)
{
	swal({
	    title: "",
	    text: text,
	    type: "warning"
	}).then(function() {
	    window.location = url;
	});
}