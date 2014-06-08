<?php

namespace Usuarios\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Shift\Entity\BaseEntity;
use Shift\SM;

/**
 * @ORM\Table(name="usuarios")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Usuario extends BaseEntity
{


    /**
     * @ORM\Column(type="string")
     */
    protected $nome;

    /**
     * @ORM\Column(type="string")
     */
    protected $email;

    /**
     * @ORM\Column(type="string")
     */
    protected $senha;

    /**
     * @ORM\Column(type="string")
     */
    protected $perfil;

    /**
     * @var string 
     */
    private $senhaCrua;

    /**
     * @var boolean
     */
    private $enviarEmail = false;

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Comunica o usuário por e-mail.
     *
     * @ORM\PostPersist
     * @ORM\PostUpdate
     */
    public function comunicaCadastro()
    {
        if ($this->enviarEmail) {
            SM::get('usuarios.mailer.usuarios')->comunicaCadastro($this);
        }
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setSenha($senha)
    {
        $senhaAtual = $this->getSenha();
        if ($senha) {
            $this->senha = md5(SALT . $senha);
            $this->senhaCrua = $senha;
            if ($senha != $senhaAtual) {
//                $this->enviarEmail = true;
            }
        }
        return $this;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getSenhaCrua()
    {
        return $this->senhaCrua;
    }

    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;
        return $this;
    }

    public function getPerfil()
    {
        return $this->perfil;
    }

}
