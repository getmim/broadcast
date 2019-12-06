<?php

return [
    '__name' => 'broadcast',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/broadcast.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'http://iqbalfn.com/'
    ],
    '__files' => [
        'modules/broadcast' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'lib-formatter' => NULL
            ],
            [
                'lib-model' => NULL
            ],
            [
                'lib-user' => NULL
            ],
            [
                'lib-enum' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'Broadcast\\Model' => [
                'type' => 'file',
                'base' => 'modules/broadcast/model'
            ]
        ],
        'files' => []
    ],
    'libEnum' => [
        'enums' => [
            'broadcast.status' => [
                0 => 'Deleted',
                1 => 'Pending',
                2 => 'Partially Sent',
                3 => 'Done'
            ],
            'broadcast-contact.status' => [
                0 => 'Deleted',
                1 => 'Active'
            ],
            'broadcast-item.status' => [
                0 => 'Canceled',
                1 => 'Failed',
                2 => 'Pending',
                3 => 'Done'
            ]
        ]
    ],
    'libFormatter' => [
        'formats' => [
            'broadcast' => [
                'id' => [
                    'type' => 'number',
                ],
                'user' => [
                    'type' => 'object',
                    'model' => [
                        'name' => 'LibUser\\Library\\Fetcher',
                        'field' => 'id',
                        'type' => 'number'
                    ],
                    'format' => 'user'
                ],
                'text' => [
                    'type' => 'text'
                ],
                'target' => [
                    'type' => 'object',
                    'model' => [
                        'name' => 'Broadcast\\Model\\BroadcastContactGroup',
                        'field' => 'id',
                        'type' => 'number'
                    ],
                    'format' => 'broadcast-contact-group'
                ],
                'status' => [
                    'type' => 'enum',
                    'enum' => 'broadcast.status'
                ],
                'sent' => [
                    'type' => 'number'
                ],
                'total' => [
                    'type' => 'number'
                ],
                'updated' => [
                    'type' => 'date'
                ],
                'created' => [
                    'type' => 'date'
                ]
            ],
            'broadcast-contact' => [
                'id' => [
                    'type' => 'number',
                ],
                'user' => [
                    'type' => 'object',
                    'model' => [
                        'name' => 'LibUser\\Library\\Fetcher',
                        'field' => 'user',
                        'type' => 'number'
                    ],
                    'format' => 'user'
                ],
                'name' => [
                    'type' => 'text'
                ],
                'phone' => [
                    'type' => 'text'
                ],
                'status' => [
                    'type' => 'enum',
                    'enum' => 'broadcast-contact.status'
                ],
                'updated' => [
                    'type' => 'date'
                ],
                'created' => [
                    'type' => 'date'
                ]
            ],
            'broadcast-contact-group' => [
                'id' => [
                    'type' => 'number',
                ],
                'user' => [
                    'type' => 'object',
                    'model' => [
                        'name' => 'LibUser\\Library\\Fetcher',
                        'field' => 'user',
                        'type' => 'number'
                    ],
                    'format' => 'user'
                ],
                'name' => [
                    'type' => 'text'
                ],
                'updated' => [
                    'type' => 'date'
                ],
                'created' => [
                    'type' => 'date'
                ]
            ],
            'broadcast-contact-group-chain' => [
                'id' => [
                    'type' => 'number',
                ],
                'user' => [
                    'type' => 'object',
                    'model' => [
                        'name' => 'LibUser\\Library\\Fetcher',
                        'field' => 'user',
                        'type' => 'number'
                    ],
                    'format' => 'user'
                ],
                'contact' => [
                    'type' => 'object',
                    'model' => [
                        'name' => 'Broadcast\\Model\\BroadcastContact',
                        'field' => 'id',
                        'type' => 'number'
                    ],
                    'format' => 'broadcast-contact'
                ],
                'group' => [
                    'type' => 'object',
                    'model' => [
                        'name' => 'Broadcast\\Model\\BroadcastContactGroup',
                        'field' => 'id',
                        'type' => 'number'
                    ],
                    'format' => 'broadcast-contact-group'
                ],
                'updated' => [
                    'type' => 'date'
                ],
                'created' => [
                    'type' => 'date'
                ]
            ],
            'broadcast-item' => [
                'id' => [
                    'type' => 'number',
                ],
                'broadcast' => [
                    'type' => 'object',
                    'model' => [
                        'name' => 'Broadcast\\Model\\Broadcast',
                        'field' => 'id',
                        'type' => 'number'
                    ]
                    'format' => 'broadcast'
                ],
                'contact' => [
                    'type' => 'object',
                    'model' => [
                        'name' => 'Broadcast\\Model\\BroadcastContact',
                        'field' => 'id',
                        'type' => 'number'
                    ],
                    'format' => 'broadcast-contact'
                ],
                'status' => [
                    'type' => 'enum',
                    'enum' => 'broadcast-item.status'
                ],
                'reason' => [
                    'type' => 'text'
                ],
                'sent' => [
                    'type' => 'date'
                ],
                'updated' => [
                    'type' => 'date'
                ],
                'created' => [
                    'type' => 'date'
                ]
            ]
        ]
    ]
];