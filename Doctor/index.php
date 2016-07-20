<!DOCTYPE html>
<html>
	<head>
		<title>HearTracking</title>
                <script type="text/javascript" src="../public/libraries/jquery-2.1.4.js"></script>
                <script type="text/javascript" src="../public/libraries/canvasjs/canvasjs.min.js"></script>
                
                <script src="../public/libraries/menu/dist/js/jquery.mmenu.min.js" type="text/javascript"></script>
                <link href="../public/libraries/menu/dist/css/jquery.mmenu.css" type="text/css" rel="stylesheet" />
                
                <!-- Custom CSS -->
                <link href="customCSS/style.css" type="text/css" rel='stylesheet'/>
                <link href="customCSS/forms.css" type="text/css" rel="stylesheet"/>
                <!---------------->
                
                <!-- Custom JS -->
                <script type="text/javascript" src="../public/js/commonFunctions.js"></script>
                <script type="text/javascript" src="customJS/core.js"></script>
                <script type="text/javascript" src='customJS/menu.js'></script>
                <script type="text/javascript" src="customJS/checkRegister.js"></script>
                <!--------------->
                <style>
                    html, body {
                        height: 100%;
                        margin: 0;
                        font-size: 20px;
                    }
                    
                    #chartContainer{
                        width: 98%;
                        margin-left: 2%;
                    }
                    .hoverTable{
                        font-size: small; 
                        width:100%; 
                        border-collapse:collapse; 
                    }
                    .hoverTable td{ 
                        padding:7px; border:#4e95f4 1px solid;
                    }
                    .absoluteDiv{
                        overflow-y: scroll;
                        border: 1px solid #a1a1a1; 
                        border-radius: 25px; 
                        z-index: 1; 
                        position: absolute; 
                        background: black; 
                        opacity: 0; 
                        width: 0%; 
                        height: 0%; 
                        top: 11%; 
                        left: 20%;
                        right: 30%;
                        text-align:center;
                    }
                    .xButton{
                        cursor: pointer; 
                        position: relative; 
                        float: right; 
                        right: 10px;
                    }
                    .success
                    {
                        border:1px solid green;
                    }

                    .error
                    {
                        border:1px solid red;
                    }

                </style>
	</head>
	<body>
            <?php
                session_start();
                if (!isset($_SESSION['SESS_USER']))
                {
                    header('location: ../index.php');
                }
            ?>
            
            <div id='page'>
                <div class="header">
                    <a href="#menu"></a>
                    HearTracked
                </div>
                
                <nav id='menu'>
                      
                      <ul>
                        <?php if ($_SESSION['SESS_ROLE'] == 0) { echo "<li> <a id='addDoctor' href='#'>Adauga Doctor</a></li>"; } ?>
                        <li><a id='addPacient' href="#" value="AdaugaPacient">Adauga Pacient</a></li>
                        <li><a id="showGraphic" href="#">Vezi Grafice</a></li>
                        <li><a id="showHistory" href="#">Vezi Istoric</a></li>
                        <li><a href="../index.php">Log Out !</a></li>
                      </ul>
                </nav>

                <input id="userID" type="text" value="<?php echo $_SESSION['SESS_ID']; ?>" hidden="true"/>
                
                <div class="content">
                    <div id="addPacientForm" align="center" hidden="true">
                            <table align="center" >
                            <form method="POST" action="src/addNewPacient.php">
                                <input id="DUserID" name="DUserID" type="text" value="<?php echo $_SESSION['SESS_ID']; ?>" hidden="true"/>
                                <tr>
                                    <td align="center"><font color='black'><h4>Adauga Pacient</h4></font><hr/></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name ="FirstName" id ="FirstName" placeholder="Prenume" aria-describedby="basic-addon1"/></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name ="LastName" id ="LastName" placeholder="Nume" aria-describedby="basic-addon1"/></td>
                                </tr>
                                <tr>
                                    <td><input type="email" name ="EMail" id ="EMail" placeholder="E-Mail" aria-describedby="basic-addon1"/></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name ="CNP" id ="CNP" placeholder="CNP" aria-describedby="basic-addon1"/></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name ="Job" id ="Job" placeholder="Job" aria-describedby="basic-addon1"/></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name ="Profession" id ="Profession" placeholder="Profesie" aria-describedby="basic-addon1"/></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name ="Phone" id ="Phone" placeholder="Telefon" aria-describedby="basic-addon1"/></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name ="Age" id ="Age" placeholder="Varsta" aria-describedby="basic-addon1"/></td>
                                </tr>
                                <tr><td><hr/></td></tr>
                                <!-- Adresa -->
                                <tr>
                                    <td><input type="text" name ="StreetName" id ="StreetName" placeholder="Strada" aria-describedby="basic-addon1"/></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name ="StreetNumber" id ="StreetNumber" placeholder="Numar" aria-describedby="basic-addon1"/></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name ="City" id ="City" placeholder="Oras" aria-describedby="basic-addon1"/></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name ="Country" id ="Country" placeholder="Tara" aria-describedby="basic-addon1"/></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name ="PostalCode" id ="PostalCode" placeholder="Cod Postal" aria-describedby="basic-addon1"/></td>
                                </tr>
                                <tr><td><hr/></td></tr>
                                <!-- Login -->
                                <tr>
                                    <td><input type="text" name ="Username" id ="username" placeholder="Utilizator" aria-describedby="basic-addon1"/></td>
                                </tr>  
                                <tr>
                                    <td><input type="password" id="password" name="password" placeholder="Parola" aria-describedby="basic-addon1" /></td>
                                </tr>
                                <tr>
                                    <td><input type="password" id="r_password" name="r_password" placeholder="Repeta Parola" aria-describedby="basic-addon1" /></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="right"><input class="submit" id="submitButton" type="submit" value="Adauga" disabled="true"/></td>
                                </tr>

                            </form>
                            </table><br/>
                                <div id="ErrList" align="center">
                                    <li id="ERRusername1"><font color="red">Username is available !</font></li>
                                    <li id="ERRusername"><font color="red">Username must have 4 to 16 characters !</font></li>
                                    <li id="ERRpassword1"><font color="red">Password must contain at least 6 characters, 1 number, 1 upper case!</font></li>
                                    <li id="ERRpassword2"><font color="red">Passwords must match !</font></li>
                                </div>
                    </div>
                    
                    <div id="addDoctorForm" align="center" hidden="true">
                        <table align="center" >
                            <form method="POST" action="src/addNewDoctor.php">
                                <tr>
                                    <td align="center"><font color='black'><h4>Adauga Doctor</h4></font><hr/></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name ="FirstName" id ="FirstName" placeholder="Prenume" aria-describedby="basic-addon1"/></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name ="LastName" id ="LastName" placeholder="Nume" aria-describedby="basic-addon1"/></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name ="Function" id ="Function" placeholder="Functie" aria-describedby="basic-addon1"/></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name ="Hospital" id ="Hospital" placeholder="Spital" aria-describedby="basic-addon1"/></td>
                                </tr>
                                <tr><td><hr/></td></tr>
                                <!-- Login -->
                                <tr>
                                    <td><input type="text" name ="Username" id ="username1" placeholder="Utilizator" aria-describedby="basic-addon1"/></td>
                                </tr>  
                                <tr>
                                    <td><input type="password" id="password1" name="password" placeholder="Parola" aria-describedby="basic-addon1" /></td>
                                </tr>
                                <tr>
                                    <td><input type="password" id="r_password1" name="r_password" placeholder="Repeta Parola" aria-describedby="basic-addon1" /></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="right"><input class="submit" id="submitButton1" type="submit" value="Submit" disabled="true"/></td>
                                </tr>
                            </form>
                        </table><br/>
                                <div id="SErrList" align="center">
                                    <li id="SERRusername1"><font color="red">Username is available !</font></li>
                                    <li id="SERRusername"><font color="red">Username must have 4 to 16 characters !</font></li>
                                    <li id="SERRpassword1"><font color="red">Password must contain at least 6 characters, 1 number, 1 upper case!</font></li>
                                    <li id="SERRpassword2"><font color="red">Passwords must match !</font></li>
                                </div>
                    </div>
                    
                    <div id="wroteRecomandationForm" align="center" hidden="true">
                        <table align="center" >
                            <form method="POST" action="src/wroteRecomandation.php">
                                <input id="PUserIDR" name="PUserID" type="text" value="" hidden="true"/>
                                <tr>
                                    <td align="center"><font color='black'><h4>Adauga Recomandare</h4></font><hr/></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name ="Diagnostic" id ="Diagnostic" placeholder="Diagnostic" aria-describedby="basic-addon1"/></td>
                                </tr>
                                <tr>
                                    <td><textarea type="text" name ="Recomandation" id ="Recomandation" cols="40" rows="5" placeholder="Recomandare" aria-describedby="basic-addon1"></textarea></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" class="submit" value="Adauga"/></td>
                                </tr>
                            </form>
                        </table>
                    </div>
                    
                    <div id="wroteAlarmForm" align="center" hidden="true">
                        <table align="center" >
                            <form id="writeAlarm" method="POST" action="src/writeAlarm.php">
                                <input id="PUserIDA" name="PUserID" type="text" value="" hidden="true"/>
                                <input id="DUserIDA" name="DUserID" type="text" value="<?php echo $_SESSION['SESS_ID']; ?>" hidden="true"/>
                                <tr>
                                    <td align="center"><font color='black'><h4>Adauga Alarma</h4></font><hr/></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name ="AlarmName" id ="AlarmName" placeholder="Nume Alarma" aria-describedby="basic-addon1"/></td>
                                </tr>
                                <tr>
                                    <td><select form="writeAlarm" name="SignalName">
                                            <option value="Temp">Temperatura</option>
                                            <option value="Pulse">Puls</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td><select form="writeAlarm" name="Operator">
                                            <option value="GreaterEqual">Mai mare sau egal</option>
                                            <option value="LessEqual">Mai mic sau egal</option>
                                            <option value="Equal">Egal</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name ="Value" id ="Value" placeholder="Valoare" aria-describedby="basic-addon1"/></td>
                                </tr>
                                <tr>
                                    <td><textarea type="text" name ="Comments" id ="Comments" cols="40" rows="5" placeholder="Comentariu" aria-describedby="basic-addon1"></textarea></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" class="submit" value="Adauga"/></td>
                                </tr>
                            </form>
                        </table>
                    </div>
                    
                    <div id="historyDiv" align="center" hidden="true">
                        <select id="selectUser">
                            <option> Select... </option>
                        </select>
                        <br/>
                        <div id="historyTable">
                            Selecteaza un pacient !
                        </div>
                    </div>
                    
                    <div id="pacientsTable" align="center"> 
                        <div id="loadingGif"><img src="../public/img/loading.gif" width="500px"/></div>
                        <table id='hoverTable' class="hoverTable">
                            
                        </table>
                    </div>
                    <br/>
                    <div id="chartContainer" style="height: 400px;" ><img src="../public/img/loading.gif" width="500px"/></div>
                </div>
            </div>
	</body>
</html>