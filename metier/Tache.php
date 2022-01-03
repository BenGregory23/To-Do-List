<?php

class Tache
{

    private $nomTache;
    private $descriptionTache;
    private $idListe;
    private $etat;
    private $pseudoUser;

    function __construct(string $nomTache, string $descriptionTache, int $idListe, string $pseudoUser) {
        $this->nomTache = $nomTache;
        $this->descriptionTache = $descriptionTache;
        $this->idListe = $idListe;
        $this->pseudoUser = $pseudoUser;
        $this->etat = "A faire";
    }

    /**
     * @return string
     */
    public function getNomTache(): string
    {
        return $this->nomTache;
    }

    /**
     * @return string
     */
    public function getDescriptionTache(): string
    {
        return $this->descriptionTache;
    }

    /**
     * @return string
     */
    public function getPseudoUser(): string
    {
        return $this->pseudoUser;
    }

    /**
     * @return string
     */
    public function getEtat(): string
    {
        return $this->etat;
    }

    /**
     * @param string $nomTache
     */
    public function setNomTache(string $nomTache): void
    {
        $this->nomTache = $nomTache;
    }

    /**
     * @param string $descriptionTache
     */
    public function setDescriptionTache(string $descriptionTache): void
    {
        $this->descriptionTache = $descriptionTache;
    }

    /**
     * @param string $pseudoUser
     */
    public function setPseudoUser(string $pseudoUser): void
    {
        $this->pseudoUser = $pseudoUser;
    }

    /**
     * @param string $etat
     */
    public function setIsPublic(string $etat): void
    {
        $this->etat = $etat;
    }

    public function ajouterTache()
    {

    }
}