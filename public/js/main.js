+function(){
	$('.target-picture').on('click', function () {
		$('input[type=file]').trigger('click');	
	});

	$('input[type=file]').on('change', function(e) {
		console.log(e);
        var $img = $('<img>').attr({
        	src: e.target.value.replace(/^.+\\/, '')
        });

		$('.target-picture').empty().append($img);
	});

}();