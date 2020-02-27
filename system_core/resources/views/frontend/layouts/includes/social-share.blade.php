<style>
.icon-bar {
  position: fixed;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  z-index:1050;
}

.icon-bar a {
  display: block;
  text-align: center;
  padding: 7px 13px;
  transition: all 0.3s ease;
  color: white;
  font-size: 15px;
  animation: main 3s;
  transform-origin: 100% 50%;
  transform: skewY(-3deg);
  margin-bottom: 2px;
  border-radius:4px;

}
@keyframes main {
  0% {
    transform: scale(0);
  }
  100% {
    transform: scale(1);
  }
}
.icon-bar a:hover {
  background-color: #000;
  border-radius:0;
}

.facebook {
  background: #3B5998;
  color: white;
}

.twitter {
  background: #55ACEE;
  color: white;
}

.google {
  background: #dd4b39;
  color: white;
}

.linkedin {
  background: #007bb5;
  color: white;
}

.youtube {
  background: #bb0000;
  color: white;
}
</style>
<div class="icon-bar">
  <a href="#" class="facebook"><i class="fa fa-facebook"></i></a> 
  <a href="#" class="twitter"><i class="fab fa-twitter"></i></a> 
  <a href="#" class="google"><i class="fab fa-google"></i></a> 
  <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
  <a href="#" class="youtube"><i class="fab fa-youtube"></i></a> 
</div>