<?php 
/*
Template name: Resultado do Instagram
*/
get_header(); 
?>

<main>
	<section>
		<div class="container mx-auto px-4">
			<?php 
			$h = 1;
			$listPremios = $wpdb->get_results( "SELECT username, id, COUNT(*) AS num FROM instagram_comments GROUP BY username ORDER BY COUNT(*) DESC LIMIT 100" );
			?>
			<table class="table">
				<thead>
					<tr>
					<th scope="col w-32">Posição</th>
					<th scope="col">Instagram</th>
					<th scope="col">Quantidade</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($listPremios as $singlePremios){
						?>
						<tr>
							<td class=" w-32">#<?php echo $h; ?></td>
							<td><a href="https://www.instagram.com/<?php echo $singlePremios->username; ?>" class="text-red-700 hover:text-red-800" target="_blank">@<?php echo $singlePremios->username; ?></a></td>
							<td><?php echo $singlePremios->num; ?> interações</td>
						<?php
						$h++;
					}
					?>
				</tbody>
			</table>
		</div>
	</section>
</main>
<?php 
get_footer(); 
?>