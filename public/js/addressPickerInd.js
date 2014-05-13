// instantiate the addressPicker suggestion engine (based on bloodhound)
var addressPicker = new AddressPicker({map: {id: '.map-dest'}});

// instantiate the typeahead UI
$('.input-address').typeahead(null, {
  displayKey: 'description',
  source: addressPicker.ttAdapter()
});

// Bind some event to update map on autocomplete selection
$('.input-address').bind("typeahead:selected", addressPicker.updateMap);
$('.input-address').bind("typeahead:cursorchanged", addressPicker.updateMap);

// 
$(addressPicker).on('addresspicker:selected', function (event, result) {
	var addr = {
		route 			: { value:result.nameForType('route'), msg:'The street name'},
		street_number	: { value:result.nameForType('street_number'), msg:'The street number'},
		postal_code		: { value:result.nameForType('postal_code'), msg:'The postal code'},
		locality		: { value:result.nameForType('locality'), msg:'The Locality'},
		country			: { value:result.nameForType('country'), msg:'The Country'}
	};
	var addr_err = _.filter(addr, function(addr){
		return  ! addr.value;
	});

	if (addr_err.length ===  0) {
		$('.address-result').html(_.template( $('.address-success-script').html(), addr ));
	} else {
		$('.address-result').html(_.template( $('.address-errors-script').html(), {errors : addr_err} ));
	}

});