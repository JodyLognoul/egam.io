var Page = function() {
    this.initialize();
    this.listen();
};
_.extend(Page.prototype, {
    initialize: function(options) {
        this.dropzone();
        this.datetimePicker();
        this.addressPicker();
        this.others();
    },

    listen: function() {

    },
    dropzone: function() {
        var eventPicturesDir = $('.uniqid').val();
        var existingPictures = $('.existing-pictures').val().split(';');
        Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone("div.pictures-dest", {
            url: "/picture",
            addRemoveLinks: true
        });

        var mockFile = {
            name: "banner2.jpg",
            size: '1337133'
        };
        console.log(existingPictures);
        existingPictures.forEach(function(pic) {
            myDropzone.options.addedfile.call(myDropzone, mockFile);
            myDropzone.options.thumbnail.call(myDropzone, mockFile, "http://local.egam.io/uploads/event_5378c98b19bc0/" + pic + "/sm.jpeg");
        });

        myDropzone.on("sending", function(file, xhr, formData) {
            formData.append("uniqid", eventPicturesDir);
        });
    },
    addressPicker: function() {
        // instantiate the addressPicker suggestion engine (based on bloodhound)
        var addressPicker = new AddressPicker({
            map: {
                id: '.map-dest'
            }
        });

        // instantiate the typeahead UI
        $('.input-address').typeahead(null, {
            displayKey: 'description',
            source: addressPicker.ttAdapter()
        });
        // Bind some event to update map on autocomplete selection
        $('.input-address').bind("typeahead:selected", addressPicker.updateMap);
        $('.input-address').bind("typeahead:cursorchanged", addressPicker.updateMap);


        $(addressPicker).on('addresspicker:selected', function(event, result) {

            $('.error-address').empty();

            var addr = {
                route: {
                    value: result.nameForType('route'),
                    msg: 'The street name'
                },
                street_number: {
                    value: result.nameForType('street_number'),
                    msg: 'The street number'
                },
                postal_code: {
                    value: result.nameForType('postal_code'),
                    msg: 'The postal code'
                },
                locality: {
                    value: result.nameForType('locality'),
                    msg: 'The Locality'
                },
                country: {
                    value: result.nameForType('country'),
                    msg: 'The Country'
                }
            };
            var addr_err = _.filter(addr, function(addr) {
                return !addr.value;
            });

            if (addr_err.length === 0) {
                $('.address-result').html(_.template($('.address-success-script').html(), addr));
                $('.address-result')
                    .append('<input type="hidden" name="route"          value="' + addr.route.value + '"/>')
                    .append('<input type="hidden" name="street_number"  value="' + addr.street_number.value + '"/>')
                    .append('<input type="hidden" name="postal_code"    value="' + addr.postal_code.value + '"/>')
                    .append('<input type="hidden" name="locality"       value="' + addr.locality.value + '"/>')
                    .append('<input type="hidden" name="country"        value="' + addr.country.value + '"/>');
            } else {
                $('.address-result').html(_.template($('.address-errors-script').html(), {
                    errors: addr_err
                }));
            }
        });
    },
    datetimePicker: function() {
        var inputDatetime = $('.dest-datetime-input').val();
        if (inputDatetime) {
            console.log('inputDatetime');
            var day = moment(inputDatetime);
            $('.dest-date-time').html('<blockquote><p>' + day.format("dddd, Do MMMM YYYY") + '</p><footer>' + day.format("h:mm a") + '</footer></blockquote><blockquote><p class="dest-datetime-rem"><i class="fa fa-clock-o"></i> ' + day.fromNow() + '</p></blockquote>');
        }
        $('.datetimepicker').datetimepicker({
            minDate: moment().format(),
            defaultDate: $('.dest-datetime-input').val() || moment().format(),
            minuteStepping: 5,
            language: 'en',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            }
        }).on("dp.change", function(e) {
            console.log('dp.change');
            var day = moment(e.date._d);
            $('.error-date').empty();
            $('.dest-date-time').html('<blockquote><p>' + day.format("dddd, Do MMMM YYYY") + '</p><footer>' + day.format("h:mm a") + '</footer></blockquote><blockquote><p class="dest-datetime-rem"><i class="fa fa-clock-o"></i> ' + day.fromNow() + '</p></blockquote>');
            $('.dest-datetime-input').val(day.format());
        });
    },
    others: function() {
        // jQuery to enable register
        var url = document.location.toString();
        if (url.match('#')) {
            $('.collapse-link-' + url.split('#')[1]).trigger('click');
        }
    }
});
new Page();