$(registerPage) .click(function(){

 $(myRegistrationForm) .show('slow');

});



$(registerPage) .click(function(){

    $(myLoginForm,myForgotPw).hide('fast');
   
   
   });
   


$(loginPage) .click(function(){

    $(myLoginForm) .show('slow');
   
   });



   
$(loginPage) .click(function(){

  $(myRegistrationForm,myForgotPw).hide('fast');
    
   
   
   });




   $(forgotPwPage) .click(function(){

    $(myForgotPw) .show('slow');
   
   });


   
   $(forgotPwPage) .click(function(){

    $(myLoginForm, myRegistrationForm).hide('fast');
    
 
   });



function deleteconfig(){
   var del = confirm("Are you sure you want to delete");

   if (del==true) {

     alert ('Record Delete');
   }else{

    alert('Record Not deleted');
   }

   return del;
}


 