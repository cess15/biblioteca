<?php 
	
	function delete_session(){
	
		if(isset($_SESSION['success'])){
			$_SESSION['success']=null;
			unset($_SESSION['success']);
		}
		if (isset($_SESSION['error'])) {
			$_SESSION['error']=null;
			unset($_SESSION['error']);
		}
	}

?>