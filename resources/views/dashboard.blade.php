<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('How can we help?') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!

                    ana user
                </div>
            </div>
        </div>
    </div>



  @php

  $svg = 
  [
    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>',
    '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>',
    '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 20a10 10 0 110-20 10 10 0 010 20zm7.75-8a8.01 8.01 0 01-.955 2.243l-3.86-3.86a4.02 4.02 0 00.96-2.21A4.001 4.001 0 0013.75 4zM10 4a4 4 0 114 4 4 4 0 01-4-4z"></path></svg>',
    '<svg height="32" class="octicon octicon-report" viewBox="0 0 24 24" version="1.1" width="32" aria-hidden="true"><path fill-rule="evenodd" d="M3.25 4a.25.25 0 00-.25.25v12.5c0 .138.112.25.25.25h2.5a.75.75 0 01.75.75v3.19l3.427-3.427A1.75 1.75 0 0111.164 17h9.586a.25.25 0 00.25-.25V4.25a.25.25 0 00-.25-.25H3.25zm-1.75.25c0-.966.784-1.75 1.75-1.75h17.5c.966 0 1.75.784 1.75 1.75v12.5a1.75 1.75 0 01-1.75 1.75h-9.586a.25.25 0 00-.177.073l-3.5 3.5A1.457 1.457 0 015 21.043V18.5H3.25a1.75 1.75 0 01-1.75-1.75V4.25zM12 6a.75.75 0 01.75.75v4a.75.75 0 01-1.5 0v-4A.75.75 0 0112 6zm0 9a1 1 0 100-2 1 1 0 000 2z"></path></svg>',
  ];

  



 
  @endphp
    
    
    <!-- This is an example component -->
<div class="py-5">
        <main class="h-full overflow-y-auto">
            <div class="container  mx-auto grid">
           
            
              <!-- Cards -->
              <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                <!-- Card -->
                @foreach($cards as $card)
                <a href="{{ route('dashboard.show',$card->id)}}"
                 class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700 no-underline cursor-pointer ">
                  <div class="p-3 mr-4 text-orange-200 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                      {!! html_entity_decode($card->svg) !!}
                  </div>
                  <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                      {{$card->title}}
                    </p>
                    
                  </div>
                </a>
                @endforeach
              </div>
  
            </div>
        </main>
    </div>



</x-app-layout>


