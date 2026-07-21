<?php
require_once("../header.php");
print_r($_POST);
?>
<div class="container">
    <div class="row">
        <div class="col">
            <?php
            if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['poste']) && isset($_POST['id'])) :
                if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['poste']) || empty($_POST['id'])) :
                    ?>
                    <div class="alert alert-danger">
                        Erreur, un champ est vide !
                    </div>
                <?php
                else:
                    try{
                        $sql = "UPDATE employe SET nom_emp= :nom, prenom_emp= :prenom, poste_emp= :poste WHERE id_employe= :id";
                        $stmt = $db->prepare($sql);
                        $stmt->bindValue(':nom', trim($_POST['nom']));
                        $stmt->bindValue(':prenom', trim($_POST['prenom']));
                        $stmt->bindValue(':poste', trim($_POST['poste']));
                        $stmt->bindValue(':id', ($_POST['id']),PDO::PARAM_INT);
                        $stmt->execute(); ?>
                        <div class="alert alert-success">
                            L'employé a bien été modifié.
                        </div>
                        <?php
                    } catch(PDOException $e){
                        echo $e->getMessage();
                    }
                endif;
            else :
                ?>
                <div class="alert alert-danger">
                    Erreur, il manque des champs !
                </div>
            <?php
            endif;
            ?>
        </div>
    </div>
</div>