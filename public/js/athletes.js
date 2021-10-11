
$(document).ready(function() {
    $('#formulario_registro').bootstrapValidator({
        fields: {
            plugins: {
                bootstrap3: new FormValidation.plugins.Bootstrap3(),
            },
            nombre: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'Caracteres incorrectos en su nombre',
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
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'Caracteres incorrectos en su nombre',
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
                    numeric: {
                        message: 'La cédula debe contener solo números',
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
                    numeric: {
                        message: 'La edad debe contener solo números',
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
                    numeric: {
                        message: 'El teléfono debe contener solo números',
                    },
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
 });

         
      