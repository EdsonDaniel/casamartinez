showHomeModal();


var dropdown = document.getElementsByClassName("boton");
var i;
var icon;
for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var btn = this.lastElementChild;
  icon = btn.firstElementChild;
  icon.classList.toggle("fa-minus");
  icon.classList.toggle("fa-plus");
  
  var dropdownContent = this.nextElementSibling;
  btn = dropdownContent.firstElementChild;
  var alt = btn.offsetHeight;
  alt += 6;
  alt = alt+"px";
  /*console.log(alt);
  console.log(dropdownContent.style.height);*/
  if (dropdownContent.style.height === "") {
    console.log(alt);
  dropdownContent.style.height = alt;
  } else {
  dropdownContent.style.height = "";
  }
  });
}

function showHomeModal(){
  if (!localStorage.getItem('mayorEdad')) {
    $("#modalHome").modal({
      keyboard: false,
      backdrop: 'static'
    });
  }
}

function openNav() {
  var head = document.getElementById("head");
  var wh = document.getElementById("wh-bg");
  var ancho = screen.width;
  if(ancho<650){
    document.getElementById("mySidenav").style.width = "100%";
  }else{
    document.getElementById("mySidenav").style.width = "400px";
  }
  
  document.getElementById("topbar").style.display = "none";

  var ancho = screen.width;
  console.log(ancho);

  if(head != null){
    head.className = "body-transparent";
  }
  document.getElementsByClassName("app-container")[0].className = "app-container body-transparent";
  /*if(wh){
    wh.className = "body-transparent";
  }else{
    document.getElementById("bl-bg").className = "body-transparent";
  } */    
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("topbar").style.display = "block";

  var head = document.getElementById("head");
  var wh = document.getElementById("wh-bg");
  if(head != null){
    head.className = "";
  }
  //document.body.className = "body-black";  
  document.getElementsByClassName("app-container")[0].className = "app-container";
  /*if(wh != null){
    wh.className = "";
  }else{
    document.getElementById("bl-bg").className = "";
  }*/
}


  function saltarA(id, tiempo) {
    var tiempo = tiempo || 1000;
    var width = screen.width;
    
    if(width >760){
      $("html, body").animate({ scrollTop: $(id).offset().top }, tiempo);
      return;
    }

    var height = screen.height;
    if (width < 550) {
      /*console.log("alto: "+ height);*/
      var coord = height*0.1;
      //console.log("coor: "+ coord);
      //console.log("top: "+$(id).offset().top);
      $("html, body").animate({ scrollTop: $(id).offset().top - coord }, tiempo);
      return;
    }

    if(width >= 550 && width<760){
      var coord = height*0.12;
      $("html, body").animate({ scrollTop: $(id).offset().top - coord }, tiempo);
      return;
    }
}

