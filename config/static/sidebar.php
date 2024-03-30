<?php


return  [
    'admin' => [
        [
            'sidebar_order' => 1,
            'route' => 'invoices.index',
            'icon'  => '<svg class="sidemenu_icon" viewBox="0 0 30 31" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="30" height="30" transform="translate(0 0.5)" fill="transparent" />
                                <path
                                    d="M16.4353 13.7051H19.7879M10.209 18.6483H19.7879M10.6879 8.3125H19.309C19.9029 8.3125 20.4297 8.33048 20.8991 8.39339C23.4183 8.65403 24.0984 9.7685 24.0984 12.8063V18.1989C24.0984 21.2367 23.4183 22.3512 20.8991 22.6119C20.4297 22.6748 19.9029 22.6927 19.309 22.6927H10.6879C10.094 22.6927 9.56717 22.6748 9.09781 22.6119C6.57854 22.3512 5.89844 21.2367 5.89844 18.1989V12.8063C5.89844 9.7685 6.57854 8.65403 9.09781 8.39339C9.56717 8.33048 10.094 8.3125 10.6879 8.3125Z"
                                    stroke="currentColor" stroke-width="1.19991" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M11.97 13.1094H11.9771M9.57031 13.1094H9.57751" stroke="currentColor"
                                    stroke-width="1.59988" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>',
            'text'       => 'Dashboard',
            'permission' => true,
            'opened'     => [
                'admin/dashboard'
            ]
        ],
    ]
];
