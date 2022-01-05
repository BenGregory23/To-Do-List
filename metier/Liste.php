<?php

class Liste {
    private $id;
    private $nomListe;
    private $descriptionListe;
    private $pseudoUser;
    private $isPublic=false;


    function __construct(string $nomListe, string $descriptionListe,bool $isPublic,string $pseudoUser) {
        $this->nomListe = $nomListe;
        $this->descriptionListe = $descriptionListe;
        $this->pseudoUser = $pseudoUser;
        $this->isPublic = $isPublic;
    }

    /**
     * @return string
     */
    public function getNomListe(): string
    {
        return $this->nomListe;
    }

    /**
     * @return string
     */
    public function getID(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDescriptionListe(): string
    {
        return $this->descriptionListe;
    }

    /**
     * @return string
     */
    public function getPseudoUser(): string
    {
        return $this->pseudoUser;
    }

    /**
     * @return bool
     */
    public function getIsPublic(): bool
    {
        return $this->isPublic;
    }

    /**
     * @param array $listeT
     */
    public function setListeT(array $listeT): void
    {
        $this->listeT = $listeT;
    }

    /**
     * @param string $nomListe
     */
    public function setNomListe(string $nomListe): void
    {
        $this->nomListe = $nomListe;
    }

    /**
     * @param string $descriptionListe
     */
    public function setDescriptionListe(string $descriptionListe): void
    {
        $this->descriptionListe = $descriptionListe;
    }

    /**
     * @param string $pseudoUser
     */
    public function setPseudoUser($pseudoUser): void
    {
        $this->pseudoUser = $pseudoUser;
    }

    /**
     * @param bool $isPublic
     */
    public function setIsPublic(bool $isPublic): void
    {
        $this->public = $isPublic;
    }
}
