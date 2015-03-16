<?php
class BookingController extends Controller
{
	
	
	public function actionChoose()
	{
		$user = new User;
		$booking = new Schedule('search');
		$booking->unsetAttributes(); 
		if(isset($_GET['Schedule']))
			$booking->attributes=$_GET['Schedule'];
	
		$this->render('choose',array(
				'booking'=>$booking,
				'user'=>$user,
		));
	}
	
	
	public function actionSelectseat()
	{
		
		$id          = $_REQUEST['id'];
		$date        = $_REQUEST['departure_date'];
		$return_date = $_REQUEST['departure_date'];
		$company_id = $_REQUEST['company_id'];
		$bus_id     = $_REQUEST['bus_id'];
		
		// Sql query
		$sql = 'SELECT seat_no
				FROM  booking_data
				Where company_id='.$company_id.'
				and   bus_id ='.$bus_id.'
				and   departure_date = "'.$date.'"
				or    return_date = "'.$return_date.'"
				';
		$command=Yii::app()->db->createCommand($sql);
		$results = $command->queryAll();
		
		$this->render('selectseat',array(
				'rs' => $results,
		));
	}
	    
	
	
	
	public function actionSummary()
	{
		$id = $_REQUEST['id'];
		
		if( count($_POST["seat_no"])  > 0 ) {
			foreach( $_POST["seat_no"] as $value){
				$number_selected = implode(",", $_POST["seat_no"]);
			}
		}
		// SQL
		$sql = 'UPDATE booking_data
				SET seat_no="'.$number_selected.'"
				WHERE id='.$id.'
				';
		$command=Yii::app()->db->createCommand($sql);
		$command->execute();
		
		$this->render('summary',array(
				'booking_data'=>$this->loadModels($id),
		));
		
	}
	
	
	
