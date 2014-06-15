<?php

namespace Usuarios\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Shift\Entity\BaseEntity;
use Shift\SM;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

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
    
    /**
     * Configura os filtros dos campos da entidade
     *
     * @return Zend\InputFilter\InputFilter
     */
    public function getInputFilter()
    {
        
        if (!isset($this->inputFilter)) {
            
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();
            
            $em = SM::get('doctrine.entitymanager.orm_default');

            $inputFilter->add($factory->createInput(array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name'     => 'nome',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'min'      => 1,
                            'max'      => 50,
                        ),
                    ),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name'     => 'email',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                    array(
                        'name' => 'EmailAddress',
                    ),
                    array(
                        'name' => 'DoctrineModule\Validator\UniqueObject',
                        'options' => array(
                            'object_manager' => $em,
                            'object_repository' => $em->getRepository('Usuarios\Entity\Usuario'),
                            'fields' => 'email',
                            'messages' => array(
                                'objectNotUnique' => 'Este email não pode ser utilizado.',
                            ),
                        ),
                    ),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name'     => 'senha',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'min'      => 6,
                            'max'      => 20,
                        ),
                    ),
                    array(
                        'name' => 'Identical',
                        'options' => array(
                            'token' => 'senha2',
                            'messages' => array(
                                'notSame' => 'As senhas não combinam.',
                            ),
                        ),
                    )
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name'     => 'senha2',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'min'      => 6,
                            'max'      => 20,
                        ),
                    ),
                )
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name'     => 'visivel',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Boolean')
                )
            )));
            
            $this->inputFilter = $inputFilter;
        }
        
        return $this->inputFilter;
        
    }

}
