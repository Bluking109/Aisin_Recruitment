<?php

use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('districts')->delete();
        
        \DB::table('districts')->insert(array (
            0 => 
            array (
                'id' => 1101,
                'province_id' => 11,
                'name' => 'KABUPATEN SIMEULUE',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            1 => 
            array (
                'id' => 1102,
                'province_id' => 11,
                'name' => 'KABUPATEN ACEH SINGKIL',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            2 => 
            array (
                'id' => 1103,
                'province_id' => 11,
                'name' => 'KABUPATEN ACEH SELATAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            3 => 
            array (
                'id' => 1104,
                'province_id' => 11,
                'name' => 'KABUPATEN ACEH TENGGARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            4 => 
            array (
                'id' => 1105,
                'province_id' => 11,
                'name' => 'KABUPATEN ACEH TIMUR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            5 => 
            array (
                'id' => 1106,
                'province_id' => 11,
                'name' => 'KABUPATEN ACEH TENGAH',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            6 => 
            array (
                'id' => 1107,
                'province_id' => 11,
                'name' => 'KABUPATEN ACEH BARAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            7 => 
            array (
                'id' => 1108,
                'province_id' => 11,
                'name' => 'KABUPATEN ACEH BESAR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            8 => 
            array (
                'id' => 1109,
                'province_id' => 11,
                'name' => 'KABUPATEN PIDIE',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            9 => 
            array (
                'id' => 1110,
                'province_id' => 11,
                'name' => 'KABUPATEN BIREUEN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            10 => 
            array (
                'id' => 1111,
                'province_id' => 11,
                'name' => 'KABUPATEN ACEH UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            11 => 
            array (
                'id' => 1112,
                'province_id' => 11,
                'name' => 'KABUPATEN ACEH BARAT DAYA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            12 => 
            array (
                'id' => 1113,
                'province_id' => 11,
                'name' => 'KABUPATEN GAYO LUES',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            13 => 
            array (
                'id' => 1114,
                'province_id' => 11,
                'name' => 'KABUPATEN ACEH TAMIANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            14 => 
            array (
                'id' => 1115,
                'province_id' => 11,
                'name' => 'KABUPATEN NAGAN RAYA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            15 => 
            array (
                'id' => 1116,
                'province_id' => 11,
                'name' => 'KABUPATEN ACEH JAYA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            16 => 
            array (
                'id' => 1117,
                'province_id' => 11,
                'name' => 'KABUPATEN BENER MERIAH',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            17 => 
            array (
                'id' => 1118,
                'province_id' => 11,
                'name' => 'KABUPATEN PIDIE JAYA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            18 => 
            array (
                'id' => 1171,
                'province_id' => 11,
                'name' => 'KOTA BANDA ACEH',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            19 => 
            array (
                'id' => 1172,
                'province_id' => 11,
                'name' => 'KOTA SABANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            20 => 
            array (
                'id' => 1173,
                'province_id' => 11,
                'name' => 'KOTA LANGSA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            21 => 
            array (
                'id' => 1174,
                'province_id' => 11,
                'name' => 'KOTA LHOKSEUMAWE',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            22 => 
            array (
                'id' => 1175,
                'province_id' => 11,
                'name' => 'KOTA SUBULUSSALAM',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            23 => 
            array (
                'id' => 1201,
                'province_id' => 12,
                'name' => 'KABUPATEN NIAS',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            24 => 
            array (
                'id' => 1202,
                'province_id' => 12,
                'name' => 'KABUPATEN MANDAILING NATAL',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            25 => 
            array (
                'id' => 1203,
                'province_id' => 12,
                'name' => 'KABUPATEN TAPANULI SELATAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            26 => 
            array (
                'id' => 1204,
                'province_id' => 12,
                'name' => 'KABUPATEN TAPANULI TENGAH',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            27 => 
            array (
                'id' => 1205,
                'province_id' => 12,
                'name' => 'KABUPATEN TAPANULI UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            28 => 
            array (
                'id' => 1206,
                'province_id' => 12,
                'name' => 'KABUPATEN TOBA SAMOSIR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            29 => 
            array (
                'id' => 1207,
                'province_id' => 12,
                'name' => 'KABUPATEN LABUHAN BATU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            30 => 
            array (
                'id' => 1208,
                'province_id' => 12,
                'name' => 'KABUPATEN ASAHAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            31 => 
            array (
                'id' => 1209,
                'province_id' => 12,
                'name' => 'KABUPATEN SIMALUNGUN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            32 => 
            array (
                'id' => 1210,
                'province_id' => 12,
                'name' => 'KABUPATEN DAIRI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            33 => 
            array (
                'id' => 1211,
                'province_id' => 12,
                'name' => 'KABUPATEN KARO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            34 => 
            array (
                'id' => 1212,
                'province_id' => 12,
                'name' => 'KABUPATEN DELI SERDANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            35 => 
            array (
                'id' => 1213,
                'province_id' => 12,
                'name' => 'KABUPATEN LANGKAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            36 => 
            array (
                'id' => 1214,
                'province_id' => 12,
                'name' => 'KABUPATEN NIAS SELATAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            37 => 
            array (
                'id' => 1215,
                'province_id' => 12,
                'name' => 'KABUPATEN HUMBANG HASUNDUTAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            38 => 
            array (
                'id' => 1216,
                'province_id' => 12,
                'name' => 'KABUPATEN PAKPAK BHARAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            39 => 
            array (
                'id' => 1217,
                'province_id' => 12,
                'name' => 'KABUPATEN SAMOSIR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            40 => 
            array (
                'id' => 1218,
                'province_id' => 12,
                'name' => 'KABUPATEN SERDANG BEDAGAI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            41 => 
            array (
                'id' => 1219,
                'province_id' => 12,
                'name' => 'KABUPATEN BATU BARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            42 => 
            array (
                'id' => 1220,
                'province_id' => 12,
                'name' => 'KABUPATEN PADANG LAWAS UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            43 => 
            array (
                'id' => 1221,
                'province_id' => 12,
                'name' => 'KABUPATEN PADANG LAWAS',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            44 => 
            array (
                'id' => 1222,
                'province_id' => 12,
                'name' => 'KABUPATEN LABUHAN BATU SELATAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            45 => 
            array (
                'id' => 1223,
                'province_id' => 12,
                'name' => 'KABUPATEN LABUHAN BATU UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            46 => 
            array (
                'id' => 1224,
                'province_id' => 12,
                'name' => 'KABUPATEN NIAS UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            47 => 
            array (
                'id' => 1225,
                'province_id' => 12,
                'name' => 'KABUPATEN NIAS BARAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            48 => 
            array (
                'id' => 1271,
                'province_id' => 12,
                'name' => 'KOTA SIBOLGA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            49 => 
            array (
                'id' => 1272,
                'province_id' => 12,
                'name' => 'KOTA TANJUNG BALAI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            50 => 
            array (
                'id' => 1273,
                'province_id' => 12,
                'name' => 'KOTA PEMATANG SIANTAR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            51 => 
            array (
                'id' => 1274,
                'province_id' => 12,
                'name' => 'KOTA TEBING TINGGI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            52 => 
            array (
                'id' => 1275,
                'province_id' => 12,
                'name' => 'KOTA MEDAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            53 => 
            array (
                'id' => 1276,
                'province_id' => 12,
                'name' => 'KOTA BINJAI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            54 => 
            array (
                'id' => 1277,
                'province_id' => 12,
                'name' => 'KOTA PADANGSIDIMPUAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            55 => 
            array (
                'id' => 1278,
                'province_id' => 12,
                'name' => 'KOTA GUNUNGSITOLI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            56 => 
            array (
                'id' => 1301,
                'province_id' => 13,
                'name' => 'KABUPATEN KEPULAUAN MENTAWAI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            57 => 
            array (
                'id' => 1302,
                'province_id' => 13,
                'name' => 'KABUPATEN PESISIR SELATAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            58 => 
            array (
                'id' => 1303,
                'province_id' => 13,
                'name' => 'KABUPATEN SOLOK',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            59 => 
            array (
                'id' => 1304,
                'province_id' => 13,
                'name' => 'KABUPATEN SIJUNJUNG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            60 => 
            array (
                'id' => 1305,
                'province_id' => 13,
                'name' => 'KABUPATEN TANAH DATAR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            61 => 
            array (
                'id' => 1306,
                'province_id' => 13,
                'name' => 'KABUPATEN PADANG PARIAMAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            62 => 
            array (
                'id' => 1307,
                'province_id' => 13,
                'name' => 'KABUPATEN AGAM',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            63 => 
            array (
                'id' => 1308,
                'province_id' => 13,
                'name' => 'KABUPATEN LIMA PULUH KOTA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            64 => 
            array (
                'id' => 1309,
                'province_id' => 13,
                'name' => 'KABUPATEN PASAMAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            65 => 
            array (
                'id' => 1310,
                'province_id' => 13,
                'name' => 'KABUPATEN SOLOK SELATAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            66 => 
            array (
                'id' => 1311,
                'province_id' => 13,
                'name' => 'KABUPATEN DHARMASRAYA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            67 => 
            array (
                'id' => 1312,
                'province_id' => 13,
                'name' => 'KABUPATEN PASAMAN BARAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            68 => 
            array (
                'id' => 1371,
                'province_id' => 13,
                'name' => 'KOTA PADANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            69 => 
            array (
                'id' => 1372,
                'province_id' => 13,
                'name' => 'KOTA SOLOK',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            70 => 
            array (
                'id' => 1373,
                'province_id' => 13,
                'name' => 'KOTA SAWAH LUNTO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            71 => 
            array (
                'id' => 1374,
                'province_id' => 13,
                'name' => 'KOTA PADANG PANJANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            72 => 
            array (
                'id' => 1375,
                'province_id' => 13,
                'name' => 'KOTA BUKITTINGGI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            73 => 
            array (
                'id' => 1376,
                'province_id' => 13,
                'name' => 'KOTA PAYAKUMBUH',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            74 => 
            array (
                'id' => 1377,
                'province_id' => 13,
                'name' => 'KOTA PARIAMAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            75 => 
            array (
                'id' => 1401,
                'province_id' => 14,
                'name' => 'KABUPATEN KUANTAN SINGINGI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            76 => 
            array (
                'id' => 1402,
                'province_id' => 14,
                'name' => 'KABUPATEN INDRAGIRI HULU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            77 => 
            array (
                'id' => 1403,
                'province_id' => 14,
                'name' => 'KABUPATEN INDRAGIRI HILIR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            78 => 
            array (
                'id' => 1404,
                'province_id' => 14,
                'name' => 'KABUPATEN PELALAWAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            79 => 
            array (
                'id' => 1405,
                'province_id' => 14,
                'name' => 'KABUPATEN S I A K',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            80 => 
            array (
                'id' => 1406,
                'province_id' => 14,
                'name' => 'KABUPATEN KAMPAR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            81 => 
            array (
                'id' => 1407,
                'province_id' => 14,
                'name' => 'KABUPATEN ROKAN HULU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            82 => 
            array (
                'id' => 1408,
                'province_id' => 14,
                'name' => 'KABUPATEN BENGKALIS',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            83 => 
            array (
                'id' => 1409,
                'province_id' => 14,
                'name' => 'KABUPATEN ROKAN HILIR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            84 => 
            array (
                'id' => 1410,
                'province_id' => 14,
                'name' => 'KABUPATEN KEPULAUAN MERANTI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            85 => 
            array (
                'id' => 1471,
                'province_id' => 14,
                'name' => 'KOTA PEKANBARU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            86 => 
            array (
                'id' => 1473,
                'province_id' => 14,
                'name' => 'KOTA D U M A I',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            87 => 
            array (
                'id' => 1501,
                'province_id' => 15,
                'name' => 'KABUPATEN KERINCI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            88 => 
            array (
                'id' => 1502,
                'province_id' => 15,
                'name' => 'KABUPATEN MERANGIN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            89 => 
            array (
                'id' => 1503,
                'province_id' => 15,
                'name' => 'KABUPATEN SAROLANGUN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            90 => 
            array (
                'id' => 1504,
                'province_id' => 15,
                'name' => 'KABUPATEN BATANG HARI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            91 => 
            array (
                'id' => 1505,
                'province_id' => 15,
                'name' => 'KABUPATEN MUARO JAMBI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            92 => 
            array (
                'id' => 1506,
                'province_id' => 15,
                'name' => 'KABUPATEN TANJUNG JABUNG TIMUR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            93 => 
            array (
                'id' => 1507,
                'province_id' => 15,
                'name' => 'KABUPATEN TANJUNG JABUNG BARAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            94 => 
            array (
                'id' => 1508,
                'province_id' => 15,
                'name' => 'KABUPATEN TEBO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            95 => 
            array (
                'id' => 1509,
                'province_id' => 15,
                'name' => 'KABUPATEN BUNGO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            96 => 
            array (
                'id' => 1571,
                'province_id' => 15,
                'name' => 'KOTA JAMBI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            97 => 
            array (
                'id' => 1572,
                'province_id' => 15,
                'name' => 'KOTA SUNGAI PENUH',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            98 => 
            array (
                'id' => 1601,
                'province_id' => 16,
                'name' => 'KABUPATEN OGAN KOMERING ULU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            99 => 
            array (
                'id' => 1602,
                'province_id' => 16,
                'name' => 'KABUPATEN OGAN KOMERING ILIR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            100 => 
            array (
                'id' => 1603,
                'province_id' => 16,
                'name' => 'KABUPATEN MUARA ENIM',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            101 => 
            array (
                'id' => 1604,
                'province_id' => 16,
                'name' => 'KABUPATEN LAHAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            102 => 
            array (
                'id' => 1605,
                'province_id' => 16,
                'name' => 'KABUPATEN MUSI RAWAS',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            103 => 
            array (
                'id' => 1606,
                'province_id' => 16,
                'name' => 'KABUPATEN MUSI BANYUASIN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            104 => 
            array (
                'id' => 1607,
                'province_id' => 16,
                'name' => 'KABUPATEN BANYU ASIN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            105 => 
            array (
                'id' => 1608,
                'province_id' => 16,
                'name' => 'KABUPATEN OGAN KOMERING ULU SELATAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            106 => 
            array (
                'id' => 1609,
                'province_id' => 16,
                'name' => 'KABUPATEN OGAN KOMERING ULU TIMUR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            107 => 
            array (
                'id' => 1610,
                'province_id' => 16,
                'name' => 'KABUPATEN OGAN ILIR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            108 => 
            array (
                'id' => 1611,
                'province_id' => 16,
                'name' => 'KABUPATEN EMPAT LAWANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            109 => 
            array (
                'id' => 1612,
                'province_id' => 16,
                'name' => 'KABUPATEN PENUKAL ABAB LEMATANG ILIR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            110 => 
            array (
                'id' => 1613,
                'province_id' => 16,
                'name' => 'KABUPATEN MUSI RAWAS UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            111 => 
            array (
                'id' => 1671,
                'province_id' => 16,
                'name' => 'KOTA PALEMBANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            112 => 
            array (
                'id' => 1672,
                'province_id' => 16,
                'name' => 'KOTA PRABUMULIH',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            113 => 
            array (
                'id' => 1673,
                'province_id' => 16,
                'name' => 'KOTA PAGAR ALAM',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            114 => 
            array (
                'id' => 1674,
                'province_id' => 16,
                'name' => 'KOTA LUBUKLINGGAU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            115 => 
            array (
                'id' => 1701,
                'province_id' => 17,
                'name' => 'KABUPATEN BENGKULU SELATAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            116 => 
            array (
                'id' => 1702,
                'province_id' => 17,
                'name' => 'KABUPATEN REJANG LEBONG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            117 => 
            array (
                'id' => 1703,
                'province_id' => 17,
                'name' => 'KABUPATEN BENGKULU UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            118 => 
            array (
                'id' => 1704,
                'province_id' => 17,
                'name' => 'KABUPATEN KAUR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            119 => 
            array (
                'id' => 1705,
                'province_id' => 17,
                'name' => 'KABUPATEN SELUMA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            120 => 
            array (
                'id' => 1706,
                'province_id' => 17,
                'name' => 'KABUPATEN MUKOMUKO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            121 => 
            array (
                'id' => 1707,
                'province_id' => 17,
                'name' => 'KABUPATEN LEBONG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            122 => 
            array (
                'id' => 1708,
                'province_id' => 17,
                'name' => 'KABUPATEN KEPAHIANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            123 => 
            array (
                'id' => 1709,
                'province_id' => 17,
                'name' => 'KABUPATEN BENGKULU TENGAH',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            124 => 
            array (
                'id' => 1771,
                'province_id' => 17,
                'name' => 'KOTA BENGKULU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            125 => 
            array (
                'id' => 1801,
                'province_id' => 18,
                'name' => 'KABUPATEN LAMPUNG BARAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            126 => 
            array (
                'id' => 1802,
                'province_id' => 18,
                'name' => 'KABUPATEN TANGGAMUS',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            127 => 
            array (
                'id' => 1803,
                'province_id' => 18,
                'name' => 'KABUPATEN LAMPUNG SELATAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            128 => 
            array (
                'id' => 1804,
                'province_id' => 18,
                'name' => 'KABUPATEN LAMPUNG TIMUR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            129 => 
            array (
                'id' => 1805,
                'province_id' => 18,
                'name' => 'KABUPATEN LAMPUNG TENGAH',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            130 => 
            array (
                'id' => 1806,
                'province_id' => 18,
                'name' => 'KABUPATEN LAMPUNG UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            131 => 
            array (
                'id' => 1807,
                'province_id' => 18,
                'name' => 'KABUPATEN WAY KANAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            132 => 
            array (
                'id' => 1808,
                'province_id' => 18,
                'name' => 'KABUPATEN TULANGBAWANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            133 => 
            array (
                'id' => 1809,
                'province_id' => 18,
                'name' => 'KABUPATEN PESAWARAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            134 => 
            array (
                'id' => 1810,
                'province_id' => 18,
                'name' => 'KABUPATEN PRINGSEWU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            135 => 
            array (
                'id' => 1811,
                'province_id' => 18,
                'name' => 'KABUPATEN MESUJI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            136 => 
            array (
                'id' => 1812,
                'province_id' => 18,
                'name' => 'KABUPATEN TULANG BAWANG BARAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            137 => 
            array (
                'id' => 1813,
                'province_id' => 18,
                'name' => 'KABUPATEN PESISIR BARAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            138 => 
            array (
                'id' => 1871,
                'province_id' => 18,
                'name' => 'KOTA BANDAR LAMPUNG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            139 => 
            array (
                'id' => 1872,
                'province_id' => 18,
                'name' => 'KOTA METRO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            140 => 
            array (
                'id' => 1901,
                'province_id' => 19,
                'name' => 'KABUPATEN BANGKA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            141 => 
            array (
                'id' => 1902,
                'province_id' => 19,
                'name' => 'KABUPATEN BELITUNG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            142 => 
            array (
                'id' => 1903,
                'province_id' => 19,
                'name' => 'KABUPATEN BANGKA BARAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            143 => 
            array (
                'id' => 1904,
                'province_id' => 19,
                'name' => 'KABUPATEN BANGKA TENGAH',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            144 => 
            array (
                'id' => 1905,
                'province_id' => 19,
                'name' => 'KABUPATEN BANGKA SELATAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            145 => 
            array (
                'id' => 1906,
                'province_id' => 19,
                'name' => 'KABUPATEN BELITUNG TIMUR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            146 => 
            array (
                'id' => 1971,
                'province_id' => 19,
                'name' => 'KOTA PANGKAL PINANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            147 => 
            array (
                'id' => 2101,
                'province_id' => 21,
                'name' => 'KABUPATEN KARIMUN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            148 => 
            array (
                'id' => 2102,
                'province_id' => 21,
                'name' => 'KABUPATEN BINTAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            149 => 
            array (
                'id' => 2103,
                'province_id' => 21,
                'name' => 'KABUPATEN NATUNA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            150 => 
            array (
                'id' => 2104,
                'province_id' => 21,
                'name' => 'KABUPATEN LINGGA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            151 => 
            array (
                'id' => 2105,
                'province_id' => 21,
                'name' => 'KABUPATEN KEPULAUAN ANAMBAS',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            152 => 
            array (
                'id' => 2171,
                'province_id' => 21,
                'name' => 'KOTA B A T A M',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            153 => 
            array (
                'id' => 2172,
                'province_id' => 21,
                'name' => 'KOTA TANJUNG PINANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            154 => 
            array (
                'id' => 3101,
                'province_id' => 31,
                'name' => 'KABUPATEN KEPULAUAN SERIBU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            155 => 
            array (
                'id' => 3171,
                'province_id' => 31,
                'name' => 'KOTA JAKARTA SELATAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            156 => 
            array (
                'id' => 3172,
                'province_id' => 31,
                'name' => 'KOTA JAKARTA TIMUR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            157 => 
            array (
                'id' => 3173,
                'province_id' => 31,
                'name' => 'KOTA JAKARTA PUSAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            158 => 
            array (
                'id' => 3174,
                'province_id' => 31,
                'name' => 'KOTA JAKARTA BARAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            159 => 
            array (
                'id' => 3175,
                'province_id' => 31,
                'name' => 'KOTA JAKARTA UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            160 => 
            array (
                'id' => 3201,
                'province_id' => 32,
                'name' => 'KABUPATEN BOGOR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            161 => 
            array (
                'id' => 3202,
                'province_id' => 32,
                'name' => 'KABUPATEN SUKABUMI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            162 => 
            array (
                'id' => 3203,
                'province_id' => 32,
                'name' => 'KABUPATEN CIANJUR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            163 => 
            array (
                'id' => 3204,
                'province_id' => 32,
                'name' => 'KABUPATEN BANDUNG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            164 => 
            array (
                'id' => 3205,
                'province_id' => 32,
                'name' => 'KABUPATEN GARUT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            165 => 
            array (
                'id' => 3206,
                'province_id' => 32,
                'name' => 'KABUPATEN TASIKMALAYA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            166 => 
            array (
                'id' => 3207,
                'province_id' => 32,
                'name' => 'KABUPATEN CIAMIS',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            167 => 
            array (
                'id' => 3208,
                'province_id' => 32,
                'name' => 'KABUPATEN KUNINGAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            168 => 
            array (
                'id' => 3209,
                'province_id' => 32,
                'name' => 'KABUPATEN CIREBON',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            169 => 
            array (
                'id' => 3210,
                'province_id' => 32,
                'name' => 'KABUPATEN MAJALENGKA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            170 => 
            array (
                'id' => 3211,
                'province_id' => 32,
                'name' => 'KABUPATEN SUMEDANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            171 => 
            array (
                'id' => 3212,
                'province_id' => 32,
                'name' => 'KABUPATEN INDRAMAYU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            172 => 
            array (
                'id' => 3213,
                'province_id' => 32,
                'name' => 'KABUPATEN SUBANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            173 => 
            array (
                'id' => 3214,
                'province_id' => 32,
                'name' => 'KABUPATEN PURWAKARTA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            174 => 
            array (
                'id' => 3215,
                'province_id' => 32,
                'name' => 'KABUPATEN KARAWANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            175 => 
            array (
                'id' => 3216,
                'province_id' => 32,
                'name' => 'KABUPATEN BEKASI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            176 => 
            array (
                'id' => 3217,
                'province_id' => 32,
                'name' => 'KABUPATEN BANDUNG BARAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            177 => 
            array (
                'id' => 3218,
                'province_id' => 32,
                'name' => 'KABUPATEN PANGANDARAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            178 => 
            array (
                'id' => 3271,
                'province_id' => 32,
                'name' => 'KOTA BOGOR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            179 => 
            array (
                'id' => 3272,
                'province_id' => 32,
                'name' => 'KOTA SUKABUMI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            180 => 
            array (
                'id' => 3273,
                'province_id' => 32,
                'name' => 'KOTA BANDUNG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            181 => 
            array (
                'id' => 3274,
                'province_id' => 32,
                'name' => 'KOTA CIREBON',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            182 => 
            array (
                'id' => 3275,
                'province_id' => 32,
                'name' => 'KOTA BEKASI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            183 => 
            array (
                'id' => 3276,
                'province_id' => 32,
                'name' => 'KOTA DEPOK',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            184 => 
            array (
                'id' => 3277,
                'province_id' => 32,
                'name' => 'KOTA CIMAHI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            185 => 
            array (
                'id' => 3278,
                'province_id' => 32,
                'name' => 'KOTA TASIKMALAYA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            186 => 
            array (
                'id' => 3279,
                'province_id' => 32,
                'name' => 'KOTA BANJAR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            187 => 
            array (
                'id' => 3301,
                'province_id' => 33,
                'name' => 'KABUPATEN CILACAP',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            188 => 
            array (
                'id' => 3302,
                'province_id' => 33,
                'name' => 'KABUPATEN BANYUMAS',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            189 => 
            array (
                'id' => 3303,
                'province_id' => 33,
                'name' => 'KABUPATEN PURBALINGGA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            190 => 
            array (
                'id' => 3304,
                'province_id' => 33,
                'name' => 'KABUPATEN BANJARNEGARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            191 => 
            array (
                'id' => 3305,
                'province_id' => 33,
                'name' => 'KABUPATEN KEBUMEN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            192 => 
            array (
                'id' => 3306,
                'province_id' => 33,
                'name' => 'KABUPATEN PURWOREJO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            193 => 
            array (
                'id' => 3307,
                'province_id' => 33,
                'name' => 'KABUPATEN WONOSOBO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            194 => 
            array (
                'id' => 3308,
                'province_id' => 33,
                'name' => 'KABUPATEN MAGELANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            195 => 
            array (
                'id' => 3309,
                'province_id' => 33,
                'name' => 'KABUPATEN BOYOLALI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            196 => 
            array (
                'id' => 3310,
                'province_id' => 33,
                'name' => 'KABUPATEN KLATEN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            197 => 
            array (
                'id' => 3311,
                'province_id' => 33,
                'name' => 'KABUPATEN SUKOHARJO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            198 => 
            array (
                'id' => 3312,
                'province_id' => 33,
                'name' => 'KABUPATEN WONOGIRI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            199 => 
            array (
                'id' => 3313,
                'province_id' => 33,
                'name' => 'KABUPATEN KARANGANYAR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            200 => 
            array (
                'id' => 3314,
                'province_id' => 33,
                'name' => 'KABUPATEN SRAGEN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            201 => 
            array (
                'id' => 3315,
                'province_id' => 33,
                'name' => 'KABUPATEN GROBOGAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            202 => 
            array (
                'id' => 3316,
                'province_id' => 33,
                'name' => 'KABUPATEN BLORA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            203 => 
            array (
                'id' => 3317,
                'province_id' => 33,
                'name' => 'KABUPATEN REMBANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            204 => 
            array (
                'id' => 3318,
                'province_id' => 33,
                'name' => 'KABUPATEN PATI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            205 => 
            array (
                'id' => 3319,
                'province_id' => 33,
                'name' => 'KABUPATEN KUDUS',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            206 => 
            array (
                'id' => 3320,
                'province_id' => 33,
                'name' => 'KABUPATEN JEPARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            207 => 
            array (
                'id' => 3321,
                'province_id' => 33,
                'name' => 'KABUPATEN DEMAK',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            208 => 
            array (
                'id' => 3322,
                'province_id' => 33,
                'name' => 'KABUPATEN SEMARANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            209 => 
            array (
                'id' => 3323,
                'province_id' => 33,
                'name' => 'KABUPATEN TEMANGGUNG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            210 => 
            array (
                'id' => 3324,
                'province_id' => 33,
                'name' => 'KABUPATEN KENDAL',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            211 => 
            array (
                'id' => 3325,
                'province_id' => 33,
                'name' => 'KABUPATEN BATANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            212 => 
            array (
                'id' => 3326,
                'province_id' => 33,
                'name' => 'KABUPATEN PEKALONGAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            213 => 
            array (
                'id' => 3327,
                'province_id' => 33,
                'name' => 'KABUPATEN PEMALANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            214 => 
            array (
                'id' => 3328,
                'province_id' => 33,
                'name' => 'KABUPATEN TEGAL',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            215 => 
            array (
                'id' => 3329,
                'province_id' => 33,
                'name' => 'KABUPATEN BREBES',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            216 => 
            array (
                'id' => 3371,
                'province_id' => 33,
                'name' => 'KOTA MAGELANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            217 => 
            array (
                'id' => 3372,
                'province_id' => 33,
                'name' => 'KOTA SURAKARTA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            218 => 
            array (
                'id' => 3373,
                'province_id' => 33,
                'name' => 'KOTA SALATIGA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            219 => 
            array (
                'id' => 3374,
                'province_id' => 33,
                'name' => 'KOTA SEMARANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            220 => 
            array (
                'id' => 3375,
                'province_id' => 33,
                'name' => 'KOTA PEKALONGAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            221 => 
            array (
                'id' => 3376,
                'province_id' => 33,
                'name' => 'KOTA TEGAL',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            222 => 
            array (
                'id' => 3401,
                'province_id' => 34,
                'name' => 'KABUPATEN KULON PROGO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            223 => 
            array (
                'id' => 3402,
                'province_id' => 34,
                'name' => 'KABUPATEN BANTUL',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            224 => 
            array (
                'id' => 3403,
                'province_id' => 34,
                'name' => 'KABUPATEN GUNUNG KIDUL',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            225 => 
            array (
                'id' => 3404,
                'province_id' => 34,
                'name' => 'KABUPATEN SLEMAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            226 => 
            array (
                'id' => 3471,
                'province_id' => 34,
                'name' => 'KOTA YOGYAKARTA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            227 => 
            array (
                'id' => 3501,
                'province_id' => 35,
                'name' => 'KABUPATEN PACITAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            228 => 
            array (
                'id' => 3502,
                'province_id' => 35,
                'name' => 'KABUPATEN PONOROGO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            229 => 
            array (
                'id' => 3503,
                'province_id' => 35,
                'name' => 'KABUPATEN TRENGGALEK',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            230 => 
            array (
                'id' => 3504,
                'province_id' => 35,
                'name' => 'KABUPATEN TULUNGAGUNG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            231 => 
            array (
                'id' => 3505,
                'province_id' => 35,
                'name' => 'KABUPATEN BLITAR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            232 => 
            array (
                'id' => 3506,
                'province_id' => 35,
                'name' => 'KABUPATEN KEDIRI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            233 => 
            array (
                'id' => 3507,
                'province_id' => 35,
                'name' => 'KABUPATEN MALANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            234 => 
            array (
                'id' => 3508,
                'province_id' => 35,
                'name' => 'KABUPATEN LUMAJANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            235 => 
            array (
                'id' => 3509,
                'province_id' => 35,
                'name' => 'KABUPATEN JEMBER',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            236 => 
            array (
                'id' => 3510,
                'province_id' => 35,
                'name' => 'KABUPATEN BANYUWANGI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            237 => 
            array (
                'id' => 3511,
                'province_id' => 35,
                'name' => 'KABUPATEN BONDOWOSO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            238 => 
            array (
                'id' => 3512,
                'province_id' => 35,
                'name' => 'KABUPATEN SITUBONDO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            239 => 
            array (
                'id' => 3513,
                'province_id' => 35,
                'name' => 'KABUPATEN PROBOLINGGO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            240 => 
            array (
                'id' => 3514,
                'province_id' => 35,
                'name' => 'KABUPATEN PASURUAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            241 => 
            array (
                'id' => 3515,
                'province_id' => 35,
                'name' => 'KABUPATEN SIDOARJO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            242 => 
            array (
                'id' => 3516,
                'province_id' => 35,
                'name' => 'KABUPATEN MOJOKERTO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            243 => 
            array (
                'id' => 3517,
                'province_id' => 35,
                'name' => 'KABUPATEN JOMBANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            244 => 
            array (
                'id' => 3518,
                'province_id' => 35,
                'name' => 'KABUPATEN NGANJUK',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            245 => 
            array (
                'id' => 3519,
                'province_id' => 35,
                'name' => 'KABUPATEN MADIUN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            246 => 
            array (
                'id' => 3520,
                'province_id' => 35,
                'name' => 'KABUPATEN MAGETAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            247 => 
            array (
                'id' => 3521,
                'province_id' => 35,
                'name' => 'KABUPATEN NGAWI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            248 => 
            array (
                'id' => 3522,
                'province_id' => 35,
                'name' => 'KABUPATEN BOJONEGORO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            249 => 
            array (
                'id' => 3523,
                'province_id' => 35,
                'name' => 'KABUPATEN TUBAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            250 => 
            array (
                'id' => 3524,
                'province_id' => 35,
                'name' => 'KABUPATEN LAMONGAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            251 => 
            array (
                'id' => 3525,
                'province_id' => 35,
                'name' => 'KABUPATEN GRESIK',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            252 => 
            array (
                'id' => 3526,
                'province_id' => 35,
                'name' => 'KABUPATEN BANGKALAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            253 => 
            array (
                'id' => 3527,
                'province_id' => 35,
                'name' => 'KABUPATEN SAMPANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            254 => 
            array (
                'id' => 3528,
                'province_id' => 35,
                'name' => 'KABUPATEN PAMEKASAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            255 => 
            array (
                'id' => 3529,
                'province_id' => 35,
                'name' => 'KABUPATEN SUMENEP',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            256 => 
            array (
                'id' => 3571,
                'province_id' => 35,
                'name' => 'KOTA KEDIRI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            257 => 
            array (
                'id' => 3572,
                'province_id' => 35,
                'name' => 'KOTA BLITAR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            258 => 
            array (
                'id' => 3573,
                'province_id' => 35,
                'name' => 'KOTA MALANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            259 => 
            array (
                'id' => 3574,
                'province_id' => 35,
                'name' => 'KOTA PROBOLINGGO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            260 => 
            array (
                'id' => 3575,
                'province_id' => 35,
                'name' => 'KOTA PASURUAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            261 => 
            array (
                'id' => 3576,
                'province_id' => 35,
                'name' => 'KOTA MOJOKERTO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            262 => 
            array (
                'id' => 3577,
                'province_id' => 35,
                'name' => 'KOTA MADIUN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            263 => 
            array (
                'id' => 3578,
                'province_id' => 35,
                'name' => 'KOTA SURABAYA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            264 => 
            array (
                'id' => 3579,
                'province_id' => 35,
                'name' => 'KOTA BATU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            265 => 
            array (
                'id' => 3601,
                'province_id' => 36,
                'name' => 'KABUPATEN PANDEGLANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            266 => 
            array (
                'id' => 3602,
                'province_id' => 36,
                'name' => 'KABUPATEN LEBAK',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            267 => 
            array (
                'id' => 3603,
                'province_id' => 36,
                'name' => 'KABUPATEN TANGERANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            268 => 
            array (
                'id' => 3604,
                'province_id' => 36,
                'name' => 'KABUPATEN SERANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            269 => 
            array (
                'id' => 3671,
                'province_id' => 36,
                'name' => 'KOTA TANGERANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            270 => 
            array (
                'id' => 3672,
                'province_id' => 36,
                'name' => 'KOTA CILEGON',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            271 => 
            array (
                'id' => 3673,
                'province_id' => 36,
                'name' => 'KOTA SERANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            272 => 
            array (
                'id' => 3674,
                'province_id' => 36,
                'name' => 'KOTA TANGERANG SELATAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            273 => 
            array (
                'id' => 5101,
                'province_id' => 51,
                'name' => 'KABUPATEN JEMBRANA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            274 => 
            array (
                'id' => 5102,
                'province_id' => 51,
                'name' => 'KABUPATEN TABANAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            275 => 
            array (
                'id' => 5103,
                'province_id' => 51,
                'name' => 'KABUPATEN BADUNG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            276 => 
            array (
                'id' => 5104,
                'province_id' => 51,
                'name' => 'KABUPATEN GIANYAR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            277 => 
            array (
                'id' => 5105,
                'province_id' => 51,
                'name' => 'KABUPATEN KLUNGKUNG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            278 => 
            array (
                'id' => 5106,
                'province_id' => 51,
                'name' => 'KABUPATEN BANGLI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            279 => 
            array (
                'id' => 5107,
                'province_id' => 51,
                'name' => 'KABUPATEN KARANG ASEM',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            280 => 
            array (
                'id' => 5108,
                'province_id' => 51,
                'name' => 'KABUPATEN BULELENG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            281 => 
            array (
                'id' => 5171,
                'province_id' => 51,
                'name' => 'KOTA DENPASAR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            282 => 
            array (
                'id' => 5201,
                'province_id' => 52,
                'name' => 'KABUPATEN LOMBOK BARAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            283 => 
            array (
                'id' => 5202,
                'province_id' => 52,
                'name' => 'KABUPATEN LOMBOK TENGAH',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            284 => 
            array (
                'id' => 5203,
                'province_id' => 52,
                'name' => 'KABUPATEN LOMBOK TIMUR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            285 => 
            array (
                'id' => 5204,
                'province_id' => 52,
                'name' => 'KABUPATEN SUMBAWA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            286 => 
            array (
                'id' => 5205,
                'province_id' => 52,
                'name' => 'KABUPATEN DOMPU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            287 => 
            array (
                'id' => 5206,
                'province_id' => 52,
                'name' => 'KABUPATEN BIMA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            288 => 
            array (
                'id' => 5207,
                'province_id' => 52,
                'name' => 'KABUPATEN SUMBAWA BARAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            289 => 
            array (
                'id' => 5208,
                'province_id' => 52,
                'name' => 'KABUPATEN LOMBOK UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            290 => 
            array (
                'id' => 5271,
                'province_id' => 52,
                'name' => 'KOTA MATARAM',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            291 => 
            array (
                'id' => 5272,
                'province_id' => 52,
                'name' => 'KOTA BIMA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            292 => 
            array (
                'id' => 5301,
                'province_id' => 53,
                'name' => 'KABUPATEN SUMBA BARAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            293 => 
            array (
                'id' => 5302,
                'province_id' => 53,
                'name' => 'KABUPATEN SUMBA TIMUR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            294 => 
            array (
                'id' => 5303,
                'province_id' => 53,
                'name' => 'KABUPATEN KUPANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            295 => 
            array (
                'id' => 5304,
                'province_id' => 53,
                'name' => 'KABUPATEN TIMOR TENGAH SELATAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            296 => 
            array (
                'id' => 5305,
                'province_id' => 53,
                'name' => 'KABUPATEN TIMOR TENGAH UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            297 => 
            array (
                'id' => 5306,
                'province_id' => 53,
                'name' => 'KABUPATEN BELU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            298 => 
            array (
                'id' => 5307,
                'province_id' => 53,
                'name' => 'KABUPATEN ALOR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            299 => 
            array (
                'id' => 5308,
                'province_id' => 53,
                'name' => 'KABUPATEN LEMBATA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            300 => 
            array (
                'id' => 5309,
                'province_id' => 53,
                'name' => 'KABUPATEN FLORES TIMUR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            301 => 
            array (
                'id' => 5310,
                'province_id' => 53,
                'name' => 'KABUPATEN SIKKA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            302 => 
            array (
                'id' => 5311,
                'province_id' => 53,
                'name' => 'KABUPATEN ENDE',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            303 => 
            array (
                'id' => 5312,
                'province_id' => 53,
                'name' => 'KABUPATEN NGADA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            304 => 
            array (
                'id' => 5313,
                'province_id' => 53,
                'name' => 'KABUPATEN MANGGARAI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            305 => 
            array (
                'id' => 5314,
                'province_id' => 53,
                'name' => 'KABUPATEN ROTE NDAO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            306 => 
            array (
                'id' => 5315,
                'province_id' => 53,
                'name' => 'KABUPATEN MANGGARAI BARAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            307 => 
            array (
                'id' => 5316,
                'province_id' => 53,
                'name' => 'KABUPATEN SUMBA TENGAH',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            308 => 
            array (
                'id' => 5317,
                'province_id' => 53,
                'name' => 'KABUPATEN SUMBA BARAT DAYA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            309 => 
            array (
                'id' => 5318,
                'province_id' => 53,
                'name' => 'KABUPATEN NAGEKEO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            310 => 
            array (
                'id' => 5319,
                'province_id' => 53,
                'name' => 'KABUPATEN MANGGARAI TIMUR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            311 => 
            array (
                'id' => 5320,
                'province_id' => 53,
                'name' => 'KABUPATEN SABU RAIJUA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            312 => 
            array (
                'id' => 5321,
                'province_id' => 53,
                'name' => 'KABUPATEN MALAKA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            313 => 
            array (
                'id' => 5371,
                'province_id' => 53,
                'name' => 'KOTA KUPANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            314 => 
            array (
                'id' => 6101,
                'province_id' => 61,
                'name' => 'KABUPATEN SAMBAS',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            315 => 
            array (
                'id' => 6102,
                'province_id' => 61,
                'name' => 'KABUPATEN BENGKAYANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            316 => 
            array (
                'id' => 6103,
                'province_id' => 61,
                'name' => 'KABUPATEN LANDAK',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            317 => 
            array (
                'id' => 6104,
                'province_id' => 61,
                'name' => 'KABUPATEN MEMPAWAH',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            318 => 
            array (
                'id' => 6105,
                'province_id' => 61,
                'name' => 'KABUPATEN SANGGAU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            319 => 
            array (
                'id' => 6106,
                'province_id' => 61,
                'name' => 'KABUPATEN KETAPANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            320 => 
            array (
                'id' => 6107,
                'province_id' => 61,
                'name' => 'KABUPATEN SINTANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            321 => 
            array (
                'id' => 6108,
                'province_id' => 61,
                'name' => 'KABUPATEN KAPUAS HULU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            322 => 
            array (
                'id' => 6109,
                'province_id' => 61,
                'name' => 'KABUPATEN SEKADAU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            323 => 
            array (
                'id' => 6110,
                'province_id' => 61,
                'name' => 'KABUPATEN MELAWI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            324 => 
            array (
                'id' => 6111,
                'province_id' => 61,
                'name' => 'KABUPATEN KAYONG UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            325 => 
            array (
                'id' => 6112,
                'province_id' => 61,
                'name' => 'KABUPATEN KUBU RAYA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            326 => 
            array (
                'id' => 6171,
                'province_id' => 61,
                'name' => 'KOTA PONTIANAK',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            327 => 
            array (
                'id' => 6172,
                'province_id' => 61,
                'name' => 'KOTA SINGKAWANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            328 => 
            array (
                'id' => 6201,
                'province_id' => 62,
                'name' => 'KABUPATEN KOTAWARINGIN BARAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            329 => 
            array (
                'id' => 6202,
                'province_id' => 62,
                'name' => 'KABUPATEN KOTAWARINGIN TIMUR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            330 => 
            array (
                'id' => 6203,
                'province_id' => 62,
                'name' => 'KABUPATEN KAPUAS',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            331 => 
            array (
                'id' => 6204,
                'province_id' => 62,
                'name' => 'KABUPATEN BARITO SELATAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            332 => 
            array (
                'id' => 6205,
                'province_id' => 62,
                'name' => 'KABUPATEN BARITO UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            333 => 
            array (
                'id' => 6206,
                'province_id' => 62,
                'name' => 'KABUPATEN SUKAMARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            334 => 
            array (
                'id' => 6207,
                'province_id' => 62,
                'name' => 'KABUPATEN LAMANDAU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            335 => 
            array (
                'id' => 6208,
                'province_id' => 62,
                'name' => 'KABUPATEN SERUYAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            336 => 
            array (
                'id' => 6209,
                'province_id' => 62,
                'name' => 'KABUPATEN KATINGAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            337 => 
            array (
                'id' => 6210,
                'province_id' => 62,
                'name' => 'KABUPATEN PULANG PISAU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            338 => 
            array (
                'id' => 6211,
                'province_id' => 62,
                'name' => 'KABUPATEN GUNUNG MAS',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            339 => 
            array (
                'id' => 6212,
                'province_id' => 62,
                'name' => 'KABUPATEN BARITO TIMUR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            340 => 
            array (
                'id' => 6213,
                'province_id' => 62,
                'name' => 'KABUPATEN MURUNG RAYA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            341 => 
            array (
                'id' => 6271,
                'province_id' => 62,
                'name' => 'KOTA PALANGKA RAYA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            342 => 
            array (
                'id' => 6301,
                'province_id' => 63,
                'name' => 'KABUPATEN TANAH LAUT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            343 => 
            array (
                'id' => 6302,
                'province_id' => 63,
                'name' => 'KABUPATEN KOTA BARU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            344 => 
            array (
                'id' => 6303,
                'province_id' => 63,
                'name' => 'KABUPATEN BANJAR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            345 => 
            array (
                'id' => 6304,
                'province_id' => 63,
                'name' => 'KABUPATEN BARITO KUALA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            346 => 
            array (
                'id' => 6305,
                'province_id' => 63,
                'name' => 'KABUPATEN TAPIN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            347 => 
            array (
                'id' => 6306,
                'province_id' => 63,
                'name' => 'KABUPATEN HULU SUNGAI SELATAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            348 => 
            array (
                'id' => 6307,
                'province_id' => 63,
                'name' => 'KABUPATEN HULU SUNGAI TENGAH',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            349 => 
            array (
                'id' => 6308,
                'province_id' => 63,
                'name' => 'KABUPATEN HULU SUNGAI UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            350 => 
            array (
                'id' => 6309,
                'province_id' => 63,
                'name' => 'KABUPATEN TABALONG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            351 => 
            array (
                'id' => 6310,
                'province_id' => 63,
                'name' => 'KABUPATEN TANAH BUMBU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            352 => 
            array (
                'id' => 6311,
                'province_id' => 63,
                'name' => 'KABUPATEN BALANGAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            353 => 
            array (
                'id' => 6371,
                'province_id' => 63,
                'name' => 'KOTA BANJARMASIN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            354 => 
            array (
                'id' => 6372,
                'province_id' => 63,
                'name' => 'KOTA BANJAR BARU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            355 => 
            array (
                'id' => 6401,
                'province_id' => 64,
                'name' => 'KABUPATEN PASER',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            356 => 
            array (
                'id' => 6402,
                'province_id' => 64,
                'name' => 'KABUPATEN KUTAI BARAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            357 => 
            array (
                'id' => 6403,
                'province_id' => 64,
                'name' => 'KABUPATEN KUTAI KARTANEGARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            358 => 
            array (
                'id' => 6404,
                'province_id' => 64,
                'name' => 'KABUPATEN KUTAI TIMUR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            359 => 
            array (
                'id' => 6405,
                'province_id' => 64,
                'name' => 'KABUPATEN BERAU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            360 => 
            array (
                'id' => 6409,
                'province_id' => 64,
                'name' => 'KABUPATEN PENAJAM PASER UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            361 => 
            array (
                'id' => 6411,
                'province_id' => 64,
                'name' => 'KABUPATEN MAHAKAM HULU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            362 => 
            array (
                'id' => 6471,
                'province_id' => 64,
                'name' => 'KOTA BALIKPAPAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            363 => 
            array (
                'id' => 6472,
                'province_id' => 64,
                'name' => 'KOTA SAMARINDA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            364 => 
            array (
                'id' => 6474,
                'province_id' => 64,
                'name' => 'KOTA BONTANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            365 => 
            array (
                'id' => 6501,
                'province_id' => 65,
                'name' => 'KABUPATEN MALINAU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            366 => 
            array (
                'id' => 6502,
                'province_id' => 65,
                'name' => 'KABUPATEN BULUNGAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            367 => 
            array (
                'id' => 6503,
                'province_id' => 65,
                'name' => 'KABUPATEN TANA TIDUNG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            368 => 
            array (
                'id' => 6504,
                'province_id' => 65,
                'name' => 'KABUPATEN NUNUKAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            369 => 
            array (
                'id' => 6571,
                'province_id' => 65,
                'name' => 'KOTA TARAKAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            370 => 
            array (
                'id' => 7101,
                'province_id' => 71,
                'name' => 'KABUPATEN BOLAANG MONGONDOW',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            371 => 
            array (
                'id' => 7102,
                'province_id' => 71,
                'name' => 'KABUPATEN MINAHASA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            372 => 
            array (
                'id' => 7103,
                'province_id' => 71,
                'name' => 'KABUPATEN KEPULAUAN SANGIHE',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            373 => 
            array (
                'id' => 7104,
                'province_id' => 71,
                'name' => 'KABUPATEN KEPULAUAN TALAUD',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            374 => 
            array (
                'id' => 7105,
                'province_id' => 71,
                'name' => 'KABUPATEN MINAHASA SELATAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            375 => 
            array (
                'id' => 7106,
                'province_id' => 71,
                'name' => 'KABUPATEN MINAHASA UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            376 => 
            array (
                'id' => 7107,
                'province_id' => 71,
                'name' => 'KABUPATEN BOLAANG MONGONDOW UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            377 => 
            array (
                'id' => 7108,
                'province_id' => 71,
                'name' => 'KABUPATEN SIAU TAGULANDANG BIARO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            378 => 
            array (
                'id' => 7109,
                'province_id' => 71,
                'name' => 'KABUPATEN MINAHASA TENGGARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            379 => 
            array (
                'id' => 7110,
                'province_id' => 71,
                'name' => 'KABUPATEN BOLAANG MONGONDOW SELATAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            380 => 
            array (
                'id' => 7111,
                'province_id' => 71,
                'name' => 'KABUPATEN BOLAANG MONGONDOW TIMUR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            381 => 
            array (
                'id' => 7171,
                'province_id' => 71,
                'name' => 'KOTA MANADO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            382 => 
            array (
                'id' => 7172,
                'province_id' => 71,
                'name' => 'KOTA BITUNG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            383 => 
            array (
                'id' => 7173,
                'province_id' => 71,
                'name' => 'KOTA TOMOHON',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            384 => 
            array (
                'id' => 7174,
                'province_id' => 71,
                'name' => 'KOTA KOTAMOBAGU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            385 => 
            array (
                'id' => 7201,
                'province_id' => 72,
                'name' => 'KABUPATEN BANGGAI KEPULAUAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            386 => 
            array (
                'id' => 7202,
                'province_id' => 72,
                'name' => 'KABUPATEN BANGGAI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            387 => 
            array (
                'id' => 7203,
                'province_id' => 72,
                'name' => 'KABUPATEN MOROWALI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            388 => 
            array (
                'id' => 7204,
                'province_id' => 72,
                'name' => 'KABUPATEN POSO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            389 => 
            array (
                'id' => 7205,
                'province_id' => 72,
                'name' => 'KABUPATEN DONGGALA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            390 => 
            array (
                'id' => 7206,
                'province_id' => 72,
                'name' => 'KABUPATEN TOLI-TOLI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            391 => 
            array (
                'id' => 7207,
                'province_id' => 72,
                'name' => 'KABUPATEN BUOL',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            392 => 
            array (
                'id' => 7208,
                'province_id' => 72,
                'name' => 'KABUPATEN PARIGI MOUTONG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            393 => 
            array (
                'id' => 7209,
                'province_id' => 72,
                'name' => 'KABUPATEN TOJO UNA-UNA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            394 => 
            array (
                'id' => 7210,
                'province_id' => 72,
                'name' => 'KABUPATEN SIGI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            395 => 
            array (
                'id' => 7211,
                'province_id' => 72,
                'name' => 'KABUPATEN BANGGAI LAUT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            396 => 
            array (
                'id' => 7212,
                'province_id' => 72,
                'name' => 'KABUPATEN MOROWALI UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            397 => 
            array (
                'id' => 7271,
                'province_id' => 72,
                'name' => 'KOTA PALU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            398 => 
            array (
                'id' => 7301,
                'province_id' => 73,
                'name' => 'KABUPATEN KEPULAUAN SELAYAR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            399 => 
            array (
                'id' => 7302,
                'province_id' => 73,
                'name' => 'KABUPATEN BULUKUMBA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            400 => 
            array (
                'id' => 7303,
                'province_id' => 73,
                'name' => 'KABUPATEN BANTAENG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            401 => 
            array (
                'id' => 7304,
                'province_id' => 73,
                'name' => 'KABUPATEN JENEPONTO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            402 => 
            array (
                'id' => 7305,
                'province_id' => 73,
                'name' => 'KABUPATEN TAKALAR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            403 => 
            array (
                'id' => 7306,
                'province_id' => 73,
                'name' => 'KABUPATEN GOWA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            404 => 
            array (
                'id' => 7307,
                'province_id' => 73,
                'name' => 'KABUPATEN SINJAI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            405 => 
            array (
                'id' => 7308,
                'province_id' => 73,
                'name' => 'KABUPATEN MAROS',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            406 => 
            array (
                'id' => 7309,
                'province_id' => 73,
                'name' => 'KABUPATEN PANGKAJENE DAN KEPULAUAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            407 => 
            array (
                'id' => 7310,
                'province_id' => 73,
                'name' => 'KABUPATEN BARRU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            408 => 
            array (
                'id' => 7311,
                'province_id' => 73,
                'name' => 'KABUPATEN BONE',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            409 => 
            array (
                'id' => 7312,
                'province_id' => 73,
                'name' => 'KABUPATEN SOPPENG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            410 => 
            array (
                'id' => 7313,
                'province_id' => 73,
                'name' => 'KABUPATEN WAJO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            411 => 
            array (
                'id' => 7314,
                'province_id' => 73,
                'name' => 'KABUPATEN SIDENRENG RAPPANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            412 => 
            array (
                'id' => 7315,
                'province_id' => 73,
                'name' => 'KABUPATEN PINRANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            413 => 
            array (
                'id' => 7316,
                'province_id' => 73,
                'name' => 'KABUPATEN ENREKANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            414 => 
            array (
                'id' => 7317,
                'province_id' => 73,
                'name' => 'KABUPATEN LUWU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            415 => 
            array (
                'id' => 7318,
                'province_id' => 73,
                'name' => 'KABUPATEN TANA TORAJA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            416 => 
            array (
                'id' => 7322,
                'province_id' => 73,
                'name' => 'KABUPATEN LUWU UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            417 => 
            array (
                'id' => 7325,
                'province_id' => 73,
                'name' => 'KABUPATEN LUWU TIMUR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            418 => 
            array (
                'id' => 7326,
                'province_id' => 73,
                'name' => 'KABUPATEN TORAJA UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            419 => 
            array (
                'id' => 7371,
                'province_id' => 73,
                'name' => 'KOTA MAKASSAR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            420 => 
            array (
                'id' => 7372,
                'province_id' => 73,
                'name' => 'KOTA PAREPARE',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            421 => 
            array (
                'id' => 7373,
                'province_id' => 73,
                'name' => 'KOTA PALOPO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            422 => 
            array (
                'id' => 7401,
                'province_id' => 74,
                'name' => 'KABUPATEN BUTON',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            423 => 
            array (
                'id' => 7402,
                'province_id' => 74,
                'name' => 'KABUPATEN MUNA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            424 => 
            array (
                'id' => 7403,
                'province_id' => 74,
                'name' => 'KABUPATEN KONAWE',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            425 => 
            array (
                'id' => 7404,
                'province_id' => 74,
                'name' => 'KABUPATEN KOLAKA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            426 => 
            array (
                'id' => 7405,
                'province_id' => 74,
                'name' => 'KABUPATEN KONAWE SELATAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            427 => 
            array (
                'id' => 7406,
                'province_id' => 74,
                'name' => 'KABUPATEN BOMBANA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            428 => 
            array (
                'id' => 7407,
                'province_id' => 74,
                'name' => 'KABUPATEN WAKATOBI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            429 => 
            array (
                'id' => 7408,
                'province_id' => 74,
                'name' => 'KABUPATEN KOLAKA UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            430 => 
            array (
                'id' => 7409,
                'province_id' => 74,
                'name' => 'KABUPATEN BUTON UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            431 => 
            array (
                'id' => 7410,
                'province_id' => 74,
                'name' => 'KABUPATEN KONAWE UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            432 => 
            array (
                'id' => 7411,
                'province_id' => 74,
                'name' => 'KABUPATEN KOLAKA TIMUR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            433 => 
            array (
                'id' => 7412,
                'province_id' => 74,
                'name' => 'KABUPATEN KONAWE KEPULAUAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            434 => 
            array (
                'id' => 7413,
                'province_id' => 74,
                'name' => 'KABUPATEN MUNA BARAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            435 => 
            array (
                'id' => 7414,
                'province_id' => 74,
                'name' => 'KABUPATEN BUTON TENGAH',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            436 => 
            array (
                'id' => 7415,
                'province_id' => 74,
                'name' => 'KABUPATEN BUTON SELATAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            437 => 
            array (
                'id' => 7471,
                'province_id' => 74,
                'name' => 'KOTA KENDARI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            438 => 
            array (
                'id' => 7472,
                'province_id' => 74,
                'name' => 'KOTA BAUBAU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            439 => 
            array (
                'id' => 7501,
                'province_id' => 75,
                'name' => 'KABUPATEN BOALEMO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            440 => 
            array (
                'id' => 7502,
                'province_id' => 75,
                'name' => 'KABUPATEN GORONTALO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            441 => 
            array (
                'id' => 7503,
                'province_id' => 75,
                'name' => 'KABUPATEN POHUWATO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            442 => 
            array (
                'id' => 7504,
                'province_id' => 75,
                'name' => 'KABUPATEN BONE BOLANGO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            443 => 
            array (
                'id' => 7505,
                'province_id' => 75,
                'name' => 'KABUPATEN GORONTALO UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            444 => 
            array (
                'id' => 7571,
                'province_id' => 75,
                'name' => 'KOTA GORONTALO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            445 => 
            array (
                'id' => 7601,
                'province_id' => 76,
                'name' => 'KABUPATEN MAJENE',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            446 => 
            array (
                'id' => 7602,
                'province_id' => 76,
                'name' => 'KABUPATEN POLEWALI MANDAR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            447 => 
            array (
                'id' => 7603,
                'province_id' => 76,
                'name' => 'KABUPATEN MAMASA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            448 => 
            array (
                'id' => 7604,
                'province_id' => 76,
                'name' => 'KABUPATEN MAMUJU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            449 => 
            array (
                'id' => 7605,
                'province_id' => 76,
                'name' => 'KABUPATEN MAMUJU UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            450 => 
            array (
                'id' => 7606,
                'province_id' => 76,
                'name' => 'KABUPATEN MAMUJU TENGAH',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            451 => 
            array (
                'id' => 8101,
                'province_id' => 81,
                'name' => 'KABUPATEN MALUKU TENGGARA BARAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            452 => 
            array (
                'id' => 8102,
                'province_id' => 81,
                'name' => 'KABUPATEN MALUKU TENGGARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            453 => 
            array (
                'id' => 8103,
                'province_id' => 81,
                'name' => 'KABUPATEN MALUKU TENGAH',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            454 => 
            array (
                'id' => 8104,
                'province_id' => 81,
                'name' => 'KABUPATEN BURU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            455 => 
            array (
                'id' => 8105,
                'province_id' => 81,
                'name' => 'KABUPATEN KEPULAUAN ARU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            456 => 
            array (
                'id' => 8106,
                'province_id' => 81,
                'name' => 'KABUPATEN SERAM BAGIAN BARAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            457 => 
            array (
                'id' => 8107,
                'province_id' => 81,
                'name' => 'KABUPATEN SERAM BAGIAN TIMUR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            458 => 
            array (
                'id' => 8108,
                'province_id' => 81,
                'name' => 'KABUPATEN MALUKU BARAT DAYA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            459 => 
            array (
                'id' => 8109,
                'province_id' => 81,
                'name' => 'KABUPATEN BURU SELATAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            460 => 
            array (
                'id' => 8171,
                'province_id' => 81,
                'name' => 'KOTA AMBON',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            461 => 
            array (
                'id' => 8172,
                'province_id' => 81,
                'name' => 'KOTA TUAL',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            462 => 
            array (
                'id' => 8201,
                'province_id' => 82,
                'name' => 'KABUPATEN HALMAHERA BARAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            463 => 
            array (
                'id' => 8202,
                'province_id' => 82,
                'name' => 'KABUPATEN HALMAHERA TENGAH',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            464 => 
            array (
                'id' => 8203,
                'province_id' => 82,
                'name' => 'KABUPATEN KEPULAUAN SULA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            465 => 
            array (
                'id' => 8204,
                'province_id' => 82,
                'name' => 'KABUPATEN HALMAHERA SELATAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            466 => 
            array (
                'id' => 8205,
                'province_id' => 82,
                'name' => 'KABUPATEN HALMAHERA UTARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            467 => 
            array (
                'id' => 8206,
                'province_id' => 82,
                'name' => 'KABUPATEN HALMAHERA TIMUR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            468 => 
            array (
                'id' => 8207,
                'province_id' => 82,
                'name' => 'KABUPATEN PULAU MOROTAI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            469 => 
            array (
                'id' => 8208,
                'province_id' => 82,
                'name' => 'KABUPATEN PULAU TALIABU',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            470 => 
            array (
                'id' => 8271,
                'province_id' => 82,
                'name' => 'KOTA TERNATE',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            471 => 
            array (
                'id' => 8272,
                'province_id' => 82,
                'name' => 'KOTA TIDORE KEPULAUAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            472 => 
            array (
                'id' => 9101,
                'province_id' => 91,
                'name' => 'KABUPATEN FAKFAK',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            473 => 
            array (
                'id' => 9102,
                'province_id' => 91,
                'name' => 'KABUPATEN KAIMANA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            474 => 
            array (
                'id' => 9103,
                'province_id' => 91,
                'name' => 'KABUPATEN TELUK WONDAMA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            475 => 
            array (
                'id' => 9104,
                'province_id' => 91,
                'name' => 'KABUPATEN TELUK BINTUNI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            476 => 
            array (
                'id' => 9105,
                'province_id' => 91,
                'name' => 'KABUPATEN MANOKWARI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            477 => 
            array (
                'id' => 9106,
                'province_id' => 91,
                'name' => 'KABUPATEN SORONG SELATAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            478 => 
            array (
                'id' => 9107,
                'province_id' => 91,
                'name' => 'KABUPATEN SORONG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            479 => 
            array (
                'id' => 9108,
                'province_id' => 91,
                'name' => 'KABUPATEN RAJA AMPAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            480 => 
            array (
                'id' => 9109,
                'province_id' => 91,
                'name' => 'KABUPATEN TAMBRAUW',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            481 => 
            array (
                'id' => 9110,
                'province_id' => 91,
                'name' => 'KABUPATEN MAYBRAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            482 => 
            array (
                'id' => 9111,
                'province_id' => 91,
                'name' => 'KABUPATEN MANOKWARI SELATAN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            483 => 
            array (
                'id' => 9112,
                'province_id' => 91,
                'name' => 'KABUPATEN PEGUNUNGAN ARFAK',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            484 => 
            array (
                'id' => 9171,
                'province_id' => 91,
                'name' => 'KOTA SORONG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            485 => 
            array (
                'id' => 9401,
                'province_id' => 94,
                'name' => 'KABUPATEN MERAUKE',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            486 => 
            array (
                'id' => 9402,
                'province_id' => 94,
                'name' => 'KABUPATEN JAYAWIJAYA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            487 => 
            array (
                'id' => 9403,
                'province_id' => 94,
                'name' => 'KABUPATEN JAYAPURA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            488 => 
            array (
                'id' => 9404,
                'province_id' => 94,
                'name' => 'KABUPATEN NABIRE',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            489 => 
            array (
                'id' => 9408,
                'province_id' => 94,
                'name' => 'KABUPATEN KEPULAUAN YAPEN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            490 => 
            array (
                'id' => 9409,
                'province_id' => 94,
                'name' => 'KABUPATEN BIAK NUMFOR',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            491 => 
            array (
                'id' => 9410,
                'province_id' => 94,
                'name' => 'KABUPATEN PANIAI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            492 => 
            array (
                'id' => 9411,
                'province_id' => 94,
                'name' => 'KABUPATEN PUNCAK JAYA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            493 => 
            array (
                'id' => 9412,
                'province_id' => 94,
                'name' => 'KABUPATEN MIMIKA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            494 => 
            array (
                'id' => 9413,
                'province_id' => 94,
                'name' => 'KABUPATEN BOVEN DIGOEL',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            495 => 
            array (
                'id' => 9414,
                'province_id' => 94,
                'name' => 'KABUPATEN MAPPI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            496 => 
            array (
                'id' => 9415,
                'province_id' => 94,
                'name' => 'KABUPATEN ASMAT',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            497 => 
            array (
                'id' => 9416,
                'province_id' => 94,
                'name' => 'KABUPATEN YAHUKIMO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            498 => 
            array (
                'id' => 9417,
                'province_id' => 94,
                'name' => 'KABUPATEN PEGUNUNGAN BINTANG',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            499 => 
            array (
                'id' => 9418,
                'province_id' => 94,
                'name' => 'KABUPATEN TOLIKARA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
        ));
        \DB::table('districts')->insert(array (
            0 => 
            array (
                'id' => 9419,
                'province_id' => 94,
                'name' => 'KABUPATEN SARMI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            1 => 
            array (
                'id' => 9420,
                'province_id' => 94,
                'name' => 'KABUPATEN KEEROM',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            2 => 
            array (
                'id' => 9426,
                'province_id' => 94,
                'name' => 'KABUPATEN WAROPEN',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            3 => 
            array (
                'id' => 9427,
                'province_id' => 94,
                'name' => 'KABUPATEN SUPIORI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            4 => 
            array (
                'id' => 9428,
                'province_id' => 94,
                'name' => 'KABUPATEN MAMBERAMO RAYA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            5 => 
            array (
                'id' => 9429,
                'province_id' => 94,
                'name' => 'KABUPATEN NDUGA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            6 => 
            array (
                'id' => 9430,
                'province_id' => 94,
                'name' => 'KABUPATEN LANNY JAYA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            7 => 
            array (
                'id' => 9431,
                'province_id' => 94,
                'name' => 'KABUPATEN MAMBERAMO TENGAH',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            8 => 
            array (
                'id' => 9432,
                'province_id' => 94,
                'name' => 'KABUPATEN YALIMO',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            9 => 
            array (
                'id' => 9433,
                'province_id' => 94,
                'name' => 'KABUPATEN PUNCAK',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            10 => 
            array (
                'id' => 9434,
                'province_id' => 94,
                'name' => 'KABUPATEN DOGIYAI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            11 => 
            array (
                'id' => 9435,
                'province_id' => 94,
                'name' => 'KABUPATEN INTAN JAYA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            12 => 
            array (
                'id' => 9436,
                'province_id' => 94,
                'name' => 'KABUPATEN DEIYAI',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            13 => 
            array (
                'id' => 9471,
                'province_id' => 94,
                'name' => 'KOTA JAYAPURA',
                'created_at' => '2019-08-05 16:10:21',
                'updated_at' => '2019-08-05 16:10:22',
            ),
            14 => 
            array (
                'id' => 9472,
                'province_id' => 91,
                'name' => 'Handika',
                'created_at' => '2019-08-07 02:40:57',
                'updated_at' => '2019-08-08 03:27:37',
            ),
        ));
        
        
    }
}