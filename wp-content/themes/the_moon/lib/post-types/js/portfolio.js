(function ($) {

    function ImageFields() {
        var $imageSec = $('.section-gallery'),
            $fields = $imageSec.find('.upload-field'),
            $dupBtn = $('<a class="duplicate-button" href="#">Add Image</a>'),
            $remBtn = $('<a class="remove-button" href="#">Remove</a>');

        //Click handler for remove button
        $remBtn.click(function (e) {
            e.preventDefault();

            var $this = $(this);

            $this.parent().remove();

            $fields = $imageSec.find('.upload-field');

            if ($fields.length < 2)
                //Remove the button
                $fields.find('.remove-button').remove();
        });


        //Add remove button if there is more than one image field
        if ($fields.length > 1)
            $fields.append($remBtn.clone(true));

        //Add duplicate button after last upload field
        $fields.filter(':last').after($dupBtn);

        $dupBtn.click(function (e) {
            e.preventDefault();

            //Don't try to reuse $fields var above ;)
            $fields = $imageSec.find('.upload-field');
            var $lastField = $fields.filter(':last'),
                $clone = $lastField.clone(true);

            //Clear the value (if any)
            $clone.find('input[type="text"]').val('');

            $lastField.after($clone);

            //Refresh
            $fields = $imageSec.find('.upload-field');
            //Add 'remove' button to all fields
            //Rest of 'remove' buttons will get cloned
            if ($fields.length == 2)
                $fields.append($remBtn.clone(true));
        });
    }

    function AttributesFields() {

        for (i = 0; i < $(".attribute-value").length; i++) {
            $(".section-attribute").prepend($(".attribute-value")[i]);
            $(".section-attribute").prepend($(".attribute-title")[i]);
        }
        $(".section-attribute").prepend($(".section-attribute .section-head"));

        var $attributeSec = $('.section-attribute'),
            $fields = $attributeSec.find('.attribute-value'),
            $dupBtn = $('<a class="duplicate-button" href="#">Add Attribute</a>'),
            $remBtn = $('<a class="remove-button" href="#">Remove</a>');

        //Click handler for remove button
        $remBtn.click(function (e) {
            e.preventDefault();

            var $this = $(this);

            $this.parent().prev().remove();
            $this.parent().remove();

            $fields = $attributeSec.find('.attribute-value');

            if ($fields.length < 2)
                //Remove the button
                $fields.find('.remove-button').remove();
        });


        //Add remove button if there is more than one image field
        if ($fields.length > 1)
            $fields.append($remBtn.clone(true));

        //Add duplicate button after last upload field
        $fields.filter(':last').after($dupBtn);

        $dupBtn.click(function (e) {
            e.preventDefault();

            //Don't try to reuse $fields var above ;)
            $fields = $attributeSec.find('.attribute-value');
            var $lastField = $fields.filter(':last'),
                $clone2 = $lastField.prev().clone(true);
            $clone1 = $lastField.clone(true);

            //Clear the value (if any)
            $clone1.find('input[type="text"]').val('');
            $clone2.find('input[type="text"]').val('');

            $lastField.after($clone1);
            $lastField.after($clone2);

            //Refresh
            $fields = $attributeSec.find('.attribute-value');
            //Add 'remove' button to all fields
            //Rest of 'remove' buttons will get cloned
            if ($fields.length == 2)
                $fields.append($remBtn.clone(true));
        });
    }

    function PostFormats() {
        var $formats = $('input[name="post_format"]'),
            $metaBox = $('.px-main'),
            $metaBoxParent = $metaBox.parents('.postbox').eq(0),
            $sections = $metaBox.find('.section');

        function changeHandler() {
            var selected = $formats.filter(':checked').val(),
                $sec = $metaBox.find('.section-' + selected +',.section-seo_description,.section-seo_keywords'),
				$featureSize = $metaBox.find('.section-featured-size'),
                $attribute = $metaBox.find('.section-attribute'),
                $pHoverSubtitle = $metaBox.find('.section-portfolio-hover-subtitle'),
                $pSocailShare = $metaBox.find('.section-portfolio-social-share'),
                $ProjectDetails = $metaBox.find('.section-project-title'),

                $postdivrich = $('#postdivrich');

            if (selected == "link") {
                $postdivrich.slideUp('fast'); // if link Post Format click wordpress text Editor hide.
            } else {
                $postdivrich.slideDown('fast');
            }

            $sections.not($sec).slideUp('fast').next('hr').hide();
            $sec.add($featureSize).add($attribute).add($pHoverSubtitle).add($pSocailShare).add($ProjectDetails).slideDown('fast').next('hr').show();
        }

        $formats.change(changeHandler);
        changeHandler();
    }

    $(document).ready(function () {
        ImageFields();
        AttributesFields();
        PostFormats();
    });

})(jQuery);