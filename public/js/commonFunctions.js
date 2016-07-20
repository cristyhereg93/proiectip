    createAbsoluteDiv = function(buttonVal, id){
            if (!$('#absoluteDiv').length)
            {
                $('body').append('<div id="absoluteDiv" class="absoluteDiv">\n\
                                    <p><div id="xButton" class="xButton"><img  src="../public/img/x.png"/></div></p> <br/>\n\
                                    <div id="absoluteDivContent" style=""></div>\n\
                                  </div>');
                
                $('#absoluteDivContent').css('height', '80%');
                
                $('#xButton').click(function(){ //close button event
                    $('#absoluteDiv').animate(
                            {opacity: '0', width: '0%', height: '0%'}, //properties
                            'slow', //duration
                            function(){  // third param is a callback function
                                $('#absoluteDiv').remove();
                            }
                    ); 
                });
                
                if ($(window).width()>980){
                    $('#absoluteDiv').animate({opacity: '1', width: '60%', height: '80%'}, "slow"); // show absolute Div
                }else if ($(window).width()<=480){
                    $('#absoluteDiv').animate({opacity: '1', width: '90%', height: '80%'}, "slow");
                }else if ($(window).width()<=700){
                    $('#absoluteDiv').animate({opacity: '1', width: '70%', height: '80%'}, "slow");
                }else if ($(window).width()<=980){
                    $('#absoluteDiv').animate({opacity: '1', width: '60%', height: '50%'}, "slow");
                }

                if (buttonVal == "showRecomandations")
                {
                    $.ajax({
                        url: "viewRecomandations.php",
                        type: 'GET',
                        data: {p: id},
                        datatype: 'HTML',
                        success: function(data){
                            $('#absoluteDivContent').html(data);
                            
                            $('.stergeRecomandare').click(function(){
                                $.ajax({
                                     url: "src/deleteRecomandation.php",
                                     type: "POST",
                                     data: {id: $(this).val()},
                                     datatype: 'JSON',
                                     success: function (data) {
                                         if (data == 1)
                                         {
                                            alert("Success !");
                                            $('#xButton').click();
                                         }
                                     }
                                }); 
                            });
                        }
                    });
                }
            }
    }