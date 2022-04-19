<?php 
    include 'PHPExcel/IOFactory.php';

	//masukkan file yang akan dibaca
    $inputFileName = 'dataMahasiswa.xlsx';
	try{
		$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($inputFileName);
	}catch(Exception $e){
		die('Error loading file '.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
	}

	$sheet = $objPHPExcel->getSheet(0);
	$highestRow = $sheet->getHighestRow();
	$highestColumn = $sheet->getHighestColumn();

	echo "<table border = 1 class='table table-striped'>
			<tr>
				<th>NIM</th>
				<th>Nama</th>
				<th>Tanggal Lahir</th>
			</tr>";
	for($row = 1; $row <= $highestRow; $row++){
		$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL, TRUE, FALSE);
		$NIM = $rowData[0][0];
		$Nama = $rowData[0][1];
		$TanggalLahir = PHPExcel_Style_NumberFormat::toFormattedString($rowData[0][2],PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY) ;

		echo "	<tr>
					<td>$NIM</td>
					<td>$Nama</td>
					<td>$TanggalLahir</td>
				</tr>
		";
	}
	echo "</table>";

?>
