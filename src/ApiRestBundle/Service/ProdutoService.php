<?php
namespace ApiRestBundle\Service;

use ApiRestBundle\Service\Util\BaseService;
use AppBundle\Entity\TbProduto;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\TbProdutoType;
use Symfony\Component\HttpKernel\Exception;
use AppBundle\Exception\FormException;

class ProdutoService extends BaseService {

    public function buscaId($id) {
        $produto = $this->repositorio->find($id);
        if (empty($produto)){
            throw new \Exception('Produto não encontrado!');
        }

        return $produto;
    }

    public function listagem() {
        return $this->repositorio->findAll();
    }

    public function cadastrar(Request $request) {

        $dados = $request->get('produto');
        $produto = new TbProduto();

        $form = $this->createForm($produto);
        $form->submit($dados);

        if (!$form->isValid()) {
            throw new \Exception($form->getErrors());
        }

        return $this->save($produto);
    }

    public function editar(Request $request)
    {
        $dados = $request->get('produto');

        if (empty($dados['id'])){
            throw new \Exception('Dados inválidos!');
        }

        $produto = $this->buscaId($dados['id']);

        $form = $this->createForm($produto);
        $form->submit($dados);

        if (!$form->isValid()) {
            throw new \Exception($form->getErrors());
        }

        return $this->save($produto);

    }

    public function deletar($id)
    {
        $produto = $this->buscaId($id);
        $this->em->remove($produto);
        $this->em->flush();
        return true;
    }

    public function save(TbProduto $produto)
    {
        $this->em->persist($produto);
        $this->em->flush();

        return $produto;
    }

    public function createForm(TbProduto $entity = null)
    {
        $produto = $entity == null ? new TbProduto() : $entity;
        $form = $this->formFactory->create(TbProdutoType::class, $produto);
        return $form;
    }
}
