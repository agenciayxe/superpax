<?php 
/*
Template name: Lojas (Planilha)
*/
get_header(); ?>

<main>
	<section>
		<div class="container mx-auto px-4">
			<?php 
			$h = 1;
			$argsStore = array(
                'post_type' => 'lojas',
                'posts_per_page' => -1
            );
            $storeList = new WP_Query($argsStore);
			?>
			<table class="table">
				<thead>
					<tr>
                        <th>Cidade</th>
                        <th>Bairro/Distrito</th>
                        <th>Endereço</th>
                        <th>Telefones</th>
                        <th>Whatsapp</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$storeList = new WP_Query($argsStore);
				    if ($storeList->have_posts()) {
				        while ($storeList->have_posts()) {
                    
                        $storeList->the_post();
                        $arrayTelefones = array();
                        if (get_field('telefone')) { $arrayTelefones[] = get_field('telefone'); }
                        if (get_field('telefone2')) { $arrayTelefones[] = get_field('telefone2'); }
                        if (get_field('telefone3')) { $arrayTelefones[] = get_field('telefone3'); }

                        $terms = wp_get_post_terms( get_the_ID(), 'lojas' );
                        $nameTerms = $terms[0]->name;
                        if ($terms[0]->parent) {
                            $terms = get_term( $terms[0]->parent, 'lojas' );
                            $nameTerms = $terms->name;
                        }
						?>
						<tr>
							<td><?php echo $nameTerms; ?></td>
							<td><?php echo get_the_title(); ?></td>
							<td><?php echo get_the_content(); ?></td>
                            <td><?php if (count($arrayTelefones) > 0) { echo implode(" / ", $arrayTelefones); }?></td>
                            <td><?php if (get_field('whatsapp')) { echo get_field('whatsapp'); } ?></td>
						<?php
						$h++;
                        }
					}
					?>
				</tbody>
			</table>
		</div>
	</section>
</main>
<?php get_footer(); ?>