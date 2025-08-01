<x-layout>
    @extends('components.list-layout')
    
    @section('content')
    
    <section class="post-list">
        @foreach ( $lists as $row )
        <article class="post">
            <x-lists-card :row="$row" />
        </article>
        @endforeach
        
    </section>
    
    
    @if (count($lists) > 0 )
    <p>There are {{count($lists)}} subjects in the lists</p>
    @elseif (count($lists) == 0)
    <p>There is no subject in the lists</p>
    @endif  
    
    {{-- @foreach ($lists as $row) --}}
    {{-- <h2><a href="/lists/{{ $row['id'] }}">{{$row ['subject']}}</h2> --}}
        {{-- @endforeach --}}
        @endsection
</x-layout>