<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 07-09-2016 11:50
 */
echo "Name: Joris Rietveld<br/>";
echo "Address: ageweg 50<br/>";

$dateObj = new DateTime("");
$dateObj->setDate(1995,06,30);
echo "Date of birth " . $dateObj->format("d-m-Y");
/**
 * Naam: Joris Rietveld
 * Datum: 06-09-2016 13:41
 */
