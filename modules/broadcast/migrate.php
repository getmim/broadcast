<?php

return [
    'Broadcast\\Model\\Broadcast' => [
        'fields' => [
            'id' => [
                'type' => 'INT',
                'attrs' => [
                    'unsigned' => TRUE,
                    'primary_key' => TRUE,
                    'auto_increment' => TRUE
                ],
                'index' => 1000
            ],
            'user' => [
                'type' => 'INT',
                'attrs' => [
                    'unsigned' => TRUE,
                    'null' => FALSE
                ],
                'index' => 2000
            ],
            'text' => [
                'type' => 'TEXT',
                'attrs' => [
                    'required' => true 
                ],
                'index' => 3000
            ],
            'target' => [
                'type' => 'INT',
                'attrs' => [
                    'unsigned' => true,
                    'null' => false 
                ],
                'index' => 4000
            ],
            'status' => [
                'comment' => '0 Canceled, 1 Pending, 2 Partially Sent, 3 Done',
                'type' => 'TINYINT',
                'attrs' => [
                    'unsigned' => true,
                    'null' => false,
                    'default' => 1
                ],
                'index' => 5000
            ],
            'sent' => [
                'type' => 'INT',
                'attrs' => [
                    'unsigned' => true,
                    'null' => false,
                    'default' => 0
                ],
                'index' => 6000
            ],
            'fail' => [
                'type' => 'INT',
                'attrs' => [
                    'unsigned' => true,
                    'null' => false,
                    'default' => 0
                ],
                'index' => 7000
            ],
            'total' => [
                'type' => 'INT',
                'attrs' => [
                    'unsigned' => true,
                    'null' => false,
                ],
                'index' => 8000
            ],
            'time' => [
                'type' => 'DATETIME',
                'attrs' => [
                    'null' => false
                ],
                'index' => 9000
            ],
            'updated' => [
                'type' => 'TIMESTAMP',
                'attrs' => [
                    'default' => 'CURRENT_TIMESTAMP',
                    'update' => 'CURRENT_TIMESTAMP'
                ],
                'index' => 10000
            ],
            'created' => [
                'type' => 'TIMESTAMP',
                'attrs' => [
                    'default' => 'CURRENT_TIMESTAMP'
                ],
                'index' => 11000
            ]
        ]
    ],
    'Broadcast\\Model\\BroadcastContact' => [
        'fields' => [
            'id' => [
                'type' => 'INT',
                'attrs' => [
                    'unsigned' => TRUE,
                    'primary_key' => TRUE,
                    'auto_increment' => TRUE
                ],
                'index' => 1000
            ],
            'user' => [
                'type' => 'INT',
                'attrs' => [
                    'unsigned' => TRUE,
                    'null' => FALSE
                ],
                'index' => 2000
            ],
            'name' => [
                'type' => 'VARCHAR',
                'length' => 50,
                'attrs' => [
                    'null' => false 
                ],
                'index' => 3000
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'length' => 25,
                'attrs' => [
                    'null' => false,
                    'unique' => true
                ],
                'index' => 4000
            ],
            'status' => [
                'comment' => '0 Deleted, 1 Active',
                'type' => 'TINYINT',
                'attrs' => [
                    'unsigned' => true,
                    'null' => false,
                    'default' => 1
                ],
                'index' => 5000
            ],
            'updated' => [
                'type' => 'TIMESTAMP',
                'attrs' => [
                    'default' => 'CURRENT_TIMESTAMP',
                    'update' => 'CURRENT_TIMESTAMP'
                ],
                'index' => 10000
            ],
            'created' => [
                'type' => 'TIMESTAMP',
                'attrs' => [
                    'default' => 'CURRENT_TIMESTAMP'
                ],
                'index' => 11000
            ]
        ]
    ],
    'Broadcast\\Model\\BroadcastContactGroup' => [
        'fields' => [
            'id' => [
                'type' => 'INT',
                'attrs' => [
                    'unsigned' => TRUE,
                    'primary_key' => TRUE,
                    'auto_increment' => TRUE
                ],
                'index' => 1000
            ],
            'user' => [
                'type' => 'INT',
                'attrs' => [
                    'unsigned' => TRUE,
                    'null' => FALSE
                ],
                'index' => 2000
            ],
            'name' => [
                'type' => 'VARCHAR',
                'attrs' => [
                    'null' => false,
                    'unique' => true 
                ],
                'index' => 3000
            ],
            'updated' => [
                'type' => 'TIMESTAMP',
                'attrs' => [
                    'default' => 'CURRENT_TIMESTAMP',
                    'update' => 'CURRENT_TIMESTAMP'
                ],
                'index' => 10000
            ],
            'created' => [
                'type' => 'TIMESTAMP',
                'attrs' => [
                    'default' => 'CURRENT_TIMESTAMP'
                ],
                'index' => 11000
            ]
        ]
    ],
    'Broadcast\\Model\\BroadcastContactGroupChain' => [
        'fields' => [
            'id' => [
                'type' => 'INT',
                'attrs' => [
                    'unsigned' => TRUE,
                    'primary_key' => TRUE,
                    'auto_increment' => TRUE
                ],
                'index' => 1000
            ],
            'user' => [
                'type' => 'INT',
                'attrs' => [
                    'unsigned' => TRUE,
                    'null' => FALSE
                ],
                'index' => 2000
            ],
            'contact' => [
                'type' => 'INT',
                'attrs' => [
                    'null' => false,
                    'unsigned' => true
                ],
                'index' => 3000
            ],
            'group' => [
                'type' => 'INT',
                'attrs' => [
                    'null' => false,
                    'unsigned' => true
                ],
                'index' => 4000
            ],
            'updated' => [
                'type' => 'TIMESTAMP',
                'attrs' => [
                    'default' => 'CURRENT_TIMESTAMP',
                    'update' => 'CURRENT_TIMESTAMP'
                ],
                'index' => 10000
            ],
            'created' => [
                'type' => 'TIMESTAMP',
                'attrs' => [
                    'default' => 'CURRENT_TIMESTAMP'
                ],
                'index' => 11000
            ]
        ]
    ],
    'Broadcast\\Model\\BroadcastItem' => [
        'fields' => [
            'id' => [
                'type' => 'INT',
                'attrs' => [
                    'unsigned' => TRUE,
                    'primary_key' => TRUE,
                    'auto_increment' => TRUE
                ],
                'index' => 1000
            ],
            'broadcast' => [
                'type' => 'INT',
                'attrs' => [
                    'unsigned' => true,
                    'null' => false
                ],
                'index' => 2000
            ],
            'contact' => [
                'type' => 'INT',
                'attrs' => [
                    'unsigned' => true,
                    'null' => false
                ],
                'index' => 3000
            ],
            'status' => [
                'comment' => '0 Canceled, 1 Failed, 2 Pending, 3 Done',
                'type' => 'TINYINT',
                'attrs' => [
                    'unsigned' => true,
                    'null' => false,
                    'default' => 2
                ],
                'index' => 5000
            ],
            'reason' => [
                'type' => 'TEXT',
                'attrs' => [],
                'index' => 6000
            ],
            'sent' => [
                'type' => 'DATETIME',
                'attrs' => [
                    'null' => true 
                ],
                'index' => 7000
            ],
            'updated' => [
                'type' => 'TIMESTAMP',
                'attrs' => [
                    'default' => 'CURRENT_TIMESTAMP',
                    'update' => 'CURRENT_TIMESTAMP'
                ],
                'index' => 10000
            ],
            'created' => [
                'type' => 'TIMESTAMP',
                'attrs' => [
                    'default' => 'CURRENT_TIMESTAMP'
                ],
                'index' => 11000
            ]
        ]
    ]
];