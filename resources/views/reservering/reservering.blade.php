@extends('layouts.master')

@section('content')

<script>

$(function(){
        function changeValues() {
            var sumMeals = 0;
            $('.priceMaaltijd').each(function(i, obj) {
                sumMeals += $(this).val()*1;
            });
            var sumTickets = 0;
            $('.price').each(function(i, obj) {
                sumTickets += $(this).val()*1;
            });

            document.getElementById("totaalTicket").value = sumTickets;
            document.getElementById("totaalMaaltijd").value = sumMeals;
            document.getElementById("totaal").value = sumMeals + sumTickets;
        }
    /*---------------------Ticket-------------------*/
    /*--------------Ticket rij bijvoegen------------*/
    
        $('.addticket').click(function(){
            var ticket = $('.ticket').html();
            var maaltijd = $('.maaltijd').html();
            var n = ($('.body_ticket tr').length-0)+1;
            
            var newTicketRow = '<tr><th class="no">'+ n +'</th>' +
                '<td><select name="ticket[]" class="ticket">'+ ticket +'</select></td>' + 
        		'<td><input type="text" name="price[]" class="price" value="45" readonly></td>' + 
        		'<td><a class="btn btn-danger delete">verwijder</a></td></tr>';
            $('.body_ticket').append(newTicketRow);		
            
            changeValues();
        });
        
    /*---------------Delete de ticket----------------*/
    
        $(".body_ticket").delegate(".delete", "click", function(){
        $(this).parent().parent().remove();
        
        changeValues();
        });
        
    /*--------------Veranderd de prijs afhankelijk van het type Ticket------------*/    
    
        $('.body_ticket').delegate(".ticket", "change", function() {
            var newTicketRow = $(this).parent().parent();
            var prijs = newTicketRow.find(".ticket option:selected").attr("ticket-prijs");
            newTicketRow.find(".price").val(prijs);
            
            changeValues();
            
            var maaltijd = newTicketRow.find(".priceMaaltijd").val();
            var ticket = newTicketRow.find(".price").val();
            var totaal = parseInt(maaltijd*1) + parseInt(ticket*1);
            newTicketRow.find(".amount").val(totaal);
            
            changeValues();
        });    
        
    /*---------------------Maaltijd-------------------*/
    /*--------------Maaltijd rij bijvoegen------------*/
    
        $('.addmaaltijd').click(function(){
            var n = ($('.body_maaltijd tr').length-0)+1;
            var newTicketRow = '<tr><th class="no">'+ n +'</th>' +
        		'<td><select name="maaltijd[]" class="maaltijd">' + 
        		'@foreach($maaltijden as $maaltijd) <option maaltijd-prijs="{{ $maaltijd->prijs }}" value="{{ $maaltijd->id }}">{{ $maaltijd->soort }}</option>@endforeach</select></td>' +
            	'<td><input type="text" name="priceMaaltijd[]" class="priceMaaltijd" value="20" readonly></td>' + 
        		'<td><a class="btn btn-danger delete">verwijder</a></td></tr>';
            $('.body_maaltijd').append(newTicketRow);	
            
            changeValues();
        });
        
    /*---------------Delete de ticket----------------*/
        
        $(".body_maaltijd").delegate(".delete", "click", function() {
            $(this).parent().parent().remove();
            
            changeValues();
        });
    
    /*--------------Veranderd de prijs afhankelijk van het type Maaltijd------------*/    
    
        $('.body_maaltijd').delegate(".maaltijd", "change", function(){
           var newTicketRow = $(this).parent().parent();
           var prijs = newTicketRow.find(".maaltijd option:selected").attr("maaltijd-prijs");
           newTicketRow.find(".priceMaaltijd").val(prijs);
           
           changeValues();
        });
    });
</script>

