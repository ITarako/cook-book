require('./bootstrap');

$(document).ready(function () {
    $('body').on('click', '.js__add-ingredient-item', function (e) {
        e.preventDefault();
        let items = $('.ingredient-item');
        if (!items.length) {
            return;
        }
        let $last = $(items[items.length - 1]);
        let $el = $($last.clone());
        $el
            .find('.js__ingredient-item-button')
            .html('<button class="btn btn-danger js__remove-ingredient-item"><i class="fas fa-times"></i></button>');

        let idx = $last.data('idx') + 1;
        $el.data('idx', idx)
        $el.find('.form-control').val('');
        $el.find('.js__ingredient-item-name').prop('name', 'ingredients[' + idx + '][name]');
        $el.find('.js__ingredient-item-count').prop('name', 'ingredients[' + idx + '][count]');
        $el.find('.js__ingredient-item-unit_id').prop('name', 'ingredients[' + idx + '][unit_id]');

        $('.js__ingredient-container').append($el);
        $(this).blur();
    });

    $('body').on('click', '.js__remove-ingredient-item', function (e) {
        e.preventDefault();
        $(this).closest('.ingredient-item').remove();
    });
});
