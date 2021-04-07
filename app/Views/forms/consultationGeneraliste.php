<?php
$validation = \Config\Services::validation(); ?>

<div class="entete">

  <h2>Conseil Départemental d'accès au droit de Vaucluse</h2>
  <br>
  <h3>Permanence juridique gratuite d'avocat <br> Fiche de consultation</h3>
</div>

<div class="form-global">

  <form class="" action="<?php echo base_url('/submit-generaliste') ?>" method="post" id="submit-generaliste">
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
          <option>Apt - PJ</option>
          <option>Avignon - MJD - PJ</option>
          <option>Avignon Tribunal - PJ</option>
          <option>Bollène - PJ</option>
          <option>Carpentas - PJ</option>
          <option>Cucuron - MSAP</option>
          <option>Isle-sur-la-Sorgue - PJ</option>
          <option>La Bastide-des-Jourdans - MSAP</option>
          <option>Le Pontet - EFS</option>
          <option>Malauvène - EFS</option>
          <option>Maubec le Coustellet - EFS</option>
          <option>Mérindol - EFS</option>
          <option>Mormoiron - EFS</option>
          <option>Orange - PJ</option>
          <option>Pertuis - PJ</option>
          <option>Sablet - EFS</option>
          <option>Sault - EFS</option>
          <option>Sorgues - EFS</option>
          <option>Vaison-la-Romaine - PJ</option>
          <option>Valréas - EFS</option>
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
        <label for="quartier_politique">Quartier politique de la ville, à préciser</label>
        <input  type="text"
                class="form-control"
                id="quartier_politique"
                name="quartier_politique"
                placeholder=""
                required="true">
      </div>
      <!-- Error -->
      <?php if ($validation->getError('quartier_politique')) {?>
        <div class="alert alert-danger mt-2">
            <?= $error = $validation->getError('quartier_politique'); ?>
        </div>
      <?php }?>


      <div class="form-group">
        <label for="sexe">Sexe</label>
        <select class="form-control" id="sexe" name="sexe">
          <option>Masculin</option>
          <option>Feminin</option>
          <option>Autre</option>
        </select>
      </div>

      <div class="form-group">
        <label for="ressources_mensuelles">Ressources Mensuelles (moyenne)</label>
        <select class="form-control" id="ressources_mensuelles" name="ressources_mensuelles">
          <option>- de 500 €</option>
          <option>- de 1000 €</option>
          <option>- de 1500 €</option>
          <option>+ de 1500 €</option>
        </select>
      </div>

      <div class="form-group">
        <label for="situation_professionelle">Situation Professionnelle</label>
        <select class="form-control" id="ressources_mensuelles" name="situation_professionelle">
          <option>Étudiant</option>
          <option>Retraité</option>
          <option>Sans emploi</option>
          <option>En activité</option>
        </select>
      </div>

      <div class="form-group">
        <label for="situation_foyer">Situation du foyer</label>
        <select class="form-control" id="situation_foyer" name="situation_foyer">
          <option>Personne seule</option>
          <option>Personne seule avec enfants</option>
          <option>En couple (marié, pacsé, concubinage)</option>
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
          <option>Droit administratif</option>
          <option>Droit des étrangers</option>
          <option>Droit des successions</option>
          <option>Droit des tutelles</option>
          <option>Droit du travail</option>
          <option>Droit immobilier / locatif</option>
          <option>Droit pénal / infraction</option>
          <option>Droit pénal / victime</option>
          <option>Droit sécurité sociale (maladie, vieillesse, travail, famille)</option>
          <option>Responsabilité civile</option>
          <option>Surendettement / crédit / consommation / contrats</option>
        </select>
      </div>

      <div class="form-group">
        <label for="domaine_juridique_autre">Autres (commercial / rural)</label>
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
