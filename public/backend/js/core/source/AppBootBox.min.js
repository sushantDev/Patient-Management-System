// bootbox confirm with delete bug fixed :D
$(document).on("click", ".btn-confirm", function () {
    var $form = $(this).closest("form");
    var msg = $(this).data("message");
    msg = msg === undefined || msg == "" ? "Are you sure?" : msg;
    bootbox.confirm({
        message: msg,
        size: "small",
        callback: function (response) {
            if (response) {
                $form.find(":submit").attr("disabled", "disabled");
                $form.submit();
            }
            else {
                return false;
            }
        }
    });
    $("[data-bb-handler=cancel]").click(function () {
        $(this).closest(".modal-content").find("[data-dismiss=modal]").trigger("click");
    });
});
