<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ds_evidence;
use App\Models\Ds_result;

class ConsultationdsController extends Controller
{
    public function index()
    {
        $evidences = Ds_Evidence::all();
        $title = 'Sistem Pakar Diagnosis Penyakit Ayam Metode Dempster-Shafer';

        return view('consultation_ds.index', compact('evidences', 'title'));
    }

    public function prosesDiagnosa(Request $request)
    {
        include 'koneksi.php';
        $title = 'Hasil Dempster-Shafer';
        $evidences = Ds_Evidence::all();


        $selectedEvidences = $request->input('evidence');

        if (count($selectedEvidences) < 2) {
            $errorMessage = "Pilih minimal 2 gejala untuk diagnosis.";
            return view('consultation_ds.index', compact('errorMessage', 'title', 'evidences'));
        }

        // Lakukan logika diagnosa dan siapkan data hasil diagnosa
        $evidenceIds = implode(',', $selectedEvidences);

        $sql = "SELECT GROUP_CONCAT(b.code), a.cf
                FROM ds_rules a
                JOIN ds_problems b ON a.id_problem=b.id
                WHERE a.id_evidence IN($evidenceIds)
                GROUP BY a.id_evidence";

        $result = $db->query($sql);
        $evidence = [];
        while ($row = $result->fetch_row()) {
            $evidence[] = $row;
        }

        // Menentukan environment
        $sql = "SELECT GROUP_CONCAT(code) FROM ds_problems";
        $result = $db->query($sql);
        $row = $result->fetch_row();
        $fod = $row[0];

        // Menentukan nilai densitas
        $urutan = 1;
        $densitas_baru = [];
        while (!empty($evidence)) {
            $densitas1[0] = array_shift($evidence);
            $densitas1[1] = [$fod, 1 - $densitas1[0][1]];
            $densitas2 = [];
            if (empty($densitas_baru)) {
                $densitas2[0] = array_shift($evidence);
            } else {
                foreach ($densitas_baru as $k => $r) {
                    if ($k != "&theta;") {
                        $densitas2[] = [$k, $r];
                    }
                }
            }
            $theta = 1;
            foreach ($densitas2 as $d) {
                $theta -= $d[1];
            }
            $densitas2[] = [$fod, $theta];
            $m = count($densitas2);
            $densitas_baru = [];
            for ($y = 0; $y < $m; $y++) {
                for ($x = 0; $x < 2; $x++) {
                    if (!($y == $m - 1 && $x == 1)) {
                        $v = explode(',', $densitas1[$x][0]);
                        $w = explode(',', $densitas2[$y][0]);
                        sort($v);
                        sort($w);
                        $vw = array_intersect($v, $w);
                        if (empty($vw)) {
                            $k = "&theta;";
                        } else {
                            $k = implode(',', $vw);
                        }
                        if (!isset($densitas_baru[$k])) {
                            $densitas_baru[$k] = $densitas1[$x][1] * $densitas2[$y][1];
                        } else {
                            $densitas_baru[$k] += $densitas1[$x][1] * $densitas2[$y][1];
                        }
                    }
                }
            }
            foreach ($densitas_baru as $k => $d) {
                if ($k != "&theta;") {
                    $densitas_baru[$k] = $d / (1 - (isset($densitas_baru["&theta;"]) ? $densitas_baru["&theta;"] : 0));
                }
            }
            foreach ($densitas_baru as $proses => $densitas) {
                if (!is_array($densitas)) {
                } else {
                    foreach ($densitas as $key => $value) {
                    }
                }
                $codes = explode(',', $proses);
                $sql = "SELECT GROUP_CONCAT(name) 
                        FROM ds_problems 
                        WHERE code IN ('" . implode("','", $codes) . "')";
                $result = $db->query($sql);
                $row = $result->fetch_row();
                $urutan++;
            }
        }

        // Perangkingan
        unset($densitas_baru["&theta;"]);
        arsort($densitas_baru);

        // Menampilkan hasil akhir
        $codes = array_keys($densitas_baru);
        $sql = "SELECT GROUP_CONCAT(name), GROUP_CONCAT(description), GROUP_CONCAT(solution)
        FROM ds_problems 
        WHERE code IN ('{$codes[0]}')";

        $result = $db->query($sql);
        $row = $result->fetch_row();

        $diagnosisResult = [
            'penyakit' => $row[0],
            'description' => $row[1],
            'solution' => $row[2],
            'kepercayaan' => round($densitas_baru[$codes[0]] * 100, 2)
        ];

        // Tambahkan langkah selanjutnya
        $nextSteps = [
            "Lakukan pemeriksaan lebih lanjut dengan dokter untuk konfirmasi diagnosis.",
            "Mengikuti saran perawatan dan pengobatan yang diberikan oleh dokter."
        ];

        if (empty($diagnosisResult['penyakit']) || empty($diagnosisResult['description']) || empty($diagnosisResult['solution']) || empty($diagnosisResult['kepercayaan'])) {
            // Jika salah satu atau semua data kosong, tampilkan pesan error
            return view('consultation_ds.errords');
        } else {
            // Jika semua data tersedia, simpan ke database
            $dsResult = new Ds_result();
            $dsResult->penyakit = $diagnosisResult['penyakit'];
            $dsResult->description = $diagnosisResult['description'];
            $dsResult->solution = $diagnosisResult['solution'];
            $dsResult->kepercayaan = $diagnosisResult['kepercayaan'];
            $dsResult->save();
        }

        // return view('dempster-shafer.hasil', compact('diagnosisResult', 'nextSteps', 'title'));
        return view('consultation_ds.hasil', compact('densitas_baru', 'urutan', 'diagnosisResult', 'nextSteps', 'title'));
    }
}
