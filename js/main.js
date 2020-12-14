$(document).ready(function(){
    $("[name='form_register_submit']").click(function(event){
        event.stopImmediatePropagation();
        $('#form_register_modal').find('.modal-body').children().remove();

        $("[data-input-validation=true]").each(function(index, node){
            var is_valid = validate_input($(node).attr('data-type'), $(node).val());

            if(!is_valid || ($(node).val() == '')){
                var p_node = document.createElement("p");
                $(p_node).text(" + " + $(node).attr('data-error'));
                $('#form_register_modal').find('.modal-body').append(p_node);
                $('#trigger_form_register_modal').click();
            }
        });

        if($('#form_register_modal').find('.modal-body').children().length == 0)
             $('[name=form_register]').submit();
    });

    $("#clear_input_register").click(function(){
        $("[data-input-validation=true]").each(function(index, node){
            $(node).val('');
        });
    });

    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const reg = urlParams.get('reg');

    if(reg == 'exist'){
        $('#form_register_modal').find('.modal-body').children().remove();
        var p_node = document.createElement("p");
        $(p_node).text(" + " + 'Phone number already exist');
        $('#form_register_modal').find('.modal-body').append(p_node);
        $('#trigger_form_register_modal').click();
    }

    const log = urlParams.get('log');
    const login = urlParams.get('login');
    const phone = urlParams.get('phone');
    const check = urlParams.get('check');

    if(log == 'error'){
        $('#form_register_modal').find('.modal-body').children().remove();
        var p_node = document.createElement("p");
        $(p_node).text(" + " + 'Invalid username or password');
        $('#form_register_modal').find('.modal-body').append(p_node);
        $('#trigger_form_register_modal').click();
    }
    if(login == 'empty'){
        $('#form_register_modal').find('.modal-body').children().remove();
        var p_node = document.createElement("p");
        $(p_node).text(" + " + 'Phone Number and password cannot be empty');
        $('#form_register_modal').find('.modal-body').append(p_node);
        $('#trigger_form_register_modal').click();
    }
    if(phone == 'numbervalue'){
        $('#form_register_modal').find('.modal-body').children().remove();
        var p_node = document.createElement("p");
        $(p_node).text(" + " + 'Invalid Format for Phone Number');
        $('#form_register_modal').find('.modal-body').append(p_node);
        $('#trigger_form_register_modal').click();
    }
    if(check == 'success'){
        $('#form_success_modal').find('.modal-body').children().remove();
        var p_node = document.createElement("p");
        $(p_node).text(" + " + 'You have successfully registered');
        $('#form_success_modal').find('.modal-body').append(p_node);
        $('#trigger_form_success_modal').click();
    }
});

//validate_input, client side validation
function validate_input(type, value){
    //object having different regex pattern for each input type
    const regex = {
        username: /^[a-zA-Z]+$/,
        password: /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*?])(?=.{8,})/,
        email: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
        phone: /^5[0-9]{7}/,
        // construct a regex from the previous password field
        confirm_password: new RegExp($("[name='pwd']").val())
    };

    //throws an error if the input type does not have a regex pattern
    if(!regex.hasOwnProperty(type))
        throw `Given input type does not exist, type: ${type}`;

    //if field empty, evaluate the field as valid else test for regex pattern
    return (value == '')?true:regex[type].test(value);
}

function toggle_input_state(input, state){
    //always remove previously injected element
    $(input).parent().find('.error').remove();
    $(input).data('input_valid', true);

    if(!state){
        var error_node = document.createElement('p');
        $(error_node).addClass('error');
        $(error_node).text($(input).attr('data-error'));
        $(input).parent().append(error_node);
        $(input).data('input_valid', false);
    }
}

function form_valid (form){
    var bools = [];

    $(form).find('input').each(function(index, node){
        //Used the double-not operator to type cast the values to boolean
        bools.push(!!$(node).data('input_valid'));
    });

    //evaluate the array (input state transformed as boolean based on validity)
    for(const bool of bools){
        if(!bool){
            return false;
        }
    }

    return true;
}



// new one


// $(function () {
//   $('[data-toggle="tooltip"]').tooltip()
// })