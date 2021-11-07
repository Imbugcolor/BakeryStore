<style>
#social-link-sidebar {
  position: fixed;
  top: 50%;
  right:0;
  display: flex;
  flex-direction: column;
  z-index: 999;
}
#social-link-sidebar a {
  border-radius: 12px;
  color: #fff;
  padding: 10px 18px;
  margin: 2px 0;
  font-size: 20px;
  text-decoration: none;
  transition: 0.3s;
}
#social-link-sidebar a:first-child {
  background: linear-gradient(to top, transparent, #0f90f2);
}
#social-link-sidebar a:nth-child(2) {
  background: linear-gradient(to top, transparent, #da2e78);
}
#social-link-sidebar a:nth-child(3) {
  background: linear-gradient(to top, transparent, #ff0000);
}
#social-link-sidebar a:hover {
  color: #fff;
  background-color: #1EC6B6;
}
</style>
<div id="social-link-sidebar">
            <!--facebook-->
    <a href="">
        <i class="fab fa-facebook-f"></i>
    </a>
            <!--instagram-->
    <a href="">
        <i class="fab fa-instagram"></i>
    </a>
            <!--google-->
    <a href="">
        <i class="fab fa-google"></i>
    </a>
</div>