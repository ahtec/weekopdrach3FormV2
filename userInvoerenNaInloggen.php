<html>
    <head>
        
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



    </script>

        
    </head>
   <body STYLE="font-size: 20px; font-family:Courier New, Courier, monospace; background-color: antiquewhite;" >
        
        <h4> Op dit scherm kunt uw gegevens invoeren</h4>
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
     
        
    </body>
    
</html>




