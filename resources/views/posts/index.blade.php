{{-- page href = '/posts' --}}
<x-layout>

    <x-header>목록</x-header>
<head>    
    <title>Posts Index page</title>
</head>
<body>
    @auth
        
    <section><a href = '{{route('posts.create')  }}' class = "py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
        New</a>
    </section>
    @endauth
    {{-- <p>This is {{ $name }} , {{ $age }} old.     
    </p>    
    <u1>
        @foreach ($posts_list as $post)
        <li>{{$post}}</li>   
        @endforeach
    </u1>  --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols3 gap-3">

        @foreach ($posts as $post )
        
        <div class="max-w-sm p-6 mt-5 mb-5 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post ->content }}</p>
            <a href="/posts/{{ $post->id }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
        
        @endforeach
    </div>
    
    
</body> 
</x-layout>