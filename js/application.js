$(function(){
  
  $.longpolling({
    pollURL: './get_data.php',
    successFunction: pollSuccess,
    errorFunction: pollError
  });
  
});

function pollSuccess(data, textStatus, jqXHR){
  var json = eval('(' + data + ')');
  $('#response').html(json['data']);

	document.getElementById('notificationsound').play();
  	console.log('filen uppdaterades');

}

function pollError(jqXHR, textStatus, errorThrown){
  console.log('Long Polling Error: ' + textStatus);
}