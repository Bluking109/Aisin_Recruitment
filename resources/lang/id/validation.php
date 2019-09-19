<?php
return [
    /*
    |---------------------------------------------------------------------------------------
    | Baris Bahasa untuk Validasi
    |---------------------------------------------------------------------------------------
    |
    | Baris bahasa berikut ini berisi standar pesan kesalahan yang digunakan oleh
    | kelas validasi. Beberapa aturan mempunyai banyak versi seperti aturan 'size'.
    | Jangan ragu untuk mengoptimalkan setiap pesan yang ada di sini.
    |
    */
    'accepted'             => ':attribute harus diterima.',
    'active_url'           => ':attribute bukan URL yang valid.',
    'after'                => ':attribute harus berisi tanggal setelah :date.',
    'after_or_equal'       => ':attribute harus berisi tanggal setelah atau sama dengan :date.',
    'alpha'                => ':attribute hanya boleh berisi huruf.',
    'alpha_dash'           => ':attribute hanya boleh berisi huruf, angka, strip, dan garis bawah.',
    'alpha_num'            => ':attribute hanya boleh berisi huruf dan angka.',
    'array'                => ':attribute harus berisi sebuah array.',
    'before'               => ':attribute harus berisi tanggal sebelum :date.',
    'before_or_equal'      => ':attribute harus berisi tanggal sebelum atau sama dengan :date.',
    'between'              => [
        'numeric' => ':attribute harus bernilai antara :min sampai :max.',
        'file'    => ':attribute harus berukuran antara :min sampai :max kilobita.',
        'string'  => ':attribute harus berisi antara :min sampai :max karakter.',
        'array'   => ':attribute harus memiliki :min sampai :max anggota.',
    ],
    'boolean'              => ':attribute harus bernilai true atau false',
    'confirmed'            => 'Konfirmasi :attribute tidak cocok.',
    'date'                 => ':attribute bukan tanggal yang valid.',
    'date_equals'          => ':attribute harus berisi tanggal yang sama dengan :date.',
    'date_format'          => ':attribute tidak cocok dengan format :format.',
    'different'            => ':attribute dan :other harus berbeda.',
    'digits'               => ':attribute harus terdiri dari :digits angka.',
    'digits_between'       => ':attribute harus terdiri dari :min sampai :max angka.',
    'dimensions'           => ':attribute tidak memiliki dimensi gambar yang valid.',
    'distinct'             => ':attribute memiliki nilai yang duplikat.',
    'email'                => ':attribute harus berupa alamat surel yang valid.',
    'ends_with'            => ':attribute harus diakhiri salah satu dari berikut: :values',
    'exists'               => ':attribute yang dipilih tidak valid.',
    'file'                 => ':attribute harus berupa sebuah berkas.',
    'filled'               => ':attribute harus memiliki nilai.',
    'gt'                   => [
        'numeric' => ':attribute harus bernilai lebih besar dari :value.',
        'file'    => ':attribute harus berukuran lebih besar dari :value kilobita.',
        'string'  => ':attribute harus berisi lebih besar dari :value karakter.',
        'array'   => ':attribute harus memiliki lebih dari :value anggota.',
    ],
    'gte'                  => [
        'numeric' => ':attribute harus bernilai lebih besar dari atau sama dengan :value.',
        'file'    => ':attribute harus berukuran lebih besar dari atau sama dengan :value kilobita.',
        'string'  => ':attribute harus berisi lebih besar dari atau sama dengan :value karakter.',
        'array'   => ':attribute harus terdiri dari :value anggota atau lebih.',
    ],
    'image'                => ':attribute harus berupa gambar.',
    'in'                   => ':attribute yang dipilih tidak valid.',
    'in_array'             => ':attribute tidak ada di dalam :other.',
    'integer'              => ':attribute harus berupa bilangan bulat.',
    'ip'                   => ':attribute harus berupa alamat IP yang valid.',
    'ipv4'                 => ':attribute harus berupa alamat IPv4 yang valid.',
    'ipv6'                 => ':attribute harus berupa alamat IPv6 yang valid.',
    'json'                 => ':attribute harus berupa JSON string yang valid.',
    'lt'                   => [
        'numeric' => ':attribute harus bernilai kurang dari :value.',
        'file'    => ':attribute harus berukuran kurang dari :value kilobita.',
        'string'  => ':attribute harus berisi kurang dari :value karakter.',
        'array'   => ':attribute harus memiliki kurang dari :value anggota.',
    ],
    'lte'                  => [
        'numeric' => ':attribute harus bernilai kurang dari atau sama dengan :value.',
        'file'    => ':attribute harus berukuran kurang dari atau sama dengan :value kilobita.',
        'string'  => ':attribute harus berisi kurang dari atau sama dengan :value karakter.',
        'array'   => ':attribute harus tidak lebih dari :value anggota.',
    ],
    'max'                  => [
        'numeric' => ':attribute maskimal bernilai :max.',
        'file'    => ':attribute maksimal berukuran :max kilobita.',
        'string'  => ':attribute maskimal berisi :max karakter.',
        'array'   => ':attribute maksimal terdiri dari :max anggota.',
    ],
    'mimes'                => ':attribute harus berupa berkas berjenis: :values.',
    'mimetypes'            => ':attribute harus berupa berkas berjenis: :values.',
    'min'                  => [
        'numeric' => ':attribute minimal bernilai :min.',
        'file'    => ':attribute minimal berukuran :min kilobita.',
        'string'  => ':attribute minimal berisi :min karakter.',
        'array'   => ':attribute minimal terdiri dari :min anggota.',
    ],
    'not_in'               => ':attribute yang dipilih tidak valid.',
    'not_regex'            => 'Format :attribute tidak valid.',
    'numeric'              => ':attribute harus berupa angka.',
    'present'              => ':attribute wajib ada.',
    'regex'                => 'Format :attribute tidak valid.',
    'required'             => ':attribute wajib diisi.',
    'required_if'          => ':attribute wajib diisi.',
    'required_unless'      => ':attribute wajib diisi kecuali :other memiliki nilai :values.',
    'required_with'        => ':attribute wajib diisi.',
    'required_with_all'    => ':attribute wajib diisi bila terdapat :values.',
    'required_without'     => ':attribute wajib diisi bila tidak terdapat :values.',
    'required_without_all' => ':attribute wajib diisi bila sama sekali tidak terdapat :values.',
    'same'                 => ':attribute dan :other harus sama.',
    'size'                 => [
        'numeric' => ':attribute harus berukuran :size.',
        'file'    => ':attribute harus berukuran :size kilobyte.',
        'string'  => ':attribute harus berukuran :size karakter.',
        'array'   => ':attribute harus mengandung :size anggota.',
    ],
    'starts_with'          => ':attribute harus diawali salah satu dari berikut: :values',
    'string'               => ':attribute harus berupa string.',
    'timezone'             => ':attribute harus berisi zona waktu yang valid.',
    'unique'               => ':attribute sudah ada sebelumnya.',
    'uploaded'             => ':attribute gagal diunggah.',
    'url'                  => 'Format :attribute tidak valid.',
    'uuid'                 => ':attribute harus merupakan UUID yang valid.',

    /*
    |---------------------------------------------------------------------------------------
    | Baris Bahasa untuk Validasi Kustom
    |---------------------------------------------------------------------------------------
    |
    | Di sini Anda dapat menentukan pesan validasi untuk atribut sesuai keinginan dengan
    | menggunakan konvensi "attribute.rule" dalam penamaan barisnya. Hal ini mempercepat
    | dalam menentukan baris bahasa kustom yang spesifik untuk aturan atribut yang diberikan.
    |
    */
    'custom' => [
        'height' => [
            'min' => ':attribute harus diisi',
        ],
        'weight' => [
            'min' => ':attribute harus diisi'
        ],
        'educations.4.name_of_institution' => [
            'required_without_all' => ':attribute wajib diisi'
        ],
        'birth_order' => [
            'between' => 'Tidak valid'
        ],
    ],
    /*
    |---------------------------------------------------------------------------------------
    | Kustom Validasi Atribut
    |---------------------------------------------------------------------------------------
    |
    | Baris bahasa berikut digunakan untuk menukar 'placeholder' atribut dengan sesuatu
    | yang lebih mudah dimengerti oleh pembaca seperti "Alamat Surel" daripada "surel" saja.
    | Hal ini membantu kita dalam membuat pesan menjadi lebih ekspresif.
    |
    */
    'attributes' => [
        'name' => 'Nama',
        'message' => 'Pesan',
        'subject' => 'Subjek',
        'identity_number' => 'Nomer KTP',
        'place_of_birth' => 'Tempat lahir',
        'date_of_birth' => 'Tanggal lahir',
        'gender' => 'Jenis kelamin',
        'address' => 'Alamat sesuai KTP',
        'address_village' => 'Kelurahan sesuai KTP',
        'address_telephone_number' => 'Nomer telepon rumah',
        'parent_telephone_number' => 'Nomer telepon orang tua',
        'domicile' => 'Domisili',
        'domicile_village' => 'Kelurahan domisili',
        'domicile_telephone_number' => 'Nomer telepon domisili',
        'driving_licences.*.type' => 'Jenis SIM',
        'driving_licences.*.value' => 'Nomer SIM',
        'handphone_number' => 'Nomer handphone',
        'birth_order' => 'Anak ke',
        'blood_type' => 'Golongan darah',
        'religion' => 'Agama',
        'height' => 'Tinggi badan',
        'weight' => 'Berat badan',
        'pants_size' => 'Ukuran celana',
        'shoe_size' => 'Ukuran sepatu',
        'educations.1.name_of_institution' => 'Nama SD',
        'educations.2.name_of_institution' => 'Nama SMP',
        'educations.3.name_of_institution' => 'Nama SMA',
        'educations.3.major' => 'Jurusan',
        'educations.4.major' => 'Jurusan',
        'educations.5.major' => 'Jurusan',
        'educations.6.major' => 'Jurusan',
        'educations.3.end_year' => 'Tahun lulus',
        'educations.1.city' => 'Kota',
        'educations.2.city' => 'Kota',
        'educations.3.city' => 'Kota',
        'educations.4.city' => 'Kota',
        'educations.5.city' => 'Kota',
        'educations.6.city' => 'Kota',
        'educations.1.average_math_score' => 'Nilai rata-rata matematika',
        'educations.2.average_math_score' => 'Nilai rata-rata matematika',
        'educations.3.average_math_score' => 'Nilai rata-rata matematika',
        'educations.1.un_math_score' => 'Nilai UN matematika',
        'educations.2.un_math_score' => 'Nilai UN matematika',
        'educations.3.un_math_score' => 'Nilai UN matematika',
        'educations.4.name_of_institution' => 'Nama perguruan tinggi D3',
        'educations.5.name_of_institution' => 'Nama perguruan tinggi S1',
        'educations.6.name_of_institution' => 'Nama perguruan tinggi S2',
        'educations.4.faculty' => 'Fakultas',
        'educations.5.faculty' => 'Fakultas',
        'educations.6.faculty' => 'Fakultas',
        'educations.4.study_program' => 'Program studi',
        'educations.5.study_program' => 'Program studi',
        'educations.6.study_program' => 'Program studi',
        'educations.4.start_year' => 'Tahun masuk',
        'educations.5.start_year' => 'Tahun masuk',
        'educations.6.start_year' => 'Tahun masuk',
        'educations.1.end_year' => 'Tahun lulus',
        'educations.2.end_year' => 'Tahun lulus',
        'educations.3.end_year' => 'Tahun lulus',
        'educations.4.end_year' => 'Tahun lulus',
        'educations.5.end_year' => 'Tahun lulus',
        'educations.6.end_year' => 'Tahun lulus',
        'educations.4.grade_point' => 'IPK',
        'educations.5.grade_point' => 'IPK',
        'educations.6.grade_point' => 'IPK',
        'reason_choose_institute' => 'Alasan memilih perguruan jurusan',
        'essay' => 'Karya ilmiah',
        'non_formal_educations.*.place' => 'Tempat pelatihan',
        'non_formal_educations.*.start_date' => 'Tanggal mulai',
        'non_formal_educations.*.end_date' => 'Tanggal selesai',
        'marital_status_date_ktp' => 'Tanggal',
        'marital_status_date_actual' => 'Tanggal',
        'partner_place_of_birth' => 'Tempat lahir',
        'partner_date_of_birth' => 'Tanggal lahir',
        'partner_last_education' => 'Pendidikan terakhir',
        'partner_job' => 'Pekerjaan pasangan',
        'children.*.place_of_birth' => 'Tempat lahir anak',
        'children.*.date_of_birth' => 'Tanggal lahir anak',
        'children.*.last_education' => 'Pendidikan terakhir anak',
        'children.*.job' => 'Pekerjaan anak',
        'father_name' => 'Nama Ayah',
        'father_place_of_birth' => 'Tempat lahir Ayah',
        'father_date_of_birth' => 'Tanggal lahir Ayah',
        'father_last_education' => 'Pendidikan terakhir Ayah',
        'father_job' => 'Pekerjaan Ayah',
        'mother_name' => 'Nama Ibu',
        'mother_place_of_birth' => 'Tempat lahir Ibu',
        'mother_date_of_birth' => 'Tanggal lahir Ibu',
        'mother_last_education' => 'Pendidikan terakhir Ibu',
        'mother_job' => 'Pekerjaan Ibu',
        'siblings.*.place_of_birth' => 'Tempat lahir saudara',
        'siblings.*.date_of_birth' => 'Tanggal lahir saudara',
        'siblings.*.last_education' => 'Pendidikan terakhir saudara',
        'siblings.*.job' => 'Pekerjaan saudara',
        'position_description' => 'Field ini',
        'problems_and_solutions' => 'Field ini',
        'impression_on_company' => 'Field ini',
        'improvement_on_company' => 'Field ini',
        'who_pushed' => 'Field ini',
        'how_make_decisions' => 'Field ini',
        'work_experiences.*.position' => 'Jabatan',
        'work_experiences.*.salary' => 'Gaji terakhir',
        'work_experiences.*.join_date' => 'Tanggal masuk',
        'work_experiences.*.end_date' => 'Tanggal keluar',
        'work_experiences.*.reason_to_move' => 'Alasan keluar',
        'work_experiences.*.boss_name' => 'Nama atasan',
        'work_experiences.*.boss_position' => 'Jabatan atasan'
    ],
];