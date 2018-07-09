'use strict';

/* Controllers */
var app = angular.module('easyqasa.controllers.produto', []);

app.controller('indexProdutoController',
    ['$scope', '$http', function ($scope, $http) {

        $scope.index = function(){
            var url = Routing.generate('api_rest_produto_listagem');

            $http.get(url)
                .then(
                    function(resposta) {
                        $scope.produtos = resposta.data.produtos;
                    }
                );
        }

        $scope.cadastro = function() {
            var rota = Routing.generate('produto_cadastro');
            location.href = rota;
        }

        $scope.editar = function(id) {
            var rota = Routing.generate('produto_editar');
            location.href = rota+'/'+id;
        }

        $scope.excluir = function(id) {
            var url = Routing.generate('api_rest_produto_deletar', { id:id });

            $http.delete(url)
                .then(
                    function(resposta) {
                        if (resposta.status == 200) {
                            swal(
                                "Sucesso!",
                                "Produto excluído com sucesso!",
                                "success")
                                .then(
                                    function(){
                                        var rota = Routing.generate('produto_index');
                                        location.href = rota;
                                    }
                                );
                        } else {
                            swal(
                                "Ops!",
                                resposta.data.error,
                                "error");
                        }
                    }
                );
        }
    }])
app.controller('cadastroProdutoController',
    ['$scope', '$http', function ($scope, $http) {

        $scope.produto = {};

        $scope.cadastrar = function(){
            var url = Routing.generate('api_rest_produto_cadastrar');

            $http.post(url, {produto: $scope.produto})
                .then(
                    function(resposta) {
                        if (resposta.status == 200) {
                            swal(
                                "Sucesso!",
                                "Cadastro realizado com sucesso!",
                                "success")
                                .then(
                                    function(){
                                        var rota = Routing.generate('produto_index');
                                        location.href = rota;
                                    }
                                );
                        } else {
                            swal(
                                "Ops!",
                                resposta.data.error,
                                "error");
                        }
                    }
                );
        }

    }])
app.controller('editarProdutoController',
    ['$scope', '$http', function ($scope, $http) {

        $scope.index = function(id) {
            var url = Routing.generate('api_rest_produto_busca_id', { id:id });

            $http.get(url)
                .then(
                    function(resposta) {
                        $scope.produto = resposta.data.produto;
                    }
                );
        }
        $scope.editar = function(){
            var url = Routing.generate('api_rest_produto_editar');

            $http.put(url, { produto: $scope.produto })
                .then(
                    function(resposta) {
                        if (resposta.status == 200) {
                            swal(
                                "Sucesso!",
                                "Edição realizada com sucesso!",
                                "success")
                                .then(
                                    function(){
                                        var rota = Routing.generate('produto_index');
                                        location.href = rota;
                                    }
                                );
                        } else {
                            swal(
                                "Ops!",
                                resposta.data.error,
                                "error");
                        }
                    }
                );
        }

    }])
;

angular.module('easyQasaApp').requires.push('easyqasa.controllers.produto');
