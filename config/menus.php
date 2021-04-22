<?php
return [
    'available' => [
        'dashboard' => [
            'name' => 'Dashboard',
            'except_permissions' => ['create', 'update', 'show', 'trash', 'delete',], // Example: ['store', 'update']
            'additional_permissions' => [  // Example ['action' => 'Action description']
                'total_vehicle' => 'User can see total Vehicle',
                'total_member' => 'User can see total Member',
                'total_road' => 'User can see total road',
            ],
        ],

        'user' => [
            'name' => 'User',
            'except_permissions' => [], // Example: ['store', 'update']
            'additional_permissions' => [  // Example ['action' => 'Action description']

            ],
        ],

        'permission' => [
            'name' => 'Permission',
            'except_permissions' => [], // Example: ['store', 'update']
            'additional_permissions' => [  // Example ['action' => 'Action description']

            ],
        ],

        'role' => [
            'name' => 'Role',
            'except_permissions' => [], // Example: ['store', 'update']
            'additional_permissions' => [  // Example ['action' => 'Action description']

            ],
        ]
    ]
];
