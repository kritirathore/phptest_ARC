<?php 
require 'entityModel.php';
require 'EntityValidation.php';

class DBvalidation extends entityValidation{
		//DB connection required here

		public function __construct($movieTitle, $actorName, $uniqueNo, $movieUniqueNo){
        	$this->movieTitle = $movieTitle;
        	$this->actorName = $actorName;
        	$this->uniqueNo = $uniqueNo;
        	$this->movieUniqueNo = $movieUniqueNo;
    	}

		//check if entity - movie and actors already exist.
		public function checkMoviexist($movieTitle){
			
				$getMovieDetails = "SELECT primary_key, title FROM movie WHERE movie_title = '$movieTitle' ";
				$result = mysql_query($getMovieDetails);
				if(!$result){
					return true;
				}
		}

		public function checkActorExist($actorName){
				
				$getActorDetails = "SELECT primary_key, actorName FROM actor WHERE actor_name = '$actorName' ";
				$result = mysql_query($getActorDetails);
				if(!$result){
					return true;
				}
		}

		public function getMovieDetails($movieTitle, $uniqueNo){
				
				$getMovieDetails = "SELECT movie_unique_number, title, run_time, release_date FROM movie WHERE movie_title = '$movieTitle' AND movie_unique_number = '$uniqueNo' ";
				$result = mysql_query($getMovieDetails);
				if(!$result){
					return true;
				}
		}

		public function getActorDetails($actorName, $uniqueNo){
				
				$getMovieDetails = "SELECT actor_unique_number, actor_name, run_time, release_date FROM movie WHERE movie_title = '$movieTitle' AND actor_unique_number = '$uniqueNo' ";
				$result = mysql_query($getMovieDetails);
				if(!$result){
					return true;
				}
		}

		public function getAllActorsOfMovieSortAge($actorName, $movieTitle, $movieUniqueNo){
				
				$getActorDetailsFromMovie = "SELECT a.movie_unique_number_fk, a.title, b.actor_name, b.actor_age FROM a.actor 
									LEFT JOIN b.movie ON a.movie_unique_number_fk = b.movie_unique_number_pk
									WHERE a.movie_unique_number_fk = '$movieUniqueNo' ORDER BY a.actor_age DESC";
				$result = mysql_query($getMovieDetails);
				if(!$result){
					return true;
				}
		}
	
}

 	
    
$objValidation = new DBvalidation;

?>