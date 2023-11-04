<?php
session_start();
include_once('mysql.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Palanquée</title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="sections.css">
</head>

<body>
  <header>
    <?php include_once('header.php'); ?>
  </header>
  <section id="herooo">
    <div class="hero-content">
      <h1>Information sur la plongée</h1>
    </div>
  </section>
  <section>
    <table>
      <tr>
        <th>Date</th>
        <th>Site de plongée</th>
        <th>Heure</th>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>

    <?php

    $idDive = 0;

    $id = $_SESSION['LOGGED_USER'];
    if (isset($_POST['inscrit']) || isset($_POST['creer']) || isset($_POST['idDive'])) {
      if (isset($_POST['inscrit'])) {
        $idDive = $_POST['inscrit'];
      }

      if (isset($_POST['creer'])) {
        $idDive = $_POST['creer'];
      }

      if (isset($_POST['idDive'])) {
        $idDive = $_POST['idDive'];
      }
    }




    $diverStatement = $mysqlclient->query('SELECT * FROM diver WHERE Id_Diver="' . $id . '"');
    $diver = $diverStatement->fetch();

    $searchInfoTeam = $mysqlclient->query('SELECT * FROM dive_team WHERE "' . $idDive . '"= Planned_Dive_Id_Planned_Dive');
    $InfoTeam = $searchInfoTeam->fetch();

    $DPStatement = $mysqlclient->query('SELECT * FROM planned_dive WHERE "' . $idDive . '"=Id_Planned_Dive');
    $DP = $DPStatement->fetch();

    $DPinfoStatement = $mysqlclient->query('SELECT * FROM diver WHERE Id_Diver="' . $DP['Id_Diver_Creator'] . '"');
    $DPinfo = $DPinfoStatement->fetch();

    ?>
   <div class="par-content">
    <p>Directeur de plongée:
      <?php echo ('' . $DPinfo['Firstname'] . ' ' . $DPinfo['Lastname'] . '') ?></p><br> <p>Qualification:
      <?php echo ('' . $DPinfo['Instructor_Qualification'] . ' / ' . $DPinfo['Diver_Qualification']); ?>
    </p><br>
    <p>Signature du DP: <input type="text" /> Nombre de plongeurs:
      <?php echo ('' . $InfoTeam['Nb_actuel_divers'] . ' / ' . $InfoTeam['Max_Nb_Divers'] . ' (maximum)'); ?>
    </p><br>
    <p>Surveillance de surface: <input type="text"></p><br>
    <p>N° de tel du président: (+33) 6 00 00 00 00 N° de tel du responsable technique: (+33) 6 00 00 00 00 </p>
      </div>
  </section>
  <section>
    <br>
    <br>
    <h2>Fiche de sécurité</h2>
    <div class="tables-container">
      <table class="styled-table" title="Palanquée 1">
        <tr>
          <th>plongeurs
          </th>
          <th>Fonction</th>
          <th>Niveau</th>
          <th>Tech Exploration</th>
          <th>Nitrox(%)</th>

        </tr>
        
        <?php 
        $infoDiveTeamMember = $mysqlclient->query('SELECT * FROM dive_team_member WHERE Dive_team_Id_Dive_Team="' . $InfoTeam['Id_Dive_Team'] . '"');
        $DiveTeamMember = $infoDiveTeamMember->fetchALL();

        if ($InfoTeam['Nb_actuel_divers'] <= $InfoTeam['Max_Nb_Divers']):
          foreach ($DiveTeamMember as $DiveTeamMember):
            $infoDiverStat = $mysqlclient->query('SELECT * FROM diver WHERE Id_Diver="' . $DiveTeamMember['Diver_Id_Diver'] . '"');
            $infoDiver = $infoDiverStat->fetch(); 
            $infoDiver2Stat = $mysqlclient ->query('SELECT * FROM dive_team_member WHERE Diver_Id_Diver="'.$DiveTeamMember['Diver_Id_Diver']. '" AND Dive_team_Id_Dive_Team ="'. $InfoTeam['Id_Dive_Team'].'"');
            $infoDiver2 = $infoDiver2Stat->fetch(); ?>

            <tr>
              <td>
                <?php if ($DP['Id_Diver_Creator'] === $id || $diver['privilege']==='admin'): ?>
                  </form>
                  <form action="post_supprimer_membre_palanquée.php" method="POST">
                    <div class="mb-3 visually-hidden">
                      <label for="id" class="form-label"></label>
                      <input type="hidden" class="form-control" id="supprimer_membre_palanquée" name="supprimer_membre_palanquée"
                        value="<?php echo ($infoDiver['Id_Diver']); ?> ">
                    </div>

                    <button type="submit" class="btn btn-danger">Supprimer plongeur</button>
                  </form>
                  <?php endif; ?>


                <?php echo ('' . $infoDiver['Firstname'] . ' ' . $infoDiver['Lastname'] . ''); ?>
              </td>

              
              <?php if ($DP['Id_Diver_Creator'] === $id || $diver['privilege']==='admin'): ?>
                <form id="form_modif_info" action="modif_membre_palanquée.php" method="post">
                <td><input type="text" value="<?php if(isset($infoDiver2['Diver_Role'])){
                  echo($infoDiver2['Diver_Role']); }else{ echo(''); } ?>" id="Diver_Role" name="Diver_Role"></td>
              
              <td>
                <?php echo ('' . $infoDiver['Diver_Qualification'] . '/' . $infoDiver['Instructor_Qualification']); ?>
              </td>
                <td><input type="text" value="<?php if(isset($infoDiver2['tech_explo'])){
                  echo($infoDiver2['tech_explo']); }else{ echo(''); } ?>" id="tech_explo" name="tech_explo"></td>
                  
                  <td><input type="text" value="<?php if(isset($infoDiver2['Nox_Percentage'])){
                  echo($infoDiver2['Nox_Percentage']); }else{ echo(''); } ?>" id="Nox_percent" name="Nox_percent">
                                                          <input type="hidden" class="form-control" id="membre_id" name="membre_id" value="<?php echo($infoDiver['Id_Diver']); ?> ">
                                  <input type="hidden" class="form-control" id="id_dive_team" name="id_dive_team" value="<?php echo($InfoTeam['Id_Dive_Team']); ?> ">
                                    <button type="submit" class="btn btn-danger">Modifier info plongeur</button></td>
                </form>
                <?php else: ?>
              
                
                <td><input type="text" value="<?php if(isset($infoDiver2['Diver_Role'])){
                  echo($infoDiver2['Diver_Role']); }else{ echo(''); } ?>" id="Diver_Role" name="Diver_Role" readonly></td>
              
              <td>
                <?php echo ('' . $infoDiver['Diver_Qualification'] . '/' . $infoDiver['Instructor_Qualification']); ?>
              </td>
                <td><input type="text" value="<?php if(isset($infoDiver2['tech_explo'])){
                  echo($infoDiver2['tech_explo']); }else{ echo(''); } ?>" id="tech_explo" name="tech_explo" readonly></td>
                  
                  <td><input type="text" value="<?php if(isset($infoDiver2['Nox_Percentage'])){
                  echo($infoDiver2['Nox_Percentage']); }else{ echo(''); } ?>" id="Nox_percent" name="Nox_percent" readonly></td>
                  <?php endif ; ?>
            </tr>
          <?php endforeach; ?> 
        <?php endif; ?>
      </table>
      <table class="styled-table"> 
        <tr>
          <th colspan="2">parametres 
          </th>
          <th rowspan="2">paliers</th> 
        </tr>
        <tr>
          <th>Prévu</th>
          <th>Réalisés</th>
        </tr>
        <tr>
          <td>
            <input type="text" name="Prof_Prevu">m<br>
          </td>

          <td>
            <input type="text" name="Prof_Realise">m<br>
          </td>

          <td>3m : <input type="time" name="Tps_Palier1"> mn</td>
        </tr>
        <tr>
          <td>
            <input type="time" name="Tps_Prevu">mn<br>
          </td>

          <td>
            <input type="time" name="Tps_Realise">mn<br>

          </td>

          <td>6m : <input type="time" name="Tps_Palier2"> mn<br></td>
        </tr>
        <tr>
          <td>



          </td>

          <td>

           </td>

          <td>9m : <input type="time" name="Tps_Palier3"> mn</td>
        </tr>
        <tr>
          <td>

            Heure de départ :
          </td>

          <td>
            <input type="text" name="Start_Time">h
          </td>

          <td>H de retour : <input type="text" name="Stop_Time"> h</td>
        </tr>


      </table>
    </div>


  </section>
    

  <div class="par-content">
  <p><b>Rappel matériel :</b> 1 parachute de palier par palanquée, 2 sources d’air distinct pour le GP, 2ème source d’air si plus de 20m.</p>

                </div>


  <footer>
    <p>&copy; 2023 Site de Plongée | Tous droits réservés</p>
  </footer>
</body>

</html>