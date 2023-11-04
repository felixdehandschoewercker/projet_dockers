<?php 
session_start();
if(!isset($_SESSION['LOGGED_USER']) || empty($_SESSION['LOGGED_USER'])) : ?>

<script type="text/javascript">

                     alert('Veuillez vous connecter');

               </script>

               <meta http-equiv="Refresh" content="0;URL=Authentification.php">
<? endif; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Page d'accueil - Site de Plongée</title>
  <meta charset="UTF-8"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="sections.css">
</head>
<body>
<header>
  <?php include_once('header.php'); ?>
  </header>
  <section id="hero">

  <div class="hero-content">

  <h1>Les plongées futurs</h1>
    </div>

    
  </section>    <br>
    <br>
  <h2>Planifiez votre prochaine aventure sous-marine</h2>
           <div class="par-content"> <p>Prêt pour une autre descente vers les profondeurs océaniques ? Utilisez notre formulaire simple pour planifier votre prochaine plongée.</p>
           <p> Il suffit de choisir votre plongée et la date prévue, et nous nous occuperons du reste. C'est aussi simple que ça. Vous pouvez également consulter vos plongées sur cette page.</p>
</div>
  <?php
  $id = $_SESSION['LOGGED_USER'];
  $diverInfoStatement = $mysqlclient->query('SELECT * FROM diver WHERE Id_Diver="' . $id . '"');
  $diverInfo = $diverInfoStatement->fetch(); 

   if ($diverInfo['privilege'] === 'E4' || $diverInfo['privilege'] === 'E3' || $diverInfo['privilege'] === 'N5' || $diverInfo['privilege'] === 'admin'): ?>
    <div class="container">
    <section id="services">
      <h1></h1>
      <form action="create_dive.php" method="POST">
        <button type="submit" class="custom-button">Créer une palanquée</button>
      </form>
      <br />
  </section>
    </div>
  <?php endif; ?>
  <div class="container">
  <?php
      $plannedStatement = $mysqlclient->query('SELECT * FROM planned_dive WHERE Id_Diver_Creator!="' . $id . '"');
      $planned = $plannedStatement->fetchALL(); ?>
      <?php $inscritStatement = $mysqlclient->query('SELECT * FROM dive_team INNER JOIN planned_dive ON dive_team.Planned_Dive_Id_Planned_Dive = planned_dive.Id_Planned_Dive INNER JOIN dive_team_member ON dive_team.Id_Dive_Team=dive_team_member.Dive_team_Id_Dive_Team WHERE dive_team_member.Diver_Id_Diver="' . $id . '" AND planned_dive.Id_Diver_Creator !="' . $id . '" ORDER BY planned_dive.Planned_Date ASC, planned_dive.Planned_Time ASC');
      $inscrit = $inscritStatement->fetchALL(); 
      
      if(!empty($inscrit)) :?>
  <section id="services">
    <h1>Mes plongées</h1>
      <?php
      foreach ($inscrit as $inscrit): ?>

        <?php if ($inscrit['Planned_Date'] >= date('Y-m-d')): ?>
          <div class="service-card">
            <a><img
          src="media/dive_site.png"
          ></a>
          <?php echo ('Date' . $inscrit['Planned_Date'] . '<br><br>Heure' . $inscrit['Planned_Time'] . ' ');
          echo ('Cliquez ici pour la voir :'); ?>

          <form action="palanquée.php" method="POST">
            <div class="mb-3 visually-hidden">
              <label for="id" class="form-label"></label>
              <input type="hidden" class="form-control" id="inscrit" name="inscrit"
                value="<?php echo ($inscrit['Id_Planned_Dive']); ?> ">
            </div>

            <button type="submit" class="custom-button">Consulter la palanquée</button>
          </form>
          <br>
          <?php if($diverInfo['privilege']==='admin') : ?>
          <form action="post_supprimer_palanquée.php" method="POST">
            <div class="mb-3 visually-hidden">
              <label for="id" class="form-label"></label>
              <input type="hidden" class="form-control" id="supprimer_inscrit" name="supprimer_inscrit"
                value="<?php echo ($inscrit['Id_Planned_Dive']); ?> ">
            </div>

            <button type="submit" class="btn btn-danger">Supprimer la palanquée</button>
          </form>
            </div>
            <?php endif; ?>
        <?php endif; ?>
      <?php endforeach; ?>
        </section>
        <?php endif; ?>
        <?php $creerStatement = $mysqlclient->query('SELECT * FROM dive_team INNER JOIN planned_dive ON dive_team.Planned_Dive_Id_Planned_Dive = planned_dive.Id_Planned_Dive WHERE planned_dive.Id_Diver_Creator="' . $id . '" ORDER BY planned_dive.Planned_Date ASC, planned_dive.Planned_Time ASC');
      $creer = $creerStatement->fetchALL(); 

      if(!empty($creer)): ?>

      <section id="services">
      <h1>Mes plongées crées</h1> 

      <?php foreach ($creer as $creer): ?>

        <?php if ($creer['Planned_Date'] >= date('Y-m-d')): ?>
          <div class="service-card">
            <a><img
          src="media/dive_site.png"
          ></a>
          <?php echo ('Vous avez créer une palanquée prévu à ' . $creer['Planned_Time'] . '<br><br>le ' . $creer['Planned_Date'] . ' ');
          echo ('Cliquez ici pour la voir :'); ?>

          <form action="palanquée.php" method="POST">
            <div class="mb-3 visually-hidden">
              <label for="id" class="form-label"></label>
              <input type="hidden" class="form-control" id="creer" name="creer"
                value="<?php echo ($creer['Id_Planned_Dive']); ?> ">
            </div>

            <button type="submit" class="custom-button">Consulter la palanquée</button>
          </form>
          <br>
          <form action="post_supprimer_palanquée.php" method="POST">
            <div class="mb-3 visually-hidden">
              <label for="id" class="form-label"></label>
              <input type="hidden" class="form-control" id="supprimer_creer" name="supprimer_creer"
                value="<?php echo ($creer['Id_Planned_Dive']); ?> ">
            </div>

            <button type="submit" class="btn btn-danger">Supprimer la palanquée</button>
          </form>
          
        </div>
        <?php endif; ?>
      <?php endforeach; ?>
        </section>
    <?php endif; ?>
    <?php

      $MaxInfoStat = $mysqlclient->query('SELECT * FROM dive_team  RIGHT JOIN dive_team_member ON dive_team.Id_Dive_Team=dive_team_member.Dive_team_Id_Dive_Team');
      $MaxInfo = $MaxInfoStat->fetchALL();

      $MaxInfo2Stat = $mysqlclient->query('SELECT * FROM dive_team_member');
      $MaxInfo2 = $MaxInfo2Stat->fetchALL();

      $inscriter2Statement = $mysqlclient->query('SELECT * FROM dive_team_member WHERE "' . $id . '"=Diver_Id_Diver');
      $inscriter = $inscriter2Statement->fetchALL();

      $inscrit2Statement = $mysqlclient->query('SELECT * FROM dive_team  RIGHT JOIN dive_team_member ON dive_team.Id_Dive_Team=dive_team_member.Dive_team_Id_Dive_Team WHERE "' . $id . '"=dive_team_member.Diver_Id_Diver AND dive_team.Diver_Id_Diver !="' . $id . '"');
      $inscrit2 = $inscrit2Statement->fetchALL();

      $palanquéeNonInscrit = array();
      $palanquéeNonInscrit[0] = NULL; ?>

      <?php if(!empty($planned)) :?>

      <section id="services">
        <h1>S'inscrire à une plongée</h1> 

      <?php if (empty($inscriter)): ?>

        <?php foreach ($planned as $planned): ?>

          <?php $nbDiver2Statement = $mysqlclient->query('SELECT * FROM dive_team WHERE Planned_Dive_Id_Planned_Dive="' . $planned['Id_Planned_Dive'] . '" AND Diver_Id_Diver!="' . $id . '"');
          $nbDiver2 = $nbDiver2Statement->fetch();

          ?>

          <?php if ($planned['Planned_Date'] >= date('Y-m-d')): ?>
            <div class="service-card">
            <a><img
          src="media/dive_site.png"
          ></a>
            <?php echo ('Date : ' . $planned['Planned_Date'] . ' <br><br>Heure : ' . $planned['Planned_Time'] . ' <br><br>Nombre de plongeurs : ' . $nbDiver2['Nb_actuel_divers'] . '/' . $nbDiver2['Max_Nb_Divers'] . ''); ?>

          <form action="post_inscription_dive.php" method="POST">
            <div class="mb-3 visually-hidden">
              <label for="id" class="form-label"></label>
              <input type="hidden" class="form-control" id="inscription_dive" name="inscription_dive"
                value="<?php echo ($planned['Id_Planned_Dive']); ?> ">
            </div>
            
            <button type="submit" class="custom-button">S'inscrire ➜</button>
          </form>

            <br>
          <?php if($diverInfo['privilege']==='admin') : ?>
          <form action="post_supprimer_palanquée.php" method="POST">
            <div class="mb-3 visually-hidden">
              <label for="id" class="form-label"></label>
              <input type="hidden" class="form-control" id="supprimer_planned" name="supprimer_planned"
                value="<?php echo ($planned['Id_Planned_Dive']); ?> ">
            </div>
            
            <button type="submit" class="btn btn-danger">Supprimer la palanquée</button>
          </form>
            
            <?php endif; ?>
            </div>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php endif; ?>



    <?php $i = 1;
    $i2 = 1;
    $izi = 0;
    $absent[0] = NULL ?>

    <?php if (!empty($inscriter)): ?>

      <?php foreach ($MaxInfo2 as $MaxInfo2): ?>
        <?php if ($MaxInfo2['Diver_Id_Diver'] === $id) {
          $present[] = $MaxInfo2['Dive_team_Id_Dive_Team'];
        } ?>
        <?php if ($MaxInfo2['Diver_Id_Diver'] !== $id) {

          $absent[] = $MaxInfo2['Dive_team_Id_Dive_Team'];
        } ?>

      <?php endforeach; ?>
      <? $palanquees = array_diff($absent, $present);
      $palanquees = array_unique($palanquees);
      foreach ($palanquees as $palanquees): ?>

        <? if (isset($palanquees)): ?>

          <? $nbDiverStatement = $mysqlclient->query('SELECT * FROM dive_team WHERE Id_Dive_Team="' . $palanquees . '"');
          $nbDiver = $nbDiverStatement->fetch();

          $nonInscritStatement = $mysqlclient->query('SELECT * FROM planned_dive WHERE Id_Planned_Dive="' . $nbDiver['Planned_Dive_Id_Planned_Dive'] . '"');
          $nonInscrit = $nonInscritStatement->fetch(); ?>

          <?php if ($nonInscrit['Planned_Date'] >= date('Y-m-d')): ?>
            <div class="service-card">
            <a><img
          src="media/dive_site.png"
          ></a>

            <?php if ($nbDiver['Nb_actuel_divers'] < $nbDiver['Max_Nb_Divers']): ?>


              <?php echo ('Date : ' . $nonInscrit['Planned_Date'] . ' <br><br>Heure : ' . $nonInscrit['Planned_Time'] . ' <br><br>Nombre de plongeurs : ' . $nbDiver['Nb_actuel_divers'] . '/' . $nbDiver['Max_Nb_Divers'] . ''); ?>
              </h1>
              <form action="post_inscription_dive.php" method="POST">
                <div class="mb-3 visually-hidden">
                  <label for="id" class="form-label"></label>
                  <input type="hidden" class="form-control" id="inscription_dive" name="inscription_dive"
                    value="<?php echo ($nonInscrit['Id_Planned_Dive']); ?> ">
                </div><br>

                <button type="submit" class="custom-button">S'inscrire ➜</button>
              </form>
              <br>
              <?php if($diverInfo['privilege']==='admin') : ?>
          <form action="post_supprimer_palanquée.php" method="POST">
            <div class="mb-3 visually-hidden">
              <label for="id" class="form-label"></label>
              <input type="hidden" class="form-control" id="supprimer_nonInscrit" name="supprimer_nonInscrit"
                value="<?php echo ($nonInscrit['Id_Planned_Dive']); ?> ">
                </div>

            <button type="submit" class="btn btn-danger">Supprimer la palanquée</button>
              </form>
                <?php endif; ?>

            <?php else: ?>

              <div class="alert alert-danger" role="alert">
                <?php echo ('Date : ' . $nonInscrit['Planned_Date'] . ' Heure : ' . $nonInscrit['Planned_Time'] . ' Nombre de plongeurs : ' . $nbDiver['Nb_actuel_divers'] . '/' . $nbDiver['Max_Nb_Divers'] . ''); ?>
                <?php echo ('Complet'); ?>
              </div>

              <?php if($diverInfo['privilege']==='admin') : ?>
          <form action="post_supprimer_palanquée.php" method="POST">
            <div class="mb-3 visually-hidden">
              <label for="id" class="form-label"></label>
              <input type="hidden" class="form-control" id="supprimer_nonInscrit" name="supprimer_nonInscrit"
                value="<?php echo ($nonInscrit['Id_Planned_Dive']); ?> ">
                </div>
                
            <div><button type="submit" class="btn btn-danger">Supprimer la palanquée</button></div>
              </form>
                <?php endif; ?>
              

            <?php endif; ?>
            </div>
          <?php endif; ?>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php endif; ?>
            </section>
    <?php endif; ?>  
    <br />
  </div>
  <footer>
    <p>&copy; 2023 Site de Plongée | Tous droits réservés</p>
  </footer>
</body>

</html>