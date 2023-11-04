<?php session_start();
    include_once('mysql.php');
 ?>

 <?php if(isset($_POST['supprimer_creer'])) {

    $supprimer_palanquée=$_POST['supprimer_creer'];
 }
 if(isset($_POST['supprimer_planned'])){

    $supprimer_palanquée=$_POST['supprimer_planned'];
 }
if(isset($_POST['supprimer_inscrit'])) {

    $supprimer_palanquée=$_POST['supprimer_inscrit'];
}
if(isset($_POST['supprimer_nonInscrit'])) {

    $supprimer_palanquée=$_POST['supprimer_nonInscrit'];

}
    $suppPalanquée = $mysqlclient->prepare('DELETE FROM planned_dive WHERE Id_Planned_Dive="'.$supprimer_palanquée.'"');
    $suppPalanquée->execute();
 ?>

<script type="text/javascript">
                     alert('La palanquée a bien été supprimée');
               </script>
               <meta http-equiv="Refresh" content="0;URL=Reservation2.php">
