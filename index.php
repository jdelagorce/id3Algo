<?php
require 'Id3.php';
require 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/bootstrap-theme.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <meta charset="UTF-8">
</head>
<body>
 <nav class="navbar navbar-inverse navbar-fixed-top">
   <div class="container">
     <div class="navbar-header">
       <button class="navbar-toggle collapsed" aria-expanded="false" aria-controls="navbar" type="button" data-toggle="collapse" data-target="#navbar">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
       <a class="navbar-brand" href="#">Démo ID 3</a>
     </div>
     <div class="collapse navbar-collapse" id="navbar">
       <ul class="nav navbar-nav">
         <li class="active"><a href="#ourProject">Notre projet</a></li>
         <li><a href="#bddChoice">Choisir la BDD</a></li>
         <li><a href="#teamLover">L'équipe</a></li>
       </ul>
     </div>
   </div>
 </nav>
 <div class="container" id="ourProject"style =" margin-top: 60px; padding: 40px 15px;">
   <div id="" class="center-block text-center">

     <h1> <span class="glyphicon glyphicon-tower" aria-hidden="true"></span> Notre projet <span class="glyphicon glyphicon-tower" aria-hidden="true"></span></h1>
     <p class="lead"> Dans le cadre du projet Informatique Décisionnel, nous avons eu a traiter
     le sujet des arbres de décisions. Ainsi qu'expliqué lors de la présentation
     nous allons vous exposer le mode de fonctionnement de l'algorithme ID 3.
     </p>
     <img src="img/image3.gif" />
     <br/>
     <p class="lead">L'arbre de décision ID 3 est un arbre de classification qui malheureusement
     ne permet pas de réduire les bruits qui peuvent se trouver dans les données
     à analyser.
     </p>
   </div>
 </div>
 <br/>
 <hr />
 <br/>
 <div class="container" id="bddChoice"style =" margin-top: 60px; padding: 40px 15px;">
   <div id="" class="center-block text-center">

     <h1> <span class="glyphicon glyphicon-hdd" aria-hidden="true"></span> Choix de la Base de données à analyser <span class="glyphicon glyphicon-hdd" aria-hidden="true"></span></h1>
     <p class="lead"> Dans un but de diversification d'analyse, nous avons deux bases de données possiblement analysables:</p>
     <div class="list-group">
       <a href="http://localhost/id3Algo/result.php?data=data1#resultat"><button class=" center-block list-group-item" style="width: 50%;">Une base de donnée concernant le mode de transport favori par sexe, revenus etc... <span style= "float : right" class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button></a>
       <a href="http://localhost/id3Algo/result.php?data=data2#resultat"><button class="center-block list-group-item" style="width: 50%;">Une base de donnée concernant la pratique d'un sport à l'extérieur  <span style= "float : right" class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button></a>
     </div>
     <br/>
     <img src="img/car-football.png" />
     <br/>
   </div>
 </div>
 <div class="container" id="waitingResult"style =" margin-top: 60px; padding: 40px 15px;">
   <div id="" class="center-block text-center">

     <h1> <span class="glyphicon glyphicon-gift" aria-hidden="true"></span> Le résultat <span class="glyphicon glyphicon-gift" aria-hidden="true"></span></h1>
     <p class="lead"> Voici l'arbre de décision obtenu pour les données enregistrées en base.
     A présent à vous de faire votre choix...</p>
     <br/>

   </div>
 </div>
 <div class="container" id="teamLover" style=" margin-top: 60px; padding: 40px 15px;">
   <div id="" class="center-block text-center">

     <h1><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> Les putois enragés <span
           class="glyphicon glyphicon-heart" aria-hidden="true"></span></h1>
     <img src = "img/ratel-psychopathe-savanes.jpg" />
     <p class="lead"> MAXIME DRAPICH <br/> JEAN-TIMOTHEE VERVLIET-DE LA GORCE <br/> I5 EPSI ARRAS
     </p>
     <img src="img/epsi-logo-300x186.png"/>

   </div>
 </div>
</body>
<script src="js/jquery-2.2.2.js"></script>
</html>
