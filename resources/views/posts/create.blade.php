<x-layout>
    {{-- posts/create.blade.php --}}
    <x-header>Writing Form</x-header>

    {{-- <h1>writing form page</h1> --}}
    <div class="max-w-2xl mx-auto p-3">
        <form method="post" action="/posts">
            @csrf
            {{-- @method('PUT') --}}
            <div class="mb-6">
                <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Default input</label>
                <input type="text" name="title" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            
            <div class="mb-6">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your message</label>
            <textarea id="message" name="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>

            </div>
            <div class="mb-6">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Confirm</button>
            </div>
        </form>
    </div>
</x-layout>