<?php 
session_start();
include_once('mysql.php');

    // récupération des valeurs du formulaire
    $idDive=$_POST['inscription_dive'];
    $id= $_SESSION['LOGGED_USER'];

    $searchInfoDiver= $mysqlclient -> query('SELECT * FROM diver WHERE Id_Diver="'.$id.'"');
    $searchInfoDiver->fetch();
    
    // fetch(PDO::FETCH_ASSOC['Diver_Qualification'])

    // $niveau=$searchInfoDiver['Diver_Qualification'];
    // $monitoring=$searchInfoDiver['Instructor_Qualification'];

    $searchInfoPlannedDive = $mysqlclient->query('SELECT * FROM planned_dive WHERE Id_Planned_Dive="'.$idDive.'"');
    $infoPlannedDive = $searchInfoPlannedDive ->fetch();

    $searchInfoTeam = $mysqlclient->query('SELECT * FROM dive_team WHERE Planned_Dive_Id_Planned_Dive="'.$idDive.'"');
    $infoTeam=$searchInfoTeam->fetch();

    // $insertInfoComp = $mysqlclient-> prepare('INSERT INTO dive_team_composition(Max_Diver, Dive_Guide_Qualification) VALUES (:Max_Diver, :Dive_Guide_Qualification)');
    // $insertInfoComp -> execute([
    //     'Max_Diver'=>$Max_Diver,
    //     'Dive_Guide_Qualification'=>$niveau,

    // ]);

    var_dump($infoTeam);

    $nbActuelDivers=$infoTeam['Nb_actuel_divers'] +1;

    $infoTeamInsert = $mysqlclient->prepare('UPDATE dive_team SET Nb_actuel_divers = :Nb_actuel_divers WHERE Planned_Dive_Id_Planned_Dive = :Planned_Dive_Id_Planned_Dive');
    $infoTeamInsert->execute([
        'Nb_actuel_divers' => $nbActuelDivers,
        'Planned_Dive_Id_Planned_Dive' => $idDive,
    ]);

    $IdDiveTeam=$infoTeam['Id_Dive_Team'];

    $insertDiveTeamMember= $mysqlclient-> prepare('INSERT INTO dive_team_member(Diver_Id_Diver, Dive_team_Id_Dive_Team, Number_Diver_Team) VALUES (:Diver_Id_Diver, :Dive_team_Id_Dive_Team, :Number_Diver_Team)');
    $insertDiveTeamMember->execute([
        'Diver_Id_Diver'=>$id,
        'Dive_team_Id_Dive_Team'=>$IdDiveTeam, 
        'Number_Diver_Team'=>$nbActuelDivers,

    ]);

    ?>

<script type="text/javascript">
                     alert('Vous êtes bien inscrit à la palanquée');
               </script>
               <meta http-equiv="Refresh" content="0;URL=Reservation2.php">


