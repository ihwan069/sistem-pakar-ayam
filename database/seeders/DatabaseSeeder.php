<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Evidence;
use App\Models\Hypothesis;
use App\Models\Role;
use App\Models\Value;
use App\Models\Setting;
use App\Models\History;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Seorang Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin123'),
            'level' => 'admin',
        ]);

        User::create([
            'name' => 'Seorang User',
            'email' => 'user@mail.com',
            'password' => bcrypt('user123'),
            'level' => 'user',
        ]);

        Evidence::create([
            'code' => 'EC0001',
            'name' => 'Panas',
        ]);
        Evidence::create([
            'code' => 'EC0002',
            'name' => 'Sakit Kepala',
        ]);
        Evidence::create([
            'code' => 'EC0003',
            'name' => 'Bersin',
        ]);
        Evidence::create([
            'code' => 'EC0004',
            'name' => 'Batuk',
        ]);
        Evidence::create([
            'code' => 'EC0005',
            'name' => 'Pilek',
        ]);
        Evidence::create([
            'code' => 'EC0006',
            'name' => 'Badan Lemas',
        ]);
        Evidence::create([
            'code' => 'EC0007',
            'name' => 'Kedinginan',
        ]);

        Hypothesis::create([
            'user_id' => 1,
            'code' => 'HC0001',
            'name' => 'Anemia',
            'description' => 'Pengobatan tergantung pada diagnosis utama. Suplemen zat besi dapat digunakan untuk kekurangan zat besi. Suplemen vitamin B dapat digunakan untuk kadar vitamin rendah. Transfusi darah dapat digunakan untuk kehilangan darah. Obat untuk mendorong pembentukan darah dapat digunakan jika produksi darah tubuh berkurang.',
            'solution' => 'Pengobatan tergantung pada diagnosis utama. Suplemen zat besi dapat digunakan untuk kekurangan zat besi. Suplemen vitamin B dapat digunakan untuk kadar vitamin rendah. Transfusi darah dapat digunakan untuk kehilangan darah. Obat untuk mendorong pembentukan darah dapat digunakan jika produksi darah tubuh berkurang.'
        ]);
        Hypothesis::create([
            'user_id' => 1,
            'code' => 'HC0002',
            'name' => 'Bronkitis',
            'description' => 'adalah salah satu jenis skizofrenia, yang membuat pasien mengalami periode sedikit bergerak, dan periode terlalu aktif tanpa sebab.',
            'solution' => 'Pengobatan biasanya termasuk obat untuk meredakan batuk, yang bisa berlangsung selama berminggu-minggu. Antibiotik biasanya tidak dianjurkan.'
        ]);
        Hypothesis::create([
            'user_id' => 2,
            'code' => 'HC0003',
            'name' => 'Demam',
            'description' => 'Skizofrenia hebefrenik atau lebih dikenal dengan skizofrenia tidak teratur (disorganized skizofrenia) adalah salah satu jenis skizofrenia. Skizofrenia yaitu salah satu dari macam – macam gangguan jiwa seperti gangguan psikotik dan gangguan psikosomatis. ',
            'solution' => 'Obat-obatan seperti parasetamol dan ibuprofen dapat membantu meredakan rasa tidak nyaman. Hindari memberikan aspirin kepada anak karena dapat menyebabkan kondisi serius yang langka.'
        ]);
        Hypothesis::create([
            'user_id' => 2,
            'code' => 'HC0004',
            'name' => 'Flu',
            'description' => 'Skizofrenia tipe Residual merupakan tipe yang bisa dikatakan terlepas dari Skizofrenia. Akan tetapi masih memunculkan gejala-gejala Skizofrenia terutama dalam simtom negatif',
            'solution' => ' Minum Obat'
        ]);

        Role::create(['hypothesis_id' => 1, 'evidence_id' =>  1,'value' => 0]);
        Role::create(['hypothesis_id' => 1, 'evidence_id' =>  2,'value' => 0.75]);
        Role::create(['hypothesis_id' => 1, 'evidence_id' =>  3,'value' => 0]);
        Role::create(['hypothesis_id' => 1, 'evidence_id' =>  4,'value' => 0]);
        Role::create(['hypothesis_id' => 1, 'evidence_id' =>  5,'value' => 0]);
        Role::create(['hypothesis_id' => 1, 'evidence_id' =>  6,'value' => 0.75]);
        Role::create(['hypothesis_id' => 1, 'evidence_id' =>  7,'value' => 0]);
        Role::create(['hypothesis_id' => 2, 'evidence_id' =>  1,'value' => 0.5]);
        Role::create(['hypothesis_id' => 2, 'evidence_id' =>  2,'value' => 0]);
        Role::create(['hypothesis_id' => 2, 'evidence_id' =>  3,'value' => 0.5]);
        Role::create(['hypothesis_id' => 2, 'evidence_id' =>  4,'value' => 0.75]);
        Role::create(['hypothesis_id' => 2, 'evidence_id' =>  5,'value' => 0.25]);
        Role::create(['hypothesis_id' => 2, 'evidence_id' =>  6,'value' => 0.25]);
        Role::create(['hypothesis_id' => 2, 'evidence_id' =>  7,'value' => 0]);
        Role::create(['hypothesis_id' => 3, 'evidence_id' =>  1,'value' => 0.5]);
        Role::create(['hypothesis_id' => 3, 'evidence_id' =>  2,'value' => 0]);
        Role::create(['hypothesis_id' => 3, 'evidence_id' =>  3,'value' => 0]);
        Role::create(['hypothesis_id' => 3, 'evidence_id' =>  4,'value' => 0]);
        Role::create(['hypothesis_id' => 3, 'evidence_id' =>  5,'value' => 0]);
        Role::create(['hypothesis_id' => 3, 'evidence_id' =>  6,'value' => 0.5]);
        Role::create(['hypothesis_id' => 3, 'evidence_id' =>  7,'value' => 0.75]);
        Role::create(['hypothesis_id' => 4, 'evidence_id' =>  1,'value' => 0.25]);
        Role::create(['hypothesis_id' => 4, 'evidence_id' =>  2,'value' => 0.25]);
        Role::create(['hypothesis_id' => 4, 'evidence_id' =>  3,'value' => 0.5]);
        Role::create(['hypothesis_id' => 4, 'evidence_id' =>  4,'value' => 0]);
        Role::create(['hypothesis_id' => 4, 'evidence_id' =>  5,'value' => 0.75]);
        Role::create(['hypothesis_id' => 4, 'evidence_id' =>  6,'value' => 0.25]);
        Role::create(['hypothesis_id' => 4, 'evidence_id' =>  7,'value' => 0.25]);

        Value::create(['name' => 'Sangat Yakin', 'value' => 1.0]);
        Value::create(['name' => 'Yakin', 'value' => 0.75]);
        Value::create(['name' => 'Cukup', 'value' => 0.5]);
        Value::create(['name' => 'Kurang Yakin', 'value' => 0.25]);
        Value::create(['name' => 'Tidak Yakin', 'value' => 0.0]);

        Setting::create([
            'title' => 'Sistem Pakar Penyakit Manusia',
            'description' => '<p>Sistem pakar adalah sistem yang membantu para pakar untuk melakuakan diagnosa suatu penyakit apapun seperti penyakit pada manusia, hewan, tumbuhan dan makhluk hidup lainnya. dengan bantuan komputasi komputer untuk melakukan diagnosa berdasarkan ilmu atau pemahaman pakar.</p><p>Pada sistem pakar Exapp ini metode pakar yang digunakan untuk mendiagnosa adalah metode Ceratainty Factor. Ceratinty Factor atau faktor kepastian adalah salah satu metode sistem pakar untuk membuktikan apakah suatu fakta itu pasti ataukah tidak pasti yang berbentuk metric yang biasanya digunakan dalam sistem pakar.</p><p>Exapp memiliki kelebihan untuk menambakan jenis hipotesisi seperti penyakit dan evidence seperti gejala dan juga bisa digunakan untuk melakukan diagnosa apapun.</p>',
            'evidence_name' => 'Gejala',
            'hypothesis_name' => 'Penyakit',
            'input_type' => 'select'
        ]);

        History::create(['hypothesis_id' => 1, 'name' => 'Jonahtan', 'description' => 'A Patient', 'value' => 75.4]);
        History::create(['hypothesis_id' => 1, 'name' => 'Zeppeli', 'description' => 'A Patient', 'value' => 87.6]);
        History::create(['hypothesis_id' => 1, 'name' => 'Speedwagon', 'description' => 'A Patient', 'value' => 98.7]);
        History::create(['hypothesis_id' => 1, 'name' => 'Erina', 'description' => 'A Patient', 'value' => 96.8]);
        History::create(['hypothesis_id' => 1, 'name' => 'Joseph', 'description' => 'A Patient', 'value' => 98.6]);
        History::create(['hypothesis_id' => 1, 'name' => 'Cesar', 'description' => 'A Patient', 'value' => 90.7]);
        History::create(['hypothesis_id' => 1, 'name' => 'Lisa Lisa', 'description' => 'A Patient', 'value' => 76.65]);
        History::create(['hypothesis_id' => 1, 'name' => 'Jotaro', 'description' => 'A Patient', 'value' => 67.78]);
        History::create(['hypothesis_id' => 2, 'name' => 'Kakyoin', 'description' => 'A Patient', 'value' => 67.8]);
        History::create(['hypothesis_id' => 2, 'name' => 'Avdol', 'description' => 'A Patient', 'value' => 78.9]);
        History::create(['hypothesis_id' => 2, 'name' => 'Polnaref', 'description' => 'A Patient', 'value' => 79.7]);
        History::create(['hypothesis_id' => 2, 'name' => 'Josuke', 'description' => 'A Patient', 'value' => 87.56]);
        History::create(['hypothesis_id' => 2, 'name' => 'Okuyasu', 'description' => 'A Patient', 'value' => 56.67]);
        History::create(['hypothesis_id' => 2, 'name' => 'Koichi', 'description' => 'A Patient', 'value' => 76.89]);
        History::create(['hypothesis_id' => 2, 'name' => 'Rohan', 'description' => 'A Patient', 'value' => 87.65]);
        History::create(['hypothesis_id' => 2, 'name' => 'Giorno', 'description' => 'A Patient', 'value' => 98.76]);
        History::create(['hypothesis_id' => 2, 'name' => 'Bucalati', 'description' => 'A Patient', 'value' => 87.66]);
        History::create(['hypothesis_id' => 3, 'name' => 'Mista', 'description' => 'A Patient', 'value' => 99.65]);
        History::create(['hypothesis_id' => 3, 'name' => 'Abachiro', 'description' => 'A Patient', 'value' => 77.76]);
        History::create(['hypothesis_id' => 3, 'name' => 'Narancia', 'description' => 'A Patient', 'value' => 67.86]);
        History::create(['hypothesis_id' => 3, 'name' => 'Jolyne', 'description' => 'A Patient', 'value' => 100.78]);
        History::create(['hypothesis_id' => 3, 'name' => 'Ermes', 'description' => 'A Patient', 'value' => 87.65]);
        History::create(['hypothesis_id' => 4, 'name' => 'Foo Fighters', 'description' => 'A Patient', 'value' => 76.55]);
        History::create(['hypothesis_id' => 4, 'name' => 'Emporio', 'description' => 'A Patient', 'value' => 100.55]);
        History::create(['hypothesis_id' => 4, 'name' => 'Weather Report', 'description' => 'A Patient', 'value' => 65.88]);
        History::create(['hypothesis_id' => 4, 'name' => 'Dio', 'description' => 'A Patient', 'value' => 87.76]);
        History::create(['hypothesis_id' => 4, 'name' => 'Kars', 'description' => 'A Patient', 'value' => 100.65]);
        History::create(['hypothesis_id' => 4, 'name' => 'Kira', 'description' => 'A Patient', 'value' => 56.75]);
        History::create(['hypothesis_id' => 4, 'name' => 'Diavolo', 'description' => 'A Patient', 'value' => 87.56]);
        History::create(['hypothesis_id' => 4, 'name' => 'Pucci', 'description' => 'A Patient', 'value' => 67.88]);
    }
}
