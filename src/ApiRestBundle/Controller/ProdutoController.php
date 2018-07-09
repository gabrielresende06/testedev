<?php

namespace ApiRestBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as FOS;

class ProdutoController extends Controller {

    /**
     * @FOS\Get("/busca-id/{id}", name="api_rest_produto_busca_id", options={"method_prefix" = false, "expose"=true })
     * @FOS\View(statusCode=200, serializerEnableMaxDepthChecks=true, serializerGroups={"Default"})
     */
    public function buscaIdAction(Request $request, $id) {

        $servico = $this->get('api.service.produto');
        $produto = $servico->buscaId($id);

        return array ('produto' => $produto);
    }

    /**
     * @FOS\Get("/listagem", name="api_rest_produto_listagem", options={"method_prefix" = false, "expose"=true })
     * @FOS\View(statusCode=200, serializerEnableMaxDepthChecks=true, serializerGroups={"Default"})
     */
    public function listagemAction(Request $request) {

        $servico = $this->get('api.service.produto');
        $produtos = $servico->listagem();

        return array ( 'produtos' => $produtos );
    }

    /**
     * @FOS\Post("/cadastrar", name="api_rest_produto_cadastrar", options={"method_prefix" = false, "expose"=true })
     * @FOS\View(statusCode=200, serializerEnableMaxDepthChecks=true, serializerGroups={"Default"})
     */
    public function cadastrarAction(Request $request) {

        $servico = $this->get('api.service.produto');
        $produto = $servico->cadastrar($request);

        return array( 'produto' => $produto );
    }

    /**
     * @FOS\Put("/editar", name="api_rest_produto_editar", options={"method_prefix" = false, "expose"=true })
     * @FOS\View(statusCode=200, serializerEnableMaxDepthChecks=true, serializerGroups={"Default"})
     */
    public function editarAction(Request $request) {

        $servico = $this->get('api.service.produto');
        $produto = $servico->editar($request);

        return array ( 'produto' => $produto );
    }

    /**
     * @FOS\Delete("/deletar/{id}", name="api_rest_produto_deletar", options={"method_prefix" = false, "expose"=true })
     * @FOS\View(statusCode=200, serializerEnableMaxDepthChecks=true, serializerGroups={"Default"})
     */
    public function deletarAction(Request $request, $id) {

        $servico = $this->get('api.service.produto');
        $retorno = $servico->deletar($id);

        return array ( 'retorno' => $retorno );
    }
}
