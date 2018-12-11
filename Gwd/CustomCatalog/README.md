Configure the AMQP connection in your app/etc/env.php file
  'ce_mq' => [
      'amqp' => [
          'host' => 'localhost',
          'port' => 5672,
          'username' => 'guest',
          'password' => 'guest',
          'virtualhost' => '/',
      ],
  ],
