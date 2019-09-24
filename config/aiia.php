<?php

return [
    'default_url_admin' => 'admin-aiia',
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
    		'name' => 'cover_letter',
    		'display_name' => 'Cover Letter',
    		'rules' => [
    			'Format file (pdf, doc, docx)',
    			'Ukuran Maksimal 300KB'
    		]
    	],
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
];
