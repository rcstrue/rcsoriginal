jQuery(document).ready(function($) {
    "use strict";

    $('form.contactForm').submit(function(event) {
        event.preventDefault();

        let form = $(this);
        let hasError = false;
        let emailExp = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        form.find('.form-group').each(function() {
            let input = $(this).find('input, textarea');
            let rule = input.attr('data-rule');
            let error = false;

            if (rule !== undefined) {
                let pos = rule.indexOf(':');
                let exp = pos >= 0 ? rule.substr(pos + 1) : '';
                rule = pos >= 0 ? rule.substr(0, pos) : rule;

                switch (rule) {
                    case 'required':
                        if (input.val() === '') {
                            error = true;
                        }
                        break;
                    case 'minlen':
                        if (input.val().length < parseInt(exp)) {
                            error = true;
                        }
                        break;
                    case 'email':
                        if (!emailExp.test(input.val())) {
                            error = true;
                        }
                        break;
                    default:
                        break;
                }

                input.next('.validation').html(error ? (input.attr('data-msg') !== undefined ? input.attr('data-msg') : 'wrong input') : '').show('blind');
                if (error) hasError = true;
            }
        });

        if (hasError) return false;

        let formData = form.serialize();
        let action = form.attr('action') ? form.attr('action') : 'contactform.php';

        $.ajax({
            type: 'POST',
            url: action,
            data: formData,
            success: function(response) {
                if (response.trim() === 'OK') {
                    $('#sendmessage').addClass('show');
                    $('#errormessage').removeClass('show');
                    form.find('input, textarea').val('');
                } else {
                    $('#sendmessage').removeClass('show');
                    $('#errormessage').addClass('show').html(response);
                }
            }
        });

        return false;
    });
});
