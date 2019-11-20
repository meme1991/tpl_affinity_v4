/**
 * @Author: SPEDI srl
 * @Date:   25-02-2018
 * @Email:  sviluppo@spedi.it
 * @Last modified by:   SPEDI srl
 * @Last modified time: 27-02-2018
 * @License: GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @Copyright: Copyright (c) SPEDI srl
 */

 function validUsername(){
   //var num   = new RegExp('[a-zA-Z-_]+[0-9]+', 'i');
   var exp = new RegExp("((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[_-]).{6,20})");
   //var upper = new RegExp('[A-Z]');
   var username = $('#jform_username').val();
   if(exp.test(username)){
     $('#jform_username').removeClass('is-invalid');
     $('#jform_username').addClass('is-valid');
     //return true;
   }
   else{
     $('#jform_username').removeClass('is-valid');
     $('#jform_username').addClass('is-invalid');
     //return false;
   }
 }

 function validPassword(){
   //var num   = new RegExp('[a-zA-Z-_]+[0-9]+', 'i');
   var exp = new RegExp("((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[_-]).{6,20})");
   //var upper = new RegExp('[A-Z]');
   var password1 = $('#jform_password1').val();
   if(exp.test(password1)){
     $('#jform_password1').removeClass('is-invalid');
     $('#jform_password1').addClass('is-valid');
     //return true;
   }
   else{
     $('#jform_password1').removeClass('is-valid');
     $('#jform_password1').addClass('is-invalid');
     //return false;
   }
 }

 function validPasswordConfirm(){
   //var num   = new RegExp('[a-zA-Z-_]+[0-9]+', 'i');
   //var exp = new RegExp("((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[_-]).{6,20})");
   //var upper = new RegExp('[A-Z]');
   var password1 = $('#jform_password1').val();
   var password2 = $('#jform_password2').val();
   if(password1 == password2){
     $('#jform_password2').removeClass('is-invalid');
     $('#jform_password2').addClass('is-valid');
     //return true;
   }
   else{
     $('#jform_password2').removeClass('is-valid');
     $('#jform_password2').addClass('is-invalid');
     //return false;
   }
 }

 function validEmail(){
   var exp = new RegExp("^([a-z0-9_.-]+)@([0-9a-z.-]+)\.([a-z.]{2,6})$");
   var email1 = $('#jform_email1').val();
   if(exp.test(email1)){
     $('#jform_email1').removeClass('is-invalid');
     $('#jform_email1').addClass('is-valid');
     //return true;
   }
   else{
     $('#jform_email1').removeClass('is-valid');
     $('#jform_email1').addClass('is-invalid');
     //return false;
   }
 }

 function validEmailConfirm(){
   var email1 = $('#jform_email1').val();
   var email2 = $('#jform_email2').val();
   if(email1 == email2){
     $('#jform_email2').removeClass('is-invalid');
     $('#jform_email2').addClass('is-valid');
     //return true;
   }
   else{
     $('#jform_email2').removeClass('is-valid');
     $('#jform_email2').addClass('is-invalid');
     //return false;
   }
 }

 jQuery(document).ready(function($){

     var forms = $('#member-registration');
     // Loop over them and prevent submission
     var validation = Array.prototype.filter.call(forms, function(form) {
       form.addEventListener('submit', function(event) {
         if(grecaptcha.getResponse() == ''){
           event.preventDefault();
           event.stopPropagation();
         }else{
           if (form.checkValidity() === false) {
             event.preventDefault();
             event.stopPropagation();
           }
           form.classList.add('was-validated');
         }
       }, false);
     });

 })
