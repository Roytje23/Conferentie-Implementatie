@extends('layouts.master')

@section('content')

<div class="jumbotron text-center">
  <h1>Wordpress Conferentie</h1>
  <p>Wat u maar wilt weten over wordpress u kunt het hier vinden!</p>
</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h3>Vrijdag 16 December</h3>
      <p>Wilt u het overzicht zien van onze conferentie op vrijdag?</p>
      <a href="{{route('vrijdag')}}">Overzicht Vrijdag >></a>
    </div>
    <div class="col-sm-4">
      <h3>Zaterdag 17 December</h3>
      <p>Wilt u het overzicht zien van onze conferentie op Zaterdag?</p>
      <a href="https://conferentie-justsomeguy.c9users.io/agenda/zaterdag">Overzicht Zaterdag >></a>
    </div>
    <div class="col-sm-4">
      <h3>Zondag 18 December</h3>
      <p>Wilt u het overzicht zien van onze conferentie op Zondag?</p>
      <a href="https://conferentie-justsomeguy.c9users.io/agenda/zondag">Overzicht Zondag >></a>
    </div>
  </div>
</div>
@endsection