@props(['msg', 'bg' => 'bg-green-500'])

<p class="mb-2 text-sm font-medium text-white  px-4 py-3 rounded-lg shadow-md flex items-center transition-all duration-300 ease-in-out {{$bg}}">
    <svg class="w-5 h-5 text-white mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
    </svg>
    {{ $msg }}
</p>
