// JS/AJAX/jQuery autocomplete function

$(document).ready(function(){ // Function begins when document is ready
	$(".search_input").keyup(function(){ // Continues on keyup in the search bar
		$.ajax({ // Start of AJAX call
		type: "POST",
		url: "city_list.php", // Necessary parameters
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$(".search_input").css("background","none"); // Search input background is emptied
		},
		success: function(data){
			$(".suggested").show();
			$(".suggested").html(data); // Still kept empty upon success, save the shown value.
            $(".search_input").css("background","none"); // Class suggested is given a background color to match as a dropdown.
		}
		});
	});
});
// Selects city name if available via set up fleets.
function selectCity(val) {
$(".search_input").val(val);
$(".suggested").hide();
$(".suggested").css("background","#353b48;"); // Color change
}

$('.suggested').blur(function(){ // Blur function that will remove the dropdown when the search bar isn't focus/shrinks back down.
    var $this = $(this);
    setTimeout(function(){
      $this.remove('#city-list');
    }, 100)
  });