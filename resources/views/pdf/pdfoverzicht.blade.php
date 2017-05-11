<h3>Vrijdag</h3>
      <table class ="vrijdag">
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
                @foreach($statuses as $status)
                @if($slot->dag == "Vrijdag" && $slot->idStatus == $status->idStatus)
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
                        <?php $tag = DB::table('tags')->where('idTag', $taggie->idTag)->first(); ?>
                        {{ $tag->tag }} |
                        @endforeach
                        @endif
                        </td>    
                    <td>{{ $slot->beginTijd}}</td>
                    <td>{{ $slot->eindTijd}}</td>
                    <td>{{ $slot->idZaal}}</td>
                    <td>{{ $status->status}}</td>
                </tr>
                @endif
                @endforeach
                @endforeach
    </table><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br>
    <br><br>
    <br><br>
<h3>Zaterdag</h3>
<table class ="zaterdag">
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
                @foreach($statuses as $status)
                @if($slot->dag == "Zaterdag" && $slot->idStatus == $status->idStatus)
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
                        <?php $tag = DB::table('tags')->where('idTag', $taggie->idTag)->first(); ?>
                        {{ $tag->tag }} |
                        @endforeach
                        @endif
                        </td>   
                    <td>{{ $slot->beginTijd}}</td>
                    <td>{{ $slot->eindTijd}}</td>
                    <td>{{ $slot->idZaal}}</td>
                    <td>{{ $status->status}}</td>
                </tr>
                @endif
                @endforeach
                @endforeach
      </table><br>
      <br>
      <br>
      <h3>Zondag</h3><br>
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
                @foreach($statuses as $status)
                @if($slot->dag == "Zondag" && $slot->idStatus == $status->idStatus)
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
                        <?php $tag = DB::table('tags')->where('idTag', $taggie->idTag)->first(); ?>
                        {{ $tag->tag }} |
                        @endforeach
                        @endif
                        </td>   
                    <td>{{ $slot->beginTijd}}</td>
                    <td>{{ $slot->eindTijd}}</td>
                    <td>{{ $slot->idZaal}}</td>
                    <td>{{ $status->status}}</td>
                </tr>
                @endif
                @endforeach
                @endforeach
      </table>