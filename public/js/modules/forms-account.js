/*! light-blue - v3.3.0 - 2016-03-08 */
$(function () {
    function a() {
        $(".date-picker").datetimepicker({format: !1}), $(".selectpicker").selectpicker(), $(".select2").each(function () {
            $(this).select2($(this).data())
        }), $("#user-form").parsley({
            errorsContainer: function (a) {
                return a.$element.parents(".form-group").children("label")
            }
        }), $(".widget").widgster()
    }

    a(), PjaxApp.onPageLoad(a)
});