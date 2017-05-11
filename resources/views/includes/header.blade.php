<header>
    <nav>
        <ul>
        
            <li><a href="/">Home</a></li>
            <li><a href="/agenda">Agenda</a></li>
            <li><a href="/reservering">Ticket reserveren</a></li>
            <li><a href="/aanmelden ">Aanmelden</a></li>
            <li><a href="/contact">Contact</a></li>
            @if(!Auth::check())
            <li><a href="{{route('user.login')}}">login</a></li>
            @endif
            @if(Auth::check())
            <li><a href="/dashboard">Dashboard</a></li>
            <li><a href="{{route('user.logout')}}">logout</a></li>
            @endif
            
        </ul>
        <div class="img-banner" style="height:450px;">
        
 </div>

    </nav>
    
</header>