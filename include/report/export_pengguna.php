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
                       ->setTitle("Data Pengguna")
                       ->setSubject("Pengguna")
                       ->setDescription("Laporan Semua Data Pengguna")
                       ->setKeywords("Data Pengguna");

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
$csv->setActiveSheetIndex(0)->setCellValue('D1', "NOMOR HP"); // Set kolom D1 dengan tulisan "JENIS KELAMIN"
$csv->setActiveSheetIndex(0)->setCellValue('E1', "TANGGAL DAFTAR"); // Set kolom E1 dengan tulisan "TELEPON"
// $csv->setActiveSheetIndex(0)->setCellValue('F1', "ALAMAT"); // Set kolom F1 dengan tulisan "ALAMAT"

// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$csv->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
$csv->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
$csv->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
$csv->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
$csv->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);


// Buat query untuk menampilkan semua data siswa
$sql = mysqli_query($db, "SELECT * FROM pengguna WHERE tgl_daftar >='$start' AND tgl_daftar <='$end' ");

$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    $csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
    $csv->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['nama']);
    $csv->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['alamat']);
    
    // Khusus untuk no telepon. kita set type kolom nya jadi STRING
    $csv->setActiveSheetIndex(0)->setCellValueExplicit('D'.$numrow, $data['no_hp'], PHPExcel_Cell_DataType::TYPE_STRING);
    $csv->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['tgl_daftar']);

    // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
    $csv->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
    $csv->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    $csv->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
    $csv->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
    $csv->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
    
    $csv->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);

    $no++; // Tambah 1 setiap kali looping
    $numrow++; // Tambah 1 setiap kali looping
}

// Set width kolom
$csv->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
$csv->getActiveSheet()->getColumnDimension('B')->setWidth(25); // Set width kolom B
$csv->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
$csv->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
$csv->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom E

// Set orientasi kertas jadi LANDSCAPE
$csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$csv->getActiveSheet(0)->setTitle("Report Data Pengguna");
$csv->setActiveSheetIndex(0);

// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data Pengguna.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$write = PHPExcel_IOFactory::createWriter($csv, 'Excel2007');
$write->save('php://output');
?>
