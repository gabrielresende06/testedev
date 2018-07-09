'use strict';
angular.module('easyqasa.produto.factory', [])
    .factory( 'produtoService', ['$resource', '$http', function($resource, $http) {
        return new Produto($resource);

        function Produto(resource) {
            this.resource = resource;

            this.createProduct = function (product, scope) {
                var urlSave = Routing.generate('api_rest_produto_cadastro');
                var produto = resource(urlSave);
                produto.save({ produto: product });
            }
        }
    }])
;


angular.module('easyQasaApp').requires.push('easyqasa.produto.factory');
