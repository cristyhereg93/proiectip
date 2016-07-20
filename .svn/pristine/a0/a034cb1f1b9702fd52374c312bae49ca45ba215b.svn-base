$(document).ready(function(){
    var checked = {'username1' : 0, 'username' : 0, 'password' : 0, 'password1' : 0};
    
    $('#username').focusout(function(){
        var params = {'username' : $(this).val() };
        $.ajax({
            url : "src/checkUsername.php",
            datatype : 'html',
            type : 'POST',
            data : params,
            success : function(data){
                if (data == 1)
                {
                    checked['username1'] = 0;
                    $('#username').addClass('error');
                    $('#ERRusername1').html('<font color="red">Username is available !</font>');
                }else{
                    checked['username1'] = 1;
                    $('#username').removeClass('error');
                    $('#ERRusername1').html('<font color="green">Username is available !</font>');
                }
                
            }
        });
    })
   
   
    $('#username').keyup(function(){
        var val = $(this).val();
        if (val.length < 4 || val.length > 16){
            checked['username'] = 0;
            $('#username').addClass('error');
            $('#ERRusername').html('<font color="red">Username must have 4 to 16 characters !</font>');
        }else{
            checked['username'] = 1;
            $('#username').removeClass('error');
            $('#ERRusername').html('<font color="green">Username must have 4 to 16 characters !</font>');
        }
    }); 
    
    $('#password').keyup(function(){
        var val = $(this).val();
        if (val.length < 6 || val.match(/\d+/g) == null || val.match(/[A-Z]/) == null){
            checked['password'] = 0;
            $('#password').addClass('error');
            $('#ERRpassword1').html('<font color="red">Password must contain at least 6 characters, 1 number, 1 upper case !</font>');
        }else{
            checked['password'] = 1;
            $('#password').removeClass('error');
            $('#ERRpassword1').html('<font color="green">Password must contain at least 6 characters, 1 number, 1 upper case !</font>');
        }
    }); 
    
    $('#r_password').keyup(function(){
        var val = $(this).val();
        if (val != $('#password').val()){
            checked['password1'] = 0;
            $('#r_password').addClass('error');
            $('#ERRpassword2').html('<font color="red">Passwords must match !</font>');
        }else{
            checked['password1'] = 1;
            $('#r_password').removeClass('error');
            $('#ERRpassword2').html('<font color="green">Passwords must match !</font>');
        }
    }); 
    
    $('#username,#password,#r_password').keyup(function(){
        if (checked['username1'] && checked['username'] == 1 && checked['password'] == 1 && checked['password1'] == 1)
        {
            $('#submitButton').removeAttr('disabled');
        }else{
            $('#submitButton').attr('disabled', 'true');
        }
    });
    
    
    var checked1 = {'Susername1' : 0, 'Susername' : 0, 'Spassword' : 0, 'Spassword1' : 0};
    
    $('#username1').focusout(function(){
        var params = {'username' : $(this).val() };
        $.ajax({
            url : "src/checkUsername.php",
            datatype : 'html',
            type : 'POST',
            data : params,
            success : function(data){
                if (data == 1)
                {
                    checked1['Susername1'] = 0;
                    $('#username1').addClass('error');
                    $('#SERRusername1').html('<font color="red">Username is available !</font>');
                }else{
                    checked1['Susername1'] = 1;
                    $('#username1').removeClass('error');
                    $('#SERRusername1').html('<font color="green">Username is available !</font>');
                }
                
            }
        });
    })
   
   
    $('#username1').keyup(function(){
        var val = $(this).val();
        if (val.length < 4 || val.length > 16){
            checked1['Susername'] = 0;
            $('#username1').addClass('error');
            $('#SERRusername').html('<font color="red">Username must have 4 to 16 characters !</font>');
        }else{
            checked1['Susername'] = 1;
            $('#username1').removeClass('error');
            $('#SERRusername').html('<font color="green">Username must have 4 to 16 characters !</font>');
        }
    }); 
    
    $('#password1').keyup(function(){
        var val = $(this).val();
        if (val.length < 6 || val.match(/\d+/g) == null || val.match(/[A-Z]/) == null){
            checked1['Spassword'] = 0;
            $('#password1').addClass('error');
            $('#SERRpassword1').html('<font color="red">Password must contain at least 6 characters, 1 number, 1 upper case !</font>');
        }else{
            checked1['Spassword'] = 1;
            $('#password1').removeClass('error');
            $('#SERRpassword1').html('<font color="green">Password must contain at least 6 characters, 1 number, 1 upper case !</font>');
        }
    }); 
    
    $('#r_password1').keyup(function(){
        var val = $(this).val();
        if (val != $('#password1').val()){
            checked1['Spassword1'] = 0;
            $('#r_password1').addClass('error');
            $('#SERRpassword2').html('<font color="red">Passwords must match !</font>');
        }else{
            checked1['Spassword1'] = 1;
            $('#r_password1').removeClass('error');
            $('#SERRpassword2').html('<font color="green">Passwords must match !</font>');
        }
    }); 
    
    $('#username1,#password1,#r_password1').keyup(function(){
        if (checked1['Susername1'] && checked1['Susername'] == 1 && checked1['Spassword'] == 1 && checked1['Spassword1'] == 1)
        {
            $('#submitButton1').removeAttr('disabled');
        }else{
            $('#submitButton1').attr('disabled', 'true');
        }
    });
});