@extends('layouts.master')

@section('content')

<div class="jumbotron text-center">
  <h1>Overzicht Zondag</h1>
  <p>Hier zal u vinden op welke tijdstip welke spreker gaat presenteren</p>
</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <table class ="zondag">
        <thead>
            <tr>
              <th>Onderwerp</th>
              <th>Omschrijving</th>
              <th>Tags</th>
              <th>BeginTijd</th>
              <th>EindTijd</th>
              <th>Zaal</th>
              <th>Status</th>
            </tr>
        </thead>
                @foreach($slots as $slot)
                @if($slot->dag == "Zondag")
                <tr>
                    <td>
                        @if($slot->idStatus == 3)
                        <?php $aanmelding = DB::table('aanmeldings')->where('idSlot', $slot->id)->first(); ?>
                        {{ $aanmelding->onderwerp }}
                        @endif
                        </td>
                    <td>
                        @if($slot->idStatus == 3)
                        <?php $aanmelding = DB::table('aanmeldings')->where('idSlot', $slot->id)->first(); ?>
                        {{ $aanmelding->omschrijving }}
                        @endif
                        </td>    
                    <td>
                        @if($slot->idStatus == 3)
                        <?php $slot_tag = DB::table('slot_tags')->where('idSlot', $slot->id)->get(); ?>
                        @foreach($slot_tag as $taggie)
                        <?php $tag = DB::table('tags')->where('id', $taggie->id)->first(); ?>
                        {{ $tag->tag }} |
                        @endforeach
                        @endif
                        </td>   
                    <td>{{ $slot->beginTijd}}</td>
                    <td>{{ $slot->eindTijd}}</td>
                    <td>{{ $slot->idZaal}}</td>
                    <?php $royStatus = DB::table('statuses')->where('id', $slot->idStatus)->first(); ?>
                    <td>{{ $royStatus->status }}</td>
                </tr>
                @endif
                @endforeach
      </table>
    </div>
  </div>
</div>
@endsection