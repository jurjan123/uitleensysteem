<x-navbar></x-navbar>

    
        <div class=" w-2/3 h-3/4  bg-gray-100 text-black ml-64 mt-20 p-6 rounded-lg shadow-md">
            <div>
                <h2 class="text-center text-3xl font-extrabold">
                    Inloggen
                </h2>
            </div>
            <form action="{{route("login.store")}}" method="POST" class="space-y-5 ml-48 grid grid-cols-2   justify-center ">
            @csrf    
                   
                
                    <div class="col-span-1    mt-auto flex flex-col">
                        <label for="password" >Email</label>
                        <input id="password" name="email" value="{{old("email")}}"  class=" rounded-md w-1/2  px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" >
                        @error("email")
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    
                    </div>
                    <div class="col-span-1   mt-auto flex flex-col">
                        <label for="password" >Wachtwoord</label>
                        <input id="password" name="password" type="password"  class=" rounded-md w-1/2  px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                        @error("password")
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    
                <div class="">
                    <button type="submit"   class="group items-center  w-36 py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Inloggen
                    </button>
                </div>
            </form>
        
    </div>



</body>
</html>