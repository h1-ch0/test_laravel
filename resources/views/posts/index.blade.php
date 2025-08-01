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
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-3">

        @foreach ($posts as $post )
        
        <div class="max-w-sm p-6 mt-5 mb-5 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
            </a>
            {{-- <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{  $post ->content }}</p> --}}
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{Str::words(  $post ->content ,5,'...' )}}</p>
            <a href="/posts/{{ $post->id }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>

            @can('update',$post)
            <a href = '{{route('posts.edit', $post ->id)  }}' class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300
                 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
            @endcan
            {{-- @can('delete',$post)
                    <form action= '{{route('posts.destroy', $post ->id)  }}' method='Post'>
                @csrf
                @method('DELETE')
                    <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-small rounded-lg text-sm px-1 py-2 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete
                </button>
            @endcan --}}
        </div>
        
        @endforeach
    </div>
    <div class="mt-5 mb-5">
        {{ $posts->links() }} {{-- 페이지네이션 링크 --}}
    </div>
</body> 
</x-layout>