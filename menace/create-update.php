<?php
require_once("../header.php");
if(isset($_POST['id'])) :
    $sql = "SELECT * FROM menace WHERE id_menace = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$_POST['id']]);
    $menace = $stmt->fetch(PDO::FETCH_ASSOC);
endif;
?>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="<?= SITE_URL; ?>/menace/result.php" method="POST">
                    <div class="card">
                        <div class="card-header">
                            <?= isset($menace['id_menace']) ? 'Modification de la' : 'Création d\'une' ?> menace
                        </div>
                        <div class="card-body">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingLibelle" placeholder="Libelle" name="libelle" value="<?= isset($menace['libelle_menace']) ? $menace['libelle_menace'] : ''; ?>" required>
                                <label for="floatingLibelle">Libelle</label>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <?php if(isset($menace['id_menace'])) : ?>
                                <input type="hidden" name="id" value="<?= $menace['id_menace']; ?>">
                                <button type="submit" name="action" value="update" class="btn btn-primary btn-sm">Modifier la menace</button>
                            <?php else : ?>
                                <button type="submit" name="action" value="create" class="btn btn-primary btn-sm">Ajouter une menace</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
require_once("../footer.php");
?>