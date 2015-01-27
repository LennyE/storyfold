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
/*   $('#response').html(obj.data_from_file); */
  console.log('filen uppdaterades');
/*   alert('filen uppdaterades'); */

}

function pollError(jqXHR, textStatus, errorThrown){
  console.log('Long Polling Error: ' + textStatus);
}