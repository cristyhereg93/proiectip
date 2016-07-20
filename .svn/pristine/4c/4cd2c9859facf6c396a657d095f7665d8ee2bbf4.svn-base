
$(document).ready(function () {
    var dps = [];
    var dps2 = [];
    
    //get all Patients
    var params = {"id" : $('#userID').val()};
    $.ajax({
        url: 'src/getAllPatients.php',
        type: 'POST',
        data: params,
        datatype: 'JSON',
        success: function(data){
            if (data != 0)
            {
                var data = $.parseJSON(data);
                    var table = "";
                    table += "<tr><th>Prenume</th> <th>Nume</th> <th>CNP</th> <th>Job</th> <th>Profesie</th> <th>E-Mail</th> <th>Varsta</th> <th>Telefon</th> <th colspan='2'>Actiuni</th> </tr>";
                    $.each(data, function(index,value){
                        dps.push({label: String(value['first_name']), y: 0});         
                        dps2.push({label: String(value['first_name']), y: 0});
                        
                        
                        $('#selectUser').append("<option value='" + index + "'>" + value['first_name'] + "</option>");
                        
                        table += "<tr class='hoverRow'>";
                        $.each(value, function(id, val){
                            table += "<td>" + val + "</td>";
                        });
                        table += "<td><button id='stergePacient' class='stergePacient submit' style='height: 30px;' value='" + index + "'>Sterge</button>";
                        table += "<button id='scrieRecomandare' class='scrieRecomandare submit' style='height: 30px;' value='" + index + "'>ScrieRecomandare</button></td>";
                        table += "<td><button id='vizualizeazaRecomandari' class='vizualizeazaRecomandari submit' style='height: 30px;' value='" + index + "'>VizualizeazaRecomandari</button>";
                        table += "<button id='scrieAlarma' class='scrieAlarma submit' style='height: 30px;' value='" + index + "'>ScrieAlarma</button></td>";
                        table += "</tr>";
                    });
                    
                    $('#loadingGif').html('');
                    $('#hoverTable').html(table);
                        
                    $('.stergePacient').click(function(){
                        var PUserId = $(this).val();
                        $.ajax({
                            url: "src/deletePacient.php",
                            type: "POST",
                            data: {id: PUserId},
                            datatype: 'HTML',
                            success: function (data) {
                                if (data == 1)
                                {
                                    alert('Success !');
                                    location.reload();
                                }
                            }
                        });
                    });
                    
                    $('.scrieRecomandare').click(function(){
                        var PUserId = $(this).val();
                        $('#PUserIDR').val(PUserId);
                        $('#wroteRecomandationForm').show();
                        $('#wroteAlarmForm').hide();
                        $('#historyDiv').hide();
                        $('#addPacientForm').hide();
                        $('#addDoctorForm').hide();
                        $('#pacientsTable').hide();
                        $('#chartContainer').hide();
                        $('#ECGChartContainer').hide();
                    });
                    
                    $('.vizualizeazaRecomandari').click(function(){
                        var PUserId = $(this).val();
                        createAbsoluteDiv('showRecomandations',PUserId);
                    });
                    
                    $('.scrieAlarma').click(function(){
                        var PUserId = $(this).val();
                        $('#PUserIDA').val(PUserId);
                        $('#wroteAlarmForm').show();
                        $('#wroteRecomandationForm').hide();
                        $('#historyDiv').hide();
                        $('#addPacientForm').hide();
                        $('#addDoctorForm').hide();
                        $('#pacientsTable').hide();
                        $('#chartContainer').hide();
                        $('#ECGChartContainer').hide();
                    });
                    
            }
            else
            {
                    $('#loadingGif').html('');
                    $('#hoverTable').html ('No Pacients !');
            }
        }
    });
    
    

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        zoomEnabled:true,
        title: {
            text: "Datele pacientilor",
            margin: 25
        },
        axisX: {
            title: "Datele sunt actualizate la fiecare 2 secunde"
        },
        axisY: {
            title: "Temperatura",
            suffix: " C"
        },
        axisY2: {
            title: "Pulsul",
            suffix: " bpm"
        },
        legend: {
            verticalAlign: 'bottom',
            horizontalAlign: "center"
        },
        data: [
            {
                type: "column",
                bevelEnabled: true,
                showInLegend: true,
                legendText: "Temperatura",
                indexLabel: "{y} C",
                //indexLabelFontColor: "red",
                dataPoints: dps
            },
            {
                type: "column",
                axisYType: "secondary",
                bevelEnabled: true,
                showInLegend: true,
                legendText: "Pulsul",
                indexLabel: "{y} bpm",
                //indexLabelFontColor: "red",
                dataPoints: dps2               
            }
        ],
        legend:{
            cursor:"pointer",
            itemclick: function(e){
              if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
              	e.dataSeries.visible = false;
              }
              else {
                e.dataSeries.visible = true;
              }
            	chart.render();
            }
          },
    });


    var updateInterval = 2000;

    var updateChart = function (data) {

        for (var i = 0; i < dps.length; i++) {

            // generating random variation deltaY
            var boilerColor;

            $.each(data, function (key, value) {
                if (key == 'Temp')
                {
                    $.each (value, function(key1, value1){
                        yVal = value1;
                        label = key1;

                        // color of dataPoint dependent upon y value. 

                        boilerColor =
                                yVal > 38 ? "#FF2500" :
                                yVal >= 37 ? "#6B8E23" :
                                yVal < 37 ? "#12059e" :
                                null;


                        // updating the dataPoint
                        if (dps[i]['label'] == label)
                        {
                            dps[i] = {label: label, y: yVal, color: boilerColor};
                        }
                    }); 
                }else{
                    $.each (value, function(key1, value1){
                        yVal = value1;
                        label = key1;

                        // color of dataPoint dependent upon y value. 

                        boilerColor =
                                yVal > 100 ? "#FF2500" :
                                yVal > 80 ? "#6B8E23" :
                                yVal <= 80 ? "#6B8E23" :
                                null;


                        // updating the dataPoint
                        if (dps2[i]['label'] == label)
                        {
                            dps2[i] = {label: label, y: yVal, color: boilerColor};
                        }
                    }); 
                }
            });

        }
        ;

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
    
    
    
    //change on select
    $('#selectUser').change(function(){
        var PUserId = $(this).val();
        $.ajax({
            url: "src/getHistory.php",
            type: "POST",
            data: {id : PUserId},
            datatype: 'JSON',
            success: function (data) {
                if (data != 0)
                {
                    var json = $.parseJSON(data);

                    var HTable = '<table id="history" class="hoverTable">';
                    HTable += '<tr> <th>Pulsul</th> <th>Temperatura</th> <th>Data</th> <th>Status</th> <tr>';
                    $.each (json, function(index, value){
                        if (value['Status'] == 'Alert')
                        {
                            HTable += '<tr bgcolor="#FF7F7F">';
                        }else{
                            HTable += '<tr>';
                        }
                        HTable += '<td>' + value['PulseValue'] + ' bpm</td><td>' + value['Temperature'] + ' C</td><td>' + value['Date'] + '</td><td>' + value['Status'] + '</td>';
                        HTable += '</tr>';
                    });


                    HTable += '</table>';
                    $('#historyTable').html(HTable);
                }else{
                    $('#historyTable').html("Nu exista inregistrari pentru acest pacient !");
                }
            }
        });
    });

    
    // BUTOANE
    $('#addPacient').click(function(){
        $('#addPacientForm').show();
        $('#addDoctorForm').hide();
        $('#historyDiv').hide();
        $('#pacientsTable').hide();
        $('#chartContainer').hide();
        $('#ECGChartContainer').hide();
        $('#wroteRecomandationForm').hide();
        $('#wroteAlarmForm').hide();
    });
    
    $('#showGraphic').click(function(){
        $('#addPacientForm').hide();
        $('#addDoctorForm').hide();
        $('#wroteRecomandationForm').hide();
        $('#wroteAlarmForm').hide();
        $('#historyDiv').hide();
        $('#pacientsTable').show();
        $('#chartContainer').show();
        $('#ECGChartContainer').show();
    });
    
    $('#addDoctor').click(function(){
        $('#addDoctorForm').show();
        $('#addPacientForm').hide();
        $('#wroteRecomandationForm').hide();
        $('#wroteAlarmForm').hide();
        $('#historyDiv').hide();
        $('#pacientsTable').hide();
        $('#chartContainer').hide();
        $('#ECGChartContainer').hide();
    });  
    
    $('#showHistory').click(function(){
        $('#historyDiv').show();
        $('#addDoctorForm').hide();
        $('#addPacientForm').hide();
        $('#wroteRecomandationForm').hide();
        $('#wroteAlarmForm').hide();
        $('#pacientsTable').hide();
        $('#chartContainer').hide();
        $('#ECGChartContainer').hide();
    });
});
