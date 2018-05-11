$(document).ready(function(){
            $('#btn_submit').click(function(){
                if($(this).closest('form')[0].checkValidity()){
                    event.preventDefault();
                    }
                var user_name    = $('#user_name').val();
                var user_email   = $('#user_email').val();
                $.ajax({
                    url: "send.php",
                    type: "post",
                    dataType: "json",
                    data: {
                        "user_name":    user_name,
                        "user_email":   user_email
                    },
                    success: function(data){
                        $('.btn').html(data.result);
                        if(data.result === "<span>successfully sended</span>"){
                            jQuery('form')[0].reset();
                        }
                    }
                });
            });
        });
