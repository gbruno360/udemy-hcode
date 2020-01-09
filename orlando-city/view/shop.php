<?php include_once("header.php");?>

<section ng-controller="destaque-controller">							

	<div class="container" id="destaque-produtos-container">
	
		<div id="destaque-produtos" class="owl-carousel owl-theme"> <!--class="owl-carousel owl-theme"-->
			<div class="item" ng-repeat="produto in produtos">
			
				<div class="col-imagem"><!--class="col-sm-6 col-imagem"-->
					<img src="img/produtos/{{produto.foto_principal}}" alt="{{produto.nome_prod_longo}}">
				</div>
				<div class="col-descricao-sp"><!--class="col-sm-6 col-imagem"-->
					<h2 id="titulo-produto">{{produto.nome_prod_longo}}</h2>
					<div class="box-valor">
						<div class="text-noboleto arial-cinza-sp">no boleto</div>
						<div class="text-por arial-cinza-sp">por</div>
						<div class="text-reais text-roxo">R$</div>
						<div class="text-valor text-roxo">{{produto.preco}}</div>
						<div class="text-valor-centavos text-roxo">,{{produto.centavos}}</div>
						<div class="text-parcelas arial-cinza-sp">ou em até {{produto.parcelas}}x de R$ {{produto.parcela}}</div>
						<div class="text-total arial-cinza-sp">total a prazo R$ {{produto.total}}</div>
					</div>
					<a href="#" class="btn btn-comprar text-roxo"><i class="fa fa-shopping-cart"></i> compre agora</a>
				</div>
			</div>
			<div class="item" ng-repeat="produto in produtos">
			
				<div class="col-imagem"><!--class="col-sm-6 col-imagem"-->
					<img src="img/produtos/{{produto.foto_principal}}" alt="{{produto.nome_prod_longo}}">
				</div>
				<div class="col-descricao-sp"><!--class="col-sm-6 col-imagem"-->
					<h2 id="titulo-produto">{{produto.nome_prod_longo}}</h2>
					<div class="box-valor">
						<div class="text-noboleto arial-cinza-sp">no boleto</div>
						<div class="text-por arial-cinza-sp">por</div>
						<div class="text-reais text-roxo">R$</div>
						<div class="text-valor text-roxo">{{produto.preco}}</div>
						<div class="text-valor-centavos text-roxo">,{{produto.centavos}}</div>
						<div class="text-parcelas arial-cinza-sp">ou em até {{produto.parcelas}}x de R$ {{produto.parcela}}</div>
						<div class="text-total arial-cinza-sp">total a prazo R$ {{produto.total}}</div>
					</div>
					<a href="#" class="btn btn-comprar text-roxo"><i class="fa fa-shopping-cart"></i> compre agora</a>
				</div>
			</div>
		</div><!--Destaque-produtos closing-->
		<button type="button" id="btn-destaque-prev" style="display:inline-block!important;"><i class="fa fa-angle-left"></i></button>
		<button type="button" id="btn-destaque-next" style="display:inline-block!important;"><i class="fa fa-angle-right"></i></button>
	</div> <!--Container closing-->
	<div id="promocoes" class="container">
		<div class="row">
			<div class="col-md-2">
				<div class="box-promocao box-1">
					<p>escolha por desconto</p>
				</div>
			</div>
			<div class="col-md-10">
				<div class="row-fluid">
					<div class="col-md-3">
						<div class="box-promocao">
							<div class="text-ate">até</div>
							<div class="text-numero">40</div>
							<div class="text-porcento">%</div>
							<div class="text-off">off</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="box-promocao">
						<div class="text-ate">até</div>
							<div class="text-numero">60</div>
							<div class="text-porcento">%</div>
							<div class="text-off">off</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="box-promocao">
						<div class="text-ate">até</div>
							<div class="text-numero">80</div>
							<div class="text-porcento">%</div>
							<div class="text-off">off</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="box-promocao">
						<div class="text-ate">até</div>
							<div class="text-numero">85</div>
							<div class="text-porcento">%</div>
							<div class="text-off">off</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="mais-buscados" class="container">
		<div class="row text-center">
			<h2>Os mais buscados</h2>
			<hr>
		</div>
		<div class="row">
			<div class="col-md-3" ng-repeat="produto in buscados">
				<div class="box-produto-info">
					<a href="#">
						<img src="img/produtos/panelas.png" alt="Panelas">
						<h3>Conjunto de Panelas Tramontina Versalhes Alumínio Antiaderente 5</h3>
						<div class="estrelas" data-score="3"></div> <!--CONFIGURAR RATY AULA 67 Home da Loja Parte 3-->
						<div class="text-qtd-reviews arial-cinza-sp">(300)</div>
						<div class="text-valor text-roxo">R$ 109,90</div>
						<div class="text-parcelado arial-cinza-sp">10x de R$ 10,99 sem juros</div>
					</a>
				</div>
			</div>
		</div>
	</div>	
</section>	
			
<?php include_once("footer.php");?>

<script>
angular.module("shop", []).controller("destaque-controller", function($scope, $http){

	$scope.produtos = [];

	var initCarousel = function(){

		$("#destaque-produtos").owlCarousel({
			autoPlay: 5000,
			items : 1,
			singleItem: true,
			pagination: false
			
		});

		var owlDestaque = $('#destaque-produtos');
			owlDestaque.owlCarousel();
			// Go to the next item
			$('#btn-destaque-prev').click(function() {
				owlDestaque.trigger('owl.prev');
			})
			// Go to the previous item
			$('#btn-destaque-next').click(function() {
				// With optional speed parameter
				// Parameters has to be in square bracket '[]'
				owlDestaque.trigger('owl.next', [300]);
			})
	};

$http({
	  method: 'GET',
	  url: 'produtos'
	}).then(function successCallback(response) {

	    $scope.produtos = response.data;

	    setTimeout(initCarousel, 1000);

	  }, function errorCallback(response) {
	    // called asynchronously if an error occurs
	    // or server returns response with an error status.
	  });

});
$(function(){

  	$('.estrelas').each(function(){

  		$(this).raty({
	  		starHalf    : 'lib/raty/lib/images/star-half.png',                                // The name of the half star image.
			starOff     : 'lib/raty/lib/images/star-off.png',                                 // Name of the star image off.
			starOn      : 'lib/raty/lib/images/star-on.png',
			score		: parseFloat($(this).data("score"))
	  	});

  	});

});
</script>