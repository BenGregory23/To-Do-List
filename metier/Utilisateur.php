<?php


class Utilisateur
{
    private string $pseudo;
    private mixed $role;
    private array $listesPriv;
    private array$listesPub;

    public function __construct()
    {
        $arguments=func_get_args();
        $nbArgs=func_num_args();
        if ($nbArgs==0) call_user_func_array(array($this,"__construct0"),$arguments);
        if ($nbArgs==2) call_user_func_array(array($this,"__construct1"),$arguments);
        if ($nbArgs==3) call_user_func_array(array($this,"__construct2"),$arguments);
        if ($nbArgs==4) call_user_func_array(array($this,"__construct3"),$arguments);}

    public function __construct0(){
        $this->pseudo = "";
    }


    public function __construct1(string $pseudo, string $role)
    {
        $this->pseudo=$pseudo;
        $this->role=$role;
    }

    public function __construct2(string $pseudo, string $role, array $listesPriv)
    {
        $this->pseudo=$pseudo;
        $this->role=$role;
        $this->listesPriv=$listesPriv;
    }

    public function __construct3(string $pseudo, string $role, array $listesPriv, array $listesPub)
    {
        $this->pseudo=$pseudo;
        $this->role=$role;
        $this->listesPriv=$listesPriv;
        $this->listesPub=$listesPub;
    }


    /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @return array
     */
    public function getListesPriv(): array
    {
        return $this->listesPriv;
    }

    /**
     * @return array
     */
    public function getListesPub(): array
    {
        return $this->listesPub;
    }

    /**
     * @return mixed
     */
    public function getRole(): mixed
    {
        return $this->role;
    }

    /**
     * @param int $idUser
     */
    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @param string $pseudo
     */
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @param array $listesPriv
     */
    public function setListesPriv(array $listesPriv): void
    {
        $this->listesPriv = $listesPriv;
    }

    /**
     * @param array $listesPub
     */
    public function setListesPub(array $listesPub): void
    {
        $this->listesPub = $listesPub;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role): void
    {
        $this->role = $role;
    }
}
