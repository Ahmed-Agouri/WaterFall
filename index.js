// Validate user Dob Regiester page 
function ValidateDob(){
var DOB = new Date (document.getElementsByName("DOB")[0].value);
var MaxDob = new Date ("2007-05-01");

if (DOB > MaxDob){
    alert("To register with WaterFall, you must be at least 16 years old.");
    return false;

}
return true;
}

// Validate user policy check Regiester page 
function validateCheckbox() {
    var policyCheckbox = document.getElementById('policy-checkbox');
    if (!policyCheckbox.checked) {
        alert('Please check the User Policy checkbox before submitting the form.');
        return false;
    }
    return true;
}


//Reload page for profile image update
function RefreshPage(){
    document.getElementById("upload-button").disabled = true;
    setTimeout(function() {
      location.reload();
    }, 1000);
}
    