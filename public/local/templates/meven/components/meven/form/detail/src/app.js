'use strict';

export class FormFooter
{
    constructor() {
        this.initHandleForm()
    }

    initHandleForm() {
        $(document).on('submit', '.ajax-form', function(e) {
            e.preventDefault();
            let form = $(this);
            let data = form.serialize();

            $.ajax({
                url: '/local/ajax/form/request.php',
                method: 'POST',
                data: data
            }).done(function(e) {
                form.html(e);
            })
        });
    }
}