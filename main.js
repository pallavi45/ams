function openLogin() 
    {
        document.getElementById("loginpop").style.display = "block";
        document.getElementById("registerpop").style.display = "none";
    }
function closeForm()
    {
        document.getElementById("loginpop").style.display = "none";
        document.getElementById("registerpop").style.display = "none";
    }
function openRegister()
    {
        document.getElementById("registerpop").style.display = "block";
        document.getElementById("loginpop").style.display = "none";
     }
function openDetails()
    {
        document.getElementById("studentDetails").style.display = "block";
        document.getElementById("homeContainer").style.display = "none";
    }
function closeDetails() {
    // body...
    document.getElementById("studentDetails").style.display = "none";
}