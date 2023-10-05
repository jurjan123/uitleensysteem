<x-navbar></x-navbar>

    <div class="grid grid-cols-5 w-5/6 gap-x-6  ml-36 mt-28 ">
      
          <div class="shadow-lg rounded-lg overflow-hidden col-span-4">
           
              <table class="min-w-full  divide-y divide-gray-200 ">
                <thead>
                  <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Product Naam</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Afbeelding</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Aantal</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Garantie</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Lenen tot</th>
                    
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  @foreach($cart as $id => $details)
                  <tr>
                    <td class="px-6 py-4 whitespace-no-wrap">
                      <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                          
                          <p>{{$details["title"]}}</p>
                          </div>
                        <div class="ml-4">
                          
                        <div class="text-sm leading-5 font-medium text-gray-900"></div>
                        </div>
                      </div>
                      </td>
                      <td class="px-6 py-4 whitespace-no-wrap">
                        <a href="{{route("categories")}}"><img class="h-24 w-28 cursor-pointer shadow hover:shadow-lg transition-shadow transform hover:scale-95 " src="{{url("images/". $details["image"])}}" alt="User image"></a>
                        <div class="text-sm leading-5 text-gray-900"></div>
                      </td>
                      <td class="px-6 py-4 whitespace-no-wrap">
                        <select class="p-2 rounded-md border-2 border-black ..."  id="productQuantity" id="user" value="" aria-label="Default select example" name="quantity">
                          <option selected>{{$details["quantity"]}}</option>
                          @for ($i = 1; $i <= 10; $i++)
                          <option value="{{ $i }}" {{ $details['quantity'] == $i ? 'selected' : '' }}>{{ $i }}</option>
                          @endfor
                        </select>
                        <div class="text-sm leading-5 text-gray-900"></div>
                      </td>
                      <td class=" py-4 whitespace-no-wrap">
                        <div class="text-xl leading-5 text-gray-900">
                          <form action="{{route("cart.delete", $id)}}" method="POST" class="inline-flex" >
                            @csrf @method("delete")
                            <button type="submit" role="button" onclick="return confirm('Weet je zeker dat je  wilt verwijderen?')">
                            <i class="bi bi-trash ml-2 cursor-pointer text-red-600 hover:text-indigo-900" ></i>
                            </button>
                           </form> 
                          
                        
                         
                        </div>
                      </td>
                      <td class="px-6 py-4 whitespace-no-wrap">
                        <p><i class="bi bi-currency-euro"></i>{{$details["warranty"]}}</p>
                        
                      </td>
                     
                    </tr>
                    

                  </tbody>
                  @endforeach
                </table>
              </div>
              <div class="bg-gray-50  rounded-md mt-52 p-4 flex-col justify-between col-span-1">
                <ul class="list-group mb-3 ">
                  <li class="list-group-item flex justify-content-between p-3">
                    <span>Artikelen:</span>
                    
                    <strong>{{$articles}}</strong>
                  </li>
                  <!-- Loop through cart items -->
                 
                  <li class="list-group-item d-flex justify-content-between p-3">
                    <span>Totaal</span>
                    
                    <strong><i class="bi bi-currency-euro"></i>{{$subtotal}}</strong>
                  </li>
                  <li class="list-group-item d-flex float-right justify-content-between">
                    
                  </li>
                  </ul>
                  
                <button type="submit"  class="bg-purple-rgb ml-4 mt-8  p-3 w-40 text-xl text-white rounded-md "><a href="{{route("cart.order")}}">Nu reserveren</a></button>
              </div>
        
    </div>

    
    
    <script src="{{url("script.js")}}"></script>
</body>
</html>




