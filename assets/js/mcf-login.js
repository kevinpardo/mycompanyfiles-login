jQuery(document).ready(function($){
    $('.js-reveal-login-form').click(function(e){
        e.preventDefault()
        if (!$(this).hasClass('on')) {
            $('.mcf-connexion-block .item a').removeClass('on')
            $(this).addClass('on')
            $('.mcf-login-form, .mcf-form-success, .mcf-form-error').removeClass('visible')
            $('#' + $(this).attr('data-form-id')).addClass('visible')
        }
    })

    $('.js-recovery-password-opener').click(function(e){
        e.preventDefault()
        $('.mcf-recovery-form, .mcf-login-form, .mcf-form-success, .mcf-form-error').removeClass('visible')
        $('#' + $(this).attr('data-recovery-form-id') + '-password').addClass('visible')
    })
})
