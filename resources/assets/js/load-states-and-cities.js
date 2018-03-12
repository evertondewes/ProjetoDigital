$(function () {

    var api = '/api/states';

    $('html').ready(function () {
        $.get(api)
            .done(function (states) {
                states.forEach(function (state) {
                    var properties = {
                        text: state.abbreviation,
                        value: state.id,
                        selected: state.abbreviation.toUpperCase() === window.appState.toUpperCase()
                    };

                    var option = $('<option>', properties);

                    $('#state_id').append(option);
                });

                $('#state_id').change();
            })
            .fail(function () {
                console.log('Erro ao carregar os estados!');
            })
    });

    $('#state_id').on('change', function () {
        $.get(api + '/' + $(this).val() + '/cities')
            .done(function (cities) {
                var cityId = $('#city_id');

                cityId.empty();

                cities.forEach(function (city) {
                    var properties = {
                        text: city.name,
                        value: city.id,
                        selected: city.name.toLowerCase() === window.appCity.toLowerCase()
                    };

                    var option = $('<option>', properties);

                    cityId.append(option);
                });
            })
            .fail(function () {
                console.log('Erro ao carregar as cidades!');
            });
    });

});
