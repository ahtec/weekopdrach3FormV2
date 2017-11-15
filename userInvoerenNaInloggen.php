<html>
    <head>
        
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




