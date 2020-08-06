require('./bootstrap');

$(document).ready(function () {
    $('body').on('click', '.js__add-ingredient-item', function (e) {
        e.preventDefault();

        let first = $('.ingredient-item')[0];
        let el = $(first).clone();
        $(el)
            .find('.js__ingredient-item-button')
            .html('<button class="btn btn-danger js__remove-ingredient-item"><i class="fas fa-times"></i></button>');
        $(el).find('input').val('');

        $('.ingredient-container').append(el);
        $(this).blur();
    });

    $('body').on('click', '.js__remove-ingredient-item', function (e) {
        e.preventDefault();
        $(this).closest('.ingredient-item').remove();
    });
});
