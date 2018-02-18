$(function () {

    var api = '/api/states';

    $('html').ready(function () {
        $.get(api)
            .done(function (states) {
                states.forEach(function (state) {
                    $('#state_id').append(
                        '<option value="' + state.id + '">' + state.abbreviation + '</option>'
                    );
                });

                $('#state_id').val(43).change(); // RS
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
                    cityId.append(
                        '<option value="' + city.id + '">' + city.name + '</option>'
                    );
                });
            })
            .fail(function () {
                console.log('Erro ao carregar as cidades!');
            });
    });

});
