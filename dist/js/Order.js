$('#btnProceed').click(
    function () {
        var orderFormData = $('#formOrder').serialize();
        alert(orderFormData);
        $.ajax(
            {
                url: "../api/service/OrderService.php",
                method: "POST",
                async: true,
                data: orderFormData
            }
        ).done(
            function (res) {
                alert(res);
            }
        )
    }
