!function ($) {

    if (!$.fn.noUiSlider)
        return;

    var $sliders = $('input[type="range"]');
    alert($sliders.length);

    $sliders.each(function () {
        var $this = $(this),
            $parent = $this.parent(),
            $label = $('<span></span>'),
            min = 0,
            max = 100,
            start = 0,
            isSwitch = $this.hasClass('switch'),
            sliderCls = isSwitch ? 'switch' : 'slider',
            $slider = $('<div class="' + sliderCls + '"></div>'),
            states = ['Off', 'On'],
            setupState = true;//For switches


        //Set label
        $parent.find('.label').prepend($label);

        if ('value' in this.attributes)
            $label.html(this.attributes['value'].nodeValue);

        //Set values
        if (isSwitch) {
            min = 0;
            max = 1;

            if ($this.attr('data-state0') !== undefined)
                states[0] = $this.attr('data-state0');

            if ($this.attr('data-state1') !== undefined)
                states[1] = $this.attr('data-state1');

        }
        else {

            if ($this.attr('min') !== undefined)
                min = parseInt($this.attr('min'));

            if ($this.attr('max') !== undefined)
                max = parseInt($this.attr('max'));

        }

        if ('value' in this.attributes &&
            this.attributes['value'].nodeValue.length > 0)
            start = parseInt(this.attributes['value'].nodeValue);
        else
            start = min + max * 0.5;

        $this.hide();
        $slider.appendTo($parent);

        $slider.noUiSlider('init', {
            knobs: 1,
            start: [start, start],
            scale: [min, max],
            connect: "lower",
            change: Handle_Change
        });

        function Handle_Change(e) {
            var value = Get_Value();

            if (isNaN(value) || (setupState && isSwitch && start > 0 && start < 1))
                value = min;

            if (isSwitch)
                $label.html(states[value]);
            else
                $label.html(value);

            $this.val(value);

            setupState = false;
        }

        function Get_Value() {
            return $slider.noUiSlider('value')[1];
        }

        var $midbar = $slider.find('.noUi-midBar'),
            left = $midbar.css('left'),
            right = $midbar.css('right');

        if (left == '0px' && right == '0px' && Get_Value() != max) {
            $midbar.css({ right: $this.width() });
        }

        var $sliderHandle = $slider.find('.noUi-handle');


        if (isSwitch) {
            var currentValue = Get_Value(),
                isMouseDown = false;


            $(document).mouseup(function () {
                if (!isMouseDown)
                    return;

                var value = Get_Value();
                $slider.noUiSlider('move', { knob: 'upper', to: value, scale: [0, 1] });

                isMouseDown = false;
            });

            $sliderHandle.find('div').mousedown(function () {
                isMouseDown = true;
            });

            $slider.click(function () {
                currentValue = currentValue == 0 ? 1 : 0;

                $slider.noUiSlider('move', { knob: 'upper', to: currentValue, scale: [0, 1] });
            });

            Handle_Change();
        }


    });

}(window.jQuery);





  

