<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Imprimable</title>
  

  
  <style>
  
   .page{
  
  position:relative;
  top:90px;
  }
  .entete{
  position:relative;
  }
  .droite {
position:absolute;
top:40px;
left:20px;
width:500px;

  }

  .gauche{
 
  position:absolute;
  border:solid 1px;
  top:20px;
  right:25px;
  width:300px;
  padding:5px;
  font-size: 10px;
  
  
  }
  .gg{
  
  
  position: absolute;
  left:150px;
  top:5px;
  }


  
  
  .corps{

  position:relative;
  top:200px;
  width:93%;
  margin:auto;
  
  }
  .cMonTableauRule {
  width: 100%;
  border-collapse: collapse;
border:solid 1px;

}
table{
 border-collapse: collapse;
}

.cMonTableauRule th{

border:solid 1px;
}

td{

  text-align: right;

}


.soustab{

position:relative;
top:20px;


}
.soustabright{
position: absolute;
right:10px;


}


.yes{

width:90px;
text-align:right;

}
.tot{
width:0px;

text-align:left;

}
.footer{

position:relative;
top:180px;
}

.siggauch{
position:absolute;
left:20%;
font-size: 12px;
}

.sigdroit{
position:absolute;
right:20%;
font-size: 12px;
}
td{

font-size: 10px;

}
th{
 font-size: 12px; 
}
.s1{
text-align:left;
border-right:solid 1px;

}
.s2{
text-align:center;
border-right:solid 1px;
}
.s3{
  text-align: right;
  border-right:solid 1px;
   }

.right1{
position: absolute;
      left:0px;
      font-size: 12px;
}
   .right2{
      position: absolute;
      left:250px;
      top:10px;
       font-size: 10px;
     
   }
   .right3{
          position: absolute;
    
      top:45px;
      left:20px;
       font-size: 12px;
   }
   .right4{
        position: absolute;
      left:170px;
      top:45px;
       font-size: 12px;
   }
  </style>

</head>
<body>

<div class="page">
<div class="entete">

<div class="droite">
  @foreach ($mdoc as $m)

  <?php $d = new DateTime();  $date1 = $d->format('d/m/Y') ;   ?>
<div class="right1"><h2> {{$m->titreImprimable}}</h2> </div>
<div class="right2"><h4> {{$m->code}}</h4> </div>
<div class="right3"><h4> Tunis </h4> </div>
<div class="right4"><h4> le {{$date1}} </h4> </div>

@endforeach

</div>


<div class="gauche">
<div class="dd">   
<p> <strong> A l'attention de </strong></p>
<p><strong> Client: </strong></p>
<br>
 @foreach ($mdoc as $m)
      @foreach ($clients as $clt)
      @if ($m->idTier==$clt->id)
      @if ($clt->matriculeFiscal!=null)

<p><strong> ID Fiscale: </strong></p>
@endif
@endif
@endforeach
@endforeach
<p><strong> Tel: </strong></p>
</div>


<div class="gg">
    @foreach ($mdoc as $m)
      @foreach ($clients as $clt)
      @if ($m->idTier==$clt->id)
<p> {{$clt->nomPrenom}} </p>
<p> {{$clt->code}} </p>
<p style="margin-left: -145px;"> {{$clt->adresse}} </p>
@if ($clt->matriculeFiscal==null)

@else

<p> {{$clt->matriculeFiscal}}    </p>
@endif
<p> {{$clt->tel}} </p>
@endif
@endforeach
@endforeach

</div>

</div>

</div>







<div class="corps">   

<table class="cMonTableauRule" >

<thead>
<tr>
<th>REF.</th>
<th>DESIGNATION</th>
<th>QTE</th>
<th>PUHT</th>
<th>R(%)</th>
<th>Mnt NetHT</th>
<th>TVA (%)</th>
<th>Mnt TTC</th>
</tr>
</thead>


<tbody>

	  @foreach($idldoc as $d)

<tr>

<td class="s1" style="height: 15px;">{{$d->codeArticle}} </td>
<td class="s1">{{$d->libelleArticle}} </td>
<td class="s2">x{{$d->qte*1}} </td>
<td class="s3">{{number_format($d->puht,3)}}  </td>
<td class="s2">{{$d->tauxRemise*100}} %  </td>
<td class="s3">{{number_format($d->mntNetht,3)}} </td>
<td class="s2">{{$d->tauxTva*1}} % </td>
<td class="s3">{{number_format($d->mntttc,3)}} </td>


</tr>





@endforeach
<tr> 

<td class="s1"  style="height: 150px;"> </td>
<td class="s1"> </td>
<td class="s2"> </td>
<td class="s3"> </td>
<td class="s2"> </td>
<td class="s3"> </td>
<td class="s2"> </td>
<td class="s3"> </td>


</tr>
</tbody>

</table>




<div class="soustab">
<div class="soustabright">
<table>
      @foreach ($mdoc as $m)
        @foreach ($devise as $dev)
        @if ($dev->id==$m->idDevise)

<tr> 
<td class="tot">TOTAL HT</td>
<td class="yes"> {{number_format($m->mntht,$dev->chifreAfterV)}} {{$dev->symbole}}</td>
</tr>
@if ($m->mntRemise!=0)
<tr> 
<td class="tot">TOTAL REMISE</td>
<td class="yes"> {{number_format($m->mntRemise,$dev->chifreAfterV)}} {{$dev->symbole}}</td>
</tr>
@endif
<tr> 
<td class="tot">TOTAL NET HT</td>
<td class="yes"> {{number_format($m->mntNetht,$dev->chifreAfterV)}} {{$dev->symbole}}</td>
</tr>
<tr> 
<td class="tot">TOTAL(T.V.A)</td>
<td class="yes"> {{number_format($m->mntTva,$dev->chifreAfterV)}} {{$dev->symbole}}</td>
</tr>
@if ($m->idClasseDocument==135)
<tr> 
<td class="tot">DROIT DE TIMBRE</td>
<td class="yes"> {{number_format($m->timbre,$dev->chifreAfterV)}} {{$dev->symbole}}</td>
</tr>
@endif
<tr> 
<td class="tot"><strong> TOTAL T.T.C  </strong></td>
<td class="yes" ><strong> {{number_format($m->mntTtc,$dev->chifreAfterV)}} {{$dev->symbole}}</strong></td>
</tr>
@endif
@endforeach
@endforeach

</table>



</div>

<div class="footer">

<div class="siggauch"> Cachet et Signature</div>


<div class="sigdroit"> Signature Client </div>

</div>
</div>





</div>




</div>




 
</body>
</html>