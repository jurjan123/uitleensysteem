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


  var category_item = document.getElementById("category_item");
var category_dropdown = document.getElementById("category_dropdown");
category_item.addEventListener('click', function() {
    if (category_dropdown.classList.contains('hidden')) {
      category_dropdown.classList.remove('hidden');
      category_dropdown.classList.add('visible');
     
    } else {
      category_dropdown.classList.remove('visible');
      category_dropdown.classList.add('hidden');
      category_dropdown.classList.remove("text-gray-100")    
    }
  });

  function updateQuantity(productId, selectElement) {
    fetch('/cart/update/' + productId, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            // Add this to make sure Laravel handles the request as AJAX
            'X-Requested-With': 'XMLHttpRequest', 
            // Add the CSRF token, Laravel needs this for POST requests
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            quantity: selectElement.value
        })
    })
    .then(response => location.reload())
    .catch(error => console.error('Error:', error));
}
