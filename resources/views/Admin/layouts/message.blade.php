@if (Session::has('success'))
   <div class="bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full" role="alert">
         <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
        </svg>
            {{ session('success') }}
   </div>
       
@endif

@if (Session::has('delete'))
   <div class="bg-indigo-100 rounded-lg py-5 px-6 mb-3 text-base text-indigo-700 inline-flex items-center w-full" role="alert">
         <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
        </svg>
            {{ session('delete') }}
   </div>
       
@endif

@if (Session::has('addcomment'))
      <div class="alert-toast fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
    <input type="checkbox" class="hidden" id="footertoast">

    <label class="close cursor-pointer flex items-start justify-between w-full p-2 bg-green-400 h-24 rounded shadow-lg text-white" title="close" for="footertoast">
   
       {{ session('addcomment') }}
      <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
      </svg>
    </label>
  </div>
       
@endif


@if (Session::has('deletcomment'))
      <div  class="alert-toast fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
    <input type="checkbox" class="hidden" id="footertoast">

    <label class="close cursor-pointer flex items-start justify-between w-full p-2 bg-indigo-500 h-24 rounded shadow-lg text-white" title="close" for="footertoast">
   
       {{ session('deletcomment') }}
   <button type="button" onclick="close()">
      <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
      </svg>
   </button>  
    </label>
  </div>
       
@endif

<script>
   function close() {
      alert("Hello");
      document.querySelector('.alert-toast').classList.add('hidden');
   }
</script>




