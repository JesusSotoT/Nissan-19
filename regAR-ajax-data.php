<?php

 include "conexion.php";

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'clave',
    1 => 'nombre', 
	2 => 'apellido_p',
    3 => 'apellido_m',
    4 => 'fecha_nacimiento',
    5 => 'estatura',
    6 => 'talla',
    7 => 'tipo_sangre',
    8 => 'habitacion_hotel'
);

// getting total number records without any search
$sql = "SELECT a.clave , a.nombre , a.apellido_p , a.apellido_m, a.fecha_nacimiento, a.estatura  ,b.talla , c.tipo_sangre , a.habitacion_hotel ";
$sql.=" FROM tagm_participante a LEFT JOIN tagm_tallas b on b.id = a.talla LEFT JOIN tagm_tipos_sangre c on c.id = a.tipo_sangre WHERE asistencia = 1   ";
$query=mysqli_query($conn, $sql) or die("regAR-ajax-data.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT * ";
	$sql.=" FROM tagm_participante a LEFT JOIN tagm_tallas b on b.id = a.talla LEFT JOIN tagm_tipos_sangre c on c.id = a.tipo_sangre WHERE asistencia = 1  ";
	$sql.=" WHERE nombre LIKE '".$requestData['search']['value']."%' ";
	$sql.=" WHERE nombre LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
    $sql.=" OR nombre LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("regAR-ajax-data.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("regAR-ajax-data.php: get PO"); // again run query with limit
	
} else {	

	$sql = "SELECT a.clave , a.nombre , a.apellido_p , a.apellido_m, a.fecha_nacimiento, a.estatura  ,b.talla , c.tipo_sangre , a.habitacion_hotel ";
	$sql.=" FROM tagm_participante a LEFT JOIN tagm_tallas b on b.id = a.talla LEFT JOIN tagm_tipos_sangre c on c.id = a.tipo_sangre  WHERE asistencia = 1 ";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("regAR-ajax-data.php: get PO");
	
}


$data = array();

while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$fecha1 = $row['fecha_nacimiento'];
$fecha = str_replace("/","-",$fecha1);
    $fecha = date('Y/m/d',strtotime($fecha));
    $hoy = date('Y/m/d');
    $edad = $hoy - $fecha;
	$nestedData=array(); 

	$nestedData[] =  '<a href="check-in.php?id='.$row["clave"].'" title="Ver Solicitud" class="btn btn-info">'.$row["clave"].'</a>';
    $nestedData[] = $row["nombre"];
    $nestedData[] = $row["apellido_p"];
     $nestedData[] = $edad;
     $nestedData[] = $row["estatura"];
     $nestedData[] = $row["talla"];
     $nestedData[] = $row["tipo_sangre"];
     $nestedData[] = $row["habitacion_hotel"];
     
	
	$data[] = $nestedData;
    
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
