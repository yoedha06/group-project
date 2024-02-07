<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\HasilPemilihan;
use App\Models\Kandidat;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        // Group by candidate and count the votes for each candidate
        $kandidatResults = HasilPemilihan::select('Id_Kandidat')->groupBy('Id_Kandidat')->orderByRaw('COUNT(*) DESC')->get();
        $kandidatLabels = [];
        $kandidatData = [];

        foreach ($kandidatResults as $result) {
            $kandidat = Kandidat::find($result->Id_Kandidat);
            $kandidatLabels[] = $kandidat->Nama_Kandidat;
            $kandidatData[] = HasilPemilihan::where('Id_Kandidat', $result->Id_Kandidat)->count();
        }

        return $this->chart->pieChart()
            ->setTitle('Grafik Hasil Pemilihan')
            ->setSubtitle('Jumlah Pemilih untuk Setiap Kandidat')
            ->addData($kandidatData)
            ->setLabels($kandidatLabels);
    }
}
