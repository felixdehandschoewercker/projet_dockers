<?php session_start();
include_once('mysql.php');

$IdDiver=$_POST['membre_id'];
echo($IdDiver);
$idDiveTeam=$_POST['id_dive_team'];

$infoDiveMemberStatement = $mysqlclient->query('SELECT * FROM dive_team_member WHERE Diver_Id_Diver="'.$IdDiver.'" AND Dive_team_Id_Dive_Team = "'.$idDiveTeam.'"');
$infoDiveMember = $infoDiveMemberStatement->fetch();

if(!isset($_POST['Diver_Role']) || empty($_POST['Diver_Role'])){
        $Diver_Role=$infoDiveMember['Diver_Role'];
}
else {
    $Diver_Role=$_POST['Diver_Role'];
}

if(!isset($_POST['tech_explo']) || empty($_POST['tech_explo'])){
    $tech_explo=$infoDiveMember['tech_explo'];
}

else{
    $tech_explo=$_POST['tech_explo'];
}

if(!isset($_POST['Nox_percent']) || empty($_POST['Nox_percent'])){
    $Nox_percent=$idDiveTeam['Nox_Percentage'];
}

else{
    $Nox_percent=($_POST['Nox_percent']);
}

$modifInfo= $mysqlclient->prepare('UPDATE dive_team_member SET Diver_Role= :Diver_Role, tech_explo= :tech_explo, Nox_Percentage= :Nox_Percentage WHERE Diver_Id_Diver= :Diver_Id_Diver AND Dive_team_Id_Dive_Team = :Dive_team_Id_Dive_Team');
$modifInfo ->execute([
    'Diver_Role' => $Diver_Role,
    'tech_explo' => $tech_explo,
    'Nox_Percentage' =>$Nox_percent,
    'Diver_Id_Diver' => $IdDiver,
    'Dive_team_Id_Dive_Team' =>$idDiveTeam,
]); 

?>

<script type="text/javascript">
                     alert('Informations modifiés');
               </script>
               <meta http-equiv="Refresh" content="0;URL=Reservation2.php"> 


