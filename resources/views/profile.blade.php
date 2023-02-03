<h1>{{$heading}}</h1>


    {{-- print user data --}}
    <div class="user">
        <h2>{{$user->name}}</h2>
        <p>{{$user->email}}</p>
        <p>{{$user->created_at}}</p>
    </div>


{{-- print the total number of records --}}
