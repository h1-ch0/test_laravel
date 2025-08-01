@extends('components.list-layout')

@section('content')


<hr>
    <h2>{{$row['subject']}}</h2>
    <p>{{$row['content']}}</p>
<hr>
    <p>email: {{ $row['email'] }}</p>

    <h2><a href = '/lists'>Return to Lists</h2>
@endsection