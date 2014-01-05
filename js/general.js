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
});