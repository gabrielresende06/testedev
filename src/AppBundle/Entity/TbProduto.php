<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbProduto
 *
 * @ORM\Table(name="tb_produto")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TbProdutoRepository")
 */
class TbProduto
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var decimal
     * @ORM\Column(name="valor", type="decimal", precision=10, scale=2)
     */
    private $valor;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return decimal
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param decimal $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

}

