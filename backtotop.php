<style>
html{
    scroll-behavior: smooth;
}
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 0;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: #FF1654;
  color: white;
  cursor: pointer;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  transition: 0.3s;
  animation-name: example;
  animation-duration: 0.3s;
  animation-timing-function: ease-in-out;
}

@keyframes example {
  0%   { right:-20px; }
  100% { right:0px;}
}

#myBtn:hover {
  background-color: #1EC6B6;
}
</style>
</head>
<body>

<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-up"></i></button>


<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

</body>