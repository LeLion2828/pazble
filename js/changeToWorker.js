 $(document).on("click",'#submiting',function(event){

      var worker = $('#submiting').val();

      //console.log(worker);

      $.ajax({
                url:'changeToWorker.php',
                type:'post',
                data:{
                'worker': worker
                  },
                  success: function(data){
                  console.log(data);

                  location.href = 'speakerboss.php';
                }
             });

            });