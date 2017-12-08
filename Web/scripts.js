
$(document).ready(function(){

  $('.password').keyup(function(){
    password = $('#pass').val();
    confirmedPassword = $('#confirmPass').val();
    if(password != confirmedPassword) {
      $(".registrarse").attr('disabled', 'disabled');
    } else {
      $('.registrarse').removeAttr('disabled');
    }
  });

  $('.passEnterprise').keyup(function(){
    password = $('#passEmpresa').val();
    confirmedPassword = $('#passConfirmedEmpresa').val();
    if(password != confirmedPassword) {
      $(".registrarse").attr('disabled', 'disabled');
    } else {
      $('.registrarse').removeAttr('disabled');
    }
  });

  $('#registrarseEmpresa').click(function(){
    password = $('#passEmpresa').val();
    confirmedPassword = $('#passConfirmedEmpresa').val();
    console.log("yayakalala");
    if(password != confirmedPassword) {
      alert("Las constraseñas no son iguales");
    } else {
      passwordValidated = true;
    }
  });

  $('#submit-login').click(function(){
   window.location="employee-mainpage.html";
   console.log("entered click");
  });

});
