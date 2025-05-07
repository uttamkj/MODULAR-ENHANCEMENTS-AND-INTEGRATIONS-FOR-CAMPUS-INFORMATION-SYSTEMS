function validate(e){
    let name = document.querySelector("#name").value
    let message = document.querySelector("#message").value
    let mobile = document.querySelector("#mobile").value
    let email = document.querySelector("#email").value

    let error = false

    if(name === ""){
        // alert("Please Enter your name")
        document.querySelector("#nameError").innerHTML = "Name is required"
        error = true
    } else {
        document.querySelector("#nameError").innerHTML = ""
    }

    if(message === ""){
       
        document.querySelector("#messageError").innerHTML = "Feedback is required"
        error = true
    } else {
        document.querySelector("#messageError").innerHTML = ""
    }

    if(mobile === ""){
        document.querySelector("#mobileError").innerHTML = "Mobile is required"
        error = true
    } else if(mobile.length !== 10 || isNaN(mobile)){
        document.querySelector("#mobileError").innerHTML = "Please enter a 10 digit valid mobile number"
        error = true
    }else {
        document.querySelector("#mobileError").innerHTML = ""
    }

    let emailPatern = /^[a-zA-Z0-9_.]{3,}@[a-zA-Z.]{3,12}.[a-zA-Z]{2,5}$/;
    if(email === ""){
        document.querySelector("#emailError").innerHTML = "Email is required"
        error = true
    } else if(!email.match(emailPatern)){
        document.querySelector("#emailError").innerHTML = "Please Enter a valid email"
        error = true
    }else {
        document.querySelector("#emailError").innerHTML = ""
    }
    
    if(error){
        e.preventDefault()
    }
}