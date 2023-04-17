# LocBoat 
Site created for non-profit purposes 

## Authors
- Mickael Pêcheur

## ACCOUNT for Testing
password : test

email : test@gmail.com

## Veil page 
### twig
1. Functionality
   - View sailing boats 
   - ![alt text](https://cdn.discordapp.com/attachments/697059653468684328/1059569035592859688/veil.jpg)

### php
1. Functionality
   - Search the database for all sailing boats 

## motor page 
### twig
1. Functionality
   - View motorboats

### php
1. Functionality
   - Search for motorboats 

## other page 
### twig
1. Functionality
   - View other boat

### php
1. Functionality
   - Search for other boat 

## login
### twig
1. Functionality
   - Displays two forms depending on whether the user wants to log in or want to register

### php
1. Functionality
   - Redirects to the home page and the user is logged in

## logout
### php
1. Functionality
   - Logs out the user

## account
### twig
1. Functionality
   - Displays the user's personal data in case he wants to change it

### php
1. Functionality
   - Searches the database for user information so that it can be displayed to the user so that the user can then modify it as he sees fit

## rent
### twig
1. Functionality
   - Displays two selected dates that correspond to the rental period

### php
1. Functionality
   -  Tests the data of the two date fields to be able to automatically and dynamically manage these two fields.

## Code Like this
```javascript
// rent.js
function updateDate(){

    var startDate = document.getElementById('startDate');
    var endDate = document.getElementById('endDate');

    startDate.addEventListener('change', (event) => { 
        var start = event.target.value
        var date = new Date(start);
        var dateEnd = new Date(date.getTime() + 86400000);
        var inputEndValue = endDate.value;
        var end = new Date(endDate.value);
        var dateFormat = dateEnd.getFullYear() + "-" + (dateEnd.getMonth() + 1).toString().padStart(2, "0") + "-" + dateEnd.getDate().toString().padStart(2, "0");
        endDate.min = dateFormat;
        console.log("tot");
        if (dateEnd < end){
            console.log("toto");
            endDate.value = inputEndValue;
        } else {
            endDate.value = dateFormat;
        }
    });
}

window.onload = function() { updateDate(); };
```

## paid
### twig
1. Functionality
   - Displays a message if the payment was successful

### php
1. Functionality
   - Finds the id of the user who wants to rent and the dates of rental that will be displayed in the page twig

## main
### twig
1. Functionality
   - Display my main navbar of the site with all the different pages 

## boat
### twig
1. Functionality
   - Displays the boat selected by the user with all its information

### php
1. Functionality
   - Search the database for all the information of the selected boat

## boats
### twig
1. Functionality
   - Affiche tous les bateaux de la base de données suivant le type choisi

## rental
### twig
1. Functionality
   - Displays all rentals that the logged-in user has made since the creation of his account

### php
1. Functionality
   - Search the database for all the locations of the connected user

## landing
### twig
1. Functionality
   - This page is the home page of my site. From here all the different searches or data filtering can be done and the user will have a more complete view of the site
   
## Lien pour revenir vers la documentation
[accès Doc](https://urlz.fr/lqCT)
