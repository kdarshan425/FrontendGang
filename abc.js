function myFunction2() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
  // Toggle between showing and hiding the sidebar when clicking the menu icon
  var mySidebar = document.getElementById("mySidebar");
  

  function dk_open() {
    
    if (mySidebar.style.display === "block") {
      mySidebar.style.display = "none";   
     
      
    } else {
      mySidebar.style.display = "block";
     
    }
  }
  
  // Close the sidebar with the close button
  function dk_close() {
      mySidebar.style.display = "none";
  }
  

  //open modal in sidebar
  var dropdown = document.getElementsByClassName("dropdown-btn4");
var modal1 = document.getElementById("#myModal1");


function myFunction8() {
if (modal1.style.display === "block") {
      modal1.style.display = "block";   
     
      
    } else {
      modal1.style.display = "block";
     
    }
}
// sidebar-dropdown
    
var dropdown = document.getElementsByClassName("dropdown-btn-dk");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent4 = this.nextElementSibling;
  if (dropdownContent4.style.display === "block") {
  dropdownContent4.style.display = "none";
  } else {
  dropdownContent4.style.display = "block";
  }
  });
}
//   const menuIcon = document.querySelector(".hamburger-menu");
  
  
//   menuIcon.addEventListener("click", () => {
//     navbar.classList.toggle(".change");
//   });
  
  
// ========
// | TABS |
// ========

// SELECTORS

//   const menuIcon = document.querySelector(".hamburger-menu");
  
  
//   menuIcon.addEventListener("click", () => {
//     navbar.classList.toggle(".change1");
//   });
  
  
// ========
// | TABS |
// ========
    
const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const containerdk = document.querySelector(".containerdk");

sign_up_btn.addEventListener("click", () => {
  containerdk.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  containerdk.classList.remove("sign-up-mode");
});

//Get the modal 
var modal1 = document.getElementById("myModal1");

//Get the button that opens the modal
var btn1 = document.getElementById("myBtn1");



// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close1")[0];

//When the user clicks the button, open the modal
btn1.onclick = function() {
    modal1.style.display = "block";
}

//When the user clicks on <span> (x), close the modal 
span1.onclick = function() {
    modal1.style.display = "none";
}

//When the user clicks anywhere outside the modal, close it
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}
