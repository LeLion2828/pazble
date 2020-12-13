$(document).ready(function(){
    $( "#modal_up" ).click(function() {

        $('#trigger_form_speak_modal').click();
    });
        $( "#whatsup" ).click(function() {
         window.location.href = "newsfeedclient.php";
         console.log('whatsup');
    });
        $( "#profiles" ).click(function() {
         window.location.href = "bossprofile.php";
    });
        $( "#settings" ).click(function() {
         window.location.href = "settingClient.php";
    });
        $( "#jobpage" ).click(function() {
         window.location.href = "job.php";
    });
        $( "#setting" ).click(function() {
         window.location.href = "settingClient.php";
    });
        $( "#logouts" ).click(function() {
         window.location.href = "logout.php";
    });    
});


