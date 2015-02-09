window.onload = function(){
	document.form.contentsubmit.focus(); // put focus on text input field onload 
	document.getElementById('notificationsound').muted = true;
	document.title="focus";
};


window.onblur = function() {
	document.getElementById('notificationsound').muted = false;
	document.title="blur";

/*
		setTimeout(function(){
		   window.location.reload();
		}, 5000);
*/

};

window.onfocus = function() {
	document.getElementById('notificationsound').muted = true;
	document.title="focus";
	window.location.reload(); // extra measure to prevent two tabs seemingly pointing to different currentID's // might cause double submission of data
};