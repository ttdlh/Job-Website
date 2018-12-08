if(loginerror){
  $('#login').modal('show');
  document.getElementById("loginerr").style.display= "inline";
}else if(signuperror){
  $('#signup').modal('show');
  document.getElementById("signuperr").style.display= "inline";
}
