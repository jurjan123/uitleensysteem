var dropdown_main = document.getElementById("dropdown_main");
var username = document.getElementById("username");
username.addEventListener('click', function() {
    if (dropdown_main.classList.contains('hidden')) {
      dropdown_main.classList.remove('hidden');
      dropdown_main.classList.add('visible');
     
    } else {
      dropdown_main.classList.remove('visible');
      dropdown_main.classList.add('hidden');
      philosopersItem.classList.remove("text-gray-100")    
    }
  });