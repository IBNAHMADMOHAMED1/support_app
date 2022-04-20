
<x-app-layout>
  <x-slot name="header">
     @if ($errors->any())
    <div>
        <div class="font-medium text-red-600">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </x-slot>

<div class="heading text-center font-bold text-2xl  text-gray-800">New Post</div>
<style>
  body {background:white !important;}
  
</style>

<form method="post" action="{{route('ticket.store')}}">
    @csrf
  <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
    
    <p class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false" placeholder="Title" type="text">
    {{$card->title}}
    </p>  
 

    <input type="hidden" name="serviceid" value="{{ $card->id }}">
    <input type="hidden" name="userid" value="{{Auth::user()->id}}">
    <input name="title" class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false" placeholder="Title" type="text">
    <textarea name="description" id="editor" class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none" spellcheck="false" placeholder="Describe everythnig about this Content her"></textarea>
    
    <!-- icons -->
    
    <!-- buttons -->
    <div class="buttons flex">
      <a  class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto">Cancel</a>
      <button class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">Create</button>
    </div>
</form>
</div>
</x-app-layout>


 <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

