<?php
require 'entityModel.php';
require 'EntityValidation.php';

class entityMovie{

	public function callValidation()
     {
       $classEntityValidation = new entityValidation();
       return $this->$classEntityValidation;
     }

	public function saveActorDetailsJSON($name, $dob){
		$nonEmptyValidationActor= $this->$classEntityValidation->nonEmptyValidationActor($title, $runTime, $reldate);
    $propertyValidationActor = $this->$classEntityValidation->checkActorPropertiesValidation($title, $runTime, $reldate);
        //if the data is not empty and is unique then get the values and create a json formats
		if($nonEmptyValidationActor && $propertyValidationActor){
			$movie_id = uniqid("act_");
			$data = Array (
					'uniqueNo'=> $uniqueIdentity,
					'ActorName'=> $name,
					'ActorDob' => $dob
					);
			$json = json_encode($data);
			return $json;
		}

	}

	public function getActorDetails($name, $uniqueNo){
		//get movie details for a particular case(assuming that movie name is passed and unique identity number is sent as hidden form HTML)
		$getMovieDetails = $this->$classEntityValidation->nonEmptyValidationMovie($name, $uniqueNo);
		return $getMovieDetails;
	}

}

$entityValidation->validateMovieDetails();
?>