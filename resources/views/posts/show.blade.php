<x-layout>
    <section class="my-5 flex justify-end">
        @can('update',$post)
            {{-- <a href = '{{route('posts.edit', $post ->id)  }}' class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">edit
            </a> --}}
            {{-- <button type = "button" onclick="location.href='{{route('posts.edit', $post ->id)  }}'" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit
            </button> --}}
            <form action= '{{route('posts.edit', $post ->id)  }}' method='GET'>
            {{-- @csrf --}}
            {{-- @method('GET') --}}
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit
            </button>
        </form>
        @endcan
        
        @can('delete',$post)
        <form action= '{{route('posts.destroy', $post ->id)  }}' method='Post'>
            @csrf
            @method('DELETE')
            <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete
            </button>
        </form>
        @endcan
    </section>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 bg-gray-200 rounded-lg font-semibold">
        <h1 class="text-3xl text-indigo-700 pt-5">{{$post ->title}}</h1>
        <main class ="max-w-6xl mx-auto mt-5 lg:mt-6 p-6">
            <p class="text-gray-700 mb-3">{{$post ->content}}</p>
        </main>
    </div>
    
</x-layout>

    