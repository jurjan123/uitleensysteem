<div class="bg-gray-100  text-black h-64 col-span-1 row-span-3  text-xl gap-y-12">
    <p class="border-solid h-16 pl-12 cursor-pointer border-2 pt-4 hover:bg-gray-50">Producten</p>
    <p class="border-solid h-16 pl-12 cursor-pointer border-2 pt-4 hover:bg-gray-50">Categorieen</p>
    <a href="{{route("admin.users.index")}}"><i class="bi bi-person-fill"></i><p class="border-solid h-16 pl-12 cursor-pointer border-2 pt-4  @if(Route::is("admin.users.index")) bg-gray-50 @endif hover:bg-gray-50">Gebruikers</p></a>
    <p class="border-solid h-16 pl-12 cursor-pointer border-2 pt-4 hover:bg-gray-50">Reserveringen</p>
</div>