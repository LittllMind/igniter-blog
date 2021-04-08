
<div class="fichesConsultView">
  <?php if (! empty($fichesConsultations) && is_array($fichesConsultations)) : ?>
  <table class="table">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Id intervenant</th>
      <th scope="col">Nom intervenant</th>
      <th scope="col">Date</th>
      <th scope="col">Lieu</th>
      <th scope="col">Id ayant droit</th>
      <th scope="col">Quartier oplitique</th>
      <th scope="col">Commune residence</th>
      <th scope="col">Sexe</th>
      <th scope="col">Implentation entreprise</th>
      <th scope="col">Status entrepreneur</th>
      <th scope="col">Situation entrepreneur</th>
      <th scope="col">Ressources mensuelles</th>
      <th scope="col">Activitée</th>
      <th scope="col">Situation du foyer</th>
      <th scope="col">Orientation</th>
      <th scope="col">Domaine juridique</th>
      <th scope="col">Nature de l'entratien</th>
      <th scope="col">Precisions</th>
      <th scope="col">#</th>
    </tr>

    <?php foreach ($fichesConsultations as $fichesConsultation) : ?>
      <tr>
        <th scope="row"><?= esc($fichesConsultation['id']) ?></th>
        <td><?= esc($fichesConsultation['id_intervenant']) ?></td>
        <td><?= esc($fichesConsultation['nom_intervenant']) ?></td>
        <td><?= esc($fichesConsultation['date_permanence']) ?></td>
        <td><?= esc($fichesConsultation['lieu_permanence']) ?></td>
        <td><?= esc($fichesConsultation['id_ayant_droit']) ?></td>
        <td><?= esc($fichesConsultation['quartier_politique']) ?></td>
        <td><?= esc($fichesConsultation['commune_residence']) ?></td>
        <td><?= esc($fichesConsultation['sexe']) ?></td>
        <td><?= esc($fichesConsultation['commun_implentation_entreprise']) ?></td>
        <td><?= esc($fichesConsultation['status_entrepreneur']) ?></td>
        <td><?= esc($fichesConsultation['situation_entrepreneur']) ?></td>
        <td><?= esc($fichesConsultation['ressources_mensuelles']) ?></td>
        <td><?= esc($fichesConsultation['activite']) ?></td>
        <td><?= esc($fichesConsultation['situation_foyer']) ?></td>
        <td><?= esc($fichesConsultation['orientation']) ?></td>
        <td><?= esc($fichesConsultation['domaine_juridique']) ?></td>
        <td><?= esc($fichesConsultation['nature_entretien']) ?></td>
        <td><?= esc($fichesConsultation['precision_nature_entretien']) ?></td>
        <td><a href="/fiche-list/<?= esc($fichesConsultation['id'], 'url') ?>">Details</a></td>
      </tr>
    <?php endforeach; ?>

  </table>
  <?php else : ?>
      <h3>Aucune Fiche de consultation</h3>
      <br><br>
  <?php endif ?>




</div>
