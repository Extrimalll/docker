//проверка формы регистрации
function errorReg () {
    var login = $('input[name=loginReg]').val();
    var passwordTwo = $('input[name=passwordTwo]').val();
    var nameUser = $('input[name=nameUser]').val();
    var family = $('input[name=family]').val();
    var age = $('input[name=age]').val();
    if (login = '' || passwordTwo == '' || nameUser == '' || family == '' || age == ''){
        $('#error').show();
        return false;
    }
    return true;
}
$( document ).ready(function() {
    var check = 1;
    //проверка логинов на авторизации и регистрации
    $('input[name=login],input[name=loginReg]').keyup(function() {
        var pswd = $(this).val();
        if ( pswd.length < 8 ) {
            $('#Loglength').removeClass('valid').addClass('invalid');
        } else {
            $('#Loglength').removeClass('invalid').addClass('valid');
        }
        if ( pswd.match(/[A-z]/) ) {
            $('#Logletter').removeClass('invalid').addClass('valid');
        } else {
            $('#Logletter').removeClass('valid').addClass('invalid');
        }
    }).focus(function() {
        $('#pswd_info_log').show();
    }).blur(function() {
        $('#pswd_info_log').hide();
    });
//проверка имени
    $('input[name=nameUser]').keyup(function() {
        var pswd = $(this).val();
        if ( pswd.length < 2 ) {
            $('#Nameletter').removeClass('valid').addClass('invalid');
        } else {
            $('#Nameletter').removeClass('invalid').addClass('valid');
        }
    }).focus(function() {
        $('#pswd_info_user').show();
    }).blur(function() {
        $('#pswd_info_user').hide();
    });
//проверка фамилии
    $('input[name=family]').keyup(function() {
        var pswd = $(this).val();
        if ( pswd.length < 2 ) {
            $('#Famletter').removeClass('valid').addClass('invalid');
        } else {
            $('#Famletter').removeClass('invalid').addClass('valid');
        }
    }).focus(function() {
        $('#pswd_info_family').show();
    }).blur(function() {
        $('#pswd_info_family').hide();
    });
//проверка возраста на наличии 18 лет
    $('input[name=age]').keyup(function() {
        var pswd = parseInt ($(this).val());
        if ( 18 > pswd ) {
            $('#AgeLetter').removeClass('valid').addClass('invalid');
        } else {
            $('#AgeLetter').removeClass('invalid').addClass('valid');
        }
    }).focus(function() {
        $('#pswd_info_age').show();
    }).blur(function() {
        $('#pswd_info_age').hide();
    });
//проверка пароля на англ буквы и минимальную длину 8
    $('input[name=password],input[name=passwordReg]').keyup(function() {
        var pswd = $(this).val();
        if ( pswd.length < 8 ) {
            $('#length').removeClass('valid').addClass('invalid');
        } else {
            $('#length').removeClass('invalid').addClass('valid');
        }
        if ( pswd.match(/[A-z]/) ) {
            $('#letter').removeClass('invalid').addClass('valid');
        } else {
            $('#letter').removeClass('valid').addClass('invalid');
        }
        if($('#number').hasClass('valid') && $('#letter').hasClass('valid') && $('#length').hasClass('valid')){
        blur(function() {
                $('#pswd_info').hide();
            });
        }
    }).focus(function() {
        $('#pswd_info').show();
    }).blur(function() {
        $('#pswd_info').hide();
    });
    //проверка валидности паролей
    $('input[name=passwordTwo]').keyup(function() {
        var pswd = $(this).val();
        var pswdTwo = $('input[name=passwordReg]').val();
        if ( pswd.length < 8 ) {
            $('#lengthTwo').removeClass('valid').addClass('invalid');
        } else {
            $('#lengthTwo').removeClass('invalid').addClass('valid');
        }
        if ( pswd.match(/[A-z]/) ) {
            $('#letterTwo').removeClass('invalid').addClass('valid');
        } else {
            $('#letterTwo').removeClass('valid').addClass('invalid');
        }
        if ( (pswd == pswdTwo) && pswd != '' && pswdTwo !='') {
            $('#repeatTwo').removeClass('invalid').addClass('valid');
            check = true;
        } else {
            $('#repeatTwo').removeClass('valid').addClass('invalid');
        }
        if($('#numberTwo').hasClass('valid') && $('#letterTwo').hasClass('valid') && $('#lengthTwo').hasClass('valid')){
            blur(function() {
                $('#pswd_info').hide();
            });
        }
    }).focus(function() {
        $('#pswd_info_pass').show();
    }).blur(function() {
        $('#pswd_info_pass').hide();
    });

});
//проверка формы авторизации
function error () {
    var name = $('input[name=login]').val();
    var pass = $('input[name=password]').val();
    if (name = '' || pass == ''){
        return false;
    }
    return true;
}
