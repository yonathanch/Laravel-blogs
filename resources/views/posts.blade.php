<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="py-4 px-4 mx-auto max-w-screen-xl lg:px-6">
      <div class="mx-auto max-w-screen-md sm:text-center">
          <form action="#">

          {{-- URL awal: http://example.com/posts?category=berita Saat submit form: Nilai berita akan tetap dikirim ke server melalui input hidden ini, sehingga filter category tidak hilang. --}}
          @if (request('category'))
              <input type="hidden" name="category" value="{{request('category')}}">
          @endif

          @if (request('author'))
              <input type="hidden" name="author" value="{{request('author')}}">
          @endif
              <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                  <div class="relative w-full">
                      <label for="search" class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Search</label>
                      <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                          <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                          </svg>
                      </div>
                      <input class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search for Article" type="search" id="search" name="search" 
                      {{-- autocomplete agar history search tidak keluar  --}}
                      autocomplete="off" >
                  </div>
                  <div>
                      <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-primary-700 border-primary-600 sm:rounded-none sm:rounded-r-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Search</button>
                  </div>
              </div>
      </div>
  </div>

  {{ $posts->links() }}
        <div class="my-4 py-5 px-4 mx-auto max-w-screen-xl lg:py-5 lg:px-0">
            <div class="grid gap-8 lg:grid-cols-3 md:grid-cols-2">
        @forelse ($posts as $post)
                <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between items-center mb-5 text-gray-500">

                        {{-- Filtering/pencarian di halaman posts posts?category=  --}}
                        <a href="/posts?category={{ $post->category->slug }}">
                            <span class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">{{ $post->category->name }}</span>
                        </a>
                        <span class="text-sm ">{{ $post->created_at->diffforhumans()}}</span>
                    </div>
                    <a href="/posts/{{ $post->slug}}">
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h2>
                    </a>
                    <p class="mb-5 font-light text-gray-500 dark:text-gray-400"> {{ Str::limit($post->body, 150) }}</p>
                    <a href="/posts?author={{ $post->author->username}}">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-3">
                            <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="{{ $post->author->name }}" />
                            <span class="font-medium dark:text-white text-sm">
                                {{ $post->author->name }}
                            </span>
                        </div>
                        <a href="/posts/{{ $post->slug }}" class="inline-flex items-center font-medium text-sm text-primary-600 dark:text-primary-500 hover:underline">
                            Read more
                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </a>
                </article>    
        @empty
        <div class=" ">
            <p class="font-semibold text-xl my-4 ">Article Not Found</p>      
            <a href="/posts" class="block text-blue-600 hover:underline">&laquo; Back To All Posts</a>    
        </div>       
        @endforelse
            </div>  
        </div>
        {{ $posts->links() }}
       
</x-layout>