<section class="reservering"> 
        <h1> Ticket Reserveren </h1>  
        <table>
          <tr>
            <th>Ticket</th>
            <th>Prijs in €</th>
          </tr>
          <tr>
            <td>Vrijdag</td>
            <td>€45</td>
          </tr>
          <tr>
            <td>Zaterdag</td>
            <td>€60</td>
          </tr>
           <tr>
            <td>Zondag</td>
            <td>€30</td>
          </tr>
           <tr>
            <td>Parse-partout</td>
            <td>€100</td>
          </tr>
          <tr>
            <td>zaterdag en zondag</td>
            <td>€80</td>
          </tr>
         </table><br>
         <table>
          <tr>
            <th>Maaltijd</th>
            <th>Prijs in €</th>
            <th>Dagen</th>
            <th>Tijdstip</th>
          </tr>
          <tr>
            <td>Lunch</td>
            <td>€20</td>
            <td>Alle drie de dagen</td>
            <td>12:00 - 13:30</td>
          </tr>
          <tr>
            <td>Diner</td>
            <td>€30</td>
            <td>Alleen weekend</td>
            <td>17:30 - 20:00</td>
          </tr>
         </table><br>
    <div class="col-md-12">
        
        <form  method="post" action='{{route('postreserveringarray')}}' id='reserveren'>

            <!----------Ticket-------->
            <div class="col-md-6">
                <button type="button" class="btn addticket" value="+">Ticket toevoegen +</button><br>
                <table>
                    <thead>
                        <tr>
                            <th>Nr.</th>
                            <th>Soort ticket</th>
                            <th>Prijs</th>
                        </tr>
                    </thead>
                    <tbody class="body_ticket">
                        <label for="ticket">
                        </label><br>
                        <tr>
                            <th class="no">1</th>
                            <td>
                                <select name="ticket[]" class="ticket">
                                    
                                <?php $arr = array('vrijdag', 'zaterdag', 'zondag', 'passe-partout', 'weekend');

                                foreach($arr as $soort)
                                {
                                    $beschikbaar = DB::table('ticketsoorts')->where('soort', "$soort")->value('beschikbaar'); 
                                    $prijs = DB::table('ticketsoorts')->where('soort', "$soort")->value('prijs'); 
                                    $id = DB::table('ticketsoorts')->where('soort', "$soort")->value('id'); 
                                    
                                    if ($beschikbaar > 0){
                                        
                                        echo "<option ticket-prijs='$prijs' value='$id'>$soort | $beschikbaar</option>";
                                        
                                    } else {
                                        echo "<option ticket-prijs='$prijs' value='$id' disabled>$soort | Uitverkocht</option>";
                                    }
                                    
                                }
                                
                                ?>
                                 
                                </select>
                            </td>
                            <td>
                                <input type="text" name="price[]" class="price" value="45" readonly>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!----------Maaltijd--------->
            <div class="col-md-6">
                <button type="button" class="btn addmaaltijd" value="+">Maaltijd toevoegen +</button><br>
                <table>
                    <thead>
                        <tr>
                            <th>Nr.</th>
                            <th>Soort maaltijd</th>
                            <th>Prijs</th>
                        </tr>
                    </thead>
                    <tbody class="body_maaltijd">
                        <label for="maaltijd">
                        </label><br>
                        <!--<tr>
                            <th class="no">1</th>
                            <td>
                                <select name="maaltijd[]" class="maaltijd">
                                    @foreach($maaltijden as $maaltijd)
                                        <option maaltijd-prijs="{{ $maaltijd->prijs }}" value="{{ $maaltijd->id }}">{{ $maaltijd->soort }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="text" name="priceMaaltijd[]" class="priceMaaltijd" value="20" readonly></td>
                        </tr>-->
                    </tbody>
                </table>
            </div>
            
            <div class="totaal col-md-12">
                <table>
                    <tbody><br>
                        <tr>
                            <td><label for="totaal">Totaal ticket: </label></td>
                            <td><input type="text" id="totaalTicket" name="totaalTicket" class="totaalTicket" value="45" readonly=""></td>
                        </tr>
                        <tr>
                            <td><label for="totaal">Totaal maaltijd: </label></td>
                            <td><input type="text" id="totaalMaaltijd" name="totaalMaaltijd" class="totaalMaaltijd" value="0" readonly=""></td>
                        </tr>
                        <tr>
                            <td><label for="totaal">Totaal: </label></td>
                            <td><input type="text" id="totaal" name="totaal" class="totaal" value="45" readonly=""></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
             <div class ="input-group"><br>
                <label for="naam">
                    Voornaam: 
                </label>
                <input type="text" name="naam" id="naam" placeholder="je naam"/>
            </div>
            
               <div class ="input-group">
                <label for="tussenvoegsel">
                    Tussenvoegsel: 
                </label>
                <input type="text" name="tussenvoegsel" id="tussenvoegsel" />
            </div>
            
            <div class ="input-group">
                <label for="achternaam">
                    achternaam: 
                </label>
                <input type="text" name="achternaam" id="achternaam"/>
            </div>
            
            <div class ="input-group">
                <label for="email">
                    email: 
                </label>
                <input type="text" name="email" id="email"/>
            </div>
            
            <div class ="input-group">
                <label for="telnummer">
                    telnummer: 
                </label>
                <input type="text" name="telnummer" id="telnummer"/>
            </div>
            
            <div class ="input-group">
                <label for="adres">
                    adres: 
                </label>
                <input type="text" name="adres" id="adres"/>
            </div>
            
            <div class ="input-group">
                <label for="woonplaats">
                    woonplaats: 
                </label>
                <input type="text" name="woonplaats" id="woonplaats"/>
            </div>
            
            
            <div class ="input-group">
                <label for="betaalmethode">
                    Betaalmethode: 
                </label>
                <select name="betaalmethode" id="betaalmethode">
                  <option value="IDeal">IDeal</option>
                  <option value="Creditcard">Creditcard</option>
                </select>
            </div> 
            <button type="submit" class="btn">Bevestigen</button>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
</section>



@endsection