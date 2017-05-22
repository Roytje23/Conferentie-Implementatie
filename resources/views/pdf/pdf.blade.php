<center><h2>E-Tickets</h2></center><br>

@foreach($ticketarray as $ticket)
    <h3>QR-code Ticket</h3>
    <img src="/src/tickets/{{ $ticket->id }}.jpg"><br>
@endforeach
<br>
@foreach($maaltijdarray as $maaltijd)
    <h3>QR-code Maaltijd</h3>
    <img style="align:center;" src="/src/maaltijden/{{ $maaltijd->id }}.jpg"><br>
@endforeach