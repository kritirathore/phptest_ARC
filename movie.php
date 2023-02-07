<?php
require 'entityModel.php';
require 'EntityValidation.php';

class entityMovie{

	public function callValidation()
     {
       $classEntityValidation = new entityValidation();
       return $this->$classEntityValidation;
     }

	public function saveMovieDetailsJSON($title, $runTime, $reldate){
		$nonEmptyValidationMovie = $this->$classEntityValidation->nonEmptyValidationMovie($title, $runTime, $reldate);
        $propertyValidationMovie = $this->$classEntityValidation->checkMoviePropertiesValidation($title, $runTime, $reldate);
        //if the data is not empty and is unique then get the values and create a json formats
		if($nonEmptyValidationMovie && $propertyValidationMovie){
			$movie_id = uniqid("mov_");
			$data = Array (
					'uniqueNo'=> $movie_id,
					'MovieTitle'=> $title,
					'runTime' => $runTime,
					'reldate' => $reldate
					);
			$json = json_encode($data);
			return $json;
		}

	}

	public function getMovieDetails($title, $runTime, $reldate){
		//get movie details for a particular case(assuming that movie name is passed and unique identity number is sent as hidden form HTML)
		$getMovieDetails = $this->$classEntityValidation->getMovieDetails($title, $uniqueNo);
		return $getMovieDetails;
	}

	public function getAllActorsOfMovieSortAge($movieUniqueNumber){
		//get movie details for a particular case(assuming that movie name is passed and unique identity number is sent as hidden form HTML)
		$getMovieDetails = $this->$classEntityValidation->getAllActorsOfMovie($movieUniqueNumber);
		return $getMovieDetails;
	}
}

$entityValidation->validateMovieDetails();
?>