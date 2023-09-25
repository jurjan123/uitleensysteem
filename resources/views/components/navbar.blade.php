<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="{{asset("css/app.css")}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    </head>
    <body class="p-0 m-0">
        <nav class="bg-dark-blue-rgb p-6 pl-16 flex justify-between">
            <ul class="flex gap-6 text-white text-xl  justify-items-start cursor-pointer">
                <li class="ml-20 mt-1 @if(Route::is("index")) bg-purple-500 @endif hover:bg-purple-500 hover:rounded-sm"><a href="{{route("index")}}">Home</a></li>
                <li class="mt-1 hover:bg-purple-500  hover:rounded-sm ">Reserveren</li>
                <li class="mt-1 hover:bg-purple-500 hover:rounded-sm">Mijn historie</li>
                <li class="mt-1 hover:bg-purple-500 hover:rounded-sm">Contact</li>
    
                <input type="text" class="ml-20 w-80 text-black  rounded-sm text-sm pl-2 p-2 " placeholder="Zoek naar materialen....." >
                <div class="right-28 w-48 justify-between absolute flex text-md">
                @guest
                <li class="mt-1">Inloggen</li>
                <li class="mt-1"><a href="{{route("register")}}">Registreren</a></li>
                @endguest
                @auth
                <div>
                    
                    <button id="dropdown_main_button" data-dropdown-toggle="dropdown_main"
                        class="float-right  text-white font-medium rounded-lg text-md px-5 mt-1 ml-28  text-center inline-flex items-center"
                        type="button"><li id="username">{{ Auth::user()->first_name }}</li> <svg class="w-2.5 h-2.5 ml-2.5" id="username" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>
                    <div id="dropdown_main" class="z-10 mt-10 ml-5 hidden   bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdown_main_button">
                            <li>
                                <a href="" class="block px-4 py-2 hover:bg-gray-100">Beheer paneel</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Profiel</a>
                            </li>
                            <li>
                                <a href="" class="block px-4 py-2 hover:bg-gray-100"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Uitloggen</a>
                                <form id="logout-form" style="display: none;" action="{{route("logout")}}" method="POST">
                                    @csrf
                                </form>

                               
                            </li>
                        </ul>
                    </div>
                </div>
               
                @endauth
                </div>
                
            </ul>
          
        </nav>
       
    