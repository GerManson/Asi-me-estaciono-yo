<div id="content">
     <a name="show"></a>

     <div id="ads">
     <script type="text/javascript"><!--
     google_ad_client = "ca-pub-3191102604317181";
     /* Asi Me Estaciono Yo */
     google_ad_slot = "6319234176";
     google_ad_width = 728;
     google_ad_height = 90;
     //-->
     </script>
     <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
     </div>

	<? foreach($model as $toilet): ?>
		<div id="toilet">

			<div class="image">
				<? if ($previous > 0): ?>
					<span class="previous"><?= anchor("//view/" . $previous . "#show","<");?></span>
				<? endif; ?>
				<?= img("public/uploaded/" . $toilet->image .".jpg"); ?>
				<? if ($next > 0): ?>
                    <span class="next"><?= anchor("//view/" . $next . "#show",">");?></span>
				<? endif; ?>
			</div>
		
			<div class="toiletinfo">
		
              <div class="votes">
					<? if ($this->session->userdata($toilet->id) > 0 || $this->session->userdata($toilet->id) == 0): ?>
						<?= anchor("/main/voteup/" . $toilet->id, img("public/images/up.png"), 'id="voteup" onclick="javascript: return false;"'); ?> 
					<? endif; ?>

					<span id="votescount">
					<? if ($toilet->votes >= 0): ?>
						<span class="count green">+<?= $toilet->votes ?></span>
					<? else: ?>
						<span class="count red"><?= $toilet->votes ?></span>
					<? endif; ?>
					
                    </span>
					
					<? if ($this->session->userdata($toilet->id) < 0 || $this->session->userdata($toilet->id) == 0): ?>
						<?= anchor("/main/votedown/" . $toilet->id, img("public/images/down.png"), 'id="votedown" onclick="javascript: return false;"'); ?> 
					<? endif; ?>

                    <br />
                    <span class="disclamer"><a href="#info" rel="facebox">¿que es esto?</a></span>
                    
                    <div id="info"> 
                        <h2>¿Confundido en como votar?</h2>
                        
                        <p>En realidad es bastante sencillo:</p>

                        <p>
                            <b>Vota +</b> si piensas que la foto es una buena contribucion al sitio.
                        </p>
                        <p>
                            <b>Vota -</b> si piensas que la foto <u>no</u> es una buena contribucion al sitio.
                        </p>
                    </div>

               </div>

				<div class="uploaded">
					<span class="location"><?= $toilet->title; ?></span><br />
					<span class="name">en <i><?= $toilet->location ?></i> hace <i><?= time_since($toilet->created) ?></i><br />
                    por: <?= anchor("http://www.facebook.com/profile.php?id=" . $toilet->userid, $toilet->name); ?></span>
               </div>
				
			</div>

            <? if($location): ?>

           <h3>Mapa de la foto</h3>

               <div class="map" style="margin: 0 auto">
               <img src="http://maps.googleapis.com/maps/api/staticmap?zoom=13&size=640x150&maptype=roadmap&markers=color:red%7Clabel:E%7C<?= $location ?>&sensor=false" />
               </div>
            
           <? endif; ?>
        			
			<div class="comments">
				<?
					$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
				?>
			     <fb:comments href="<?= $url; ?>" num_posts="15" width="700"></fb:comments>
			</div>

            

		</div>
		
	<? endforeach; ?>

</div>