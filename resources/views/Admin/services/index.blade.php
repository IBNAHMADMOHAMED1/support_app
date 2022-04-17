
<x-admin-layout>

     <x-slot name="header">
       
    </x-slot>


@if (count($services) <= 0)
vide 


@else
<div class="w-2/3 mx-auto">





  
  <div class="bg-white shadow-md rounded my-6">
  

    @include('Admin.layouts.message')
    
    
    <table class="text-left w-full border-collapse"> 
      <thead>
        <tr>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">service</th>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Actions</th>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">svg</th>
        </tr>
      </thead>
      <tbody>
    @foreach ($services as $service)
        <tr class="hover:bg-grey-lighter">
          <td class="py-4 px-6 border-b border-grey-light">{{$service['title']}}</td>
          <td class="py-4 px-6 border-b border-grey-light flex ">
            <a href="{{route('admin.services.edit',$service['id'])}}"  id="edite" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-800 ">Edit</a>
            
            <form action= "{{route('admin.services.destroy',$service['id'])}}" method="post" >
              @csrf
              @method('delete')
              <button type="submit" class="text-red-600 font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark">delete</button>
            </form>
          </td>
          <td class="py-4 px-6 border-b border-grey-light">
                <div class="w-5 h-5 flex-shrink-0 mr-2 sm:mr-2">
                   {!! html_entity_decode($service['svg']) !!}
               </div>
          </td>
        </tr>
    @endforeach
        
     
       
      </tbody>
    </table>
  </div>
</div>

@endif


</x-admin-layout>
