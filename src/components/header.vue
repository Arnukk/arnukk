<template>
<header id="header">
	<div class="poligon">
		<div class="logo">
			<!--<span class="icon fa-gem"></span>-->
		</div>
	</div>
	<div class="content">
		<div class="inner">
			<h1>{{ msg }}</h1>
			<p>Postdoctoral Fellow at AVLabs, Khalifa University Verified email at ku.ac.ae - <a href="https://www.linkedin.com/in/arnukk/"> Homepage </a></p>
		</div>
	</div>

	<nav>
		<ul>
			<li><a href="#intro">Intro</a></li>
			<li><a href="#work">Work</a></li>
			<li><a href="#about">About</a></li>
			<li><a href="#contact">Contact</a></li>
			<!--<li><a href="#elements">Elements</a></li>-->
		</ul>
	</nav>
</header>
</template>

<script>
import '@/assets/css/main.css';
export default {
  name: 'Header',
  props: {
    msg: String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.poligon {
  display: inline-block;
  position: relative;
  width: 10.1rem;
  height: 10.1rem;
  background: #ffffff;
  box-sizing: border-box;
  -webkit-clip-path: polygon(0 20%, 50% 0, 100% 20%, 100% 80%, 50% 100%, 0 80%);
  clip-path: polygon(0 20%, 50% 0, 100% 20%, 100% 80%, 50% 100%, 0 80%);
  z-index:2
}
.poligon .logo {
  position: absolute;
  top: 2px; /* equal to border thickness */
  left: 2px; /* equal to border thickness */
  width: 146px; /* container height - (border thickness * 2) */
  height: 146px; /* container height - (border thickness * 2) */
  -webkit-clip-path: polygon(0 20%, 50% 0, 100% 20%, 100% 80%, 50% 100%, 0 80%);
  clip-path: polygon(0 20%, 50% 0, 100% 20%, 100% 80%, 50% 100%, 0 80%);
  top: 0.15rem;
  left: 0.15rem;
}
</style>
