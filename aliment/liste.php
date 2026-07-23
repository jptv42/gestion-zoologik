<?php
require_once("../header.php");
?>
<div class="container">
        <div class="row mb-3">
            <div class="col">
                   <div class="text-center">
                       <h1>Liste des aliments</h1>
                   </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <a href="<?=SITE_URL;?>/aliment/create-update.php" class="btn btn-sm btn-primary">
                    <i class="fa-solid fa-circle-plus"></i>Ajouter un aliment
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                 <table class="table table-hover">
                     <thead>
                     <th>#</th>
                     <th>Code</th>
                     <th>Nom aliment</th>
                     <th>Stock aliment</th>
                     <th>Actions</th>
                     </thead>
                     <tbody>

                        <div class="row">
                            <div class="card">
                                <div class="card">
                                    <?php
                                        $stmt=$db->query("SELECT * FROM aliment");
                                        $rows=$stmt->fetchAll();
                                        foreach($rows as $aliment):
                                    ?>
                                        <tr>
                                            <td><?=$aliment['id_aliment'];?></td>
                                            <td><?=$aliment['code_aliment'];?></td>
                                            <td><?=$aliment['nom_aliment'];?></td>
                                            <td><?=$aliment['stock_aliment'];?></td>
                                            <td>

                                                <form action="<?= SITE_URL; ?>/aliment/create-update.php" method="POST" class="d-inline">
                                                    <input type="hidden" name="id" value="<?= $aliment['id_aliment']; ?>">
                                                    <button type="submit" class="btn btn-primary btn-sm me-1">
                                                        <i class="fa fa-solid fa-pencil"></i>
                                                    </button>
                                                </form>

                                                <form action="<?= SITE_URL; ?>/aliment/result.php" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet aliment')">
                                                    <input type="hidden" name="id" value="<?= $aliment['id_aliment']; ?>">
                                                    <button type="submit" class="btn btn-danger btn-sm me-1" name="action" value="delete">
                                                        <i class="fa fa-solid fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                        endforeach;
                                    ?>

                                </div>
                            </div>
                        </div>
                     </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require_once("../footer.php");