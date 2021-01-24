<?php
// Load file koneksi.php
include "../config.php";
$start=date('Y-m-d',strtotime($_POST['start_date']));
$end=date('Y-m-d',strtotime($_POST['end_date']));
// Load plugin PHPExcel nya
require_once 'PHPExcel/PHPExcel.php';

// Panggil class PHPExcel nya
$csv = new PHPExcel();

// Settingan awal fil excel
$csv->getProperties()->setCreator('My Notes Code')
                       ->setLastModifiedBy('My Notes Code')
                       ->setTitle("Data Pelapor")
                       ->setSubject("Pelapor")
                       ->setDescription("Laporan Semua Data Pelapor")
                       ->setKeywords("Data Pelapor");

// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
$style_col = array(
  'font' => array('bold' => true), // Set font nya jadi bold
  'alignment' => array(
    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
  ),
  'borders' => array(
    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
  )
);

// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
$style_row = array(
  'alignment' => array(
    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
  ),
  'borders' => array(
    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
  )
);

// Buat header tabel nya pada baris ke 1
$csv->setActiveSheetIndex(0)->setCellValue('A1', "NO"); // Set kolom A1 dengan tulisan "NO"
$csv->setActiveSheetIndex(0)->setCellValue('B1', "NAMA"); // Set kolom B1 dengan tulisan "NIS"
$csv->setActiveSheetIndex(0)->setCellValue('C1', "ALAMAT"); // Set kolom C1 dengan tulisan "NAMA"
$csv->setActiveSheetIndex(0)->setCellValue('D1', "X"); // Set kolom D1 dengan tulisan "JENIS KELAMIN"
$csv->setActiveSheetIndex(0)->setCellValue('E1', "Y"); // Set kolom E1 dengan tulisan "TELEPON"
$csv->setActiveSheetIndex(0)->setCellValue('F1', "LOKASI KEBAKARAN"); // Set kolom E1 dengan tulisan "TELEPON"
$csv->setActiveSheetIndex(0)->setCellValue('G1', "TANGGAL LAPOR"); // Set kolom E1 dengan tulisan "TELEPON"
$csv->setActiveSheetIndex(0)->setCellValue('H1', "JAM LAPOR"); // Set kolom E1 dengan tulisan "TELEPON"
// $csv->setActiveSheetIndex(0)->setCellValue('F1', "ALAMAT"); // Set kolom F1 dengan tulisan "ALAMAT"

// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$csv->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
$csv->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
$csv->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
$csv->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
$csv->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
$csv->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
$csv->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);
$csv->getActiveSheet()->getStyle('H1')->applyFromArray($style_col);

// Set height baris ke 1, 2 dan 3
$csv->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$csv->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
$csv->getActiveSheet()->getRowDimension('3')->setRowHeight(20);

// Buat query untuk menampilkan semua data siswa
$sql = mysqli_query($db, "SELECT * FROM daftar_lapor INNER JOIN pengguna ON daftar_lapor.id_pengguna = pengguna.id_pengguna WHERE daftar_lapor.tgl_lapor >= '$start' and daftar_lapor.tgl_lapor <='$end' ORDER BY daftar_lapor.id_lapor DESC ");

$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    $csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
    $csv->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['nama']);
    $csv->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['alamat']);
    $csv->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['x']);
    $csv->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['y']);
    $csv->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['lokasi']);
    $csv->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data['tgl_lapor']);
    $csv->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data['jam_lapor']);
    
    // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
    $csv->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
    $csv->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    $csv->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
    $csv->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
    $csv->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
    $csv->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
    $csv->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
    $csv->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);

    $csv->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);
    // Khusus untuk no telepon. kita set type kolom nya jadi STRING
    // $csv->setActiveSheetIndex(0)->setCellValueExplicit('D'.$numrow, $data['no_hp'], PHPExcel_Cell_DataType::TYPE_STRING);
    
    $no++; // Tambah 1 setiap kali looping
    $numrow++; // Tambah 1 setiap kali looping
}

// Set width kolom
$csv->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
$csv->getActiveSheet()->getColumnDimension('B')->setWidth(25); // Set width kolom B
$csv->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
$csv->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
$csv->getActiveSheet()->getColumnDimension('E')->setWidth(15); // Set width kolom E
$csv->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom F
$csv->getActiveSheet()->getColumnDimension('G')->setWidth(30); // Set width kolom G
$csv->getActiveSheet()->getColumnDimension('H')->setWidth(30); // Set width kolom H

// Set orientasi kertas jadi LANDSCAPE
$csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$csv->getActiveSheet(0)->setTitle("Report Data Pelapor");
$csv->setActiveSheetIndex(0);

// Proses file excel
header('Content-Type: application/vnd.openXMLformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data Pelapor.csv"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

// $write = PHPExcel_IOFactory::createWriter($csv, 'Excel2007');
$write = new PHPExcel_Writer_CSV($csv);
$write->save('php://output');
?>
