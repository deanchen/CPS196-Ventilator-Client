<textarea id="education" class="x-hidden-display">
  <div id="card-content">
    <tpl if="cardNum == 1">
      <h1>Welcome</h1>
      <p>Your loved one has been on a mechanical ventilator for much longer than average.</p>
      <p>Your loved one can't tell the doctor what goals of treatment fit best with their wishes.</p>
      <p>Because your loved one can't tell us now what treatment goals fit their wishes, they need your help.</p>
      <p>This decision aid tool will help you to decide about goals of treatment for a loved one in an intensive care unit (ICU).</p>
      <!--
      <ul>
        <li><p>This will take about 30 minutes.</p></li>
        <li><p>Please read each page.</p></li>
        <li><p>Once you finish reading the basic awareness material, you will be presented a survey.</p></li>
      </ul>
      <h3>Please swip right to continue, you can also swipe left to return to this page.</h3>
      <h3>The shaded circles below shows your progress.</h3>
      -->
    </tpl>
    
    <tpl if="cardNum == 2">
      <h1>What You Will Learn About</h1>
      <h2>Mechanical ventilators</h2>
      <h2>What happens to people who stay on mechanical ventilators for longer than average</h2>
      <h2>Choices you need make about goals of care for your loved one</h2>
      <h2>The advantages and disadvantages of each choice</h2>
      <h2>How to make the best decision for your loved one - with the support of the ICU team</h2>
    </tpl>
    
    <tpl if="cardNum == 3">
      <h1>What is a Mechanical Ventilator?</h1>
      <h2>A mechanical ventilator is an artificial breathing machine.</h2>
      <h2>The ventilator pumps oxygen into the lungs through a breathing tube</h2>
      <h2>The breathing tube is put through the mouth into the windpipe.</h2>
      <h2>The ventilator supports a patient while treatments are given for their main problem. The ventilator itself does not cure the problem.</h2>
    </tpl>
    
    <tpl if="cardNum == 4">
      <h1>What is it Like to Receive Mechanical Ventilation?</h1>
      <h2>It is uncomfortable to be hooked up to a ventilator, so patients get medicines for pain and to help them relax while they are on it.</h2>
      <h2>Because the tube in a patient's mouth, they can't eat or drink by mouth while they are receiving mechanical ventilation.</h2>
    </tpl>
    
    <tpl if="cardNum == 5">
      <h1>What Happens to People on Ventilators?</h1>
      <img src='education/images/ventilator_pie.jpg' />
      <h2>Most ICU patients no longer need a ventilator within 3 or 4 days.</h2>
      <h2>Your loved one has been on a ventilator for much longer than average.</h2>
    </tpl>
    
    <tpl if="cardNum == 6">
      <h1>Why is My Loved One Still on a Mechanical Ventilator?</h1>
      <h2>Normally, the ICU doctor takes a patient off the ventilator when:</h2>
      <ul>
        <li><p>The patient has recovered a good deal</p></li>
        <li><p>The patient seems strong enough to breathe on their own</p></li>
      </ul>
      <h2>Still, some patients survive the first few ICU days but don't recover enough to breathe on their own without a ventilator. This is what is happening with your loved one.</h2>
      <h2 style="text-decoration: underline">Doctors still try hard every day to help each patient get off the ventilator.</h2>
    </tpl>
    
    <tpl if="cardNum == 7">
      <h1>What are Different Treatment Goals?</h1>
      <p>Your loved one has been on a ventilator in an ICU for much longer than most ICU patients.</p>
      <p>It is important to think about what the best treatment goals for your loved one should be.</p>
      <p>The doctors need your guidance to understand what types of treatments best fit your loved one's wishes.</p>
      <p>There are three main goals of treatment at this point for your loved one. These are shown in the figure below:</p>
      <img src='education/images/goals_of_treatment.jpg' />
    </tpl>
    
    <tpl if="cardNum == 8">
      <h1>Advantages and Disadvantages of Different Treatment Goals</h1>
      <img src='education/images/pro_con_treatment.jpg' />
    </tpl>
    
    <tpl if="cardNum == 9">
      <h1>Why do I have to make a decision for my loved one?</h1>
      <h2>When people are too sick to make their own medical choices, someone close to them like you must do it - you are one most likely to know what they would want. Your job is not to make the decision that you want, but to make the decision your loved one would want if they could tell us.</h2>
      <h2>What your loved one would want may not be the same as what you would want for yourself.</h2>
      <h2>If your loved one has a living will or has told you what he or she wants, you should respect those wishes.</h2>
      <h2>Making a choice like this for someone else can be very hard. The next section will help you as you go through the steps.</h2>
    </tpl>
    
    <tpl if="cardNum == 10">

<h1>Where are 100 patients just like my loved one after 1 year?</h1>
      <h2 style="margin-bottom: 0px">This diagram shows what has happened after 1 year to 100 patients just like your loved one if the current treatment plan is continued. Each circle represents one person.</h2>

     <div class="pictogram">
      <?php 
	// make web service call to get the statistics and display it using css 3
	$api_url ='http://' . $_SERVER['SERVER_NAME'] . '/api/rest/report/' . $_SESSION['session_id'];
      	$survival = json_decode(file_get_contents($api_url));
      ?>
      	<div id="dead" class="block left">
      		<h3 class="label"><?php echo $survival->dead; ?> dead</h2>
      		<div style="clear: both"></div>
      		<?php for ($i = 0; $i<$survival->dead; $i++): ?>
      			<div class='circle'></div>
      		<?php endfor; ?>	
      		<div style="clear: both"></div>

      		
      	</div>

      	<div id="nursing_home" class="block">
      		<h3 class="label"><?php echo $survival->nursing_home; ?> in a nursing home</h2>
			<div style="clear: both"></div>
      		<?php for ($i = 0; $i<$survival->nursing_home; $i++): ?>
      			<div class='circle'></div>
      		<?php endfor; ?>
      		<div style="clear: both"></div>	
  
      		
      	</div>
      	<div class='separator'></div>
      
		<div id="dependent_on_others" class="block left">
			<h3 class="label"><?php echo $survival->dependent_on_others; ?> home but dependent on others</h2>
			<div style="clear: both"></div>
			<?php for ($i = 0; $i<$survival->dependent_on_others; $i++): ?>
      			<div class='circle'></div>
      		<?php endfor; ?>
      		<div style="clear: both"></div>
      		
		</div>
		<div id="independent" class="block">
			<h3 class="label"><?php echo $survival->independent; ?> home and independent</h2>
				<div style="clear: both"></div>
			<?php for ($i = 0; $i<$survival->independent; $i++): ?>
      			<div class='circle'></div>
      		<?php endfor; ?>	
      		<div style="clear: both"></div>
      		
		</div>
		</div>
    </tpl>
    <!--
    <tpl if="cardNum == 11">
      <h1><a href="survey.php" style="color: white;">Take the Survey</a></h1>
     
    </tpl>
    -->
  </div>
</textarea>