	public function actionAddbooking($id)
	{
		$booking = $this->loadModel($id);
		$booking_data = new BookingData('hasReturn');
		$company = Company::model()->findByPK($booking->company_id);
		$promotion = Promotion::model()->findByAttributes(array('company_id'=>$booking->company_id));
		$province_key = Province::model()->findByAttributes(array('name'=>$booking->dest));
		$province_key_return = Province::model()->findByAttributes(array('name'=>$booking->start));

		if(isset($_POST['Schedule']))
		{
			$booking->attributes = $_POST['Schedule'];
			$booking_data->attributes = $_POST['BookingData'];
			
			$selectTripOption = $_POST['trip'];
			
			if($selectTripOption==="one_trip"){
				
				$booking_data->start = $booking->start;
				$booking_data->dest = $booking->dest;
				$booking_data->leave_time = $booking->leave_time;
				$booking_data->arrive_time = $booking->arrive_time;
				$booking_data->bus_id = $booking->bus_id;
				$booking_data->company_id = $booking->company_id;
	
				$booking_data->pay_stat  = 'รอการชำระเงิน';
				$booking_data->staff_name  = '-';
				$booking_data->user_id = Yii::app()->user->id;			
				$booking_data->booking_date  = date('Y-m-d H:i:s');
				
				$booking_data->start_return = '-';
				$booking_data->dest_return = '-';
				$booking_data->leave_time_return = '-';
				$booking_data->arrive_time_return = '-';
				$booking_data->return_point = '-';
				$booking_data->return_date = '-';
				
				if( ($booking_data->departure_date >= $promotion->start_date &&
						$booking_data->departure_date <= $promotion->end_date) ==! NULL ){
				
					$dicount = $booking->price*($promotion->discount_percent / 100);
					$booking_data->price = $booking->price - $dicount;
				
				}else if($booking_data->booking_date >= $promotion->start_date &&
				$booking_data->booking_date <= $promotion->start_date ){
				
					$dicount = $booking->price*($promotion->discount_percent / 100);
					$booking_data->price = $booking->price - $dicount;
				
				}else{
					$booking_data->price = $booking->price;
				}
					$valid = $booking_data->validate();
						
					if($valid)
						if($booking_data->save(false)){
							$this->redirect(array('booking/selectseat',
									'id'				=>$booking_data->ID,
									'departure_date'	=>$booking_data->departure_date,
									'company_id'		=>$booking_data->company_id,
									'bus_id' 			=>$booking->bus_id
							));
						}
			}else{

				$booking_data->start = $booking->start;
				$booking_data->dest = $booking->dest;
				$booking_data->start_return = $booking->dest;
				$booking_data->dest_return = $booking->start;
				$booking_data->leave_time = $booking->leave_time;
				$booking_data->arrive_time = $booking->arrive_time;
				$booking_data->leave_time_return = $booking->arrive_time;
				$booking_data->arrive_time_return = $booking->leave_time;
				$booking_data->bus_id = $booking->bus_id;
				$booking_data->company_id = $booking->company_id;
				
				$booking_data->pay_stat  = 'รอการชำระเงิน';
				$booking_data->staff_name  = '-';
				$booking_data->user_id = Yii::app()->user->id;
				$booking_data->booking_date  = date('Y-m-d H:i:s');

				if( ($booking_data->departure_date >= $promotion->start_date &&
						$booking_data->departure_date <= $promotion->end_date) ==! NULL ){
				
					$dicount = $booking->price*($promotion->discount_percent / 100);
					$booking_data->price = $booking->price - $dicount;
				
				}else if($booking_data->booking_date >= $promotion->start_date &&
				$booking_data->booking_date <= $promotion->start_date ){
				
					$dicount = $booking->price*($promotion->discount_percent / 100);
					$booking_data->price = $booking->price - $dicount;
				
				}else{
					$booking_data->price = $booking->price;
				}
				
				$valid = $booking_data->validate('hasReturn');
				
				if( $booking_data->return_date == $booking_data->departure_date ||
				    $booking_data->return_date < $booking_data->departure_date )
				{
					Yii::app()->user->setFlash('unsuccess', "วันที่เดินทางเที่ยวกลับต้องไม่ถูกต้อง");
					$this->refresh();
				}
				
				if($valid)
					if($booking_data->save(false)){
						$this->redirect(array('booking/summary','id'=>$booking_data->ID));
					}	
			}
		}
	
		$this->render('booking',array(
				'booking'=>$booking,
				'booking_data'=>$booking_data,
				'company'=>$company,
				'province_key'=>$province_key,
				'province_key_return'=>$province_key_return,
		));
	}
	
	public function actionAddbookingStaff($id)
	{
		$booking = $this->loadModel($id);
		$booking_data = new BookingData;
		$company = Company::model()->findByPK($booking->company_id);
	
		if(isset($_POST['Schedule']))
		{
			$booking->attributes = $_POST['Schedule'];
			$booking_data->attributes = $_POST['BookingData'];
				
			$booking_data->start = $booking->start;
			$booking_data->dest = $booking->dest;
			$booking_data->price = $booking->price;
			$booking_data->leave_time = $booking->leave_time;
			$booking_data->arrive_time = $booking->arrive_time;
			$booking_data->standard = $booking->standard;
			$booking_data->company_id = $booking->company_id;

			$booking_data->booking_date  = date('Y-m-d H:i:s');
			$booking_data->pay_stat  = 'จำหน่ายตั๋วแล้ว';
			$booking_data->staff_name  = Yii::app()->user->name;
			$booking_data->user_id = Yii::app()->user->id;
	
			$valid = $booking_data->validate();
				
			if($valid)
				if($booking_data->save(false)){
					$this->redirect(array('booking/summary','id'=>$booking_data->ID));
				}
		}
	
		$this->render('booking_staff',array(
				'booking'=>$booking,
				'booking_data'=>$booking_data,
				'company'=>$company,
		));
	}
	
	public function loadModel($id)
	{
		$booking=Schedule::model()->findByPk($id);
		if($booking===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $booking;
	}
	
	public function loadModels($id)
	{
		$booking_data=BookingData::model()->findByPk($id);
		if($booking_data===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $booking_data;
	}
}