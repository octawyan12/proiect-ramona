$(document).ready(function()
{
    $(document).on("click", "#login_btn", function()
    {
        var $login_form = $("#login_form");
        if ($login_form.hasClass("active"))
        {
            $login_form.slideUp();
            $login_form.removeClass("active");
        }
        else
        {
            $login_form.addClass("active");
            $login_form.slideDown();
        }
    }
    );
    $('.red_border_btn.delete_product').on('click', function(e) {
        e.preventDefault();
        if (confirm('Are you sure you want to delete this product?')) {
            var $obj = $(this);
            $.ajax({
                url: $(this).attr('href'),
                data: {
                    'product_id': $obj.data('pid')
                },
                type: 'POST'
            }).done(function(data) {
                if(data == 1) {
                    $obj.closest('li').remove();
                } else {
                    alert('It has been an error :( !');
                }
            });
        }
    });
    
    tinymce.init({
        selector: ".tinymce-textarea",
        plugins: [
                "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons template textcolor paste fullpage textcolor"
        ],

        toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
        toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | inserttime preview | forecolor backcolor",
        toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

        menubar: false,
        toolbar_items_size: 'small',

        style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ],

        templates: [
                {title: 'Test template 1', content: 'Test 1'},
                {title: 'Test template 2', content: 'Test 2'}
        ]
});

});