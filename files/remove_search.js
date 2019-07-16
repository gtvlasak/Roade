// This jQuery function will remove the search suggestions when the focus leaves the search bar.
// Substitute for the script i couldn't get to work at first in my autocomplete file, figured this one out later.
$(document).on('mouseleave', '.searchbar', function(){
    var $this = $('#city-list');
    setTimeout(function(){
      $this.remove();
    }, 100)

  });