<?php
require '../../ConBancoDados/pregao/con_pregao.inc';

	#$page = $_SERVER['PHP_SELF'];
	#$sec = "1"; #Recarrega página a cada x segundos
?>

<link rel="shortcut icon" type="image/x-icon" href="img/hammer_icon.png" />
<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">


<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<head>
	<title>Painel de Valores</title>
</head>
<body>
	<div class="container w-75 bg-light px-0" id="container">

		<header>
			<nav class="navbar navbar-expand-lg p-4 mb-4 bg-primary text-white">
				<h1 class="mx-auto">Pregão - Painel de Valores</h1>
			</nav>
		</header>

		<div class="px-4 pb-4" id="content">

			<!-- ############## Div com as informações básicas do pregão ############## -->
			<div id="pregao-info">
				<?php foreach ($LIC_PREGAO as $pregao) { ?>
					<p class="mb-1">
						<span class="border border-secondary rounded-pill bg-secondary text-white px-2">
							Processo Adm.: <b class="letter-spacing-1"><?php echo $pregao['Processo'] ?> </b>
						</span>
					</p>							
					<p class="mb-1">
						<span class="border border-secondary rounded-pill bg-secondary text-white px-2">
							Unidade Gestora: <b class="letter-spacing-1"><?php echo $pregao['Unidade_Gestora'] ?></b>
						</span>
					</p>
					<p class="mb-1">
						<span class="border border-secondary rounded-pill bg-secondary text-white px-2">
							Data do Certame: <b class="letter-spacing-1"><?php echo $pregao['Data_Certame'] ?></b>
						</span>	
					</p>
			</div>

			<!-- ############## Tabela de Produto ############## -->
			<h4 class="mt-4 mb-0 py-1 letter-spacing-1 text-center rounded-top-2 bg-primary text-white">
				Produto
			</h4>

			<table class="table table-bordered letter-spacing-1" id="produto">
					<!-- Cabeçalho tabela de Produtos -->				
					<thead>
						<tr class="bg-secondary text-white fs-5">
							<th>								
								Item Nº:  <?php echo $pregao['Item_numero']. ' - '. $pregao['Item_nome']; ?>			
							</th>
							<th class="text-end">
								Vl. Estimado R$
							</th>
						</tr>
					</thead>

					<!-- Dados tabela de Produtos -->
					<tr>
						<td>
							Tipo de Benefício:<b> <?php echo $pregao['Item_Tipobeneficio']; ?> </b>
						</td>
						<td class="text-end">
							<?php echo $pregao['Item_Valormedio']; ?>
						</td>

					</tr>					
				<?php } ?>
			</table>



			<!-- ######################### Tabela com os Lances de Cada Participante ######################### -->
			<h4 class="mt-4 mb-0 py-1 letter-spacing-1 text-center rounded-top-2 bg-primary text-white">
					Quadro de Lances
			</h4>
			
			<table class="table table-bordered table-striped table-hover" id="quadrolances">
				<!-- Cabeçalho tabela de participantes -->
				<thead>
					<tr class="bg-secondary text-white letter-spacing-1">
						<th>Empresa Participante</th>
						<th>Tipo Empresa</th>
						<th class="text-end">Valor R$ / Desc %</th>
						<th class="text-end">Rodada</th>
					</tr>
				</thead>				

				<!-- corpo da tabela -->
				<tbody>
					<?php foreach ($LIC_PREGAO_LANCE as $lance) { ?>
						<tr class="fs-5">
							<td class="text-uppercase"><b><?php echo $lance['Empresa'];?></b></th>
							<td class="fs-6"><?php echo $lance['Tipo_empresa'] ?></td>
							<td class="text-end"><?php echo $lance['Valor']; ?></td>
							<td class="text-end"><?php echo $lance['Rodada'] ?></td>
						</tr>
					<?php } ?>
				</tbody>

				<!--rodapé 
				<tfoot>
					<tr>
						<td colspan="4">
							Vl. Inexequível R$: <b><?php echo $pregao['Item_valor_Inexequivel']; ?></b> <br>
							Empate Ficto R$: <b><?php echo $pregao['Item_Cincoporcentro']; ?></b>
						</td>
					</tr>
				</tfoot>
				-->
			</table>

			<div class="mt-4 text-end">
				Vl. Inexequível R$: <b><?php echo $pregao['Item_valor_Inexequivel']; ?></b> <br>
				Empate Ficto R$: <b><?php echo $pregao['Item_Cincoporcentro']; ?></b>
			</div>

		</div>

	</div>
</div>

</body>
</html>
