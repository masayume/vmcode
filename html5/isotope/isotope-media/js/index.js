// external js: isotope.pkgd.js


// init Isotope
var $grid = $('.grid').isotope({
  itemSelector: '.element-item',
  layoutMode: 'fitRows',
  getSortData: {
    name: '.name',
    symbol: '.symbol',
    number: '.number parseInt',
    year: '.year parseInt',
    minutes: '.minutes parseInt',
    score: '.score parseInt',
    length: '.length parseInt',
    category: '[data-category]',
    weight: function( itemElem ) {
      var weight = $( itemElem ).find('.weight').text();
      return parseFloat( weight.replace( /[\(\)]/g, '') );
    }
  }
});

// filter functions
var filterFns = {
  // show if number is greater than 50
  numberGreaterThan50: function() {
    var number = $(this).find('.number').text();
    return parseInt( number, 10 ) > 50;
  },
  // show if name ends with -ium
  ium: function() {
    var name = $(this).find('.name').text();
    return name.match( /ium$/ );
  }
};

// bind filter button click
$('#filters').on( 'click', 'button', function() {
  // This line selects the HTML element with the ID 'filters'.
  // Then, it uses the jQuery .on() method to attach an event listener.
  // The event listener is set up to listen for a 'click' event.
  // The second argument, 'button', means that the event will only fire
  // if the clicked element is a 'button' element that is a descendant
  // of the '#filters' element. This is called event delegation.

  var filterValue = $( this ).attr('data-filter');
  // 'this' inside the function refers to the specific button that was clicked.
  // $(this) wraps that button in a jQuery object.
  // .attr('data-filter') then retrieves the value of the 'data-filter' attribute
  // from the clicked button. In your case, for `<button data-filter=".Action">`,
  // filterValue would become ".Action".

  filterValue = filterFns[ filterValue ] || filterValue;
  // This line is a bit more advanced and assumes you might have custom filter functions.
  // 'filterFns' is expected to be an object (or a Map) where keys are filter values
  // and values are functions.
  // - If `filterFns[filterValue]` exists (i.e., there's a custom function associated
  //   with the `filterValue`), then `filterValue` will be updated to that function.
  // - If `filterFns[filterValue]` does *not* exist (which is likely your case if
  //   you're just filtering by class names), then `filterValue` remains its original value
  //   (e.g., ".Action").
  // This is a common pattern for providing default behavior if a specific
  // override isn't found.  

  $grid.isotope({ filter: filterValue });
  // This is the core line that interacts with Isotope.js.
  // `$grid` is expected to be a jQuery object representing the container
  // of your filterable items (e.g., `$('.grid')`).
  // `.isotope({ filter: filterValue })` tells Isotope to re-layout the grid
  // and show only the items that match the `filterValue`.
  // If `filterValue` is ".Action", Isotope will show all elements with the class 'Action'.
  // If `filterValue` was a function, Isotope would use that function to determine
  // which items to show.


});





// bind sort button click
$('#sorts').on( 'click', 'button', function() {
  var sortByValue = $(this).attr('data-sort-by');
  $grid.isotope({ sortBy: sortByValue });
});

// change is-checked class on buttons
$('.button-group').each( function( i, buttonGroup ) {
  var $buttonGroup = $( buttonGroup );
  $buttonGroup.on( 'click', 'button', function() {
    $buttonGroup.find('.is-checked').removeClass('is-checked');
    $( this ).addClass('is-checked');
  });
});