<?php

return [
    '__name' => 'broadcast',
    '__version' => '0.1.0',
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
            ],
            [
                'lib-worker' => NULL
            ],
            [
                'lib-sms' => NULL 
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'Broadcast\\Model' => [
                'type' => 'file',
                'base' => 'modules/broadcast/model'
            ],
            'Broadcast\\Library' => [
                'type' => 'file',
                'base' => 'modules/broadcast/library'
            ],
            'Broadcast\\Controller' => [
                'type' => 'file',
                'base' => 'modules/broadcast/controller'
            ]
        ],
        'files' => []
    ],
    'libEnum' => [
        'enums' => [
            'broadcast.status' => ['Deleted','Pending','Partially Sent','Done'],
            'broadcast-contact.status' => ['Deleted','Active'],
            'broadcast-item.status' => ['Canceled','Failed','Pending','Done']
        ]
    ],
    'libFormatter' => [
        'formats' => [
            'broadcast' => [
                'id' => [
                    'type' => 'number'
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
                'fail' => [
                    'type' => 'number'
                ],
                'total' => [
                    'type' => 'number'
                ],
                'time' => [
                    'type' => 'date'
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
                    'type' => 'number'
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
                'group' => [
                    'type' => 'chain',
                    'chain' => [
                        'model' => [
                            'name' => 'Broadcast\\Model\\BroadcastContactGroupChain',
                            'field' => 'contact'
                        ],
                        'identity' => 'group'
                    ],
                    'model' => [
                        'name' => 'Broadcast\\Model\\BroadcastContactGroup',
                        'field' => 'id'
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
            'broadcast-contact-group' => [
                'id' => [
                    'type' => 'number'
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
                    'type' => 'number'
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
                    'type' => 'number'
                ],
                'broadcast' => [
                    'type' => 'object',
                    'model' => [
                        'name' => 'Broadcast\\Model\\Broadcast',
                        'field' => 'id',
                        'type' => 'number'
                    ],
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
    ],
    'routes' => [
        'tool' => [
            'toolBroadcastWorkerAdder' => [
                'path' => [
                    'value' => 'broadcast item adder (:id)',
                    'params' => [
                        'id' => 'number'
                    ]
                ],
                'handler' => 'Broadcast\\Controller\\Cli::itemAdder'
            ],
            'toolBroadcastItemRun' => [
                'path' => [
                    'value' => 'broadcast item run (:id)',
                    'params' => [
                        'id' => 'number'
                    ]
                ],
                'handler' => 'Broadcast\\Controller\\Cli::itemRun'
            ]
        ]
    ]
];
