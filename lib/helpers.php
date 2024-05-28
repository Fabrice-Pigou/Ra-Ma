<?php
/**
 * ArrayToObjet
 * Convertie un tableau en objet
 * 
 * @param array $data
 * 
 * @return object
 */
function ArrayToObjet(array $data): object
{
    $data = json_encode($data);
    $data = json_decode($data, false);
    return $data;
}

/**
 * ObjectToArray
 * Convertie un objet en tableau
 * 
 * @param object $data
 * 
 * @return array
 */
function ObjectToArray(object $data): array
{
    $data = json_encode($data);
    $data = json_decode($data, true);
    return $data;
}