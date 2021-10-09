
$(document).ready(function() {
    $('#formulario_registro').bootstrapValidator({
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
            direccion: {
                validators: {
                    notEmpty: {
                        message: 'Por favor ingrese su dirección'
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
<<<<<<< Updated upstream
                        message: 'Por favor ingrese su correo electrónico'
                    },
                    emailAddress: {
                        message: 'Por favor ingrese un correo electrónico válido'
=======
                        message: 'Por favor ingrese su dirección de correo'
                    },
                    emailAddress: {
                        message: 'Por favor ingrese una dirección de correo válida'
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
			},
            direccion: {
                validators: {
                    notEmpty: {
                        message: 'Por favor ingrese su dirección'
                    }
                }
            },
=======
			}
        
>>>>>>> Stashed changes
            }
        })
        .on('success.form.bv', function(e) {
            $('#registrado').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#formulario_registro').data('bootstrapValidator').resetForm();

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