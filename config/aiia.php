<?php

return [
    'default_url_admin' => 'admin-aisin',
    'working_environments' => [
    	'lapangan',
    	'kantor',
    	'pabrik'
    ],
    'sections' => [
    	'Accounting',
		'Finance',
		'Purchasing - Exim',
		'New Project & Localization',
		'Human Resource Department',
		'Industrial Relation & Legal',
		'General Affair',
		'Interpreter - Translator Bahasa Jepang',
		'Production',
		'Production Planning & Inventory Control (PPIC)',
		'Production Research (Kaizen) / OMD',
		'Quality Assurance',
		'Engineering',
		'Maintenance',
		'Information Technology Development (ITD)',
		'Management System',
    ],
    'document_types' => [
    	[
    		'name' => 'cv',
    		'display_name' => 'CV',
    		'rules' => [
    			'Format file (pdf, jpg, doc, docx)',
    			'Ukuran Maksimal 300kb'
    		]
    	],
    	[
    		'name' => 'ktp',
    		'display_name' => 'KTP',
    		'rules' => [
    			'Format file (jpg, jpeg)',
    			'Ukuran Maksimal 200KB'
    		]
    	],
    	[
    		'name' => 'certificate',
    		'display_name' => 'Ijazah',
    		'rules' => [
    			'Format file (pdf, jpg, jpeg)',
    			'Ukuran Maksimal 300KB'
    		]
    	],
    	[
    		'name' => 'transcripts',
    		'display_name' => 'Transkrip Nilai',
    		'rules' => [
    			'Format file (pdf, jpg, jpeg)',
    			'Ukuran Maksimal 300KB'
    		]
    	],
    	[
    		'name' => 'npwp',
    		'display_name' => 'NPWP',
    		'rules' => [
    			'Format file (jpg, jpeg)',
    			'Ukuran Maksimal 200KB'
    		]
    	],
    	[
    		'name' => 'kk',
    		'display_name' => 'KK',
    		'rules' => [
    			'Format file (jpg, jpeg)',
    			'Ukuran Maksimal 200KB'
    		]
    	],
    ],
    'diseases' => [
        'Asma',
        'Paru-Paru Basah',
        'Flex Paru',
        'TBC',
        'Hepatitis',
        'Hernia',
        'Patah Tulang',
        'Ambeien',
    ],
    'vacancy_images' => [
        '1.jpg',
        '2.jpg',
        '3.jpg',
        '4.jpg',
        '5.jpg',
		'6.jpg',
		'7.jpg',
        '8.jpg',
        '9.jpg',
        '10.jpg',
        '11.jpg',
        '12.jpg',
        '13.jpg',
        '14.jpg',
        '15.jpg',
    ],
];
