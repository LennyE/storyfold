
window.onload = function(){
	document.form.contentsubmit.focus(); // put focus on text input field onload 
	document.getElementById('notificationsound').muted = true;
	document.title="focus";
};



window.onblur = function() {
	document.getElementById('notificationsound').muted = false;
	document.title="blur";
				window.open(document.URL,"_self")

/*
		setTimeout(function(){
		   window.location.reload();
		}, 5000);
*/

};

window.onfocus = function() {
	document.getElementById('notificationsound').muted = true;
	document.title="focus";
};