@extends('layouts.master')

@section('content')

<?php $aanmeldingen = DB::table('aanmeldings')->get(); ?>
<?php $tags = DB::table('tags')->get() ?>

<div class="jumbotron text-center">
  <h1>Contact Pagina</h1>
  <p>Wat u maar wilt weten over wordpress u kunt het hier Vragen!</p>
</div>

<div class="container">
	<form id="contact_form" action="{{ route('ContactForm') }}" method="POST" enctype="multipart/form-data">
			<div class="row">
				<label><b>Spreker</b></label><br>
                <select name="aanvraag" id="aanvraag" class="aanvraag">
                    @foreach($aanmeldingen as $aanmelding)
                        <?php $aanvraagUser = DB::table('users')->where('id', $aanmelding->idUser)->get(); ?>
                        <?php $slotStatus = DB::table('slots')->where('id', $aanmelding->idSlot)->get(); ?>
                        @if ($slotStatus[0]->idStatus == 3)
                            <option value="{{ $aanvraagUser[0]->email }}">Naam: {{ $aanvraagUser[0]->naam }} - Email:{{ $aanvraagUser[0]->email }} - Onderwerp:{{ $aanmelding->onderwerp }}</option>
                        @endif
                    @endforeach
                </select><br><br>
        <label><b>Uw naam</b></label>
        <input type="text" placeholder="Enter Uw naam" name="naam" required>
	</div>
	<div class="row">
        <label><b>E-mail</b></label>
        <input type="text" placeholder="Enter E-mail" name="email" required>
	</div>
	<div class="row">
		<label for="message">Your message:</label><br />
		<textarea id="message" class="input" name="bericht" placeholder="Enter Message" rows="7" cols="30"></textarea><br />
	</div>
	        <tr>
            <td><button type="submit" class="btn">Bevestigen</button></td>
            <td></td>
        </tr>
        <tr>
            <td><input type="hidden" name="_token" value="{{ Session::token() }}"/></td>
            <td></td>
        </tr>
</form></div>

@endsection