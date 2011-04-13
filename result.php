<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>Survey Results</title>

<link href="/api/css/styles.css" rel="stylesheet" type="text/css" />

<style>

.ieDiv{

  display:none;

}

</style>

<!--[if lte IE 6]> 

<style>

.ieDiv{

  background-color:#808080;

  color:#000000;

  display:block;

  text-align:center;

  width:100%;

  height:100%;

  padding-top:10px;

}

.content_div{

  display:none;

}

</style>

<![endif]-->

<script type="text/javascript">

function $id(id){ 

  return document.getElementById(id);

}

function radio_group_val(id){

  for(var i=0;i<document.getElementsByName(id).length;i++){

    var chked = 0;

    if(document.getElementsByName(id)[i].checked){

      chked=1;

      break;

    }

  }

  if(!chked)

  return false;

  else

  return true;

}

</script>

</head>

<body>

<div class="ieDiv"><h1><strong>You are using older version of Internet Explorer. <br/><br/>Please upgrade your browser <br/><br/>or use mozilla, chrome or any other browser</strong></h1></div>



    <div id="workArea"> 	      <table cellpadding="0" cellspacing="0" border="0" width="100%">

<tr><td valign="top" height="10px">

<div class="alert" style="text-align: center">

  <p>This figure shows what direction the you may be leaning in their decision about treatment goals for their loved one.</p>

  <p>On the far left side of the line below is comfort care. The far right represents doing everything possible for survival.</p>

  <p>The BLUE TRIANGLE on the line shows where you might be leaning based on your answers to the survey questions.</p>

</div>

</td></tr>

<tr><td valign="middle" style="text-align:center;" id="temp_div">

<div  id="slider-div">

  <div id="slider"> </div>

  <img src="http://test.teamkollab.com/pmv/themes/default/images/arrow.png" id="slider_arrow"  />

  <div id="sliderArrow"></div>

</div>

<div id="sliderSteps">

  <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

    <tr>

      <td valign="top" align="left" colspan="3"></td>

    </tr>

    <tr>

      <td valign="top" align="left" width="25%">Comfort</td>

      <td valign="top" align="center">Survival but no <br/>

        prolonged life support</td>

      <td valign="top" align="right" width="25%">Survival at All Cost</td>

    </tr>

  </table>

</div>

</td></tr>

<tr><td>


</td></tr></table>

<script type="text/javascript">

var points = parseInt("<?php echo $_GET['points']; ?>");

var incr =0;

if(points >= 8 && points <= 9)

incr+=191.25;

else if(points >=3 && points<=5)

incr+=573.75;

else if(points <= 2)

incr+=765;

else if(points >= 6 && points <= 7)

incr+=382.5;

$id("slider_arrow").style.left = incr+"px";



document.getElementById("temp_div").style.height = (document.height-350)+"px";

</script>
<h2 style='text-align: center'>Thank you for completing this survey.<br /><br />Please return this device to the nurse.</h2>

</div>

</body>

</html>
