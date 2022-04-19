<x-app-layout>
  <x-slot name="header">
</x-slot>



<div class="flex  shadow-lg rounded-lg mx-52 md:mx-auto  mt-5 max-w-md md:max-w-2xl  ">
@include('Admin.layouts.message')
</div>

@if (count($Tickets) <= 0)
    <div v-if="Appointments.length <=0">
     
      <div class="flex items-center justify-center ">
    <div class="px-4 lg:py-12">
        <div class="lg:gap-4 lg:flex">
            <div class="flex flex-col items-center justify-center md:py-24 lg:py-32">
                <h1 class="mb-8 font-bold text-blue-600 text-5xl">No Tickets</h1>
                <p class="mb-8 text-2xl font-bold text-center text-gray-800 md:text-3xl">
                    <span class="text-red-500">Oops!</span> You don't have any Tickets yet.
                </p>
                
                <a href= "{{ route('dashboard.index')}}" class="px-6 py-2 text-sm font-semibold text-blue-800 bg-blue-100">Create One
                    </a>
            </div>
        </div>
    </div>
</div>
@endif
      
   <!-- post card -->
@foreach ($Tickets as $ticket)

<div class="flex bg-white shadow-lg rounded-lg mx-52 md:mx-auto  mt-5 max-w-md md:max-w-2xl  "><!--horizantil margin is just for display-->
   <div class="flex items-start px-4 py-4 pt-0 ">

      <img class="w-12 h-12 rounded-full object-cover mr-4 shadow" src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="avatar">
      <div class="">
         <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold text-gray-900 -mt-1">{{ Auth::user()->name }} </h2>
           <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">
   {{$ticket->statuses->name}}
</span>
            <small class="text-sm text-gray-700">{{ $ticket->created_at->diffForHumans() }}</small>
         </div>
         <p class="text-gray-700"> Joined {{ Auth::user()->created_at->diffForHumans() }}</p>
         <div class="">
          <h2 class="text-lg font-semibold text-gray-800 -mt-1">{{ $ticket->title }} </h2>
         <p class="mt-3 text-gray-700 text-sm w-70" style="width: 486px;">
             {!! html_entity_decode( $ticket->description ) !!}
             {{-- <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1361&q=80"> --}}
            </div>
            
            <div class="mt-4 flex items-center">
            <a href="" class="flex mr-2 text-gray-700 text-sm mr-3 ">
               <svg fill="none" viewBox="0 0 24 24"  class="w-6 h-6 mr-1" stroke="currentColor">
                  <path class=" " stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
               
               </a>
            <a href= {{ route('ticket.show', $ticket->id) }} class="flex  text-gray-700 text-sm mr-8">
               <svg fill="none" viewBox="0 0 24 24" class="w-6 h-6 mr-1" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
               </svg>
              
            </a>

           
            </form>
           
         </div>
         <form method="post"style="display: none" id= 'form'>
            <form class="flex items-start space-x-6 pl-6 py-2 rounded-lg bg-white ">
               <div class="shrink-0">
          <img class="md:h-12 md:w-12 lg:h-12 lg:w-12 h-10 w-10 object-cover rounded-full" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1361&q=80" alt="Current profile photo" />
        </div> 
        <div class='flex flex-col bg-gray-100 w-9/12 rounded-lg px-3 pb-3 '>
           <div class="title-font text-sm md:text-base  lg:text-1xl font-bold pt-3 text-gray-900">Knausgaard typewriter </div>
          <div class='md:text-sm text-xs  '>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque semper, nisi in vehicula tempus, nulla lacus vulputate sem, nec vehicula sem arcu sed sapien. Nulla interdum dictum quam, et semper odio ultricies sed. Morbi sollicitudin dui ac euismod vestibulum. Nam tellus erat, fringilla ac ornare imperdiet, fringilla id sem</div>
        </div>
      </div>

    </form>
   </div>
 
</div>
@endforeach

</x-app-layout>

<script >

   function CreateComment () {
      
      document.getElementById('form').style.display = 'block';
   }
  
</script>