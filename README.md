# phptest_ARC

Summary

It is assumed that the data is stored or an HTML UI page send some data to the movie entity.

Flow of code:

All the data from front end is sent to movie entity.
All the vaildations of properties are checked in the entityValidation class. Here, in case of null values error is thrown. Alphamueric, string, iunteger, float and data format validations are performed.
If all the validation are send as true, a unique ID is generated for every new data. This data is then converted into a json data format.
The same validations is performed on actor entity as well.
In the entity model, various MySql queries fetch data which is requestes by the movie or actor entity class.
MySql queries are fetching the data using select statments, left join for conditional queries etc.
Movie details fetches the properties of movie entity and same is for actor.
getAllActorsOfMovieSortAge methods gets the actor details which are associated with a movie and orders the data in descending order based on age.

Furure work:

Test cases can be generated to test the validations. 
More reusable code can be created if robust structure is prepared.
The classes are extendable but as methods and variables are defines as public, it can be modified as well. Therefore, private members can ensures no modification.
