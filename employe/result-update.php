<?php
require_once("../header.php"); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <?php
            if (isset($_GET['id'])):
                if(empty($_GET['id'])):
                    ?>
                    <div class="alert alert-danger">
                        Erreur, l'ID n'existe pas !
                    </div>
                <?php
                else:
                    try{
                        $sql = "DELETE FROM employe WHERE id_employe = ?";
                        $stmt = $db->prepare($sql);
                        $stmt->execute([$_GET['id']]);
                        ?>
                        <div class="alert alert-success">
                            L'employé a bien été supprimé.
                        </div>
                        <?php
                    } catch(PDOException $e){
                        echo $e->getMessage();
                    }
                endif;
            else:
                ?>
                <div class="alert alert-danger">
                    Erreur, il n'y a pas d'id !
                </div>
            <?php
            endif;
            ?>
        </div>
    </div>
</div>
