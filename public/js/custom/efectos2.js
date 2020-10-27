showHomeModal();

function showHomeModal(){
  if (!localStorage.getItem('mayorEdad')) {
    $("#modalHome").modal({
      keyboard: false,
      backdrop: 'static'
    });
  }
}

$("#btn-confirm-edad").click( function(){
  localStorage.setItem("mayorEdad", "true");
  $("#modalHome").modal('hide');
});

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

function openNav() {
  //var head = document.getElementById("head");
  //var wh = document.getElementById("wh-bg");
  var ancho = screen.width;
  if(ancho<650){
    document.getElementById("mySidenav").style.width = "100%";
  }else{
    document.getElementById("mySidenav").style.width = "400px";
  }
  
  $("#loading-wrapper").addClass("d-none");
  $("#backdrop").removeClass("d-none").addClass("body-transparent show");
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  $("#loading-wrapper").removeClass("d-none");
  $("#backdrop").removeClass("body-transparent show").addClass("d-none");
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
