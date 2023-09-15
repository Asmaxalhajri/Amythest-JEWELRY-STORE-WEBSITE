//Sahar Saeed Al-Zahrani	2190003270 

var Admin_id = document.getElementById('id_of_id');
var Admin_pass = document.getElementById('id_of_pass');
var Login_Form = document.getElementById('id_of_Form');
var errorElemnt = document.getElementById('login_error');
Login_Form.addEventListener('submit', (e) => {
    
    var messages=[]
    if((Admin_pass.value==null && Admin_id.value==null)||Admin_pass.value=='' && Admin_id.value=='' )
    {messages.push('please enter your id and password ')}
    else if(Admin_id.value==''||Admin_id.value==null )
    {messages.push('please enter your id')}
    else if(Admin_pass.value==''||Admin_pass.value==null)
    {messages.push('please enter your password')}

    if(messages.length>0){


        e.preventDefault();
        errorElemnt.innerText=messages;}
});

window.onload = function() {


    var url_string= (window.location.href).toLowerCase();

    var url= new URL(url_string);
    var x= url.searchParams.get("x");
    if(x==1){


        var error="username or passwsord is incorrect ";
        
        document.getElementById("login_error").innerHTML = error;

    }

}


