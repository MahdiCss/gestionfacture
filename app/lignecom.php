<?php

namespace App;

Class lignecom
{
public $version;
public $numordre;
public $iddoc;
public $idart;
public $qte;
public $puht;
public $puttc;
public $mntht;
public $mnttva;
public $mntnetht;
public $mntbrutht;
public $mntttc;
public $tauxremis;
public $mntremis;
public $tauxtva;
public $date;

  public function __construct($version,$numordre,$iddoc, $idart,$qte,$puht,$puttc,$mntht,$mnttva,$mntnetht,$mntbrutht,$mntttc,$tauxremis,$mntremis,$tauxtva,$date) {

		        $this->version =$version;
				$this->numordre =$numordre;
				$this->iddoc=$iddoc;
				$this->idart=$idart;
				$this->qte=$qte;
				$this->puht=$puht;
				$this->puttc=$puttc;
				$this->mntht=$mntht;
				$this->mnttva=$mnttva;
				$this->mntnetht=$mntnetht;
				$this->mntbrutht=$mntbrutht;
				$this->mntttc=$mntttc;
				$this->tauxremis=$tauxremis;
				$this->mntremis=$mntremis;
				$this->tauxtva=$tauxtva;
				$this->date=$date;
    }





}
