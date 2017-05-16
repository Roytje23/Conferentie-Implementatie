<center><h2>E-Tickets</h2></center><br>

            <tr>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <td></td>
            </tr>

@foreach($ticketarray as $ticket)
    <center><h3>QR-code Ticket</h3></center>
    <center><img src="http://conferentie-justsomeguy.c9users.io/src/tickets/{{ $ticket->id }}.jpg"></center><br>
@endforeach
<br>
@foreach($maaltijdarray as $maaltijd)
    <center><h3>QR-code Maaltijd</h3></center>
    <center><img style="align:center;" src="http://conferentie-justsomeguy.c9users.io/src/maaltijden/{{ $maaltijd->id }}.jpg"></center><br>
@endforeach