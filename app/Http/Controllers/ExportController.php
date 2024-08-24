<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Shipment; // Import model Shipment

class ExportController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function export()
    {
        // Mengambil data dari database
        $shipments = Shipment::all();

        // Membuat spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menambahkan header ke spreadsheet
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'GAR');
        $sheet->setCellValue('C1', 'Type');
        $sheet->setCellValue('D1', 'MV');
        $sheet->setCellValue('E1', 'Barge');
        $sheet->setCellValue('F1', 'Stowage Plan');
        $sheet->setCellValue('G1', 'Figure Vessel');
        $sheet->setCellValue('H1', 'Final Draft');
        $sheet->setCellValue('I1', 'Barge Figure (R/C)');
        $sheet->setCellValue('J1', 'R/C Barge');
        $sheet->setCellValue('K1', 'Shortage/Surplus');
        $sheet->setCellValue('L1', 'Commence');
        $sheet->setCellValue('M1', 'Completed');
        $sheet->setCellValue('N1', 'Duration');
        $sheet->setCellValue('O1', 'Cargo');
        $sheet->setCellValue('P1', 'Buyer');
        $sheet->setCellValue('Q1', 'Destination');
        $sheet->setCellValue('R1', 'B/L');
        $sheet->setCellValue('S1', 'Surveyor');

        // Menambahkan data ke spreadsheet
        $row = 2;
        foreach ($shipments as $shipment) {
            $sheet->setCellValue('A' . $row, $shipment->id);
            $sheet->setCellValue('B' . $row, $shipment->gar);
            $sheet->setCellValue('C' . $row, $shipment->type);
            $sheet->setCellValue('D' . $row, $shipment->mv ?? '-');
            $sheet->setCellValue('E' . $row, $shipment->bg ?? '-'); // Menambahkan data Barge
            $sheet->setCellValue('F' . $row, $shipment->sp);
            $sheet->setCellValue('G' . $row, $shipment->fv);
            $sheet->setCellValue('H' . $row, $shipment->fd);
            $sheet->setCellValue('I' . $row, $shipment->bf);
            $sheet->setCellValue('J' . $row, $shipment->rc);
            $sheet->setCellValue('K' . $row, $shipment->ss);
            $sheet->setCellValue('L' . $row, \Carbon\Carbon::parse($shipment->arrival_date)->format('Y-m-d'));
            $sheet->setCellValue('M' . $row, \Carbon\Carbon::parse($shipment->departure_date)->format('Y-m-d'));
            $sheet->setCellValue('N' . $row, $shipment->duration);
            $sheet->setCellValue('O' . $row, $shipment->cargo);
            $sheet->setCellValue('P' . $row, $shipment->company ? $shipment->company->name : 'N/A');
            $sheet->setCellValue('Q' . $row, $shipment->dt);
            $sheet->setCellValue('R' . $row, $shipment->tg);
            $sheet->setCellValue('S' . $row, $shipment->sv);
            $row++;
        }

        // Membuat file Excel
        $writer = new Xlsx($spreadsheet);

        // Nama file yang akan didownload
        $fileName = 'shipments_export.xlsx';

        // Mengatur header untuk download file
        $response = Response::streamDownload(function() use ($writer) {
            $writer->save('php://output');
        }, $fileName);

        // Mengatur tipe konten
        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        return $response;
    }
}
