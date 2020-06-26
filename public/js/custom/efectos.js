function openNav() {
  var head = document.getElementById("head");
  var wh = document.getElementById("wh-bg");
  var ancho = screen.width;
  if(ancho<900){
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
  //document.body.className = "body-transparent";
  if(wh != null){
    wh.className = "body-transparent";
  }else{
    document.getElementById("bl-bg").className = "body-transparent";
  }     
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
  if(wh != null){
    wh.className = "";
  }else{
    document.getElementById("bl-bg").className = "";
  }
}


  function saltarA(id, tiempo) {
    var tiempo = tiempo || 1000;
      $("html, body").animate({ scrollTop: $(id).offset().top }, tiempo);
}

function openClose(boton){

  /*var dropdown = document.getElementsByClassName("boton");
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
  alt = alt+"px"
  console.log(alt);
  console.log(dropdownContent.style.height);
  if (dropdownContent.style.height === "") {
    console.log(alt);
  dropdownContent.style.height = alt;
  } else {
  dropdownContent.style.height = "";
  }
  */
  /*console.log("lo llame " + boton.nodeName);
  var parrafo = boton.nextElementSibling;
  parrafo = parrafo.lastElementChild;*/
  /*element.classList.toggle("mystyle");*/
}