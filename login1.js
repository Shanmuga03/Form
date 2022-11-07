function login1()
{
    var enemail=document.getElementById("email").value;
    var pnpassword=document.getElementById("password").value;

    var a=localStorage.getItem("email");
    var b=localStorage.getItem("password");

    if(enemail == a){
      if(pnpassword == b)
      {
        alert("Successfull");
      }
      else{
        alert("Email or Password is Wrong");
      }
    }

}