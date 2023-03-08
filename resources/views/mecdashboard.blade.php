

@extends('layouts.app')
  
@include('components.Topbar')
@section('content')
        
  
<div class="sidebar">
   <ul class="space-y-2">
      <li>
         <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">

            <span class="ml-3">Mech</span>
         </a>
      </li>
      <li>
         <a href="" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <span class="flex-1 ml-3 whitespace-nowrap">Categories</span>
         </a>
      </li>
      <li>
         <a href=" " class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <span class="flex-1 ml-3 whitespace-nowrap">Services Offered</span>
         </a>
      </li>
      <li>
         <a href="" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <span class="flex-1 ml-3 whitespace-nowrap">Technicians</span>
         </a>
      </li>
    

      <li>
       
         <a href="" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <span class="flex-1 ml-3 whitespace-nowrap">Request</span>
         </a>
      </li>

      <li>
         <a href="" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <span class="flex-1 ml-3 whitespace-nowrap">profile</span>
         </a>
      </li>
   </ul>
</div>




@endsection









