
{
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