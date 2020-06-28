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
