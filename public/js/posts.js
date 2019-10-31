btnNewPost.onclick = function (event) {
	event.preventDefault();
    location.replace("/post");
};

btnClosePost.onclick = function (event) {
	event.preventDefault();
    location.replace("/posts");
};
