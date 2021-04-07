<?php
$validation = \Config\Services::validation(); ?>

<div class="entete">

  <h2>Conseil Départemental d'accès au droit de Vaucluse</h2>
  <br>
  <h3>Permanence juridique gratuite d'avocat <br> Fiche de consultation</h3>
</div>

<div class="form-global">

  <form class="" action="<?php echo base_url('/submit-eco') ?>" method="post" id="submit-generaliste">
      <?= csrf_field() ?>

      <div class="form-group">
        <label  for="nom_intervenant">Nom de l'intervenant</label>
        <input  type="text"
                class="form-control"
                id="nom_intervenant"
                name="nom_intervenant"
                placeholder=""
                required="true">
        <!-- Error -->
        <?php if ($validation->getError('nom_intervenant')) {?>
            <div class="alert alert-danger mt-2">
                <?= $error = $validation->getError('nom_intervenant'); ?>
            </div>
        <?php }?>
      </div>

      <div class="form-group">
        <label  for="date_permanence">Date de la permanece</label>
        <input  type="date"
                class="form-control"
                id="date_permanence"
                name="date_permanence"
                placeholder=""
                required="true">
        <!-- Error -->
        <?php if ($validation->getError('date_permanence')) {?>
            <div class="alert alert-danger mt-2">
                <?= $error = $validation->getError('date_permanence'); ?>
            </div>
        <?php }?>
      </div>

      <div class="form-group">
        <label for="lieu_permanence">Lieu de la permanence</label>
        <select class="form-control" id="lieu_permanence" name="lieu_permanence">
          <option>Avignon - MJD - PJ</option>
          <option>Pertuis - PJ</option>
          <option>Sorgues - EFS</option>
        </select>
      </div>

    <div class="entete">
      <h3>Situation personnelle du consultant</h3>
    </div>

      <div class="form-group">
          <label  for="commune_residence">Commune de résidence</label>
          <input  type="text"
                  class="form-control"
                  id="commune_residence"
                  name="commune_residence"
                  placeholder=""
                  required="true">
      <!-- Error -->
      <?php if ($validation->getError('commune_residence')) {?>
          <div class="alert alert-danger mt-2">
              <?= $error = $validation->getError('commune_residence'); ?>
          </div>
      <?php }?>
      </div>

      <div class="form-group">
        <label for="commune_implentation">Commune d'implentation professionelle (actuelle ou future)</label>
        <input  type="text"
                class="form-control"
                id="commune_implentation"
                name="commune_implentation"
                placeholder=""
                required="true">
      </div>
      <!-- Error -->
      <?php if ($validation->getError('commune_implentation')) {?>
        <div class="alert alert-danger mt-2">
            <?= $error = $validation->getError('commune_implentation'); ?>
        </div>
      <?php }?>

      <div class="form-group">
        <label for="ressources_mensuelles">Ressources mensuelles (Moyenne)</label>
        <input  type="number"
                class="form-control"
                id="ressources_mensuelles"
                name="ressources_mensuelles"
                placeholder=""
                required="true">
      </div>
      <!-- Error -->
      <?php if ($validation->getError('ressources_mensuelles')) {?>
        <div class="alert alert-danger mt-2">
            <?= $error = $validation->getError('ressources_mensuelles'); ?>
        </div>
      <?php }?>


      <div class="form-group">
        <label for="status_entrepreneur">Si entrepreuneur en exercice :</label>
        <select class="form-control" id="status_entrepreneur" name="status_entrepreneur">
          <option>Artisant</option>
          <option>Commerçant</option>
          <option>Agriculteur</option>
          <option>Proffession libérales</option>
          <option>Dirigeant Associatif</option>
        </select>
      </div>

      <div class="form-group">
        <label for="situation_entrepreneur">Si projet en création d'entreprise</label>
        <select class="form-control" id="situation_entrepreneur" name="situation_entrepreneur">
          <option>En activité</option>
          <option>Demandeur d'emploi</option>
        </select>
      </div>


    <div class="entete">
      <h3>Prise de contact / orientation par :</h3>
    </div>

      <div class="form-group">
        <label for="orientation"></label>
        <select class="form-control" id="orientation" name="orientation">
          <option>Juridiction</option>
          <option>Service social</option>
          <option>Mairie</option>
          <option>Autre</option>
        </select>
      </div>


    <div class="entete">
      <h3>Domaine juridique sollicité</h3>
    </div>


      <div class="form-group">
        <label for="domaine_juridique"></label>
        <select multiple class="form-control" id="domaine_juridique" name="domaine_juridique">
          <option>Droit des sociétés</option>
          <option>Droit commercial</option>
          <option>Démarches administrative</option>
          <option>Fiscalité / cotisation</option>
          <option>Droit social</option>
          <option>Droit des assurances</option>
          <option>Droit des contrats</option>
          <option>Responsabilité civile</option>
        </select>
      </div>

      <div class="form-group">
        <label for="domaine_juridique_autre">Autres</label>
        <input  type="text"
                class="form-control"
                id="domaine_juridique_autre"
                name="domaine_juridique_autre"
                placeholder="">
      </div>


    <div class="entete">
      <h3>Nature de l'entretien :</h3>
    </div>


      <div class="form-group">
        <label for="nature_entretien"></label>
        <select multiple class="form-control" id="nature_entretien" name="nature_entretien">
          <option>Droit Information juridique</option>
          <option>Orientation juridique vers avocat</option>
          <option>Orientation juridique vers notaire</option>
          <option>Orientation juridique vers huissier</option>
          <option>Orientation juridique vers expert-comptable</option>
          <option>Orientation juridique vers une juridiction - TC</option>
          <option>Orientation juridique vers une juridiction - TJ</option>
          <option>Orientation juridique vers une juridiction - CPH</option>
          <option>Orientation juridique vers une juridiction - Autre</option>
          <option>Orientation juridique vers - CCI</option>
          <option>Orientation juridique vers - Chambre des métiers</option>
          <option>Orientation juridique vers - Pôle</option>
          <option>Prevention du TC - cellule d'accompagnement du CIP</option>
          <option>Prevention du TC - autre</option>
        </select>
      </div>

      <div class="form-group">
        <label for="precision">Précisions</label>
        <input  type="text"
                class="form-control"
                id="precision"
                name="precision"
                placeholder="">
      </div>



      <button type="submit" name="submit" class="btn btn-primary btn-block">Valider</button>

    </form>


</div>
