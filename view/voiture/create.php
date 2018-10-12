<html>
    <head>
        <meta charset="utf-8" />
        <title> Create </title>
    </head>
   
    <body>
      <form method="post" action="../controller/routeur.php?action=created">
        <fieldset>
          <legend>Mon formulaire :</legend>
          <p>
            <label for="immat_id">Immatriculation</label> :
            <input type="text" placeholder="Ex : 256AB34" name="immatriculation" id="immat_id" required/>
          </p>
          <p>
            <label for="coul_id">Couleur</label> :
            <input type="text" placeholder="Ex : bleu" name="couleur" id="coul_id" required/>
          </p>
          <p>
            <label for="marq_id">Marque</label> :
            <input type="text" placeholder="Ex : Opel" name="marque" id="marq_id" required/>
          </p>
          <p>
            <input type="submit" value="Envoyer" />
          </p>
        </fieldset> 
      </form>
    </body>
</html>