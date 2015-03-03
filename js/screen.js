window.onload = function(){

    var createScreenForm = document.getElementById('createScreenForm');
    if(createScreenForm != null) {
        createScreenForm.addEventListener('submit', validateScreenForm);
    }
    
    function validateScreenForm(event){
        var form = event.target;

        var spanElements = document.getElementsByClassName("error");
        for (var i = 0; i !== spanElements.length; i++){
            spanElements[i].innerHTML = "";
        }
        
        var name = form['name'].value;
        var numExits = form['numExits'].value;
        var numSeats = form['numSeats'].value;
        var dateNextInspection = form['dateNextInspection'].value;
        var $projectorType = form['projectorType'].value;

        var errors = new Object();

        if(name === ""){
            errors['name'] = "Name field cannot be left empty..";
        }

        if(numExits === ""){
            errors['numExits'] = "Number of exits field cannot be left empty..";
        }

        if(numSeats === ""){
            errors['numSeats'] = "Number of seats field cannot be left empty..";
        }

        if(dateNextInspection === ""){
            errors['dateNextInspection'] = "Date of next inspection field cannot be left empty..";
        }

        if($projectorType === ""){
           errors['$projectorType'] = "Projector type field cannot be left empty..";
        }

        var valid = true;
        for (var index in errors){
            valid = false;
            var errorMessage = errors[index];
            var spanElement = document.getElementById(index + "Error");

            spanElement.innerHTML = errorMessage;
        }
        if(!valid){
            event.preventDefault();
        }
        
        else if(!confirm ("Continue to update?")){
            event.preventDefault();
        }
    }
    
    //Edit event listener
    var editScreenForm = document.getElementById('editScreenForm');
    if(editScreenForm !== null){
        editScreenForm.addEventListener('submit', validateScreenForm);
    }
    
    //Delete event listener
    var deleteLinks = document.getElementsByClassName('deleteScreen');
    for (var i = 0; i !== deleteLinks.length; i++){
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }
    
    function deleteLink(event){
        if(!confirm("Are you sure you want to delete this screen?")){
            event.preventDefault();
        }
    }
};