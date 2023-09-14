<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
</head>
<body class="p-0 m-0">
    <nav class="bg-dark-blue-rgb p-9 flex justify-between">
        <ul class="flex gap-6 text-white text-xl justify-items-start cursor-pointer">
            <li class="ml-20 hover:bg-purple-500 hover:rounded-sm">Home</li>
            <li class="hover:bg-purple-500  hover:rounded-sm ">Reserveren</li>
            <li class="hover:bg-purple-500 hover:rounded-sm">Mijn historie</li>
            <li class="hover:bg-purple-500 hover:rounded-sm">Contact</li>

            <input type="text" class="ml-20 w-80  rounded-sm text-sm pl-2 p-2 " placeholder="Zoek naar materialen....." >
            <div class="right-24 w-48 justify-between absolute flex text-md">
            @guest
            <li class="">inloggen</li>
            <li class=" ">registreren</li>
            @endguest
            @auth
            <li class="">Mijn profiel</li>
            @endauth
            </div>
            
        </ul>
      
    </nav>
</body>
</html>