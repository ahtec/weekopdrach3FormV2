<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html  >
    <head>
        <style>
            p {
                align-self: center;
                background-color: red;
                color: white;
            }

            #bewaarpersoon{
                background-color:antiquewhite;
                color: silver;
                height:100px;
                width:200px;
                font-size: 20px;

            }

            #drop{
                background-color: blanchedalmond;
                color: silver;
                height:100px;
                font-size: 31px;
            }

        </style>
        <script>

            function validate(form) {
                fail = validateNaam(form.naam.value)

                if (fail == "")
                    return true
                else {
                    alert(fail);
                    return false
                }
            }

            function validateNaam(field)
            {
//                alert(field);
                var pattern = new RegExp(/[()~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/); //unacceptable chars
                if (pattern.test(field)) {
                    return ("Gebruik alleen alpha en numerieke characters");
                }
                if (field == "") {
                    return "Naam mag niet leeg zijn";
                }
                return "";
            }



        </script>
    </head>
    <body STYLE="font-size: 20px; font-family:Courier New, Courier, monospace; background-color: antiquewhite;
          ">
              <?php
              $var1 = count($_GET);
              if ($var1 == 1) {        // show personen
                  echo "<p>";
                  if (isset($_GET['errorText'])) {
                      echo $_GET['errorText'];
                  }

                  echo "</p>";
              }
              require_once 'loginGegevens.php';
              $conextion = new mysqli(DBSERVER, DBUSER, DBPASS, DBASE);
              if (!$conextion->connect_error) {
//            $sql = "CREATE DATABASE personen ";
//            $result = mysqli_query($conextion, $sql);



                  $sql = "SELECT * FROM personen ";
                  $result = mysqli_query($conextion, $sql);
                  if ($result->num_rows === 0) {
//            die("lege result set");
                  } else {
//            echo " result set niet leeg";
                  }


                  echo " <h5>  Dit zijn de bestaande personen</h5>
            <table>
            <tr>
                <th>Naam</th>
                <th>ww</th>
                <th>Adres</th>
                <th>Woonplaats</th>
                <th>Gender</th>
                <th>SerialzedObject van Persoon</th>
            </tr>";
                  while ($row = mysqli_fetch_array($result)) {
                      echo "<tr>";
                      echo "<td>" . $row['naam'] . "</td>";
                      echo "<td>" . $row['ww'] . "</td>";
                      echo "<td>" . $row['adres'] . "</td>";
                      echo "<td>" . $row['woonplaats'] . "</td>";
                      echo "<td>" . $row['gender'] . "</td>";
                      echo "<td>" . $row['objectPersoon'] . "</td>";
                      echo "</tr>";
                  }
                  echo "</table>";

                  mysqli_close($conextion);
              } else {
                  echo 'Zet graag de db aan';
                  echo "<br> <h3> nu hebben we :</h3> ";
                  echo `dir *.txt  /b /a-d `;
              }
              ?>
        <h4>  Op dit scherm kunt personen toevoegen</h4>
        <hr>
        <table><tr> <td>
                    <form name="personenForm" action="voegPersoonToe.php" onsubmit="return validate(this)" >
                        <table>
                            <tr> <td> Naam           </td> <td>  <input type="text" name="naam" >  </td>
                            <tr> <td> wachtwoord     </td> <td>  <input type="text" name="ww" >  </td>
                            <tr> <td> Adres          </td> <td>  <input type="text" name="adres" ></td>
                            <tr> <td> Woonplaats     </td> <td>  <input type="text" name="woonplaats" ></td>
                            <tr> <td>   
                                    <input type="radio" name="gender" value="male" checked> Male <br>
                                    <input type="radio" name="gender" value="female">       Female<br>
                                </td>
                        </table>
                        <br>
                        <input type="submit" value="bewaar persoon" id="bewaarpersoon">
                    </form> 

                </td><td>
                    <form name="drop" action="dropPersonen.php">
                        <input  type="submit" value="drop tabel personen ... en maak weer aan" id="drop" >
                    </form>

                </td></tr></table>
    </body>
</html>
