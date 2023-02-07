<?php 

class entityValidation{
	
		public function __construct($title, $runTime, $reldate, $name, $dob){
        	$this->title = $title;
        	$this->runTime = $runTime;
        	$this->reldate = $reldate;
        	$this->name = $name;
        	$this->dob = $dob;
    	}
		//check for empty values
		public function nonEmptyValidationMovie($title, $runTime, $reldate){

			//null value validation check
			if(!$title){
				throw new nullMovieName('Movie name is required');
			}

			if(empty($runTime)){
				throw new nullrunTime('Run time of movie cannot is required');
			}

			if(empty($reldate) && (strtotime($reldate) != '0000-00-00')){
				throw new nullRelDate('Release date is required');
			}

		}
	
		public function checkMoviePropertiesValidation($title, $runTime, $reldate){

			//check if movie title is alphanumeric
			if(preg_match('/[^a-z_\-0-9]/i', $title,)){
				return true;
			}

			if(is_float($runTime)){
				return true;
			}

			eturn empty($dob) ? false : dateValidation($reldate);

		}
	
		public function nonEmptyValidationActor($name, $dob){

			//null value validation check
			if(!$name){
				throw new nullActorName('Actor name is required');
			}

			if(empty($dob) && (strtotime($dob) != '0000-00-00')){
				throw new nullRelDate('Date of birth is required');
			}

		}

		public function checkActorPropertiesValidation($name, $dob){

			//check if movie title is alphanumeric
			if(preg_match('/[^a-zA-Z]/', $name)){
				return true;
			}

			return empty($dob) ? false : dateValidation($dob);


		}


		public function dateValidation($date){

			//check if movie title is alphanumeric
			//lets assume the data is required in the formart of yyyy-mm-dd format
			$format = "Y-m-d";
			if(date($format, strtotime($date)) == date($date)) {
    			return true;
			} else {
    			return false;
			}

		}
	
}

 	
    
$objEntityValidation = new entityValidation;



?>