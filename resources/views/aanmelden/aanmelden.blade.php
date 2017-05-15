@extends('layouts.master')

@section('content')

<?php $sloten1 = DB::table('slots')->where('idStatus', 1)->get(); ?>
<?php $slotenVoorkeur = DB::table('slots')->where('idStatus', 2)->get(); ?>
<h1>Aanmelding Spreker</h1>
<br>
<br>
<br>
Beschikbare Sloten:
<form  method="post" action='{{route('postaanmelding')}}' id='reserveren'>
        {{ csrf_field()}}
        <div class ="vrijdag-group col-md-12">
        <table>
            <tbody>
            @foreach($sloten1 as $slot)
            @if($slot->dag == "Vrijdag")
            <tr>
                <td><input type="radio" name="slot" value="{{ $slot->id }}"></td>
                <td>{{ $slot->dag }}</td>
                <td>{{ $slot->beginTijd }} </td>
                <td>{{ $slot->eindTijd }}</td>
                <td>Zaal[{{ $slot->idZaal }}]</td>
            </tr>
            @endif
            @endforeach
            </tbody>
        </table>
        <table>
            <tbody>
            @foreach($sloten1 as $slot)
            @if($slot->dag == "Zaterdag")
            <tr>
                <td><input type="radio" name="slot" value="{{ $slot->id }}"></td>
                <td>{{ $slot->dag }}</td>
                <td>{{ $slot->beginTijd }} </td>
                <td>{{ $slot->eindTijd }}</td>
                <td>Zaal[{{ $slot->idZaal }}]</td>
            </tr>
            @endif
            @endforeach
            </tbody>
        </table>
        <table>
            <tbody>
            @foreach($sloten1 as $slot)
            @if($slot->dag == "Zondag")
            <tr>
                <td><input type="radio" name="slot" value="{{ $slot->id }}"></td>
                <td>{{ $slot->dag }}</td>
                <td>{{ $slot->beginTijd }} </td>
                <td>{{ $slot->eindTijd }}</td>
                <td>Zaal[{{ $slot->idZaal }}]</td>
            </tr>
            @endif
            @endforeach
            </tbody>
        </table>
        </div>
        <table>
            <div class ="input-group col-md-12">
            <tr>
                <td><label for="onderwerp">onderwerp: </label></td>
                <td><input type="text" name="onderwerp" id="onderwerp" placeholder="je onderwerp"/></td>
            </tr>
            
            <tr>
                <td><label for="omschrijving">omschrijving: </label></td>
                <td><input type="text" name="omschrijving" id="omschrijving" placeholder="je omschrijving"/></td>
            </tr>
            
            <tr>
                <td><label for="wensen">wensen: </label></td>
                <td><input type="text" name="wensen" id="wensen" placeholder="je wensen"/></td>
            </tr>
            
            <tr>
                <td><label for="naam">Voornaam: </label></td>
                <td><input type="text" name="naam" id="naam" placeholder="je naam"/></td>
            </tr>
            
            <tr>
                <td><label for="tussenvoegsel">Tussenvoegsel: </label></td>
                <td><input type="text" name="tussenvoegsel" id="tussenvoegsel" placeholder="tussenvoegsel"/></td>
            </tr>
            
            <tr>
                <td><label for="achternaam">Achternaam: </label></td>
                <td><input type="text" name="achternaam" id="achternaam" placeholder="achternaam"/></td>
            </tr>
            
            <tr>
                <td><label for="email">Email: </label></td>
                <td><input type="text" name="email" id="email" placeholder="email"/></td>
            </tr>
            
            <tr>
                <td><label for="telnummer">Telnummer: </label></td>
                <td><input type="text" name="telnummer" id="telnummer" placeholder="telnummer"/></td>
            </tr>
            
            <tr>
                <td><label for="adres">Adres: </label></td>
                <td><input type="text" name="adres" id="adres" placeholder="adres"/></td>
            </tr>
            
            <tr>
                <td><label for="woonplaats">Woonplaats: </label></td>
                <td><input type="text" name="woonplaats" id="woonplaats" placeholder="woonplaats"/></td>
            </tr>
        </table>
          <div class ="vrijdag-group col-md-12">
        <table>
            <tbody>
            @foreach($slotenVoorkeur as $slotVoorkeur)
            @if($slotVoorkeur->dag == "Vrijdag")
            <tr>
                <td><input type="radio" name="slot" value="{{ $slotVoorkeur->id }}"></td>
                <td>{{ $slotVoorkeur->dag }}</td>
                <td>{{ $slotVoorkeur->beginTijd }} </td>
                <td>{{ $slotVoorkeur->eindTijd }}</td>
                <td>Zaal[{{ $slotVoorkeur->idZaal }}]</td>
            </tr>
            @endif
            @endforeach
            </tbody>
        </table>
        <table>
            <tbody>
            @foreach($slotenVoorkeur as $slotVoorkeur)
            @if($slotVoorkeur->dag == "Zaterdag")
            <tr>
                <td><input type="radio" name="slot" value="{{ $slotVoorkeur->id }}"></td>
                <td>{{ $slotVoorkeur->dag }}</td>
                <td>{{ $slotVoorkeur->beginTijd }} </td>
                <td>{{ $slotVoorkeur->eindTijd }}</td>
                <td>Zaal[{{ $slotVoorkeur->idZaal }}]</td>
            </tr>
            @endif
            @endforeach
            </tbody>
        </table>
        <table>
            <tbody>
            @foreach($slotenVoorkeur as $slotVoorkeur)
            @if($slotVoorkeur->dag == "Zondag")
            <tr>
                <td><input type="radio" name="slot" value="{{ $slotVoorkeur->id }}"></td>
                <td>{{ $slotVoorkeur->dag }}</td>
                <td>{{ $slotVoorkeur->beginTijd }} </td>
                <td>{{ $slotVoorkeur->eindTijd }}</td>
                <td>Zaal[{{ $slotVoorkeur->idZaal }}]</td>
            </tr>
            @endif
            @endforeach
            </tbody>
        </table>
        </div>
            <tr>
                <td><button type="submit" class="btn">Bevestigen</button></td>
                <td>@include('includes.errorbox')</td>
            </tr>

            <tr>
                <td><input type="hidden" name="_token" value="{{ Session::token() }}"/></td>
                <td></td>
            </tr>
    </form>

@endsection