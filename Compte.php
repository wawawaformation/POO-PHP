<?php


/**
 * Représente un compte en banque
 */
class Compte{

    static $compteur = 0;


    /**
     * Nom du titualire
     * @var string
     */
    private string $nom;

    /**
     * Le solde du compte en banque
     * @var float
     */
    private float $solde;

    /**
     * Affiche le solde
     * @return void
     */
    public function afficherSolde(){
        echo 'Bonjour ' . $this->nom . ', ';
        echo 'Il vous reste ' . $this->solde .' €! Votre Conseiller financier';
        echo '<br>';
    }

    /**
     * Instancie la classe
     * @param string $titulaire nom du titulaire
     * @param float $solde solde du compte en banque
     */
    public function __construct(string $titulaire, float $solde=0)
    {
        $this->setNom($titulaire);
        $this->setSolde($solde);
        self::$compteur++;
       
    }


    static public function getCompteur()
    {
        return self::$compteur;
    }

    /**
     * REtire de l'argent
     * @param int $somme somme à retirer
     * @throws Exception
     * @return void
     */
    public function retirer(int $somme)
    {
        if($somme > $this->solde){
            throw new Exception('Vous n\'avez pas assez d\'argent');
        }
        $this->solde -= $somme;
    }


    /**
     * Dépose de l'argent
     * @param int $somme somme à déposer
     * @throws \Exception
     * @return void
     */
    public function deposer(int $somme)
    {
        if($somme <= 0){
            throw new Exception('Un depot est toujours positif');
        }
        $this->solde += $somme;
    }


    /**
     * Virer de l'argent sur un autre compte
     * @param Compte $compte compte le lequel s'effecture le virement
     * @param float $somme somme virer
     * @return void
     */
    public function virer(Compte $compte, float $somme)
    {
        $this->retirer($somme);
        $compte->deposer($somme);
    }

    /**
     * retourne le nom du titualire
     *
     * @return  string
     */ 
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * Modifie nom du titualire
     *
     * @param  string  $nom  Nom du titualire
     *
     * @return  self
     */ 
    public function setNom(string $nom): self
    {
        if(empty($nom)){
            throw new Exception('Le nom ne peut être vide');
        }
        $this->nom = $nom;

        return $this;
    }

    /**
     * retorune le solde du compte en banque
     *
     * @return  float
     */ 
    public function getSolde(): float
    {
        return $this->solde;
    }

    /**
     * Modifie le solde du compte en banque
     *
     * @param  float  $solde  Le solde du compte en banque
     *
     * @return  self
     */ 
    public function setSolde(float $solde): self
    {
        if($solde < 0){
            throw new Exception('Le solde ne peut pas être négatif');
        }
        $this->solde = $solde;

        return $this;
    }
}