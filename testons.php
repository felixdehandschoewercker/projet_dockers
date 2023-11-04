<form action="testons2.php" method="POST">
              <div class="mb-3 visually-hidden">
                  <label for="id" class="form-label"></label>
                  <input type="hidden" class="form-control" id="id" name="id" value="<?php echo(1); ?> ">
              </div>
              
              <button type="submit" class="btn btn-danger">Palanquée</button>
          </form>

          <?php foreach($MaxInfo as $MaxInfo) : ?>

<?php foreach($inscrit2 as $inscrit3) : ?>

   <?php if($MaxInfo['Id_Dive_Team'] !== $inscrit3['Dive_team_Id_Dive_Team']) : ?>

        <?php   
            $palanquéeNonInscrit[$i]=$MaxInfo['Planned_Dive_Id_Planned_Dive'];
            $i=$i+1;

         ?>

    <?php endif; ?>
<?php endforeach; ?>

<?php if(!empty($palanquéeNonInscrit)): ?>

<?php if(!isset($palanquéeNonInscrit[$i2])){
    $palanquéeNonInscrit[$i2]='c moi félix';

} ?>

<?php if(!isset($palanquéeNonInscrit[$i2-1])){
    $palanquéeNonInscrit[$i2-1]='c toi félix';
} ?>

<?php if($palanquéeNonInscrit[$i2] !== $palanquéeNonInscrit[$i2-1]): ?>

<?php if($palanquéeNonInscrit[$i2]!==$MaxInfo['Planned_Dive_Id_Planned_Dive']):?>

<?php $nonInscritStatement = $mysqlclient->query('SELECT * FROM planned_dive WHERE Id_Planned_Dive="'.$palanquéeNonInscrit[$i2].'"');
$nonInscrit= $nonInscritStatement->fetch();

$nbDiverStatement= $mysqlclient->query('SELECT * FROM dive_team WHERE Planned_Dive_Id_Planned_Dive="'.$palanquéeNonInscrit[$i2].'"');
$nbDiver=$nbDiverStatement->fetch(); ?>

        
    <?php echo('Date : ' .$nonInscrit['Planned_Date']. ' Heure : ' .$nonInscrit['Planned_Time']. ' Nombre de plongeurs : ' .$nbDiver['Nb_actuel_divers']. '/' .$nbDiver['Max_Nb_Divers']. ''); ?>
            </h1>
            <form action="post_inscription_dive.php" method="POST">
                <div class="mb-3 visually-hidden">
                    <label for="id" class="form-label"></label>
                    <input type="hidden" class="form-control" id="inscription_dive" name="inscription_dive" value="<?php echo($nonInscrit['Id_Planned_Dive']); ?> ">
                </div>
                
                <button type="submit" class="btn btn-danger">S'inscrire à la plongée</button>
            </form>
    <?php $i2=$i2 + 1; 
    $izi =$izi +1;?>

    <?php endif; ?>
    <?php endif;?>
<?php endif; ?>    
<?php endforeach; ?>
<?php endif; ?>

<?php if($i>0): ?>

<?php if($MaxInfo[$i]['Planned_Dive_Id_Planned_Dive'] !== $MaxInfo[$i-1]['Planned_Dive_Id_Planned_Dive']) :?>

        
    <?php echo('Date : ' .$nonInscrit['Planned_Date']. ' Heure : ' .$nonInscrit['Planned_Time']. ' Nombre de plongeurs : ' .$nbDiver['Nb_actuel_divers']. '/' .$nbDiver['Max_Nb_Divers']. ''); ?>
            </h1>
            <form action="post_inscription_dive.php" method="POST">
                <div class="mb-3 visually-hidden">
                    <label for="id" class="form-label"></label>
                    <input type="hidden" class="form-control" id="inscription_dive" name="inscription_dive" value="<?php echo($nonInscrit['Id_Planned_Dive']); ?> ">
                </div>
                
                <button type="submit" class="btn btn-danger">S'inscrire à la plongée</button>
            </form>
       <?php $i=$i+1;
       endif; ?>
<?php endif;?>
<?php endforeach;?>
<?php endif;?>

<?php 
        if(!isset($absent[$i])){
            $absent[$i]=$absent[$i-1];
        } 
        ?>
        <?php 
        if(!isset($absent[$i-1])){
            $absent[$i-1]='c moi felix';
        } 
        ?>
        <?php if($absent[$i]!==$absent[$i-1]) : ?>
            <? var_dump($absent[$i]); ?>
        <? $nonInscritStatement = $mysqlclient->query('SELECT * FROM planned_dive WHERE Id_Planned_Dive="'.$absent[$i].'"');
        $nonInscrit= $nonInscritStatement->fetch();

        $nbDiverStatement= $mysqlclient->query('SELECT * FROM dive_team WHERE Planned_Dive_Id_Planned_Dive="'.$absent[$i].'"');
        $nbDiver=$nbDiverStatement->fetch(); ?>
        
        <?php echo('Date : ' .$nonInscrit['Planned_Date']. ' Heure : ' .$nonInscrit['Planned_Time']. ' Nombre de plongeurs : ' .$nbDiver['Nb_actuel_divers']. '/' .$nbDiver['Max_Nb_Divers']. ''); ?>
        </h1>
        <form action="post_inscription_dive.php" method="POST">
            <div class="mb-3 visually-hidden">
                <label for="id" class="form-label"></label>
                <input type="hidden" class="form-control" id="inscription_dive" name="inscription_dive" value="<?php echo($nonInscrit['Id_Planned_Dive']); ?> ">
            </div>
            
            <button type="submit" class="btn btn-danger">S'inscrire à la plongée</button>
        </form>
        <?php endif; ?>
        <?php endif; ?>
        <?php endforeach; ?>
       <?php endif; ?> 
