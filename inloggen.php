<html>
    <style>
        #loginKnop{
            background-color:antiquewhite;
            color: blue;
            height:100px;
            width:200px;
            font-size: 20px;

        }
    </style>

    <script>

        function validate(form) {
            return true;
            fail = validateNaam(form.naam.value)
            fail = validateWW(form.ww.value)

            if (fail == "")
                return true
            else {
                alert(fail);
                return false
            }
        }

        function validateNaam(field)
        {
            var pattern = new RegExp(/[()~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/); //unacceptable chars
            if (pattern.test(field)) {
                return ("Gebruik alleen alpha en numerieke characters");
            }
            if (field == "") {
                return "Naam mag niet leeg zijn";
            }
            return "";
        }

        function validateWW(field)
        {
            //                alert(field);
//            var pattern = new RegExp(/[()~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/); //unacceptable chars
            //          if (pattern.test(field)) {
            //               return ("Gebruik alleen alpha en numerieke characters");
            //           }
            if (field == "") {
                return "vul wachtwoord in";
            }
            return "";
        }



        function loadXMLDoc() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("naamBestaatNiet").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "userInvoerenNaInloggen.php", true);
            xhttp.send();
        }

    </script>


    <body STYLE="font-size: 20px; font-family:Courier New, Courier, monospace; background-color: antiquewhite;" >
    <?php
    if (isset($_REQUEST)) {
//            echo "<br>sadfds".$_REQUEST['errorText'];;
        if (isset($_REQUEST['errorTxt'])) {
            $errorTxt = $_REQUEST['errorTxt'];
            echo "<p id=naamBestaatNiet>";
            echo "<h2> " . $errorTxt . "</h2> ";
            echo "</p>";
            if ($errorTxt == "Naam bestaat niet") {
                
                echo "<button type=button onclick=loadXMLDoc()>Change Content</button>";
                
//                echo "<form action=userInvoerenNaInloggen.php method=POST>";
//                echo "<button type=submit value=teams  >  user aanmaken </button>";
//                echo " </form>";
            }
        }
    }
    ?>

        <form   action="checkPersoonExist.php" onsubmit="return validate(this)" method="POST">
            <table>
                <tr> <td>  uw user login naam     </td> <td>    <input type=text name=naam  id="naam">   </td>  </tr>
                <tr> <td>  uw  wachtwoord         </td> <td>    <input type=password name=ww  id="ww" >             </td> </tr>
                <tr> <td>                         </td> <td>    <input type=submit value=Verstuur id="loginKnop">   </td> </tr>
            </table>
        </form>



    </body>
</html>



