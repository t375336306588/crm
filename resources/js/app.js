
import '@popperjs/core';
import * as bootstrap from 'bootstrap';
import $ from 'jquery';

$(document).ready(function() {
    $('#feedback-form').on('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        let $btn = $('#submit-btn');

        $btn.prop('disabled', true).text('Отправка...');

        $.ajax({
            url: '/api/tickets',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: { 'Accept': 'application/json' },
            success: function(response) {
                $('#feedback-form').addClass('d-none');
                $('#response-message').removeClass('d-none').addClass('alert alert-warning').text(response.message);
            },
            error: function(xhr) {
                $btn.prop('disabled', false).text('Отправить');
                let msg = 'Ошибка при отправке.';
                if (xhr.status === 422) {
                    msg = Object.values(xhr.responseJSON.errors).flat().join(' ');
                }
                $('#response-message').removeClass('d-none').addClass('alert alert-warning').text(msg);
            }
        });
    });
});
