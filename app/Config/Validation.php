<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $servicio = [
        'foto_servicio' => [
                'rules' => 'uploaded[foto_servicio]|mime_in[foto_servicio,image/png,image/jpg,image/jpeg]|is_image[foto_servicio]|max_size[foto_servicio,5000]',
                'errors' => [
                    'required' => 'Una foto es requerida.',
                    'uploaded' => 'Debe agregar una imagen al servicio.',
                    'max_size' => 'Imagen permitida hasta 5mb.',
                    'mime_in'  => 'Tipo de archivo permitido PNG,JPG,JPEG.',
                ],
        ],
        'nombre_servicio' => [
            'rules' => 'required|min_length[1]|max_length[100]',
            'errors' => [
                'required' => 'Debe ingresar una descripción.',
                'min_length' => 'Permitido entre 1 y 100 caracteres',
                'max_length'  => 'Permitido entre 1 y 100 caracteres.',
            ],
        ],
        'descripcion_servicio' => [
            'rules' => 'max_length[200]',
            'errors' => [
                'max_length' => 'Maximo 200 caracteres.',
            ],
        ],
        'monto_servicio' => [
                'rules' => 'decimal|greater_than_equal_to[0]',
                'errors' => [
                    'decimal' => 'Debe ser un monto decimal',
                    'greater_than_equal_to' => 'Monto debe ser cero o más',
                ],
        ],
    ];
    
    public $editarServicio = [
        // 'foto_servicio' => [
        //         'rules' => 'mime_in[foto_servicio,image/png,image/jpg,image/jpeg]|is_image[foto_servicio]|max_size[foto_servicio,5000]',
        //         'errors' => [
        //             // 'required' => 'Una foto es requerida.',
        //             // 'uploaded' => 'Debe agregar una imagen al servicio.',
        //             'max_size' => 'Imagen permitida hasta 5mb.',
        //             'mime_in'  => 'Tipo de archivo permitido PNG,JPG,JPEG.',
        //         ],
        // ],
        'nombre_servicio' => [
            'rules' => 'required|min_length[1]|max_length[100]',
            'errors' => [
                'required' => 'Debe ingresar una descripción.',
                'min_length' => 'Permitido entre 1 y 100 caracteres',
                'max_length'  => 'Permitido entre 1 y 100 caracteres.',
            ],
        ],
        'descripcion_servicio' => [
            'rules' => 'max_length[200]',
            'errors' => [
                'max_length' => 'Maximo 200 caracteres.',
            ],
        ],
        'monto_servicio' => [
                'rules' => 'decimal|greater_than_equal_to[0]',
                'errors' => [
                    'decimal' => 'Debe ser un monto decimal',
                    'greater_than_equal_to' => 'Monto debe ser cero o más',
                ],
        ],
    ];

    public $cliente = [
    //     'foto' => [
    //         'rules' => 'ext_in[foto,png,jpg,jpeg]|max_size[foto,5000]',
    //         'errors' => [
    //             'max_size' => 'Imagen permitida hasta 5mb.',
    //             'ext_in'  => 'Tipo de archivo permitido PNG,JPG,JPEG.',
    //         ],
    // ],
        'nombre' => [
            'rules' => 'required|min_length[1]|max_length[100]',
            'errors' => [
                'required' => 'Debe ingresar un nombre.',
                'min_length' => 'Permitido entre 1 y 100 caracteres',
                'max_length'  => 'Permitido entre 1 y 100 caracteres.',
            ],
        ],
        'sexo' => [
            'rules' => 'required|min_length[1]',
            'errors' => [
                'required' => 'Debe ingresar un género.',
                'min_length' => 'Debes ingresar un caracter como minimo',
            ],
        ],
    ];


}
