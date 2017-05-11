<?php $reserveringNummer = DB::table('reserverings')->max('id'); ?>
<?php $totaalMaaltijd = DB::table('maaltijds')->where('reservering', $reserveringNummer)->get(); ?>
<?php $reservering = DB::table('reserverings')->where('id', $reserveringNummer)->first(); ?>
<?php $userId = DB::table('users')->where('id', $reservering->idUser)->first(); ?>
      
Geachte <u>{{ $userId->naam }}</u>, <br>
<br>
U heeft tickets gereserveerd voor de conferentie over wordpress.
<br>
<div>
    Reserverings Nummer: {{ $reserveringNummer }}<br>
    User Nummer: {{ $reservering->idUser }}<br>
    <h2>Uw Tickets:</h2><br>
    <table width="400" border="1" cellspacing="0" cellpadding="5">
        <tr>
            <td>Nr</td>
            <td>Soort ticket</td>
            <td>Prijs ticket</td>
        </tr>
        <?php $nummerTicket = 1; $totaalPrijsTickets = 0; ?>
        @foreach ($tickets as $ticket)
            <?php $ticketSoort = DB::table('ticketsoorts')->where('id', $ticket->soort)->first(); ?>
            <tr>
                <td>{{ $nummerTicket }}</td>
                <td>{{ $ticketSoort->soort }}</td>
                <td>€ {{ $ticketSoort->prijs }}</td>
            </tr>
            <?php 
                $nummerTicket = $nummerTicket + 1; 
                $totaalPrijsTickets = $totaalPrijsTickets + $ticketSoort->prijs; 
            ?>
        @endforeach
        <tr>
            <td colspan="2">Totaal Tickets:</td>
            <td><strong>€ {{ $totaalPrijsTickets }}</strong></td>
        </tr>
    </table><br>
        <h2>Uw Maaltijden:</h2><br>
    <table width="400" border="1" cellspacing="0" cellpadding="5">
        <tr>
            <td>Nr</td>
            <td>Soort maaltijd</td>
            <td>Prijs maaltijd</td>
        </tr>
        <?php $nummerMaaltijd = 1; $totaalPrijsMaaltijden = 0; ?>
        @foreach ($totaalMaaltijd as $maaltijd)
            <?php $maaltijdSoort = DB::table('maaltijdsoorts')->where('id', $maaltijd->soort)->first(); ?>
            <?php $maaltijdPrijs = $maaltijdSoort->prijs ?>
            <tr>
                <td>{{ $nummerMaaltijd }}</td>
                <td>{{ $maaltijdSoort->soort }}</td>
                <td>€ {{ $maaltijdPrijs }}</td>
            </tr>
            <?php 
                $totaalPrijsMaaltijden = $totaalPrijsMaaltijden + $maaltijdPrijs;
                $nummerMaaltijd = $nummerMaaltijd + 1; 
            ?>
        @endforeach
        <tr>
            <td colspan="2">Totaal Maaltijden:</td>
            <td><strong>€ {{ $totaalPrijsMaaltijden }}</strong></td>
        </tr>
    </table><br>
    <br>
    <table width="400" border="1" cellspacing="0" cellpadding="5">
        <tr>
            <td colspan="2">Totaal Tickets:</td>
            <td>€ {{ $totaalPrijsTickets }}</td>
        </tr>
        <tr>
            <td colspan="2">Totaal Maaltijden:</td>
            <td>€ {{ $totaalPrijsMaaltijden }}</td>
        </tr>
        <tr>
            <td colspan="2">Totaal Reservering:</td>
            <td><strong>€ {{ $reservering->prijs }}</strong></td>
        </tr>
    </table>
</div>