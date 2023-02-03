<h1>{{$heading}}</h1>

@foreach ($listings as $faculty)
    <div class="faculty">
        <a href="/profile/{{$faculty->id}}"><h2>{{$faculty->name}}</h2></a>
        <p>{{$faculty->email}}</p>
        <p>{{$faculty->created_at}}</p>
    </div>
@endforeach

{{-- print the count --}}
<p>There are {{$listings->count()}} faculties</p>

{{-- print the total number of records --}}
