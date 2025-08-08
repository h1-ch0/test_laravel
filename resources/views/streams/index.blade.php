<x-layout>
    {{-- <h1>streams.index</h1> --}}
        <x-header>Streams Index page</x-header>
<head>
    <title>Streams Index page</title>
</head>
<body>
    @auth
    <section class="mb-6"><a href = '{{route('streams.create')  }}' class = "gap-3 py-2.5 px-5 me-2 mb-6 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
        New Stream</a>
    </section>
    @endauth

<div class="relative overflow-x-auto shadow-md sm:rounded-lg"> 
{{-- <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-3"> --}}
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    details
                </th>
                <th scope="col" class="px-6 py-3">
                    url
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($streams as $stream)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $stream->title }}
                </th>
                <td class="px-6 py-4">
                    <a href="/streams/{{ $stream->id }}" class="font-medium text-gray-600 dark:text-gray-500 hover:underline">Go to...</a>
                    {{-- {{ $stream->details }} --}}
                </td>
                <td class="px-6 py-4">
                    #
                    {{-- {{ $stream->url }} --}}
                </td>
                <td class="px-6 py-4">
                    <a href={{ route('streams.edit', $stream->id) }} class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
                <td  class="px-6 py-4" methond="POST">
                    <form action="{{ route('streams.destroy', $stream->id) }}" method="POST" >
                    @csrf
                    @method('DELETE')
                    <button class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
           
            </tr>
        </tbody>
    </table>
</div>

</table>
</body> 
</x-layout>