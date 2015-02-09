	$("#qweqwe").click(function() {	
/* $('#form').on('submit',function() { */
    var http = new XMLHttpRequest();
    http.open("POST", "data.php", true);
    http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    var params = "search=" + document.getElementById(contentsubmit); // probably use document.getElementById(...).value
    http.send(params);
    http.onload = function() {
        alert(http.responseText);

    }
});
