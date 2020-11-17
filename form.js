$(document).ready(function(){
    $("#form").submit(function(){
    let t = $(this);
    $.ajax({
        url: 'mail.php',
        type: 'POST',
        data: t.serialize()
    }).done(function(){
        alert("ok");
        setTimeout(function(){
            t.trigger("reset");
        }, 2000);
    });
    return false;
    });
});

    /*let email = $("#email").val().trim();
    let name = $("#name").val().trim();
    let message = $("#message").val().trim();

    if(email == ""){
        $("#error").text("Введіть електронну адресу");
        return false;
    }else if(name == ""){
        $("#error").text("Введіть ім'я");
        return false;
    }else if(message == ""){
        $("#error").text("Введіть повідомлення");
        return false;
    }
    $("#error").text("");*/
    
    
    /*$.ajax({
        url: 'ajax/mail.php',
        type: 'POST',
        cache: false,
        data: { 'name': name, 'email': email, 'message': message },
        dataType: 'html',
        beforeSend: function(){
            $("#sendMessage").prop("disabled", true);
        },
        success:  function(){
            $("#sendMessage").prop("disabled", false);
        }
    })*/
