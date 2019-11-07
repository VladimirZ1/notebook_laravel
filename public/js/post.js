
{
    
    title.oninput = function (event) {
    	removeError(event);
    }

    date.oninput = function (event) {
    	removeError(event);
    }

    function removeError (event) {
    	let idError = event.target.id+"Error";

	    event.target.classList.remove("is-invalid");
	    elem = document.getElementById(idError);

	    if (elem) {
	      elem.remove();
	    }
    }

	btnClosePost.onclick = function (event) {
		event.preventDefault();
	    location.replace("/posts");
	}

	btnDeletePost.onclick = function (event) {
		event.preventDefault();

	     if ( confirm("Вы уверены?") ) {
	     	let val = document.getElementById('idPost').value;
	     	 
	     	location.replace("/postdel/"+val);

	     }
	}

}

