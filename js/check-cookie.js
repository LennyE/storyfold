var checkCookie = function() {

    var lastCookie = document.cookie; // 'static' memory between function calls

    return function() {

        var currentCookie = document.cookie;

        if (currentCookie != lastCookie) {

            // something useful like parse cookie, run a callback fn, etc.
/*             alert('A new cookie has been set'); */

/* 	    		window.location.href = 'index.php?id=<?php echo $id; ?>'; */
/* 	    		window.location.href = 'http://localhost/~lenny/'; */ // could possibly be pointed to a startpage or something that explains why the previous session ended and has a list of the ~six last games played – maybe that should be in some kind of sidebar menu instead though.
				window.location.reload();

/*
			if (confirm('Are you sure you want to start a new game?')) {
			    window.location.reload();
			} else {

			}
*/
            lastCookie = currentCookie; // store latest cookie
        }
    };
}();

window.setInterval(checkCookie, 100); // run every 100 ms
