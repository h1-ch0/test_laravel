<!-- (에러메시지를 표시하기 위한 컴포넌트) -->
@if(session('error'))
    <div class="mb-4 text-red-600 text-md flex justify-center bg-red-200">
        {{ session('error') }}
    </div>
@endif
