;let forms = (function() {
  let bodyOnLoad = function () {
    document.querySelector('form').addEventListener('input', removeError);
    
    btnReg.onclick = function (event) {
      onClickBtnReg(event);
    };
    btnLogin.onclick = function (event) {
      onClickBtnLogin(event);
    };
  
  };


	let createElem = function (name,attributes,...args) {
	  let el = document.createElement(name);

		if (typeof attributes === 'object') {

      for (let key in attributes) {
        el.setAttribute(key, attributes[key]);
      }

    }
    
    for (let arg of args) {
      el.append(arg);
    }        
	  
	  return el;
	};

  
  let onClickBtnReg = function (event){
    let newRegForm = createElem("form", {id    : "regForm",class : "form-group row justify-content-center"},
                        createElem("input", {type : "hidden", name : "_token", id : "token"}),
                        createElem("div", {class : "col-8 col-sm-6 col-md-4 col-lg-3"},
                          createElem("input", {class : "form-control", id : "name", name : "name", placeholder : "Логин"}),
                          createElem("input", {class : "form-control mt-1", id : "password1", name : "password1", placeholder : "Пароль", type : "password"}),
                          createElem("input", {class : "form-control mt-1", id : "password2", name : "password2", placeholder : "Повтор пароля", type : "password"}),
                          createElem("input", {class : "form-control mt-1", id : "email", name : "email", placeholder : "Email", type : "email"}),
                          createElem("button", {class : "btn btn-success btn-block mt-2", id : "btnReg2", type : "submit"})
                        )
                       );

    document.getElementById("loginForm").remove(); 
    document.getElementsByTagName("main")[0].prepend(newRegForm);
    document.getElementById("btnReg2").innerHTML = "ЗАРЕГИСТРИРОВАТЬСЯ";
    document.querySelector('form').addEventListener('input', removeError);
    let csrf = document.getElementById("csrf_token").value;
    document.getElementById("token").value = csrf; 
    btnReg2.onclick = function (event) {
      reg(event);
    };

  }; 

  let removeError = function (event) {
    let idError = event.target.id+"Error";

    event.target.classList.remove("is-invalid");
    elem = document.getElementById(idError);

    if (elem) {
      elem.remove();
    }

  };

  let onClickBtnLogin = async (event) => {
    event.preventDefault();
    document.querySelectorAll('.invalid-feedback').forEach(function(element){ element.remove(); });
    document.querySelectorAll('.is-invalid').forEach(function(element){ element.classList.remove('is-invalid'); });

    let response = await fetch('/login', { 
      method  : 'POST',
      body    : new FormData(loginForm)
    });

    if (response.ok) {
      location.replace("/posts");
    } else if (response.status === 401)
      {
        let json = await response.json();

        for (let key in json) {

          for (let prop in json[key]) {
            addError(key,json[key][prop]);
          }

        }

      } else {
        addError('name',"Ошибка HTTP: " + response.status);
      }
  };

  let reg = async  function  (event) {
    event.preventDefault();
    document.querySelectorAll('.invalid-feedback').forEach(function(element){ element.remove(); });
    document.querySelectorAll('.is-invalid').forEach(function(element){ element.classList.remove('is-invalid'); });


    let response = await fetch('/register', { 
      method  : 'POST',
      body    : new FormData(regForm)
    });

    if (response.ok) {
      location.replace("/posts");
    } else if (response.status === 401) {
        let json = await response.json();

        for (let key in json) {

          for (let prop in json[key]) {
            addError(key,json[key][prop]);
          }

        }

      } else {
        addError('name',"Ошибка HTTP: " + response.status);
      }
  };

  let addError = function(id,text) {
     let elem = document.getElementById(id),
         idErrr = id+"Error";

     elem.classList.add('is-invalid');
     elem.after( createElem('div',{class : "invalid-feedback", id : idErrr, style : "display : flex;"}) );
     document.getElementById(idErrr).textContent = text;
  };

  return {

  	createElem      : createElem,
  	onClickBtnReg   : onClickBtnReg,
    bodyOnLoad      : bodyOnLoad,
    onClickBtnLogin : onClickBtnLogin,
    reg             : reg
	  
  };

})();