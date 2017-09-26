!function ($) {

    $('.px-input-icon').each(function () {
            var $list = $(this),
            $input = $list.find('input'),
            $icons = $list.find('.px-icon'),
            $selected = $(),
            $inputval = $input.val();
           
            if ($inputval.length !== 0) {
                $(this).find("span.icon-" + $inputval).addClass('selected');
            }


        $icons.click(function () {
            var $icon = $(this);

            if ($icon.hasClass('selceted'))
                return;

            $selected = $icon.siblings();
            $selected.removeClass('selected');
            $icon.addClass('selected');
            $selected = $icon;

            $input.val($icon.attr('data-name'));
        });

    });


}(window.jQuery);