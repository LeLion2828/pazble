$(document).on("click",'#submiting',function(event){

        var client = $('#submiting').val();

      //console.log(worker);

      $.ajax({
        url:'changeToBoss.php',
        type:'post',
        data:{
          'client': client
        },
        success: function(data){
          console.log(data);

          location.href = 'bossprofile.php';
        }
      });

    });