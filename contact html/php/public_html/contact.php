<?php
if(isset($_POST["email"])) {
    
    // Hier komt informatie over waar de email naartoe gaat //
    $email_to="scrumlife@outlook.com"; // of ander email adres ik had er 1 aangemaakt voor de gein //
    $email_subject="Filmpje contactformulier probleem"; // onderwerp van de email die verstuurd wordt //
    $email_from="Filmpje bioscopen"; // kunnen we nog een andere naam voor verzinnen //
    
    // foutmeldingen
    function probleem($probleem2) {
        echo "Sorry voor het ongemak, maar het blijkt dat er problemen zijn onstaan in het formulier dat u ons heeft gestuurd.";
        echo "Hieronder wordt aangegeven wat de problemen zijn.";
        echo $probleem2. "<br> <br>";
        echo "Alstublieft verander deze fouten in uw formulier en probeer opnieuw.<br/>";
        die();
    }
    
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $probleem = $_POST['probleem'];
    
        //controleren
        
        $foutmelding = "";
        $emailverwachting = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2, 4}$/';  
        /* alles tussen [] kan gebruikt worden in emails, dus []@[].[] en de {} geven aan 
        hoeveel letters na de . mogen */
        $voornaamverwachting = "/^[A-Za-z.'-]+$/";
        $achternaamverwachting = "/^[A-Za-z.'-]+$/";
        // alles tussen de [] kan gebruikt worden in de voor en achternaam //
        
        if(!preg_match($voornaamverwachting, $voornaam)) {
            $foutmelding .= "De voornaam die u heeft ingevoerd blijkt tekens te bevatten die niet geldig zijn.<br>";
        }
        
        if(!preg_match($achternaamverwachting, $achternaam)) {
            $foutmelding .= "De achternaam die u heeft ingevoerd blijkt tekens te bevatten die niet geldig zijn.<br>";
        }
        
        if(strlen($probleem) < 5) {
            $foutmelding .= "Het aantal tekens dat u heeft geschreven is te weinig.<br>";
        }
        
        if(strlen($foutmelding) > 0) {
            echo $foutmelding;
            die();
        }
        
        $emailbericht = "Formulier details kunt u beneden lezen. \n\n";
        
        $emailbericht .= "Voornaam: " . $voornaam . "\n";
        $emailbericht .= "Achternaam: " . $achternaam . "\n";
        $emailbericht .= "Email: " . $email . "\n\n";
        $emailbericht .= "Onderwerp: \n" . $probleem . "\n";
        // email headers
        $headers = 'From: ' .$email_from . "\r\n". 'Beantwoorden:' . $email. "\r\n" .
        'X-mailer: php/' . phpversion();
        
        @mail($email_to, $email_subject, $emailbericht, $headers);
}

?>