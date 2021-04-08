
<div class="memberView">

  <?php if (! empty($fichesConsultations) && is_array($fichesConsultations)) : ?>
      <?php foreach ($fichesConsultations as $fichesConsultation) : ?>
          <h3><?= esc($fichesConsultation['id']) ?></h3>

          <h3><?= esc($fichesConsultation['id_ayant_droit']) ?></h3>
          <h3><?= esc($fichesConsultation['id_intervenant']) ?></h3>
          <h3><?= esc($fichesConsultation['nom_intervenant']) ?></h3>
          <h3><?= esc($fichesConsultation['date_permanence']) ?></h3>
          <h3><?= esc($fichesConsultation['lieu_permanence']) ?></h3>
          <h3><?= esc($fichesConsultation['commune_residence']) ?></h3>
          <h3><?= esc($fichesConsultation['commun_implentation_entreprise']) ?></h3>
          <h3><?= esc($fichesConsultation['quartier_politique']) ?></h3>
          <h3><?= esc($fichesConsultation['sexe']) ?></h3>
          <h3><?= esc($fichesConsultation['status_entrepreneur']) ?></h3>
          <h3><?= esc($fichesConsultation['situation_entrepreneur']) ?></h3>
          <h3><?= esc($fichesConsultation['ressources_mensuelles']) ?></h3>
          <h3><?= esc($fichesConsultation['activite']) ?></h3>
          <h3><?= esc($fichesConsultation['situation_foyer']) ?></h3>
          <h3><?= esc($fichesConsultation['orientation']) ?></h3>
          <h3><?= esc($fichesConsultation['domaine_juridique']) ?></h3>
          <h3><?= esc($fichesConsultation['nature_entretien']) ?></h3>
          <h3><?= esc($fichesConsultation['precision_nature_entretien']) ?></h3>

          <p> <a href="/fiche-list/<?= esc($fichesConsultation['id'], 'url') ?>">View member </a> </p>

      <?php endforeach; ?>
  <?php else : ?>
        <h3>No Member</h3>
        <br><br>
        <h4>Unable to find any member</h4>
  <?php endif ?>

</div>
