
<x-admin-layout>

     <x-slot name="header">
       
    </x-slot>

    
    <form method="POST" action= {{route('admin.services.update',$service->id)}} >
         @csrf
         @method('put')
 
         
                
              @include('Admin.layouts.form')
                
                <button type="submit" class=" flex items-center px-4 py-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-700 rounded-md sm:mx-2 hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                   
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" /></svg>          
                    <span>Update</span>
                 </button>
                
            </div>
        </div>
    </form>


</x-admin-layout>
