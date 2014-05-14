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
			   "acquisitions" => "SELECT komponenten.k_id, lieferant.l_firmenname, raeume.r_bezeichnung, komponenten.k_einkaufsdatum,
							komponenten.k_gewaehrleistungsdauer, komponenten.k_notiz, k_hersteller, komponentenarten.ka_komponentenart
							FROM komponenten
								INNER JOIN lieferant ON komponenten.lieferant_l_id = lieferant.l_id
								INNER JOIN raeume ON komponenten.raeume_r_id = raeume.r_id
								INNER JOIN komponentenarten ON komponenten.komponentenarten_ka_id = komponentenarten.ka_id",
				"components_producer" => "SELECT k_hersteller FROM komponenten GROUP BY k_hersteller",
    			"components_date" => "SELECT k_einkaufsdatum FROM komponenten GROUP BY k_einkaufsdatum",
    			"components_guarantee" => "SELECT k_gewaehrleistungsdauer FROM komponenten GROUP BY k_gewaehrleistungsdauer",
    			"components_note" => "SELECT k_notiz FROM komponenten GROUP BY k_notiz",
    			"suppliers_name" => "SELECT l_firmenname FROM lieferant INNER JOIN komponenten ON lieferant.l_id = komponenten.lieferant_l_id GROUP by l_firmenname",
    			"room_name" => "SELECT r_nr FROM raeume INNER JOIN komponenten ON raeume.r_id = komponenten.raeume_r_id GROUP by r_nr",
    			"search_filter" => "SELECT l.l_firmenname, r.r_bezeichnung, k.k_einkaufsdatum, k.k_gewaehrleistungsdauer, k.k_notiz, k.k_hersteller, ka.ka_komponentenart FROM komponenten AS k 
									INNER JOIN lieferant AS l ON k.lieferant_l_id = l.l_id
									INNER JOIN raeume AS r ON k.raeume_r_id = r.r_id
									INNER JOIN komponentenarten AS ka ON k.komponentenarten_ka_id = ka.ka_id WHERE ".$Index
			   ];

  // Escape all special characters inside the string
  if($Index!=0) {
    $safe_Index = array();
    foreach ($Index as $unsafe_index) {
      $safe_Index[] = sql_quote($unsafe_index);
    }
  }

  $Result = mysql_query($Statements[$Table]);
  //var_dump($Statements[$Table]);
  //print mysql_error();
  while($Data[]=mysql_fetch_assoc($Result));
  // Need to delete last element of the array as fetch_assoc writes its failure into the array
  array_pop($Data);

  //mysql_close();
  return nice_empty_values($Data);
}

// Handle multiple select statements which need to be returned in a single array
// Index contains the column name for the where condition
function complex_select_statement($Table, $Index = 0) {

  $Data = array();
  $Sub_Data = array();
  $Sub_Index = "";
  // Contains the keyword/column which is used for the second query
  $Statements_keyword = ["components" => "k_id"];
  // Still needs the correct select statements for each table
  $Statements = ["components" => ["SELECT *
FROM Komponenten Komp
LEFT JOIN komponente_hat_komponente KhK ON Komp.k_id = KhK.komponenten_k_id_teil
WHERE KhK.komponenten_k_id_teil IS NULL AND raeume_r_id=$Index",

"SELECT r_nr as RaumNr ,r_bezeichnung,k_id,ka_komponentenart,kat_beschreibung,khkat_wert, (SELECT KA.ka_komponentenart FROM komponenten K 
INNER JOIN komponentenarten KA ON K.komponentenarten_ka_id=KA.ka_id WHERE K.k_id=komponenten_k_id_aggregat) as AggregatBez,komponenten_k_id_aggregat as AggregatNr 
FROM komponenten RIGHT JOIN raeume ON raeume_r_id=r_id 
INNER JOIN Komponentenarten ON komponentenarten_ka_id=ka_id 
LEFT JOIN komponente_hat_attribute ON komponenten_k_id=k_id 
LEFT JOIN komponentenattribute ON kat_id=komponentenattribute_kat_id 
LEFT JOIN komponente_hat_komponente ON komponenten_k_id_teil=k_id WHERE '".$Statements_keyword["components"]."'=
ORDER BY  `komponenten`.`k_id` ASC"
]];

  // Escape all special characters inside the string
  // NEEDS TO BE REWRITTEN FOR NON ARRAYS
  /*  if($Index!=0) {
    $safe_Index = array();
    foreach($Index as $unsafe_index) {
      $safe_Index[] = sql_quote($unsafe_index);
    }
    } */
  
  $Result = mysql_query($Statements[$Table][0]);
  while($Data[] = mysql_fetch_assoc($Result));
  array_pop($Data);

  // Replacing the $Index with the actual condition
  foreach ($Data as $key => $piece) {
    $Sub_Index=" ".$Statements_keyword[$Table]."=".$piece[$Statements_keyword[$Table]];
    $tmp_Statement=str_replace(" '".$Statements_keyword[$Table]."'=", $Sub_Index, $Statements[$Table][1]);
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
?>
