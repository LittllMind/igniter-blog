<?php
// Récuperation des variables passées, on donne soit année; mois; année+mois
if (!isset($mois)) {
    $num_mois = date("n");
} else {
    $num_mois = $mois;
}
if (!isset($annee)) {
    $num_an = date("Y");
} else {
    $num_an = $annee;
}

// pour pas s'embeter a les calculer a l'affchage des fleches de navigation...
if ($num_mois < 1) {
    $num_mois = 12;
    $num_an = $num_an - 1;
} elseif ($num_mois > 12) {
    $num_mois = 1;
    $num_an = $num_an + 1;
}

// nombre de jours dans le mois et numero du premier jour du mois
$int_nbj = date("t", mktime(0, 0, 0, $num_mois, 1, $num_an));
$int_premj = date("w", mktime(0, 0, 0, $num_mois, 1, $num_an));

// tableau des jours, tableau des mois...
$tab_jours = array("","Lu","Ma","Me","Je","Ve","Sa","Di");
$tab_mois = array("","Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre");

$int_nbjAV = date("t", mktime(0, 0, 0, ($num_mois-1<1)?12:$num_mois-1, 1, $num_an)); // nb de jours du mois d'avant
$int_nbjAP = date("t", mktime(0, 0, 0, ($num_mois+1>12)?1:$num_mois+1, 1, $num_an)); // b de jours du mois d'apres

// on affiche les jours du mois et aussi les jours du mois avant/apres, on les indique par une * a l'affichage on modifie l'apparence des chiffres *
$tab_cal = array(array(), array(), array(), array(), array(), array()); // tab_cal[Semaine][Jour de la semaine]
$int_premj = ($int_premj == 0)?7:$int_premj;
$t = 1;
$p = "";
for ($i=0; $i<6; $i++) {
    for ($j=0; $j<7; $j++) {
        if ($j+1 == $int_premj && $t == 1) {
            $tab_cal[$i][$j] = $t;
            $t++;
            // on stocke le premier jour du mois
        } elseif ($t > 1 && $t <= $int_nbj) {
            $tab_cal[$i][$j] = $p.$t;
            $t++;
             // on incremente a chaque fois...
        } elseif ($t > $int_nbj) {
            $p="*";
            $tab_cal[$i][$j] = $p."1";
            $t = 2;
            // on a mis tout les numeros de ce mois, on commence a mettre ceux du suivant
        } elseif ($t == 1) {
            $tab_cal[$i][$j] = "*".($int_nbjAV-($int_premj-($j+1))+1);
        } // on a pas encore mis les num du mois, on met ceux de celui d'avant
    }
}
?>

<!-- <html>
<head>
  <title>Calendrier</title>
  <link rel="stylesheet"
        href="<?php echo base_url('assets/css/bootstrap.min.css') ?>"
        type="text/css" />
  <link rel="stylesheet"
        href="<?php echo base_url('assets/css/style.css') ?>"
        type="text/css"/>
</head>
<body>

  <div class="container" id=mainContainer>
    <div class="row justify-content-md-center"> -->
      <table class="calendar_main">
          <tr>
            <td colspan="7" align="center">


              <a href="/calendar/<?= esc($num_mois-1, 'url')?>/<?= esc($num_an, 'url')?>">
                <<</a>&nbsp;&nbsp;<?php echo $tab_mois[$num_mois];  ?>&nbsp;&nbsp;
                <a href="/calendar/<?= esc($num_mois+1, 'url')?>/<?= esc($num_an, 'url')?>">>>
                </a>
              </td>
            </tr>
            <tr>
              <td colspan="7" align="center">
                <a href="/calendar/<?= esc($num_mois, 'url')?>/<?= esc($num_an-1, 'url')?>">
                  <<</a>&nbsp;&nbsp;<?php echo $num_an;  ?>&nbsp;&nbsp;
                  <a href="/calendar/<?= esc($num_mois, 'url')?>/<?= esc($num_an+1, 'url')?>">>>
                  </a>
                </td>
              </tr>
        <?php
          echo'<tr class="calendar_week">';
        for ($i = 1; $i <= 7; $i++) {
              echo ('<td>'.$tab_jours[$i].'</td>');
        }
          echo'</tr>';

        for ($i=0; $i<6; $i++) {
              echo '<tr class="calendar_days_rows">';
            for ($j=0; $j<7; $j++) {
                  echo "<td".(($num_mois == date("n") && $num_an == date("Y") && $tab_cal[$i][$j] == date("j"))
                  ?' id="active_day"':null).">".((strpos($tab_cal[$i][$j], "*") !== false)
                  ?'<font color="#aaaaaa">'.str_replace("*", "", $tab_cal[$i][$j]).'</font>':$tab_cal[$i][$j])."</td>";
            }
              echo "</tr>";
        }
        ?>
      </table>
    <!-- </div>
  </div> -->
<!-- </body>
</html> -->
