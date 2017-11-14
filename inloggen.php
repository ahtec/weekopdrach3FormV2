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


            var naamWaarde = document.getElementByID("naam").value;
            console.log(naamWaarde);
            var wwWaarde = document.getElementByID("ww").value;
            console.log(wwWaarde);

//            var checkWindow = window.open("http://localhost/weekOpdracht3/checkPersoonExist.php?naam=" + naamWaarde + "&ww=" + wwWaarde,"" ,"width=200,height=100" );
            console.log(test);


//                alert(field);
//            var pattern = new RegExp(/[()~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/); //unacceptable chars
//            if (pattern.test(field)) {
//                return ("Gebruik alleen alpha en numerieke characters");
//            }
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



    </script>


    <body STYLE="font-size: 20px; font-family:Courier New, Courier, monospace; background-color: antiquewhite;" >
        <?php
        if (isset($_REQUEST)) {
            if (isset($_REQUEST['errorTxt'])) {
                echo "<h2> ";
                echo $_REQUEST['errorTxt'];
                echo "</h2> ";
            }
        }

       
        ?>

        <form   action="checkPersoonExist.php" onsubmit="return validate(this)" method="POST">
            <table>
                <tr> <td>  uw user login naam     </td> <td>    <input type=text name=naam value='gerard' id="naam">   </td>  </tr>
                <tr> <td>  uw  wachtwoord         </td> <td>    <input type=password name=ww value='doets' id="ww" >             </td> </tr>
                <tr> <td>                         </td> <td>    <input type=submit value=Verstuur id="loginKnop">   </td> </tr>
            </table>
        </form>



    </body>
</html>



