(function () {

    var laravel = {
        initialize: function () {
            this.methodLinks = $('a[data-method]');
            this.token = $('a[data-token]');
            this.registerEvents();
        },

        registerEvents: function () {
            this.methodLinks = $('.helper').on('click', this.handleMethod);
        },

        handleMethod: function (e) {
            e.preventDefault();
            var link = $(this);
            var httpMethod = link.data('method').toUpperCase();
            var tr = $(this).closest('tr');
            this.data = $('#custom');
            var form;

            if ($.inArray(httpMethod, ['POST','PUT', 'DELETE']) === - 1) {
                alert('wrong');
                return;
            }

            form = laravel.createForm(link, this.data);

            swal({
                title: "Apakah Anda Yakin?",
                type: "warning",
                text: "Apakah anda yakin untuk menghapus data ini?",
                showCancelButton: true,
            }).then((result) => {
                if (result.value) {
                    form.submit();
                    e.preventDefault();
                } else {
                    swal("Batal!", "Batal Menghapus Data", "info");
                }
            });
            return false;
        },

        createForm: function (link, data) {
            var form =
                $('<form>', {
                    'method': 'POST',
                    'action': link.attr('href'),
                });

            var token =
                $('<input>', {
                    'type': 'hidden',
                    'name': '_token',
                    'value': link.data('token')
                });

            var hiddenInput =
                $('<input>', {
                    'name': '_method',
                    'type': 'hidden',
                    'value': link.data('method')
                });

            return form.append(token, hiddenInput)
                .appendTo('body');
        }
    };

    laravel.initialize();
})();