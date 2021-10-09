
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
			correo: {
                validators: {
                    notEmpty: {
                        message: 'Por favor ingrese su correo electrónico'
                    },
                    emailAddress: {
                        message: 'Por favor ingrese un correo electrónico válido'
                    }
                }
            },
            telefono: {
                validators: {
                  stringLength: {
                        min: 8, 
                        max: 12,
                    notEmpty: {
                        message: 'Por favor ingrese su número de teléfono'
                        }
                    }
                },
			},
            direccion: {
                validators: {
                    notEmpty: {
                        message: 'Por favor ingrese su dirección'
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