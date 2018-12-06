<?php

return [
/*
    'routes' => array(
        'account' => array( 'prefix' => '{locale}/{currency}', 'middleware' => ['web'] ),
        'default' => array( 'prefix' => '{locale}/{currency}', 'middleware' => ['web'] ),
        'confirm' => array( 'prefix' => '{locale}/{currency}', 'middleware' => ['web'] ),
        'update' => array( 'prefix' => '{locale}/{currency}', 'middleware' => ['web'] ),
    ),
*/	
	'routes' => [
		// 'login' => ['middleware' => ['web']],
		// 'admin' => ['prefix' => 'admin', 'middleware' => ['web']],
		// 'jqadm' => ['prefix' => 'admin/{site}/jqadm', 'middleware' => ['web', 'auth']],
		// 'extadm' => ['prefix' => 'admin/{site}/extadm', 'middleware' => ['web', 'auth']],
		// 'jsonadm' => ['prefix' => 'admin/{site}/jsonadm', 'middleware' => ['web', 'auth']],
		// 'jsonapi' => ['prefix' => 'jsonapi', 'middleware' => ['web', 'api']],
		// 'account' => ['middleware' => ['web', 'auth']],
		// 'default' => ['middleware' => ['web']],
		// 'update' => [],
	],
    'page' => array(
    	'account-index' => array( 'locale/select','account/history','account/favorite','account/watch','basket/mini','catalog/session' ),
    	'basket-index' => array( 'locale/select','basket/standard','basket/related' ),
    	'catalog-detail' => array( 'locale/select','basket/mini','catalog/stage','catalog/detail','catalog/session' ),
    	'catalog-list' => array( 'locale/select','basket/mini','catalog/filter','catalog/stage','catalog/lists' ),
    ),
	/*
	'page' => [
		// 'account-index' => [ 'account/profile','account/subscription','account/history','account/favorite','account/watch','basket/mini','catalog/session' ],
		// 'basket-index' => [ 'basket/standard','basket/related' ],
		// 'catalog-count' => [ 'catalog/count' ],
		// 'catalog-detail' => [ 'basket/mini','catalog/stage','catalog/detail','catalog/session' ],
		// Hint: catalog/filter is also available as single 'catalog/tree', 'catalog/search', 'catalog/attribute' (https://aimeos.org/docs/Laravel/Adapt_pages)
		// 'catalog-list' => [ 'basket/mini','catalog/filter','catalog/stage','catalog/lists' ],
		// 'catalog-stock' => [ 'catalog/stock' ],
		// 'catalog-suggest' => [ 'catalog/suggest' ],
		// 'checkout-confirm' => [ 'checkout/confirm' ],
		// 'checkout-index' => [ 'checkout/standard' ],
		// 'checkout-update' => [ 'checkout/update' ],
	],
	*/
	/*
	'resource' => [
		'db' => [
			'adapter' => env('DB_CONNECTION', 'mysql'),
			'host' => env('DB_HOST', 'localhost'),
			'port' => env('DB_PORT', ''),
			'socket' => '',
			'database' => env('DB_DATABASE', 'laravel'),
			'username' => env('DB_USERNAME', 'root'),
			'password' => env('DB_PASSWORD', ''),
			'stmt' => ["SET SESSION sort_buffer_size=2097144; SET NAMES 'utf8'; SET SESSION sql_mode='ANSI'"],
			'limit' => 3, // maximum number of concurrent database connections
		],
	],
	*/

	'admin' => [],

	'client' => [
		'html' => [
			'basket' => [
				'cache' => [
					'enable' => false, // Disable basket content caching
				],
			],
			'common' => [
				'content' => [
					// 'baseurl' => config( 'app.url' ) . '/',
				],
				'template' => [
					//'baseurl' => public_path( 'packages/aimeos/shop/themes/commerce'),
				],
			],
			'email' => array(
				'from-email' => 'aimeos@declacar.com.ua',
				'from-name' => 'MyShop',
			),
			'catalog' => [
				'lists' => [
					'levels' => 3
				],
				/*
				'detail' => [
					'name' => 'NewStandard',
				],
				*/
			],
			/*
			'locale' => array(
				'select' => array(
					'currency' => array(
						'param-name' => 'currency',
					),
					'language' => array(
						'param-name' => 'locale',
					),
				),
			),		
			*/
		],
	],

	'i18n' => [
	],

	'madmin' => [
		'cache' => [
			'manager' => [
				// 'name' => 'None', // Disable caching
			],
		],
		'log' => [
			'manager' => [
				'standard' => [
					// 'loglevel' => 7, // Enable debug logging into madmin_log table
				],
			],
		],
	],

	'mshop' => [
	],


	'command' => [
	],

	'frontend' => [
	],

	'backend' => [
	],
	
	'controller' => [
		'jobs' => [
			'catalog' => [
				'import' => [
					'csv' => [
						'location' => base_path('storage/tmp/catalog'),
						'skip-lines' => 1,
						'mapping' =>     array(
							'item' => array(
								0 => 'catalog.code', // e.g. unique EAN code
								1 => 'catalog.parent', // Code of parent catalog node
								2 => 'catalog.label', // UTF-8 encoded text, also used as catalog name
								//3 => 'catalog.status', // If category should be shown in the frontend
							),
							/*
							'text' => array(
								3 => 'text.type', // e.g. "short" for short description
								4 => 'text.content', // UTF-8 encoded text
							),
							'media' => array(
								5 => 'media.url', // relative URL of the catalog image on the server
							),
							*/
						)						
					],

				],
			],
			'product' => [
				'import' => [
					'csv' => [
						'container' => [
							'type' => 'Directory',
							'content' => 'CSV',
						],
						'location' => base_path('storage/tmp/product'),
						'skip-lines' => 2,
						'backup' => base_path('storage/tmp/product/backup'),
						'mapping' =>
							    array(
									'item' => array(
										0 => 'product.code', // e.g. unique EAN code
										1 => 'product.label', // UTF-8 encoded text, also used as product name
										21 => 'product.type', // type of the product, e.g. "default" or "selection"
										22 => 'product.status', // enabled (1) or disabled (0)
									),
									'text' => array(
										20 => 'text.languageid',
										14 => 'text.label',
										//16 => 'text.type', // e.g. "short" for short description
										//2 => 'text.content', // UTF-8 encoded text
										//20 => 'text.languageid',
										23 => 'text.type', // e.g. "long" for long description
										2 => 'text.content', // UTF-8 encoded text
									),
									'media' => array(
										3 => 'media.url', // relative URL of the product image on the server
										14 => 'media.label',
										19 => 'media.mimetype',
										4 => 'media.url', // relative URL of the product image on the server
										//14 => 'media.label',
										19 => 'media.mimetype',
										5 => 'media.url', // relative URL of the product image on the server
										//14 => 'media.label',
										19 => 'media.mimetype',
									),
									'price' => array(
										18 => 'price.currencyid', // three letter ISO currency code
										9 => 'price.quantity', // the quantity the price (for block pricing)
										8 => 'price.value', // price with decimals separated by a dot
										//12 => 'price.taxrate', // tax rate with decimals separated by a dot
									),
									/*
									'attribute' => array(
										17 => 'attribute.code', // code of an attribute, will be created if not exists
										13 => 'attribute.type', // e.g. "size", "length", "width", "color", etc.
									),
									'product' => array(
										15 => 'product.code', // e.g. EAN code of another product
										16 => 'product.lists.type', // e.g. "suggestion" for suggested product
									),
									'property' => array(
										17 => 'product.property.value', // arbitrary value for the corresponding type
										18 => 'product.property.type', // e.g. "package-weight"
									),
									*/
									'catalog' => array(
										12 => 'catalog.code', // e.g. Unique category code
										//20 => 'catalog.lists.type', // e.g. "promotion" for top seller products
									),
									'stock' => array(
										24 => 'stock.stocklevel',
										//1 => 'stock.type',
										//2 => 'stock.typeid',
										//3 => 'stock.dateback',
									),
								),
							],
						],
					],
				],
			],
							
];
