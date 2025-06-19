<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="flex justify-center min-h-[calc(100vh-16rem)] items-center">
    <a href="/posts">
    <button class=" bg-blue-800 hover:bg-blue-900 text-white font-medium py-3 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
        Click here for content
    </button>
    </a>
    </div>
</x-layout>