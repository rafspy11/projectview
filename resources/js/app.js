require('./bootstrap');

jQuery($ => {
    $(document).ready(() => {

        /**
         * init all functions
         */
        (function init() {
            loginSubmit();
        })();

        /**
         * login form submit
         */
        function loginSubmit() {
            let loginSubmit = $('.login-form button[type="submit"]');
            let mail = $('.login-form #login-form__email');
            let password = $('.login-form #login-form__password');

            $(loginSubmit).on('click', el => {
                el.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                        type: 'POST',
                        url: '/loginSubmit',
                        data: {
                            mail: $(mail[0]).val(),
                            password: $(password[0]).val()
                        }
                    })
                    .done(res => {
                        if (!res.isValid) {
                            console.log("Złe dane logowania");
                        } else {
                            console.log("Ok");
                        }
                    });
                // .fail(console.log('błąd'))
                // .always(console.log('formularz logowania'));
            });
        }

    });
})
