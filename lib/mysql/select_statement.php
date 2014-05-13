<?php
/* 
 * Handler for select statements
 * @author = Kilian Petsch
 * @date = 2014-05-12

*/

// Select select statements and return an array for further processing
// Index is the limiting condition if applicable
require_once("quote-sql.php");
function select_statement($Table, $Index = 0) {
  
  $Data = array();

  // Still needs the correct select statements for each table
  $Statements=["rooms" => "SELECT r_id, r_nr, r_bezeichnung, r_notiz FROM raeume",
			   "suppliers" => "SELECT L.l_firmenname, L.l_strasse, L.l_tel, L.l_mobil, L.l_fax, L.l_email, plz.plz_plz, plz.plz_ort FROM lieferant
							   AS L INNER JOIN plz_zuordnung AS plz ON (L.l_plz_id=plz.plz_id)",
			   "acqisitions" => "SELECT komponenten.k_id, lieferant.l_firmenname, raeume.r_bezeichnung, komponenten.k_einkaufsdatum,
							komponenten.k_gewaehrleistungsdauer, komponenten.k_notiz, k_hersteller, komponentenarten.ka_komponentenart
							FROM komponenten
								INNER JOIN lieferant ON komponenten.lieferant_l_id = lieferant.l_id
								INNER JOIN raeume ON komponenten.lieferant_r_id = raeume.r_id
								INNER JOIN komponentenarten ON komponenten.komponentenarten_ka_id = komponentenarten.ka_id"
			   ];

  // Escape all special characters inside the string
  if($Index!=0) {
    $safe_Index = array();
    foreach ($Index as $unsafe_index) {
      $safe_Index[] = sql_quote($unsafe_index);
    }
  }

  $Result = mysql_query($Statements[$Table]);
  while($Data[]=mysql_fetch_assoc($Result));
  // Need to delete last element of the array as fetch_assoc writes its failure into the array
  array_pop($Data);

  mysql_close();
  return nice_empty_values($Data);
}

// Handle multiple select statements which need to be returned in a single array
// Index contains the column name for the where condition
function complex_select_statement($Table, $Index = 0) {


  $Server = "10.0.1.14";
  $User = "Gast";
  $PW = "";
  $Data = array();
  mysql_connect($Server, $User, $PW);
  mysql_select_db("itv_v1");

  $Data = array();
  $Sub_Data = array();
  $Sub_Index = "";
  // Still needs the correct select statements for each table
  $Statements = ["components" => ["SELECT *
FROM Komponenten Komp
LEFT JOIN komponente_hat_komponente KhK ON Komp.k_id = KhK.komponenten_k_id_teil
WHERE KhK.komponenten_k_id_teil IS NULL AND raeume_r_id=$Index[0]",

"SELECT r_nr as RaumNr ,r_bezeichnung,k_id,ka_komponentenart,kat_beschreibung,khkat_wert, (SELECT KA.ka_komponentenart FROM komponenten K 
INNER JOIN komponentenarten KA ON K.komponentenarten_ka_id=KA.ka_id WHERE K.k_id=komponenten_k_id_aggregat) as AggregatBez,komponenten_k_id_aggregat as AggregatNr 
FROM komponenten RIGHT JOIN raeume ON raeume_r_id=r_id 
INNER JOIN Komponentenarten ON komponentenarten_ka_id=ka_id 
LEFT JOIN komponente_hat_attribute ON komponenten_k_id=k_id 
LEFT JOIN komponentenattribute ON kat_id=komponentenattribute_kat_id 
LEFT JOIN komponente_hat_komponente ON komponenten_k_id_teil=k_id WHERE $Index[1] 
ORDER BY  `komponenten`.`k_id` ASC"
]];

  // Escape all special characters inside the string
  if($Index!=0) {
    $safe_Index = array();
    foreach($Index as $unsafe_index) {
      $safe_Index[] = sql_quote($unsafe_index);
    }
  }
  
  $Result = mysql_query($Statements[$Table][0]);
  while($Data[] = mysql_fetch_assoc($Result));
  array_pop($Data);

  // Replacing the $Index with the actual condition
  foreach ($Data as $key => $piece) {
    $Sub_Index=" ".$Index[1]."=".$piece[$Index[1]];
    $tmp_Statement=str_replace(" ".$Index[1]." ", $Sub_Index, $Statements[$Table][1]);
    $Sub_Result = mysql_query($tmp_Statement);
    while($Sub_Data[] = mysql_fetch_assoc($Sub_Result));
    array_pop($Sub_Data);
    $Data[$key][$Table] = $Sub_Data;
    unset($Sub_Data);
  }

  mysql_close();
  return nice_empty_values($Data);
  
}

// Replace NULL values with visual empty signs
function nice_empty_values($Data) {
  
  $nice_Data = array();
  foreach ($Data as $arr_Data) {
    foreach ($arr_Data as $key => $raw_Data) {
      if($raw_Data==NULL && !is_array($raw_Data)) {
	$tmp[$key]="-";
      } else {
	$tmp[$key]=$raw_Data;
      }
    }
    $nice_Data[]=$tmp;
    unset($tmp);
  }

  return $nice_Data;
}

var_dump(complex_select_statement("components",["2", "k_id"]));
?>
