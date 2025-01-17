@extends('layout.main')

@section('container')
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $title }}</h4>
            </div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-danger alert-dismissible show fade">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <h1>{{ $title }}</h1>
                <h3>Hasil Proses:</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Proses</th>
                            <th>Densitas Baru</th>
                            <th>Penyakit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($densitas_baru as $proses => $densitas)
                        <tr>
                            <td>Proses {{ $urutan }}</td>
                            <td>
                                @if (!is_array($densitas))
                                {{ $densitas }}
                                @else
                                @foreach ($densitas as $key => $value)
                                [{{ $key }}: {{ $value }}]
                                @endforeach
                                @endif
                            </td>
                            <td>
                                <?php
                                $host = 'localhost';
                                $username = 'root';
                                $password = '';
                                $database = 'db_sipakarayam';

                                $db = new mysqli($host, $username, $password, $database);

                                if ($db->connect_error) {
                                    die("Koneksi database gagal: " . $db->connect_error);
                                }
                                $codes = explode(',', $proses);
                                $sql = "SELECT GROUP_CONCAT(name) FROM ds_problems WHERE code IN ('" . implode("','", $codes) . "')";
                                $result = $db->query($sql);
                                $row = $result->fetch_row();
                                echo $row[0];
                                ?>
                            </td>
                        </tr>
                        <?php $urutan++; ?>
                        @endforeach
                    </tbody>
                </table>

                <h3>Hasil Akhir:</h3>
                <p>Penyakit: {{ $diagnosisResult['penyakit'] }}</p>
                <p>Deskripsi: {{ $diagnosisResult['description'] }}</p>
                <p>Solusi: {{ $diagnosisResult['solution'] }}</p>
                <p>Kepercayaan: {{ $diagnosisResult['kepercayaan'] }}%</p>

                <h3>Langkah Selanjutnya:</h3>
                <ul>
                    @foreach ($nextSteps as $step)
                    <li>{{ $step }}</li>
                    @endforeach
                </ul>
                <div class="text-center">
                    <a href="{{ route('dempster') }}" class="btn btn-primary">Diagnosa Lagi</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection