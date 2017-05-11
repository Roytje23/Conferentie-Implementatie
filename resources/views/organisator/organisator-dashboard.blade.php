@extends('layouts.master')

@section('content')

<?php $aanmeldingen = DB::table('aanmeldings')->get(); ?>
<?php $tags = DB::table('tags')->get() ?>

@include('includes.errorbox')
<h3>Accepteren</h3>
<form  method="post" action='{{route('postacceptaanmelding')}}' id='reserveren'>
    <table>
        <tr>
            <td>Aanmeldingen:</td>
            <td>
                <select name="aanmelding" class="aanmelding">
                    @foreach($aanmeldingen as $aanmelding)
                        <?php $aanvraagUser = DB::table('users')->where('id', $aanmelding->idUser)->get(); ?>
                        <?php $slotStatus = DB::table('slots')->where('id', $aanmelding->idSlot)->get(); ?>
                        @if ($slotStatus[0]->idStatus == 2)
                            <option value="{{ $aanmelding->idAanmelding }}">IDslot: {{ $aanmelding->idSlot }} Naam:{{ $aanvraagUser[0]->naam }} - Onderwerp:{{ $aanmelding->onderwerp }}</option>
                        @endif
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>WordpressTag1:</td>
            <td>
                <select name="tag1" class="tag1">
                    @foreach($tags as $tag)
                            <option value="{{ $tag->idTag }}">ID: {{ $tag->idTag }} | Tag:{{ $tag->tag }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>WordpressTag2:</td>
            <td>
                <select name="tag2" class="tag2">
                    @foreach($tags as $tag)
                            <option value="{{ $tag->idTag }}">ID: {{ $tag->idTag }} | Tag:{{ $tag->tag }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>WordpressTag3:</td>
            <td>
                <select name="tag3" class="tag3">
                    @foreach($tags as $tag)
                            <option value="{{ $tag->idTag }}">ID: {{ $tag->idTag }} | Tag:{{ $tag->tag }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td><button type="submit" class="btn">Bevestigen</button></td>
            <td></td>
        </tr>
        <tr>
            <td><input type="hidden" name="_token" value="{{ Session::token() }}"/></td>
            <td></td>
        </tr>
    </table>
</form>


<h3>Afwijzen</h3>
<form  method="post" action='{{route('postdeclineaanmelding')}}' id='reserveren'>
    <table>
        <tr>
            <td>Aanmeldingen:</td>
            <td>
                <select name="aanmelding" class="aanmelding">
                    @foreach($aanmeldingen as $aanmelding)
                        <?php $aanvraagUser = DB::table('users')->where('id', $aanmelding->idUser)->get(); ?>
                        <?php $slotStatus = DB::table('slots')->where('id', $aanmelding->idSlot)->get(); ?>
                        @if ($slotStatus[0]->idStatus == 2)
                            <option value="{{ $aanmelding->idSlot }}">IDslot: {{ $aanmelding->idSlot }} Naam:{{ $aanvraagUser[0]->naam }} - Onderwerp:{{ $aanmelding->onderwerp }}</option>
                        @endif
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td><button type="submit" class="btn">Bevestigen</button></td>
            <td></td>
        </tr>
        <tr>
            <td><input type="hidden" name="_token" value="{{ Session::token() }}"/></td>
            <td></td>
        </tr>
    </table>
</form>

<h3>Overzicht Verzenden</h3>
<form method="post" action='{{ route('sendoverzichtsemail') }}' id='reserveren'>
   
    <table>
        <thead>
            <tr>
              <th>Naam: </th>
              <th>Email: </th>
            </tr>
        </thead>
            <?php $reserverings = DB::table('reserverings')->get(); ?>
            @foreach($reserverings as $reservering)
            <?php $users = DB::table('users')->where('id', $reservering->idUser)->get(); ?>
            @foreach($users as $user)
            <tr><td> {{ $user->naam }}</td>
                <td><input type="text" name="test123[]" id="test123[]" value="{{ $user->email }}"/></td></tr>
            @endforeach
            @endforeach
    </table>
        <tr>
            <td><button type="submit" class="btn">Bevestigen</button></td>
            <td></td>
        </tr>
        <tr>
            <td><input type="hidden" name="_token" value="{{ Session::token() }}"/></td>
            <td></td>
        </tr>
</form>
@endsection