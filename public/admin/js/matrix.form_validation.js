$(document).ready(function(){$('input[type=checkbox],input[type=radio],input[type=file]').uniform();$('select').select2();$("#basic_validate").validate({rules:{required:{required:!0},email:{required:!0,email:!0},date:{required:!0,date:!0},url:{required:!0,url:!0}},errorClass:"help-inline",errorElement:"span",highlight:function(element,errorClass,validClass){$(element).parents('.control-group').addClass('error')},unhighlight:function(element,errorClass,validClass){$(element).parents('.control-group').removeClass('error');$(element).parents('.control-group').addClass('success')}});$("#number_validate").validate({rules:{min:{required:!0,min:10},max:{required:!0,max:24},number:{required:!0,number:!0}},errorClass:"help-inline",errorElement:"span",highlight:function(element,errorClass,validClass){$(element).parents('.control-group').addClass('error')},unhighlight:function(element,errorClass,validClass){$(element).parents('.control-group').removeClass('error');$(element).parents('.control-group').addClass('success')}});$("#password_validate").validate({rules:{pwd:{required:!0,minlength:6,maxlength:20},pwd2:{required:!0,minlength:6,maxlength:20,equalTo:"#pwd"}},errorClass:"help-inline",errorElement:"span",highlight:function(element,errorClass,validClass){$(element).parents('.control-group').addClass('error')},unhighlight:function(element,errorClass,validClass){$(element).parents('.control-group').removeClass('error');$(element).parents('.control-group').addClass('success')}})})