
$(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nombre: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Por favor ingrese su nombre'
                    }
                }
            },
             apellidos: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Por favor ingrese sus apellidos'
                    }
                }
            },
            cedula: {
                validators: {
                     stringLength: {
                        min: 0,
                        max: 9,
                    },
                    notEmpty: {
                        message: 'Por favor ingrese su cédula'
                    }
                }
            },
            disciplina: {
                validators: {
                    notEmpty: {
                        message: 'Por favor seleccione una disciplina'
                    }
                }
            },
			 edad: {
                validators: {
                     stringLength: {
                        min: 0,
                        max: 99,
                    },
                    notEmpty: {
                        message: 'Por favor ingrese su edad'
                    }
                }
            },
			email: {
                validators: {
                    notEmpty: {
                        message: 'Please enter your Email Address'
                    },
                    emailAddress: {
                        message: 'Please enter a valid Email Address'
                    }
                }
            },
            telefono: {
                validators: {
                  stringLength: {
                        min: 8, 
                        max: 12,
                    notEmpty: {
                        message: 'Please enter your Contact No.'
                        }
                    }
                },
			},
            disciplina: {
                validators: {
                    notEmpty: {
                        message: 'Por favor seleccione una disciplina'
                    }
                }
            },
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});