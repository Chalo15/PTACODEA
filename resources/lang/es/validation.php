<?php

/*
|--------------------------------------------------------------------------
| Validation Language Lines
|--------------------------------------------------------------------------
|
| The following language lines contain the default error messages used by
| the validator class. Some of these rules have multiple versions such
| as the size rules. Feel free to tweak each of these messages here.
|
*/

return [
    'accepted'             => ':attribute debe ser aceptado.',
    'accepted_if'          => ':attribute debe ser aceptado cuando :other sea :value.',
    'active_url'           => ':attribute no es una URL válida.',
    'after'                => ':attribute debe ser una fecha posterior a :date.',
    'after_or_equal'       => ':attribute debe ser una fecha posterior o igual a :date.',
    'alpha'                => ':attribute sólo debe contener letras.',
    'alpha_dash'           => ':attribute sólo debe contener letras, números, guiones y guiones bajos.',
    'alpha_num'            => ':attribute sólo debe contener letras y números.',
    'array'                => ':attribute debe ser un conjunto.',
    'attached'             => 'Este :attribute ya se adjuntó.',
    'before'               => ':attribute debe ser una fecha anterior a :date.',
    'before_or_equal'      => ':attribute debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'array'   => ':attribute tiene que tener entre :min - :max elementos.',
        'file'    => ':attribute debe pesar entre :min - :max kilobytes.',
        'numeric' => ':attribute tiene que estar entre :min - :max.',
        'string'  => ':attribute tiene que tener entre :min - :max caracteres.',
    ],
    'boolean'              => 'El campo :attribute debe tener un valor verdadero o falso.',
    'confirmed'            => 'La confirmación de :attribute no coincide.',
    'current_password'     => 'La contraseña es incorrecta.',
    'date'                 => ':attribute no es una fecha válida.',
    'date_equals'          => ':attribute debe ser una fecha igual a :date.',
    'date_format'          => ':attribute no corresponde al formato :format.',
    'different'            => ':attribute y :other deben ser diferentes.',
    'digits'               => ':attribute debe tener :digits dígitos.',
    'digits_between'       => ':attribute debe tener entre :min y :max dígitos.',
    'dimensions'           => 'Las dimensiones de la imagen :attribute no son válidas.',
    'distinct'             => 'El campo :attribute contiene un valor duplicado.',
    'email'                => ':attribute no es un correo válido.',
    'ends_with'            => 'El campo :attribute debe finalizar con uno de los siguientes valores: :values',
    'exists'               => ':attribute es inválido.',
    'file'                 => 'El campo :attribute debe ser un archivo.',
    'filled'               => 'El campo :attribute es obligatorio.',
    'gt'                   => [
        'array'   => 'El campo :attribute debe tener más de :value elementos.',
        'file'    => 'El campo :attribute debe tener más de :value kilobytes.',
        'numeric' => 'El campo :attribute debe ser mayor que :value.',
        'string'  => 'El campo :attribute debe tener más de :value caracteres.',
    ],
    'gte'                  => [
        'array'   => 'El campo :attribute debe tener como mínimo :value elementos.',
        'file'    => 'El campo :attribute debe tener como mínimo :value kilobytes.',
        'numeric' => 'El campo :attribute debe ser como mínimo :value.',
        'string'  => 'El campo :attribute debe tener como mínimo :value caracteres.',
    ],
    'image'                => ':attribute debe ser una imagen.',
    'in'                   => ':attribute es inválido.',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => ':attribute debe ser un número entero.',
    'ip'                   => ':attribute debe ser una dirección IP válida.',
    'ipv4'                 => ':attribute debe ser una dirección IPv4 válida.',
    'ipv6'                 => ':attribute debe ser una dirección IPv6 válida.',
    'json'                 => 'El campo :attribute debe ser una cadena JSON válida.',
    'lt'                   => [
        'array'   => 'El campo :attribute debe tener menos de :value elementos.',
        'file'    => 'El campo :attribute debe tener menos de :value kilobytes.',
        'numeric' => 'El campo :attribute debe ser menor que :value.',
        'string'  => 'El campo :attribute debe tener menos de :value caracteres.',
    ],
    'lte'                  => [
        'array'   => 'El campo :attribute debe tener como máximo :value elementos.',
        'file'    => 'El campo :attribute debe tener como máximo :value kilobytes.',
        'numeric' => 'El campo :attribute debe ser como máximo :value.',
        'string'  => 'El campo :attribute debe tener como máximo :value caracteres.',
    ],
    'max'                  => [
        'array'   => ':attribute no debe tener más de :max elementos.',
        'file'    => ':attribute no debe ser mayor que :max kilobytes.',
        'numeric' => ':attribute no debe ser mayor que :max.',
        'string'  => ':attribute no debe ser mayor que :max caracteres.',
    ],
    'mimes'                => ':attribute debe ser un archivo con formato: :values.',
    'mimetypes'            => ':attribute debe ser un archivo con formato: :values.',
    'min'                  => [
        'array'   => ':attribute debe tener al menos :min elementos.',
        'file'    => 'El tamaño de :attribute debe ser de al menos :min kilobytes.',
        'numeric' => 'El tamaño de :attribute debe ser de al menos :min.',
        'string'  => ':attribute debe contener al menos :min caracteres.',
    ],
    'multiple_of'          => 'El campo :attribute debe ser múltiplo de :value',
    'not_in'               => ':attribute es inválido.',
    'not_regex'            => 'El formato del campo :attribute no es válido.',
    'numeric'              => ':attribute debe ser numérico.',
    'password'             => 'La contraseña es incorrecta.',
    'present'              => 'El campo :attribute debe estar presente.',
    'prohibited'           => 'El campo :attribute está prohibido.',
    'prohibited_if'        => 'El campo :attribute está prohibido cuando :other es :value.',
    'prohibited_unless'    => 'El campo :attribute está prohibido a menos que :other sea :values.',
    'prohibits'            => 'El campo :attribute prohibe que :other esté presente.',
    'regex'                => 'El formato de :attribute es inválido.',
    'relatable'            => 'Este :attribute no se puede asociar con este recurso',
    'required'             => 'El campo :attribute es obligatorio.',
    'required_if'          => 'El campo :attribute es obligatorio cuando :other es :value.',
    'required_unless'      => 'El campo :attribute es obligatorio a menos que :other esté en :values.',
    'required_with'        => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all'    => 'El campo :attribute es obligatorio cuando :values están presentes.',
    'required_without'     => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de :values está presente.',
    'same'                 => ':attribute y :other deben coincidir.',
    'size'                 => [
        'array'   => ':attribute debe contener :size elementos.',
        'file'    => 'El tamaño de :attribute debe ser :size kilobytes.',
        'numeric' => 'El tamaño de :attribute debe ser :size.',
        'string'  => ':attribute debe contener :size caracteres.',
    ],
    'starts_with'          => 'El campo :attribute debe comenzar con uno de los siguientes valores: :values',
    'string'               => 'El campo :attribute debe ser una cadena de caracteres.',
    'timezone'             => ':Attribute debe ser una zona horaria válida.',
    'unique'               => 'El campo :attribute ya ha sido registrado.',
    'uploaded'             => 'Subir :attribute ha fallado.',
    'url'                  => ':Attribute debe ser una URL válida.',
    'uuid'                 => 'El campo :attribute debe ser un UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'password' => [
            'min' => 'La :attribute debe contener más de :min caracteres',
        ],
        'email'    => [
            'unique' => 'El :attribute ya ha sido registrado.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'address'                => 'dirección',
        'age'                    => 'edad',
        'body'                   => 'contenido',
        'city'                   => 'ciudad',
        'content'                => 'contenido',
        'country'                => 'país',
        'current_password'       => 'contraseña actual',
        'date'                   => 'fecha',
        'day'                    => 'día',
        'description'            => 'descripción',
        'email'                  => 'correo electrónico',
        'excerpt'                => 'extracto',
        'first_name'             => 'nombre',
        'gender'                 => 'género',
        'hour'                   => 'hora',
        'last_name'              => 'apellidos',
        'message'                => 'mensaje',
        'minute'                 => 'minuto',
        'mobile'                 => 'móvil',
        'month'                  => 'mes',
        'name'                   => 'nombre',
        'password'               => 'contraseña',
        'password_confirmation'  => 'confirmación de la contraseña',
        'phone'                  => 'teléfono',
        'photo'                  => 'foto',
        'price'                  => 'precio',
        'role'                   => 'rol',
        'second'                 => 'segundo',
        'sex'                    => 'sexo',
        'subject'                => 'asunto',
        'terms'                  => 'términos',
        'time'                   => 'hora',
        'title'                  => 'título',
        'username'               => 'usuario',
        'year'                   => 'año',

        'identification'         => 'cédula de identidad o DIMEX',
        'province'               => 'provincia',
        'birthdate'              => 'fecha de nacimiento',

        'identification_manager' => 'cédula de identidad o DIMEX',
        'name_manager'           => 'nombre',
        'lastname_manager'       => 'apellidos',
        'contact_manager'        => 'teléfono',
        'manager'                => 'parentesco',
        'policy'                 => 'número de póliza',

        'sport_id'               => 'deporte',
        'blood'                  => 'tipo de sangre',
        'laterality'             => 'lateralidad',

        'user_id'                => 'usuario',
        'experience'             => 'años de experiencia',
        'contract_number'        => 'número de contrato',
        'contract_year'          => 'año de contrato',
        'role_id'                => 'rol',
        'athlete_id'             => 'atleta',
        'picture'                => 'imagen',
        'other_phone'            => 'otro teléfono',

        'calification'           => 'calificación',
        'level'                  => 'nivel',
        'get_better'             => 'aspectos por mejorar',
        'planification'          => 'planificación',
        'lesion'                 => 'lesión',
        'details'                => 'detalles',

        'start'                  => 'hora de inicio',
        'end'                    => 'hora de fin',
        'availability_id'        => 'disponibilidad',

        'sph'                    => 'sph',
        'app'                    => 'app',
        'treatment'              => 'tratamiento',
        'surgeries'              => 'cirugías',
        'fractures'              => 'fracturas',
        'session_start'          => 'hora de inicio',
        'session_end'            => 'hora de fin',
        'inability'              => 'incapacidad',
        'count_session'          => 'sesión de conteo',
        'severity'               => 'gravedad',

        'physiological_age'      => 'edad fisiológica',
        'weight'               => 'peso',
        'height'               => 'altura',
        'bmi'                  => 'bmi',
        'waist'                => 'cintura',
        'hip'                  => 'cadera',
        'cint_code'            => 'relación cintura cadera',
        'tricipital'           => 'tricipital',
        'subscapular'          => 'subescapular',
        'abdominal'            => 'abdominal',
        'suprailiac'           => 'suprailíaco',
        'thigh'                => 'muslo',
        'calf'                 => 'pantorrilla',
        'wrist'                => 'muñeca',
        'elbow'                => 'codo',
        'knee'                 => 'rodilla',
        'biceps'               => 'bíceps',
        'calf_cm'              => 'pantorrilla cm',
        'calories'             => 'requerimiento calorías',
        'bmi_high'             => 'bmi alto',
        'icc_high'             => 'imc alto',
        'fat'                  => 'grasa',
        'residual'             => 'residual',
        'bone'                 => 'óseo',
        'muscle'               => 'músculo',
        'visceral'             => 'visceral',
        'ideal_weight'         => 'peso ideal',

        'type'                 => 'tipo',
        'data'                 => 'datos',
        'notifiable'           => 'declaración obligatoria',

    ],
];
