define([
    "jquery",
    "jquery/ui"
], function($){

    function main(config, element) {
        var $element = $(element),
            AjaxUrl = config.AjaxUrl,
            dataForm = $('#wl-task');

        dataForm.mage('validation', {});

        function manageData(postFieldsJq, value){
            if (typeof value === "undefined"){
                value  = "val()";
                postFieldsJq.hobby = $( '#hobby option:selected');
            } else {
                value = "val(" + value +")";
                postFieldsJq.hobby = $( '#hobby');
            }
            var result = {};
            for (var prop in postFieldsJq){
                result[prop] = eval("postFieldsJq[prop]." + value);
            }
            return result;
        }
        $(document).on('click','.submit',function() {
                event.preventDefault();
            if (dataForm.valid()) {
                var postFieldsJq = {
                    email: $('#email'),
                    first_name: $('#first_name'),
                    last_name: $('#last_name'),
                    hobby: undefined,
                    telephone: $('#telephone')
                };
                $.ajax({
                    showLoader: true,
                    url: AjaxUrl,
                    data: manageData(postFieldsJq),
                    type: "POST"
                }).done(function (data) {
                    manageData(postFieldsJq, '""');
                    return true;
                });
            }
        });
    }
    return main;
});