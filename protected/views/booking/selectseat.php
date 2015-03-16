<div class="">
<h3> เลือกที่นั่ง </h3>
  
   <?php
		$seat_selected = array();
		
		foreach ($rs as $value) {
			$seats = explode(",", $value['seat_no']);
					
			foreach ($seats as $seat){	
				$seat_selected[] = $seat ;
			}		 
		}		
		
		//print_r($seat_selected) ;
		//echo count($seat_selected);
		?>
		
 		<!--  -->	
  <div class="">		
  <form id="seat" name="select_seat" method="post" action="index.php?r=booking/summary">
  <table class="table table-bordered">
  <tr>
 <?php 
 		$id = $_REQUEST['id'];
 		?>
 		<input type="hidden" name="id" value="<?=$id;?>">
 		
 		<?php 
		$no1 = 1;
		if( in_array( $no1 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no1?><br> จองเเล้ว</td>
			
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>  
  <input type="checkbox" name="seat_no[]" value="1"/>  หมายเลข  1</td>
		<?php }?>
 	 
 <?php 
		$no3 = 3;
		if( in_array( $no3 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no3?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>  
  <input type="checkbox" name="seat_no[]" value="3"/>  หมายเลข  3</td>
		<?php }?>
		
	<?php 
		$no5 = 5;
		if( in_array( $no5 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no5?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>  
  <input type="checkbox" name="seat_no[]" value="5"/>  หมายเลข  5</td>
		<?php }?>
  
 <?php 
		$no7 = 7;
		if( in_array( $no7 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no7?><br> จองเเล้ว</td>
		<?php } else { ?>
   <td class="span1"><img alt="" src="images/seat-icon.png"><br>  
  <input type="checkbox" name="seat_no[]" value="7"/>  หมายเลข  7</td>
		<?php }?>
		
  <?php 
		$no9 = 9;
		if( in_array( $no9 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no9?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="9"/>  หมายเลข  9</td>
		<?php }?>
		
  <?php 
		$no11 = 11;
		if( in_array( $no11 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no11?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="11"/>  หมายเลข 11</td>
		<?php }?>

   <?php 
		$no13 = 13;
		if( in_array( $no13 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no13?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="13"/>  หมายเลข 13</td>
		<?php }?>
		
	  <?php 
		$no15 = 15;
		if( in_array( $no15 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no15?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="15"/>  หมายเลข 15</td>
		<?php }?>
		
		 <?php 
		$no17 = 17;
		if( in_array( $no17 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no17?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="17"/>  หมายเลข 17</td>
		<?php }?>
		
		 <?php 
		$no19 = 19;
		if( in_array( $no19 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no19?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="19"/>  หมายเลข 19</td>
		<?php }?>
		
		 <?php 
		$no21 = 21;
		if( in_array( $no21 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no21?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="21"/>  หมายเลข 21</td>
		<?php }?>
  </tr>
  
  
  <tr>
  <?php 
		$no2 = 2;
		if( in_array( $no2 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no2?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="2"/>  หมายเลข 2</td>
		<?php }?>
		
   <?php 
		$no4 = 4;
		if( in_array( $no4 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no4?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="4"/>  หมายเลข 4</td>
		<?php }?>
		
   <?php 
		$no6 = 6;
		if( in_array( $no6 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no6?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="6"/>  หมายเลข  6</td>
		<?php }?>
		
   <?php 
		$no8 = 8;
		if( in_array( $no8 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no8?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="8"/>  หมายเลข  8</td>
		<?php }?>
		
   <?php 
		$no10 = 10;
		if( in_array( $no10 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no10?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="10"/>  หมายเลข  10</td>
		<?php }?>
		
  <?php 
		$no12 = 12;
		if( in_array( $no12 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no12?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="12"/>  หมายเลข  12</td>
		<?php }?>
		
  <?php 
		$no14 = 14;
		if( in_array( $no14 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no14?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="14"/>  หมายเลข  14</td>
		<?php }?>
		
	<?php 
		$no16 = 16;
		if( in_array( $no16 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no16?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="16"/>  หมายเลข  16</td>
		<?php }?>
		
	<?php 
		$no18 = 18;
		if( in_array( $no18 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no18?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="18"/>  หมายเลข  18</td>
		<?php }?>
		
	<?php 
		$no20 = 20;
		if( in_array( $no20 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no20?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="20"/>  หมายเลข  20</td>
		<?php }?>
		
	<?php 
		$no22 = 22;
		if( in_array( $no22 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no22?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="22"/>  หมายเลข  22</td>
		<?php }?>
  </tr>
  
  </table>
  
  
 <table class="table table-bordered">
 <tr>
  <?php 
		$no23 = 23;
		if( in_array( $no23 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no23?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="23"/>  หมายเลข  23</td>
		<?php }?>
		
		  <?php 
		$no25 = 25;
		if( in_array( $no25 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no25?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="25"/>  หมายเลข  25</td>
		<?php }?>
		
		  <?php 
		$no27 = 27;
		if( in_array( $no27 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no27?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="27"/>  หมายเลข  27</td>
		<?php }?>
		
		 <?php 
		$no29 = 29;
		if( in_array( $no29 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no29?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="29"/>  หมายเลข  29</td>
		<?php }?>
		
		<td class="span1" style="border-right: none;  "></td>
		<td class="span1" style="border-left: none; "></td>
		
		 <?php 
		$no31 = 31;
		if( in_array( $no31 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no31?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="31"/>  หมายเลข 31</td>
		<?php }?>
		
		 <?php 
		$no33 = 33;
		if( in_array( $no33 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no33?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="33"/>  หมายเลข 33</td>
		<?php }?>
		
		 <?php 
		$no35 = 35;
		if( in_array( $no35 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no35?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="35"/>  หมายเลข 35</td>
		<?php }?>
		
		 <?php 
		$no37 = 37;
		if( in_array( $no37 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no37?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="37"/>  หมายเลข 37</td>
		<?php }?>
		
		<?php 
		$no39 = 39;
		if( in_array( $no39 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no39?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="39"/>  หมายเลข 39</td>
		<?php }?>
 </tr>
 
 <tr>
 <?php 
		$no24 = 24;
		if( in_array( $no24 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no24?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="24"/>  หมายเลข 24</td>
		<?php }?>
		
		 <?php 
		$no26 = 26;
		if( in_array( $no26 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no26?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="26"/>  หมายเลข 26</td>
		<?php }?>
		
		 <?php 
		$no28 = 28;
		if( in_array( $no28 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no28?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="28"/>  หมายเลข 28</td>
		<?php }?>
		
		 <?php 
		$no30 = 30;
		if( in_array( $no30 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no30?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="30"/>  หมายเลข 30</td>
		<?php }?>
		
		<td class="span1" style="border-right: none; border-top: none;  "></td>
		<td class="span1" style="border-left: none; border-top: none;   "></td>
		
		 <?php 
		$no32 = 32;
		if( in_array( $no32 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no32?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="32"/>  หมายเลข 32</td>
		<?php }?>
		
		 <?php 
		$no34 = 34;
		if( in_array( $no34 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no34?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="34"/>  หมายเลข 34</td>
		<?php }?>
		
		 <?php 
		$no36 = 36;
		if( in_array( $no36 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no36?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="36"/>  หมายเลข 36</td>
		<?php }?>
		
		 <?php 
		$no38 = 38;
		if( in_array( $no38 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no38?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="38"/>  หมายเลข 38</td>
		<?php }?>
		
		 <?php 
		$no40 = 40;
		if( in_array( $no40 , $seat_selected )) { ?>
			<td class="span1" style="background-color: #FFCC99">หมายเลข <?php echo $no40?><br> จองเเล้ว</td>
		<?php } else { ?>
  <td class="span1"><img alt="" src="images/seat-icon.png"><br>
  <input type="checkbox" name="seat_no[]" value="40"/>  หมายเลข 40</td>
		<?php }?>
 </tr>
 </table>

  <input type="submit" name="button" id="button" value="Submit" />  
 </form>
 </div></div>
   
   <div style="clear:both;width:100%"></div>
   
 <script type="text/javascript">
   var limit=2;
$(":checkbox[name$='seat_no[]']").bind("click",function() {
  var result = ($(":checkbox[name$='seat_no[]']:checked").size() <= limit);
  if( result ){
    ;
  }else{
    alert("เลือกได้ " + limit + "หมายเลขเท่านั้น");
  }
  return result;
});
</script>
   
   
   
   
   
