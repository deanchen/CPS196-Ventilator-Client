<style>
.circle {
 height: 24px;
 -moz-border-radius:12px;
 -webkit-border-radius: 12px;
 width: 24px;
 float: left;
 -moz-box-shadow: -1px 1px 3px #000;
 -webkit-box-shadow: -1px 1px 3px #000;
 -o-box-shadow: -1px 1px 3px #000;
 box-shadow: -1px 1px 3px #000;
 margin-right: 3px;
 margin-bottom: 3px;
}

#dead .circle {
	background-color: black;
}

#nursing_home .circle {
	background-color: red;
}

#dependent_on_others .circle {
	background-color: orange;
}

#independent .circle {
	background-color: green;
}

.pictogram {
	width: 700px;
}
.label {
	text-align: center;
}

#dead {
	float: left;
}

.pictogram > .block {
	width: 300px;
	float: left;
	padding-right: 1em;
}

.separator {
	clear: both;
}
</style>


<h1>Where are 100 patients just like my loved one after 1 year?</h1>
      <h2>This diagram shows what has happened after 1 year to 100 patients just like your loved one if the current treatment plan is continued. Each circle represents one person.</h2>

     <div class="pictogram">
      <?php 
      	$survival = json_decode(file_get_contents('http://ventilator-dev.ocirs.com/api/rest/report/4578340113')) ;
      ?>
      	<div id="dead" class="block">
      		<h3 class="label"><?php echo $survival->dead; ?> dead</h2>
      		
      		<?php for ($i = 0; $i<$survival->dead; $i++): ?>
      			<div class='circle'></div>
      		<?php endfor; ?>	
      		<div style="clear: both"></div>

      		
      	</div>

      	<div id="nursing_home" class="block">
      		<h3 class="label"><?php echo $survival->nursing_home; ?> in a nursing home</h2>

      		<?php for ($i = 0; $i<$survival->nursing_home; $i++): ?>
      			<div class='circle'></div>
      		<?php endfor; ?>
      		<div style="clear: both"></div>	
  
      		
      	</div>
      	<div class='separator'></div>
      
		<div id="dependent_on_others" class="block">
			<h3 class="label"><?php echo $survival->dependent_on_others; ?> home but dependent on others</h2>

			<?php for ($i = 0; $i<$survival->dependent_on_others; $i++): ?>
      			<div class='circle'></div>
      		<?php endfor; ?>
      		<div style="clear: both"></div>
      		
		</div>
		<div id="independent" class="block">
			<h3 class="label"><?php echo $survival->independent; ?> home and independent</h2>
			<?php for ($i = 0; $i<$survival->independent; $i++): ?>
      			<div class='circle'></div>
      		<?php endfor; ?>	
      		<div style="clear: both"></div>
      		
		</div>
		</div>
