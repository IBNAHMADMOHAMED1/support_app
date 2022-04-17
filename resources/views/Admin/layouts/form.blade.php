


   <div class="max-w-3xl px-6 py-16 mx-auto text-center">
            <h1 class="text-3xl font-semibold text-gray-800 ">Create New Service</h1>
            <p class="max-w-md mx-auto mt-5 text-gray-500 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, minus tempora nemo quos</p>
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
<div class="flex flex-col mt-8 space-y-3 sm:space-y-0 sm:flex-row sm:justify-center sm:-mx-2">
    
    
    <input  name="title" id="" type="text" class="px-4 py-2 text-gray-700  border rounded-md sm:mx-2   dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40" placeholder="title service"  value="{{old('title',$service->title ?? null)}}">
    <input  name="svg" id="" type="text" class="px-4 py-2 text-gray-700  border rounded-md sm:mx-2   dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40" placeholder="svg service"  value="{{old('title',$service->svg ?? null)}}">

  