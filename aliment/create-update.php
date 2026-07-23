<?php
require_once("../header.php");
if(isset($_POST['id'])) :
    $sql="SELECT * FROM aliment WHERE id_aliment = ?";
    $stmt=$db->prepare($sql);
    $stmt->execute([$_POST['id']]);
    $aliment = $stmt->fetch(PDO::FETCH_ASSOC);
endif;
print_r($_POST);
?>
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <form action="<?= SITE_URL; ?>/aliment/result.php" method="POST">
                    <div class="card">
                        <div class="card-header">
                            <?= isset($aliment['id_aliment']) ? 'Modification d\'un ' : 'Création d\'un' ?> aliment
                        </div>
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingCode" placeholder="CodeAliment" name="code" value="<?= isset($aliment['code_aliment']) ? $aliment['code_aliment'] : ''; ?>" required>
                                <label for="floatingCode">Code</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingNom" placeholder="Nom" name="nom" value="<?= isset($aliment['nom_aliment']) ? $aliment['nom_aliment'] : ''; ?>" required>
                                <label for="floatingNom">Nom</label>
                            </div>
                            <div class="form-floating">
                                <input type="number"  class="form-control" id="floatingStock" placeholder="Stock" name="stock" value="<?= isset($aliment['stock_aliment']) ? $aliment['stock_aliment'] : ''; ?>" required>
                                <label for="floatingStock">Stock</label>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <?php if(isset($aliment['id_aliment'])) : ?>
                                <input type="hidden" name="id" value="<?= $aliment['id_aliment']; ?>">
                                <button type="submit" name="action" value="update" class="btn btn-primary btn-sm">
                                    Modifier un aliment</button>
                            <?php else : ?>
                                <button type="submit" name="action" value="create" class="btn btn-primary btn-sm">
                                    Ajouter un aliment</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
    require_once("../footer.php");