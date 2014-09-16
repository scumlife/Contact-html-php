<?php
    $voornaam = filter_input(INPUT_POST['voornaam']);
    $achternaam = filter_input(INPUT_POST['achternaam']);
    $email = filter_input(INPUT_POST['email']);
    $probleem = filter_input(INPUT_POST['probleem']);
    $van = 'From: Filmpje bioscopen';
    $naar = 'scrumlife@outlook.com';
    $onderwerp = 'Contactformulier verstuurd vanaf de site van Filmpje bioscopen.';
    
    $bericht = "Van: $voornaam $achternaam \n E-mail: $email\n\n Probleem:\n $probleem";
?>
  
<?php
    if (filter_input(INPUT_POST['verzenden'])) {
        if(mail($naar, $onderwerp, $bericht, $van)) {
            echo '<p>Uw bericht is verzonden, we zullen zo spoedig mogelijk reageren</p>';
        } else {
            echo '<p>Sorry voor het ongemak, maar het blijkt dat er problemen zijn met het formulier dat u ons heeft gestuurd. Zou u het formulier alstublieft opnieuw kunnen proberen.</p>';
        }
    }
?>