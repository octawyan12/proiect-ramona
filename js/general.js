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
});