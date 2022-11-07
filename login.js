function login()
{
    var fname=document.getElementById("fname").value;
    var lname=document.getElementById("lname").value;
    var email=document.getElementById("email").value;
    var password=document.getElementById("password").value;
    localStorage.setItem("fname",fname);
    localStorage.setItem("lname",lname);
    localStorage.setItem("email",email);
    localStorage.setItem("password",password);

    localStorage.fname=fname;
    localStorage.lname=lname;
    localStorage.email=email;
    localStorage.password=password;

}




