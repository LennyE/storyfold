$(document).ready(function(){
    $('#contentsubmit').keypress(function(e) {
      if(e.which == 13) {
           $('#form')[0].submit();
           // this.form.submit(); // TypeError: object is not a function
		   // document.getElementById("form").submit(); // TypeError: object is not a function
           console.log('log me!');
           e.preventDefault(); // Stops enter from creating a new line
       }
    });
});
