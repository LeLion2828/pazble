$(document).ready(function(){
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const mobile = urlParams.get('mobile');
    if(mobile == 'notExist'){
        $('#form_forget_modal').find('.modal-body').children().remove();
        var p_node = document.createElement("p");
        $(p_node).text(" + " + 'Phone number does not exist');
        $('#form_forget_modal').find('.modal-body').append(p_node);
        $('#trigger_form_forget_modal').click();
    }

    $('#clear_input_register').click(function(){
        $("[input='mobileNum']").val('');
    });
});


