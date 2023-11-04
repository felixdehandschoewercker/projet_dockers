<?php
session_start();
include_once('mysql.php');

    // récupération des valeurs du formulaire
    $Planned_Date = $_POST['planned-date'];
    $Planned_time = $_POST['planned-time'];
    $Comments = $_POST['Comments'];
    $Max_Diver=$_POST['Nb_divers'];
    $id= $_SESSION['LOGGED_USER'];

    $searchInfoDiver= $mysqlclient -> query('SELECT * FROM diver WHERE Id_Diver="'.$id.'"');
    $searchInfoDiver->fetch();
    
    // fetch(PDO::FETCH_ASSOC['Diver_Qualification'])

    // $niveau=$searchInfoDiver['Diver_Qualification'];
    // $monitoring=$searchInfoDiver['Instructor_Qualification'];

    


    // préparation de la requête SQL
    $insertInfoPlannedDive = $mysqlclient->prepare("INSERT INTO planned_dive(Planned_Date, Planned_Time, Comments, Diver_Id_Diver, Id_Diver_Creator) VALUES (:Planned_Date,:Planned_Time,:Comments, :Diver_Id_Diver, :Id_Diver_Creator)");
    $insertInfoPlannedDive -> execute([
        'Planned_Date' =>$Planned_Date,
        'Planned_Time' =>$Planned_time,
        'Comments' =>$Comments,
        'Diver_Id_Diver' =>$id,
        'Id_Diver_Creator' =>$id,

    ]); 

    $searchInfoPlannedDive = $mysqlclient->query('SELECT * FROM planned_dive WHERE Id_Diver_Creator ="'.$id.'" && Planned_Date="'.$Planned_Date.'" && Planned_Time="'.$Planned_time.'" ORDER BY Id_Planned_Dive DESC');
    $infoPlannedDive = $searchInfoPlannedDive ->fetch();


    // $insertInfoComp = $mysqlclient-> prepare('INSERT INTO dive_team_composition(Max_Diver, Dive_Guide_Qualification) VALUES (:Max_Diver, :Dive_Guide_Qualification)');
    // $insertInfoComp -> execute([
    //     'Max_Diver'=>$Max_Diver,
    //     'Dive_Guide_Qualification'=>$niveau,

    // ]);

    

    $insertInfoTeam = $mysqlclient->prepare('INSERT INTO dive_team(Diver_Id_Diver, Start_Time, Planned_Dive_Id_Planned_Dive, Max_Nb_Divers, Nb_actuel_divers) VALUES (:Diver_Id_Diver, :Start_Time, :Planned_Dive_Id_Planned_Dive, :Max_Nb_Divers, :Nb_actuel_divers)');
    $insertInfoTeam->execute([
        'Diver_Id_Diver' => $id,
        'Start_Time' => $Planned_time,
        'Planned_Dive_Id_Planned_Dive' => $infoPlannedDive['Id_Planned_Dive'],
        'Max_Nb_Divers' => $Max_Diver,
        'Nb_actuel_divers' => 1,
    ]);

    $searchInfoTeam = $mysqlclient->query('SELECT * FROM dive_team WHERE Planned_Dive_Id_Planned_Dive="'.$infoPlannedDive['Id_Planned_Dive'].'"');
    $infoTeam=$searchInfoTeam->fetch();

    $insertDiveTeamMember= $mysqlclient ->prepare('INSERT INTO dive_team_member(Diver_Id_Diver, Dive_team_Id_Dive_Team, Number_Diver_Team) VALUES (:Diver_Id_Diver, :Dive_team_Id_Dive_Team, :Number_Diver_Team)');
    $insertDiveTeamMember->execute([
        'Diver_Id_Diver'=>$id,
        'Dive_team_Id_Dive_Team'=>$infoTeam['Id_Dive_Team'], 
        'Number_Diver_Team'=>1,
    ]);


    ?>

<?php 
header('Location: Reservation2.php');
?>


