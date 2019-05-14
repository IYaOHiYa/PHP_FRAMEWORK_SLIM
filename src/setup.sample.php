<?php
    class Setup{
        static public function getSetting()
        {
            return [
                "settings" => [
                    'displayErrorDetails' => true,
                    'outputBuffering' => 'append',
                    'view' => __DIR__ . '/View/',
                    'db' => [
                        'test' => [
                            'engine'    => 'mysql',
                            'host'      => '0.0.0.0',
                            'dbName'    => 'dbName',
                            'user'      => 'user',
                            'passwd'    => 'passwd',
                        ],
                    ],
                    'logger' => [
                        'name' => 'AppLog',
                        'path' => __DIR__ . '/public/logs/app.log',
                    ],
                ],
            ];
        }
    }