<?php
  $config = [
    'username' => '',

    'publicKey' => '',

    'privateKey' => '',

    'session_name' => 'something_other_than_PHPSESSID',

    'domain' => '.website.com',

    'lifetime' => 12 * 60 * 60,

    'path' => '/',

    'samesite' => 'Lax',

    'https' => 0,

    'alternateHijackingTest' => false,

    'enableLogging' => false,

    'targetFile' => './API.log',

    'testMode' => false,

    'testURL' => '',

    'paperFormat' => 'portrait',

    'paperOrientation' => 'letter',

    'deliveryTerms' => '
      <p>Responsibility for remittance is implicit when requesting a delivery via this web service. If you do not wish to be held responsible for the payment for services rendered please contact the responsible party and have them request the delivery either on-line or by phone at <a href="tel:Your-Phone-Number">Your-Phone-Number</a>.</p>
      <p>Routine or Round Trip deliveries that are canceled within one hour of being requested will not be billed. Canceled 1 hour deliveries, Routine or Round Trip deliveries canceled more than one hour after being requested, and scheduled deliveries canceled less than two hours prior to pick up will be billed at a reduced rate.</p>',

    'enableChartPDF' => false,

    'showCanceledTicketsOnInvoiceExceptions' => [],

    'consolidateContractTicketsOnInvoiceExceptions' => [],

    'clientNameExceptions' => [],

    'clientAddressExceptions' => [],

    'deliveryVAT' => [
      'default' => 1
    ],

    'iceVAT' => [
      'default' => 1
    ],

    'ignoreValues' => [
      'none', 'test', 'billing correction', '-', 'multiple', 'fuel compensation', 'other charge'
    ],

    'emailConfig' => [
      'fromAddress' => '',
      'password'=> '',
      'smtpHost' => '',
      'port' => '587',
      'secureType' => 'tls',
      'fromName' => '',
      'BCCAddress' => ''
    ],

    'allTimeChartLimit' => 6,

    'chart_height' => 12.5,

    'userLogin' => 'CustomLogin',

    'driverChargesEntryExclude' => [ [ 0, 8, 9 ], [ 0, 8, 9 ] ],

    'driverChargesQueryExclude' => [ [ 0, 8, 9 ], [ 0, 8, 9 ] ],

    'dispatchChargesEntryExclude' => [ 0, 8, 9 ],

    'dispatchChargesQueryExclude' => [ 9 ],

    'clientChargesEntryExclude' => [ [ 0, 8, 9 ], [ 0, 8, 9 ] ],

    'clientChargesQueryExclude' => [ [], [ 0, 8, 9 ] ],

    'orgChargesQueryExclude' => [],

    'client0ChargesEntryExclude' => [],

    'client0ChargesQueryExclude' => [],

    'initialCharge' => 5,

    'displayDryIce' => true,

    'dryIceStep' => 0.01,

    'extend' => [
      'css' => [
        'client' => [
          '../style/client.css',
          '../style/style_addons.css'
        ],
        'org' => [
          '../style/client.css',
          '../style/style_addons.css'
        ],
        'driver' => [
          '../style/client.css',
          '../style/driver.css',
          '../style/style_addons.css'
        ],
        'dispatch' => [
          '../style/client.css',
          '../style/driver.css',
          '../style/style_addons.css'
        ]
      ],
      'all' => [
        [null, null, '//cdn.jsdelivr.net/gh/lyfeyaj/swipe/swipe.js'],
        [null, null, '../app_js/app.min.js']
      ],
      'client' => [
        [
          // All clients
          ['Delivery Request', 'ticketForm'],
          ['Ticket Query', 'ticketQueryForm']
        ],
        [
          // admin clients
          ['Invoice Query', 'invoiceQueryForm'],
          ['Price Calculator', 'runPriceForm'],
          ['Change Password', 'dailyPasswordForm'],
          ['Change Admin Password', 'adminPasswordForm'],
          ['Contact Info', 'updateInfoForm']
        ],
        [
          // daily clients
          ['Price Calculator', 'runPriceForm']
        ]
      ],
      'org' => [
        [ 'Price Calculator', 'runPriceForm' ],
        [ 'Ticket Query', 'ticketQueryForm' ],
        [ 'Invoice Query', 'invoiceQueryForm' ],
        [ 'Change Password', 'orgPasswordForm']
      ],
      'driver' => [
        [
          // all drivers
          ['Route', 'routeTickets'],
          ['On Call', 'onCallTickets'],
          ['Transfers', 'transferredTickets'],
          [null, null, 'https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js'],
          [null, null, '../app_js/sigPad.min.js']
        ],
        [
          // can dispatch = 0
          ['Change Password', 'driverPasswordForm']
        ],
        [
          // can dispatch = 1
          ['Ticket Entry', 'ticketForm'],
          ['Change Password', 'driverPasswordForm']
        ],
        [
          // can dispatch = 2
          ['Dispatch', 'ticketsToDispatch'],
          ['Active Tickets', 'initTicketEditor'],
          ['Ticket Entry', 'ticketForm'],
          ['Change Password', 'driverPasswordForm']
        ]
      ],
      'dispatcher' => [
        ['Dispatch', 'ticketsToDispatch'],
        ['Active Tickets', 'initTicketEditor'],
        ['Ticket Entry', 'ticketForm'],
        ['Price Calculator', 'runPriceForm'],
        ['Change Password', 'dispatchPasswordForm']
      ],
      'client0' => [
        ['Price Calculator', 'runPriceForm'],
        ['Dispatch', 'ticketsToDispatch'],
        ['Change Password', 'dailyPasswordForm'],
        ['Change Admin Password', 'adminPasswordForm'],
        ['Contact Info', 'updateInfoForm']
      ],
      'org0' => [
        [ 'Price Calculator', 'runPriceForm' ],
        [ 'Ticket Query', 'ticketQueryForm' ],
        [ 'Invoice Query', 'invoiceQueryForm' ],
        [ 'Change Password', 'orgPasswordForm']
      ]
    ],
    'invoiceCronIgnoreClients' => [ 0 ],

    'invoiceCronIgnoreNonRepeat' => [],

    'invoiceCronLogSuccess' => false,

    'invoiceCronLogFailure' => true
  ];
  // config for price calculation without session
  if (!isset($_SESSION['config'])) {
    $config['config'] = [
      'CurrencySymbol' => '$',
      'WeightsMeasures' => 0,
      'InternationalAddressing' => 0,
      'TimeZone' => 'America/Chicago',
      'diPrice' => 0,
      'OneHour' => 0.0,
      'TwoHour' => 0.0,
      'ThreeHour' => 0.0,
      'FourHour' => 0.0,
      'DeadRun' => 0.0,
      'DedicatedRunRate' => 0.0,
      'Geocoders' => '{}',
      'BaseTicketFee' => 0.0,
      'MaximumFee' => 0.0,
      'RangeIncrement' => 0.0,
      'PriceIncrement' => 0.0,
      'ApplyVAT' => 0,
      'deliveryVAT' => [ 'default' => 0 ],
      'iceVAT' => [ 'default' => 0 ],
      'DefaultTerms'=>1,
      'DiscountRate'=>0,
      'DiscountWindow'=>0,
      'TermLength'=>0,
      'MaxRange' => 0.0,
      'RangeCenter' => [ 'lat' => 41.2125742, 'lng' => -95.9765968 ]
    ];
  }
