<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Il campo following language lines contain Il campo default error messages used by
    | Il campo validator class. Some of Il campose rules have multiple versions such
    | as Il campo size rules. Feel free to tweak each of Il campose messages here.
    |
    */

    'accepted'             => 'Il campo :attribute must be accepted.',
    'active_url'           => 'Il campo :attribute is not a valid URL.',
    'after'                => 'Il campo :attribute must be a date after :date.',
    'after_or_equal'       => 'Il campo :attribute must be a date after or equal to :date.',
    'alpha'                => 'Il campo :attribute may only contain letters.',
    'alpha_dash'           => 'Il campo :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'Il campo :attribute may only contain letters and numbers.',
    'array'                => 'Il campo :attribute must be an array.',
    'before'               => 'Il campo :attribute must be a date before :date.',
    'before_or_equal'      => 'Il campo :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'Il campo :attribute must be between :min and :max.',
        'file'    => 'Il campo :attribute must be between :min and :max kilobytes.',
        'string'  => 'Il campo :attribute must be between :min and :max characters.',
        'array'   => 'Il campo :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'Il campo :attribute field must be true or false.',
    'confirmed'            => 'Il campo :attribute non combacia',
    'date'                 => 'Il campo :attribute is not a valid date.',
    'date_format'          => 'Il campo :attribute does not match Il campo format :format.',
    'different'            => 'Il campo :attribute and :oIl campor must be different.',
    'digits'               => 'Il campo :attribute must be :digits digits.',
    'digits_between'       => 'Il campo :attribute must be between :min and :max digits.',
    'dimensions'           => 'Il campo :attribute has invalid image dimensions.',
    'distinct'             => 'Il campo :attribute field has a duplicate value.',
    'email'                => 'La :attribute deve essere una mail valida',
    'exists'               => 'Il campo selected :attribute is invalid.',
    'file'                 => 'Il campo :attribute must be a file.',
    'filled'               => 'Il campo :attribute field must have a value.',
    'image'                => 'Il campo :attribute must be an image.',
    'in'                   => 'Il campo selected :attribute is invalid.',
    'in_array'             => 'Il campo :attribute field does not exist in :oIl campor.',
    'integer'              => 'Il campo :attribute deve essere un intero',
    'ip'                   => 'Il campo :attribute must be a valid IP address.',
    'ipv4'                 => 'Il campo :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'Il campo :attribute must be a valid IPv6 address.',
    'json'                 => 'Il campo :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'Il campo :attribute deve essere superiore di :max.',
        'file'    => 'Il campo :attribute may not be greater than :max kilobytes.',
        'string'  => 'Il campo :attribute may not be greater than :max characters.',
        'array'   => 'Il campo :attribute may not have more than :max items.',
    ],
    'mimes'                => 'Il campo :attribute must be a file of type: :values.',
    'mimetypes'            => 'Il campo :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'Il campo :attribute deve essere almeno :min. elementi',
        'file'    => 'Il campo :attribute must be at least :min kilobytes.',
        'string'  => 'Il campo :attribute deve essere almeno  :min caratteri.',
        'array'   => 'Il campo :attribute must have at least :min items.',
    ],
    'not_in'               => 'Il campo selected :attribute is invalid.',
    'numeric'              => 'Il campo :attribute deve essere un nummero',
    'present'              => 'Il campo :attribute field must be present.',
    'regex'                => 'Il campo :attribute format is invalid.',
    'required'             => 'Il campo :attribute è obbligatorio',
    'required_if'          => 'Il campo :attribute field is required when :oIl campor is :value.',
    'required_unless'      => 'Il campo :attribute field is required unless :oIl campor is in :values.',
    'required_with'        => 'Il campo :attribute field is required when :values is present.',
    'required_with_all'    => 'Il campo :attribute field is required when :values is present.',
    'required_without'     => 'Il campo :attribute field is required when :values is not present.',
    'required_without_all' => 'Il campo :attribute field is required when none of :values are present.',
    'same'                 => 'Il campo :attribute and :oIl campor must match.',
    'size'                 => [
        'numeric' => 'Il campo :attribute deve essere lungo :size elementi.',
        'file'    => 'Il campo :attribute must be :size kilobytes.',
        'string'  => 'Il campo :attribute must be :size characters.',
        'array'   => 'Il campo :attribute must contain :size items.',
    ],
    'string'               => 'Il campo :attribute deve essere una stringa',
    'timezone'             => 'Il campo :attribute must be a valid zone.',
    'unique'               => 'La :attribute esiste già',
    'uploaded'             => 'Il campo :attribute failed to upload.',
    'url'                  => 'Il campo :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using Il campo
    | convention "attribute.rule" to name Il campo lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | Il campo following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => ['zip_code'=>'CAP','civic_number'=>'Numero Civico'],

];
