console.log($.html);
$(document).ready(function () {
    console.log("Booom")
    $('#form').validate({
        rules: {
            name: {
                required: true,
                regex: /^[a-zA-Z\s]*$/
            },
            date: {
                required: true,
                dateISO: true
            },
            email: {
                required: true,
                email: true
            },
            amount: {
                required: true,
                number: true
            },
            quantity: {
                required: true,
                number: true
            },
            percentage: {
                required: true,
                equalTo: ["0", "5", "12", "18", "28"]
            },

        },
        messages: {
            name: 'Please enter a valid Name.',
            date: {
                required: 'Please enter a valid Date (YYYY-MM-DD).',
                dateISO: 'Please enter a valid Date (YYYY-MM-DD).'
            },
            email: {
                required: 'Please enter a valid Email Address.',
                email: 'Please enter a valid Email Address.'
            },
            amount: {
                required: 'Please enter a valid Amount.',
                number: 'Please enter a valid numeric Amount.'
            },
            quantity: {
                required: 'Please enter a valid Quantity.',
                number: 'Please enter a valid numeric Quantity.'
            },
            percentage: {
                required: 'Please select a valid Percentage.',
                equalTo: 'Please select a valid Percentage.'
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});
