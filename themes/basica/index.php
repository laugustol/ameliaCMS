<section id="main-slider" class="no-margin">
	<?php
		$slider = new \models\sliderModel;
		$slid = $slider->query_all();
	?>
    <div class="carousel slide">
        <ol class="carousel-indicators">
        	<?php
        		for($i=0;$i<count($slid);$i++){
        			echo "<li data-target='#main-slider' data-slide-to='".$i."' ".(($i==0)? "class='active'" : '')."></li>";
        		}
        	?>
        </ol>
        <div class="carousel-inner">
        	<?php
        		foreach ($slid as $k => $s) {
        			echo "<div class='item ".(($k==0)? 'active' : '')."' style='background-image: url(".url_base.$s["src"].")'>
			                <div class='container'>
			                    <div class='row'>
			                        <div class='col-sm-12'>
			                            <div class='carousel-content centered'>
			                                <h2 class='animation animated-item-1'>".$s["title"]."</h2>
			                                <p class='animation animated-item-2'>".$s["description"]."</p>
			                                <br>
                                    		<a class='btn btn-md animation animated-item-3' href='#'>".theme_read_more."</a>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			            </div>";
        		}
        	?>
        </div>
    </div>
    <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
        <i class="icon-angle-left"></i>
    </a>
    <a class="next hidden-xs" href="#main-slider" data-slide="next">
        <i class="icon-angle-right"></i>
    </a>
</section>
<div class="section section-white">
    <div class="container">
    	<div class="row">
    		<div class="section-title"><h1><?=servicehome?></h1></div>
    		<?php
    			$servicehome = new \models\servicehomeModel;
				$serv = $servicehome->query_all();
				foreach ($serv as $k => $s) {
					echo "<div class='col-md-4 col-sm-6'>
			    			<div class='service-wrapper'>
			        			".((!empty($s["class"]))? "<i class='".$s["class"]." ".$s["name"]."'></i>" : "<img src='".url_base.$s["src"]."' >" )."
			        			<h3>".$s["title"]."</h3>
			        			<p>".$s["description"]."</p>
			        			".(($s["link"]=='1')? '<a href="'.url_base."page/show/".$s["url"].'" class="btn">'.theme_read_more.'</a>' : '')."
			        		</div>
			    		</div>";
				}
    		?>
    	</div>
    </div>
</div>
<hr>
<div class="section section-white">
    <div class="container">
    	<div class="row">
			<div class="section-title"><h1><?=portfolio?></h1></div>
			<ul class="grid cs-style-3">
				<?php
					$portfolio = new \models\portfolioModel;
					$port = $portfolio->query_all();
					foreach ($port as $k => $p) {
						echo "<div class='col-md-4 col-sm-6'>
								<figure>
									<img src='".url_base.$p["src"]."' alt='".$p["alternative"]."'>
									<figcaption>
										<h3>".$p["title"]."</h3>
										<span>".$p["description"]."</span>".(($p["link"]=='1')?'
										<a href="'.url_base."page/show/".$p["url"].'">'.theme_read_more.'</a>' : '')."
									</figcaption>
								</figure>
				        	</div>";
					}
				?>
			</ul>
    	</div>
    </div>
</div>