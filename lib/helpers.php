<?php
//	Convertie un tableau en objet
function toObjet($data){
	$data = json_encode($data);
	$data = json_decode($data);
	return $data;
}

//	Convertie un objet en tableau
function toArray($data){
	$data = json_encode($data);
	$data = json_decode($data, true);
	return $data;
}