
$(document).ready(function () {
    $.ajax({
        url: "viewRecomandations.php",
        type: 'GET',
        data: {p: $('#userID').val()},
        datatype: 'HTML',
        success: function(data){
            $('#pacientsTable').html(data);
        }
    });
    
    
    var dps = [{label: "Temperature", y: 0},{label: "Pulse", y: 0}];
    
    //get all Patients
    var params = {"id" : $('#userID').val()};
    
    var chart = new CanvasJS.Chart("chartContainer", {
        title: {
            text: "Temperatura si Pulsul dumneavoastra"
        },
        axisY: {
            suffix: ""
        },
        legend: {
            verticalAlign: 'bottom',
            horizontalAlign: "center"
        },
        data: [
            {
                type: "column",
                bevelEnabled: true,
                indexLabel: "{y}",
                dataPoints: dps
            }
        ]
    });


    var updateInterval = 2000; //secunde de update

    var updateChart = function (data) {
        
        for (var i = 0; i < dps.length; i++) {

            // generating random variation deltaY
            var boilerColorT;
            var boilerColorP;
                
                    // color of dataPoint dependent upon y value. 

                    boilerColorT =
                            data['Temp'] > 39 ? "#FF2500" :
                            data['Temp'] > 37 ? "#FF6000" :
                            data['Temp'] <= 37 ? "#6B8E23" :
                            null;
                    
                    boilerColorP =
                            data['Pulse'] > 100 ? "#FF0000" :
                            null;


                    // updating the dataPoint
                    if (dps[i]['label'] == "Temperature")
                    {
                        dps[i] = {label: 'Temperatura(Celsius)', y: data['Temp'], color: boilerColorT};
                    }else if (dps[i]['label'] == "Pulse")
                    {
                        dps[i] = {label: "Pulsul(bps)", y: data['Pulse'], color: boilerColorP};
                    }
            
        };

        chart.render();
    };


    // update chart after specified interval 
    setInterval(function() {
        $.ajax({
            url: 'getDBdata.php',
            type: "POST",
            data: params,
            datatype: 'JSON',
            success: function (data) {
                var json = $.parseJSON(data);          
                updateChart(json);
            }
        });
    }, updateInterval);

    
    //Ascunde grafic la incarcarea paginii
    $('#chartContainer').hide();
    $('#pacientsTable').hide();
    
    // Afiseaza grafic la selectarea optiunii si ascundere galeria de fotografii
    $('#showGraph').click(function() {
        $("#chartContainer").show();
        $('#pacientsTable').hide();
        $('#galleryContainer').hide();
        $('#video').hide();
        $('#info').hide();
    });
    
    // Afiseaza Tabel la selectarea optiunii si ascundere galeria de fotografii
    $('#diagnostice').click(function() {
        $("#pacientsTable").show();
        $("#chartContainer").hide();
        $('#galleryContainer').hide();
        $('#video').hide();
        $('#info').hide();
    });
    
    
    
});
