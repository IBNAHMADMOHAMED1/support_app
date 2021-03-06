<x-app-layout>
   <x-slot name="header">
      See Notification
   <a href="{{route('notification.index')}}" class="">   
           <span class="relative inline-block">
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" class="sc-15iua2v-0 dIfPYi"><path d="M17.333 8.6c0-1.485-.562-2.91-1.562-3.96A5.208 5.208 0 0012 3c-1.415 0-2.771.59-3.771 1.64A5.745 5.745 0 006.667 8.6C6.667 15.133 4 17 4 17h16s-2.667-1.867-2.667-8.4zM14 20a2.186 2.186 0 01-.846.732A2.588 2.588 0 0112 21c-.405 0-.803-.092-1.154-.268A2.186 2.186 0 0110 20" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="colorStroke"></path></svg>  <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">
{{ $notification }}
  </span>
</span>
   </a>
   </x-slot>



   <div class="flex  shadow-lg rounded-lg mx-52 md:mx-auto  ">
      @include('Admin.layouts.message')
   </div>

   @if (count($Tickets) <= 0) <div v-if="Appointments.length <=0">

      <div class="flex items-center justify-center ">
         <div class="px-4 lg:py-12">
            <div class="lg:gap-4 lg:flex">
               <div class="flex flex-col items-center justify-center md:py-24 lg:py-32">
                  <h1 class="mb-8 font-bold text-blue-600 text-5xl">No Tickets</h1>
                  <p class="mb-8 text-2xl font-bold text-center text-gray-800 md:text-3xl">
                     <span class="text-red-500">Oops!</span> You don't have any Tickets yet.
                  </p>

                  <a href="{{ route('dashboard.index')}}"
                     class="px-6 py-2 text-sm font-semibold text-blue-800 bg-blue-100">Create One
                  </a>
               </div>
            </div>
         </div>
      </div>
      @endif

      <!-- post card -->
      @foreach ($Tickets as $ticket)

      <div class="flex bg-white shadow-lg rounded-lg mx-52 md:mx-auto  mt-5 max-w-md md:max-w-2xl  ">
         <!--horizantil margin is just for display-->
         <div class="flex items-start px-4 py-4 pt-0 ">

            <img class="w-12 h-12 rounded-full object-cover mr-4 shadow"
               src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
               alt="avatar">
            <div class="">
               <div class="flex items-center justify-between">
                  <h2 class="text-lg font-semibold text-gray-900 -mt-1">{{ Auth::user()->name }} </h2>
                  <span
                     class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">
                     {{$ticket->statuses->name}}
                  </span>
                  <small class="text-sm text-gray-700">{{ $ticket->created_at->diffForHumans() }}</small>
               </div>
               <p class="text-gray-700"> Joined {{ Auth::user()->created_at->diffForHumans() }}</p>
               <div class="">
                  <h2 class="text-lg font-semibold text-gray-800 -mt-1">{{ $ticket->title }} </h2>
                  <p class="mt-3 text-gray-700 text-sm w-70" style="width: 486px;">
                     {!! html_entity_decode( $ticket->description ) !!}
                     {{-- <img
                        src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1361&q=80">
                     --}}
               </div>

               <div class= "mt-3 flex items-center justify-between">
                     <div class="flex items-center">
                        <a href="" class="flex mr-2 text-gray-700 text-sm mr-3 ">
                           <svg fill="none" viewBox="0 0 24 24" class="w-6 h-6 mr-1" stroke="currentColor">
                              <path class=" " stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                           </svg>
                        </a>
                        <a href={{ route('ticket.show', $ticket->id) }} class="flex text-gray-700 text-sm mr-8">
                           <svg fill="none" viewBox="0 0 24 24" class="w-6 h-6 mr-1" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                           </svg>

                           <samp> {{ $ticket->comments->count() }} comments</samp>
                        </a>
                        </form>
                     </div>  
                     <div class="flex ">
                        <form method="post" action="{{ route('ticket.edit', $ticket->id)}}">
                           @csrf
                           @method('GET')
                        <button type='submit'
                       class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold text-green-500  rounded">Edit</button>
                        </form>
                     <form method="post" action="{{ route('ticket.destroy', $ticket->id) }}">
                        @csrf
                        @method('DELETE')
                       
                      <button type='submit'
                        class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold text-red-500  rounded">Remove</button>
                     </form>
                     </div> 
                  </div>

   
 
{{-- create a @section --}}



              
            </div>
         </div>

      </div>
      @endforeach

</x-app-layout>

<script>

   function CreateComment() {

      document.getElementById('form').style.display = 'block';
   }



</script>