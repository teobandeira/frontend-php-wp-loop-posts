<?php 
// Template name: Home 1
// Portal
get_header(); 
?>

<style>
	.carousel-item{
		display:inline
	}
	.card__post__content{
		border-radius:10px;
	}
</style>
<section>
	<!-------------------------------------
		SLIDER PRINCIPAL
	-------------------------------------->
	<div class="popular__news-header">
		<div class="container">
			<div class="row no-gutters">
				
				<div class="col-md-8">

					<div class="card__post-carousel">
						<?php 
						#-----------------------
						// Loop slideshow
						#-----------------------
						$query = new WP_Query(array(
						'post_type' => array( 'artigo', 'video' ),
						'meta_query'	=> array(
							array(
								'key'	  	=> 'perfil_conteudo',
								'value'	  	=> @$_COOKIE['cookie_perfil'],
								'compare' 	=> 'like',
							),
							array(
								'key'	  	=> 'categoria_conteudo',
								'value'	  	=> @$_COOKIE['cookie_categoria'],
								'compare' 	=> 'like',
							),
							array(
								'key'	  	=> 'destaque_slideshow',
								'value'	  	=> 'sim',
								'compare' 	=> 'like',
							),
							array(
								'key'	  	=> 'usuario',
								'value'	  	=> @$_COOKIE['id_cliente'],
								'compare' 	=> 'like',
							),
						),
						'order' => 'DESC'));
						while ($query->have_posts()) : $query->the_post(); ?>
							<div class="item">
								<div class="card__post">
									<div class="card__post__body slideshow">
										<a href="<?php the_permalink();?>">
											<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "full");?>" class="img-fluid" alt="" style="border-radius:10px !important; " />
										</a>
										<div class="card__post__content bg__post-cover">
											<div class="card__post__category bg_<?php  echo get_post_type(); ?>" style="border-radius:10px !important">
												<?php  echo get_post_type(); ?>
											</div>
											<div class="card__post__title">
												<h2 class="slide_titulo">
													<a href="<?php the_permalink();?>">
														<?php echo get_the_title();?>
													</a>
												</h2>
											</div>
											<div class="card__post__author-info">
												<ul class="list-inline">
													<li class="list-inline-item" style="padding:0; color:#fff"> <?php echo get_field('autor_conteudo');?> </li>
													<li class="list-inline-item" style="padding:0;"><span style="margin:0 0 0 -10px"><?php echo get_the_date('d/M/Y');?> </span> </li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endwhile;?>
					</div>
					
				</div>

				<!-------------------------------------
				PODCASTS
				-------------------------------------->
				<div class="col-md-4 col_podcast_home">
					<div class="wrapper__list__article" style="margin-bottom:10px !important">
						<h4 class="border_section borda_podcast" style="margin-bottom:10px !important">Podcasts</h4>
					</div>
					<?php
					#-----------------------
					// Loop podcasts 
					#-----------------------
					$query = new WP_Query(array( 'post_type' => 'podcast', 
					'meta_query'	=> array(
						array(
							'key'	  	=> 'perfil_conteudo',
							'value'	  	=> @$_COOKIE['cookie_perfil'],
							'compare' 	=> 'like',
						),
						array(
							'key'	  	=> 'categoria_conteudo',
							'value'	  	=> @$_COOKIE['cookie_categoria'],
							'compare' 	=> 'like',
						),
						array(
							'key'	  	=> 'usuario',
							'value'	  	=> @$_COOKIE['id_cliente'],
							'compare' 	=> 'like',
						),
					),
					'order' => 'DESC', 'posts_per_page' => '3', ));
					while ($query->have_posts()) : $query->the_post(); 
					?>
						<div class="col-md-12" style="background:#f7f7f7; padding:20px; margin-bottom:5px; border-radius:10px">
							<div class="row">	
								<div class="col-2 col-xs-2" style="padding:0 0 0 10px">
									<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "thumbnail");?>" class="img_downloads" alt="" />
								</div>
								<div class="col-10 col-xs-10">
									<a href="<?php the_permalink();?>" class="tit_podcast"> <?php the_title();?> </a>
								</div>
							</div>
						</div>
					<?php endwhile;?>
					<div class="col-md-12" style="padding:0; margin:10px 0" align="center">
						<a href="<?php bloginfo("url");?>/podcasts" class="btn btn-outline-primary btn_podcast"> Ver mais podcasts </a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-------------------------------------
	VIDEOS
	-------------------------------------->
	<div class="popular__news-header-carousel" style="background:#f7f7f7; padding:40px 0">
		<div class="container">
			<div class="row">
				<div class="col-lg-12" style="background:#f7f7f7; ">
					<div class="wrapper__list__article">
						<h4 class="border_section borda_video">Vídeos</h4>
					</div>
					<div class="row">
						<?php 
						#-----------------------
						// Loop videos
						#-----------------------
						$query = new WP_Query(array( 'post_type' => 'video', 
						'meta_query'	=> array(
							array(
								'key'	  	=> 'perfil_conteudo',
								'value'	  	=> @$_COOKIE['cookie_perfil'],
								'compare' 	=> 'like',
							),
							array(
								'key'	  	=> 'categoria_conteudo',
								'value'	  	=> @$_COOKIE['cookie_categoria'],
								'compare' 	=> 'like',
							),
							array(
								'key'	  	=> 'usuario',
								'value'	  	=> @$_COOKIE['id_cliente'],
								'compare' 	=> 'like',
							),
						),
						'order' => 'DESC', 'posts_per_page' => '10', ));
						while ($query->have_posts()) : $query->the_post(); 
						?>
							<div class="col-md-3 mb-4">
								<div class="article__image">
									<a href="<?php the_permalink();?>">
										<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "medium");?>" alt="" class="img-fluid img_video" />
										<div class="ico_play"><i class="fa fa-play"></i></div>
									</a>
								</div>
								<div class="article__content mt-2">
									<ul class="list-inline mb-0">
										<li class="list-inline-item">
											<span class="badge badge-pill bg_<?php  echo get_post_type(); ?>" style="border-radius:10px">
												<?php 
												foreach(get_field('categoria_conteudo') as $cat):
													if($cat != "Geral"):
														echo "&nbsp;".$cat."&nbsp;";
													endif;
												endforeach; 
												?>
											</span>
										</li>
										<li class="list-inline-item">
											<span class="data_post cor_video"> <?php echo get_the_date('d/M/Y');?> </span>
										</li>
									</ul>
									<h5>
										<a href="<?php the_permalink();?>" class="tit_video"> <?php the_title();?> </a>
									</h5>
								</div>
							</div>
						<?php endwhile;?>
						
					</div>
					<div class="col-md-12" style="padding:0; margin:10px 0" align="center">
						<a href="<?php bloginfo("url");?>/videos" class="btn btn-outline-primary btn_video" style="width:350px !important"> Ver mais vídeos </a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Popular news carousel -->
