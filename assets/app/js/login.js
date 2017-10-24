$.ajax({
	url: <?=base_url()?>,
	type: 'GET',
})
.done(function() {
	console.log("success");
})
.fail(function() {
	console.log("error");
})
.always(function() {
	console.log("complete");
});
console.log('')