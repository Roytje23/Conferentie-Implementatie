@extends('layouts.master')
@section('content')
<form method="post" action='{{route('postInlogarray')}}' id='reserveren'>
  <div class ="input-group col-md-12">
    <table>
      <tr>
        <td><label for="naam">Gebruikersnaam: </label></td>
        <td><input type="text" name="gebruikersnaam" id="gebruikersnaam" placeholder="gebruikersnaam"/></td>
      </tr>
      <tr>
        <td><label for="naam">Wachtwoord: </label></td>    
        <td><input type="password" name="password" id="password" placeholder="password"/></td>    
      </tr>
      <tr>
        <td><input type="submit" value="Submit"></td>
        <td>@include('includes.errorbox')</td>
      </tr>
      <tr>
          <td><input type="hidden" name="_token" value="{{ Session::token() }}"/></td>
          <td></td>
      </tr>
    </table>
  </div>
</form>
@endsection