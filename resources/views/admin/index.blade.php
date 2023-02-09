

@extends('admin.admin_master')


@include('admin.topbar')

@section('content')    


    
      <div class="sidebar">
         <ul class="space-y-2">
            <li>
             
                  <h5 style="margin-left: 4px;">Admin Dashboard</h5>
                 
              
            </li>
            <li>
               <a href="{{route('categories.index')}}" active="{{request()->routeIs('categories.index')}}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                  <span class="flex-1 ml-3 whitespace-nowrap">Categories</span>
               </a>
            </li>
            <li>
               <a href="{{route('services.index')}}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                  <span class="flex-1 ml-3 whitespace-nowrap">Services</span>
               </a>
            </li>
            <li>
               <a href="{{route('technicians.index')}}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                  <span class="flex-1 ml-3 whitespace-nowrap">Technicians</span>
               </a>
            </li>

            <li>
               <a href="{{route('secretaries.index')}}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                  <span class="flex-1 ml-3 whitespace-nowrap">Secretary</span>
               </a>
            </li>

            <li>
             
               <a href="{{route('requests.index')}}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                  <span class="flex-1 ml-3 whitespace-nowrap">Request</span>
               </a>
            </li>
            <li>
             
               <a href="{{route('users.index')}}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                  <span class="flex-1 ml-3 whitespace-nowrap">User</span>
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