</section>
<!-- End Popular news -->

<!-------------------------------------
ARTIGOS
-------------------------------------->
<section class="pt-0">
	<!-- Popular news category -->
	<div class="mt-4">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<aside class="wrapper__list__article mb-0">
						<h4 class="border_section borda_artigos">Artigos</h4>
						<div class="row">
							<div class="col-md-12">
								<div class="mb-4">
								<?php 
								#-----------------------
								// Loop de artigos
								#-----------------------
								$query = new WP_Query(array( 'post_type' => 'artigo', 
								'meta_query'	=> array(
									array(
										'key'	  	=> 'perfil_conteudo',
										'value'	  	=> @$_COOKIE['cookie_perfil'],
										'compare' 	=> 'like',
									),
									array(
										'key'	  	=> 'categoria_conteudo',
										'value'	  	=> @$_COOKIE['cookie_categoria'],
										'compare' 	=> 'like',
									),
									array(
										'key'	  	=> 'usuario',
										'value'	  	=> @$_COOKIE['id_cliente'],
										'compare' 	=> 'like',
									),
								),
								'order' => 'DESC', 'posts_per_page' => '4', ));
								while ($query->have_posts()) : $query->the_post(); 
								?>
									<div class="row " style="margin-bottom:15px; padding-bottom:10px">
										<div class="col-md-5">
											<div class="article__image destaque_artigos">
												<a href="<?php the_permalink();?>">
													<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "medium");?>" class="img-fluid w-100" alt="" />
												</a>
											</div>
										</div>
										<div class="col-md-7 my-auto">
											<div class="card__post__body ">
												<div class="card__post__content  ">
													<div class="card__post__author-info mb-2" style="">
														<ul class="list-inline" style="margin-bottom:0">
															<li class="list-inline-item">
																<span class="badge badge-pill bg_<?php  echo get_post_type(); ?>" style="border-radius:10px">
																	<?php 
																	foreach(get_field('categoria_conteudo') as $cat):
																		if($cat != "Geral"):
																			echo "&nbsp;".$cat."&nbsp;";
																		endif;
																	endforeach; 
																	?>
																</span>
															</li>
															<li class="list-inline-item">
																<span class="data_post cor_artigo">
																	<?php echo get_the_date('d/M/Y');?>
																</span>
															</li>
														</ul>
													</div>
													<div class="card__post__title" style="">
														<h5>
															<a href="<?php the_permalink();?>" class="tit_artigo"> <?php the_title();?> </a>
														</h5>
														<p class="d-none d-lg-block d-xl-block mb-0 excerpt"> <?php echo get_field('descricao');?> </p>
													</div>

												</div>
											</div>
										</div>
									</div>
								<?php endwhile;?>
									<div class="col-md-12" style="padding:0; margin:0" align="center">
										<a href="<?php bloginfo("url");?>/artigos" class="btn btn-outline-primary btn_artigo" style="width:350px !important"> Ver mais artigos </a>
									</div>
								</div>
							</div>
						</div>
					</aside>
				</div>

				<!-------------------------------------
				DOWNLOADS
				-------------------------------------->
				<div class="col-md-4">
					<aside class="wrapper__list__article">
						<h4 class="border_section borda_download"> Downloads </h4>
						<div class="row">
							<?php
							$query = new WP_Query(array( 'post_type' => 'download', 
							'meta_query'	=> array(
								array(
									'key'	  	=> 'perfil_conteudo',
									'value'	  	=> @$_COOKIE['cookie_perfil'],
									'compare' 	=> 'like',
								),
								array(
									'key'	  	=> 'categoria_conteudo',
									'value'	  	=> @$_COOKIE['cookie_categoria'],
									'compare' 	=> 'like',
								),
								array(
									'key'	  	=> 'usuario',
									'value'	  	=> @$_COOKIE['id_cliente'],
									'compare' 	=> 'like',
								),
							),
							'order' => 'DESC', 'posts_per_page' => '3', ));
							while ($query->have_posts()) : $query->the_post();
							?>
								<div class="col-4 mb-2">
									<a href="<?php the_permalink();?>">
										<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "full");?>" class="w-100" alt="" />
									</a>
								</div>
							<?php endwhile; ?>
							
							<div class="col-md-12 mt-2">
								<a href="<?php bloginfo("url");?>/downloads" class="btn btn-outline-primary btn_download" style="width:100%"> Ver mais downloads </a>
							</div>
						</div>
					</aside>

					<!------------------------------------
					SIMULADORES
					----------------------------------->
					<aside class="wrapper__list__article">
						<h4 class="border_section borda_simulador"> Simuladores </h4>
						<div class="wrapper__list__article-small">

							<?php 
							$query = new WP_Query(array( 'post_type' => 'simulador', 
							'meta_query'	=> array(
								array(
									'key'	  	=> 'perfil_conteudo',
									'value'	  	=> @$_COOKIE['cookie_perfil'],
									'compare' 	=> 'like',
								),
								array(
									'key'	  	=> 'categoria_conteudo',
									'value'	  	=> @$_COOKIE['cookie_categoria'],
									'compare' 	=> 'like',
								),
								array(
									'key'	  	=> 'usuario',
									'value'	  	=> @$_COOKIE['id_cliente'],
									'compare' 	=> 'like',
								),
							),
							'order' => 'DESC', 'posts_per_page' => '3', ));
							while ($query->have_posts()) : $query->the_post(); 
							?>
								<div class="mb-3">
									<div class="card__post card__post-list">
										<div class="image-sm" style="width:40%; flex:none">
											<a href="<?php the_permalink();?>">
												<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "thumbnail");?>" class="img-fluid" alt="" />
											</a>
										</div>
										<div class="card__post__body ">
											<div class="card__post__content">
												<div class="card__post__author-info mb-2">
													<ul class="list-inline">
														<li class="list-inline-item">
															<span class="data_post cor_simulador">
																<?php echo get_the_date('d/M/Y');?>
															</span>
														</li>
													</ul>
												</div>
												<div class="card__post__title">
													<h6>
														<a href="<?php the_permalink();?>" class="tit_simulador">
															<?php the_title();?>
														</a>
													</h6>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
							
							<div class="col-md-12 mt-2">
								<a href="<?php bloginfo("url");?>/simuladores" class="btn btn-outline-primary btn_simulador" style="width:100%"> Ver mais simuladores </a>
							</div>
						</div>
					</aside>
				</div>

				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</section>
<!-- End Popular news category -->	

<?php get_footer(); ?>
