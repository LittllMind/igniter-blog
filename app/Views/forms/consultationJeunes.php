<?php
$validation = \Config\Services::validation(); ?>

<div class="entete">

  <h2>Conseil Départemental d'accès au droit de Vaucluse</h2>
  <br>
  <h3>Permanence Jeunes / Enfants <br> Fiche de consultation</h3>
</div>

<div class="form-global">

  <form class="" action="<?php echo base_url('/submit-jeune') ?>" method="post" id="submit-generaliste">
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
        <select multiple class="form-control" id="lieu_permanence" name="lieu_permanence">
          <option>Avignon Tribunal - PJ</option>
          <option>Avignon Mission Locale</option>
          <option>Carpentas - PJ</option>
          <option>Pertuis - PJ</option>
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
        <label for="sexe">Sexe</label>
        <select class="form-control" id="sexe" name="sexe">
          <option>Masculin</option>
          <option>Feminin</option>
          <option>Non précisé</option>
        </select>
      </div>

      <div class="form-group">
        <label for="age">Âge</label>
        <select class="form-control" id="ressources_mensuelles" name="age">
          <option>- de 7 ans</option>
          <option>7 - 10 ans</option>
          <option>10 - 18 ans</option>
          <option>18 - 25 ans</option>
        </select>
      </div>

      <div class="form-group">
        <label for="activite">Activité</label>
        <select class="form-control" id="activite" name="activite">
          <option>Non scolarisé</option>
          <option>Scolarisé</option>
          <option>Étudiant</option>
          <option>Sans Emploi</option>
          <option>Demandeur d'emploi</option>
          <option>Célibataire avec enfant(s)</option>
        </select>
      </div>

      <div class="form-group">
        <label  for="activite_autre">Autre :</label>
        <input  type="text"
                class="form-control"
                id="activite_autre"
                name="activite_autre"
                placeholder=""
                required="true">
        <!-- Error -->
        <?php if ($validation->getError('activite_autre')) {?>
            <div class="alert alert-danger mt-2">
                <?= $error = $validation->getError('activite_autre'); ?>
            </div>
        <?php }?>
      </div>


    <div class="entete">
      <h3>Prise de contact / orientation par :</h3>
    </div>

      <div class="form-group">
        <label for="orientation"></label>
        <select class="form-control" id="orientation" name="orientation">
          <option>École</option>
          <option>Parent</option>
          <option>Institution</option>
        </select>
      </div>

      <div class="entete">
        <h3>Domaine juridique sollicité</h3>
      </div>

      <div class="form-group">
        <label for="domaine_juridique"></label>
        <select multiple class="form-control" id="domaine_juridique" name="domaine_juridique">
          <option>Droit pénal / infraction</option>
          <option>Assistance éducative</option>
          <option>Droit immobilier / locatif</option>
          <option>Consommation / contrats</option>
          <option>Droit pénal / victime</option>
          <option>Droit des étrangers</option>
          <option>Droit du travail</option>
          <option>Droit sécurité sociale</option>
          <option>Droit de la famille</option>
          <option>Responsabilité civile</option>
          <option>Surendettement</option>
          <!-- <option>Droit des tutelles</option> -->
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
          <option>Orientation juridique vers avocat, notaire, huissier</option>
          <option>Orientation juridique vers une association</option>
          <option>Orientation juridique vers une juridiction compétente</option>
          <option>Orientation juridique vers affaires familliales 388-1</option>
          <option>Orientation juridique vers assistance éducative</option>
          <option>Constitution dossier AJ</option>
          <option>Autre orientation</option>
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
