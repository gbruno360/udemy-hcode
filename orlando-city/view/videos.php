<?php include_once("header.php");?>

<link rel="stylesheet" href="https://cdn.plyr.io/3.5.2/plyr.css" />

					<section id="video">							
							<div id="call-to-action">
								<div id="conteudo"class="container">					
										<div class="row text-center">
											<h2>Videos</h2>
											<hr id="video">	
											<video id="player" poster="img/highlights.jpg" playsinline controls>
												<source src="mp4/highlights.mp4" type="video/mp4"/>
												<track kind="captions" label="Português (Brasil)" src="vtt/legendas.ass" srclang="pt-br" default>
											</video>
											<!--<input type="range" id="volume" min="0" max="1" step="0.01" value="1" style="margin-top:10px;">-->
											<!--<button id="button-play-pause" type="button" class="btn btn-success">PLAY</button>-->
											<h2 style="padding-top:10px;font-size:28pt;">Latest Videos</h2>
											<hr id="video">	
										</div>
										<div class="row">
										</div>					
									</div>					
								</div>
								<div id="videos" class="container">
											<div class="row thumbnails owl-carousel owl-theme">
											<div class="items" data-video="highlights">
													<div class="item-inner">
														<img src="img/highlights.jpg" alt="Noticia">
														<h3>Highlights</h3>
													</div>
											</div>
											<div class="items" data-video="foundation">
												<div class="item-inner">
													<img src="img/foundation.jpg" alt="Noticia">
													<h3>Orlando City Foundation 2015</h3>
												</div>
											</div>
											<div class="items" data-video="highlights">
												<div class="item-inner">
													<img src="img/highlights.jpg" alt="Noticia">
													<h3>Highlights</h3>
												</div>
										</div>
											<div class="items" data-video="foundation">
												<div class="item-inner">
													<img src="img/foundation.jpg" alt="Noticia">
													<h3>Orlando City Foundation 2015</h3>
												</div>
											</div>
											<div class="items" data-video="highlights">
												<div class="item-inner">
													<img src="img/highlights.jpg" alt="Noticia">
													<h3>Highlights</h3>
												</div>
										</div>
											<div class="items" data-video="foundation">
												<div class="item-inner">
													<img src="img/foundation.jpg" alt="Noticia">
													<h3>Orlando City Foundation 2015</h3>
												</div>
											</div>
										</div>
								</div>															
					</section>

		<?php include_once("footer.php");?>

		<script>
			$(function(){

				$(".thumbnails .items").on("click", function(){				

					$("video").attr({
						"src":"mp4/"+$(this).data('video')+".mp4",
						"poster":"img/"+$(this).data('video')+".jpg"
					});
					$("div.plyr__poster").attr({
						"style":"background-image: url(img/"+$(this).data('video')+".jpg);"
					});

				});

				/*$("#volume").on("mousemove", function(){

					$("video")[0].volume = parseFloat($(this).val());

				});

				$("#button-play-pause").on("click", function(){

					var video = $("video")[0];

					if ($(this).hasClass("btn-success")) {
							$(this).text("STOP");
							video.play();
					} else {
						$(this).text("PLAY");
						video.pause();
					}

					$(this).toggleClass("btn-success btn-danger");

				});*/

			});
		</script>
		<script src="https://cdn.plyr.io/3.5.2/plyr.js"></script>
		<script>
			const player = new Plyr('#player');
		</script>