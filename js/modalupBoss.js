$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip()
    $( "#modal_up" ).click(function() {

        $('#trigger_form_speak_modal').click();
    });
        $( "#whatsup" ).click(function() {
         window.location.href = "speakerboss.php";
         console.log('whatsup');
    });
        $( "#profiles" ).click(function() {
         window.location.href = "ProfileBoss.php";
    });
        $( "#settings" ).click(function() {
         window.location.href = "#";
    });
        $( "#jobpage" ).click(function() {
         window.location.href = "#";
    });
        $( "#setting" ).click(function() {
         window.location.href = "#";
    });
        $( "#logouts" ).click(function() {
         window.location.href = "logout.php";
    });    
});
