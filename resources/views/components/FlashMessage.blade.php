{{-- <!-- (에러메시지를 표시하기 위한 컴포넌트) -->
@if(session('error'))
    <div class="mb-4 text-red-600 text-md flex justify-center bg-red-200">
        {{ session('error') }}
    </div>
@elseif(session('success'))
    <div class="mb-4 text-blue-600 text-md flex justify-center bg-blue-200">
        {{ session('success') }}
    </div>
@elseif(session('info'))
    <div class="mb-4 text-green-600 text-md flex justify-center bg-green-200">
        {{ session('info') }}
    </div>
@endif --}}

@if(session('error'))
    <div class="mb-4 text-red-600 text-md flex justify-center bg-red-200">
        @if(is_array(session('error')))
            <ul>
                @foreach (session('error') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @else
            {{ session('error') }}
        @endif
    </div>
@endif

@if(session('success'))
    <div class="mb-4 text-blue-600 text-md flex justify-center bg-blue-200">
        @if(is_array(session('success')))
            <ul>
                @foreach (session('success') as $msg)
                    <li>{{ $msg }}</li>
                @endforeach
            </ul>
        @else
            {{ session('success') }}
        @endif
    </div>
@endif

@if(session('info'))
    <div class="mb-4 text-green-600 text-md flex justify-center bg-green-200">
        @if(is_array(session('info')))
            <ul>
                @foreach (session('info') as $msg)
                    <li>{{ $msg }}</li>
                @endforeach
            </ul>
        @else
            {{ session('info') }}
        @endif
    </div>
@endif
