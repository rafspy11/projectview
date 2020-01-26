require('./bootstrap');

jQuery($ => {
    $(document).ready(() => {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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
            let errorAlert = $('.login-form .alert-bad-date');

            $(loginSubmit).on('click', el => {
                el.preventDefault();
                
                $.ajax({
                        type: 'POST',
                        url: '/loginSubmit',
                        data: {
                            mail: $(mail[0]).val(),
                            password: $(password[0]).val()
                        }
                    })
                    .done(res => {
                        if (!res.isLogged) {
                            $(errorAlert).removeClass('d-none');
                            console.log("Złe dane logowania");
                        } else {
                            if(!$(errorAlert).hasClass('d-none')) {
                                $(errorAlert).addClass('d-none');
                            }
                            console.log("Ok");
                            window.location.href = "/";
                        }
                    })
                    .always(res => {
                        console.log(res);
                    });
            });
        }

    });
})
