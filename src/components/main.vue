<template>
<!-- Main -->
<div id="main">
	<nav id="nav">
		<a href="#intro" id="intro_icon" class="icon solid fa-home active"><span>Intro</span></a>
		<a href="#work" id="work_icon" class="icon solid fa-folder"><span>Work</span></a>
		<a href="#about" id="about_icon" class="icon solid fa-envelope"><span>About</span></a>
		<a href="#contact" id="contact_icon" class="icon brands fa-twitter"><span>Twitter</span></a>
	</nav>
	<!-- Intro -->
		<article id="intro">
			<h2 class="major">Intro</h2>
			<span class="image main"><img src="/images/pic01.jpg" alt="" /></span>
			<p>Aenean ornare velit lacus, ac varius enim ullamcorper eu. Proin aliquam facilisis ante interdum congue. Integer mollis, nisl amet convallis, porttitor magna ullamcorper, amet egestas mauris. Ut magna finibus nisi nec lacinia. Nam maximus erat id euismod egestas. By the way, check out my <a href="#work">awesome work</a>.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus rutrum facilisis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam tristique libero eu nibh porttitor fermentum. Nullam venenatis erat id vehicula viverra. Nunc ultrices eros ut ultricies condimentum. Mauris risus lacus, blandit sit amet venenatis non, bibendum vitae dolor. Nunc lorem mauris, fringilla in aliquam at, euismod in lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In non lorem sit amet elit placerat maximus. Pellentesque aliquam maximus risus, vel sed vehicula.</p>
			<a href="#work" class="jumplink pic_right">
				<span class="arrow icon solid fa-chevron-right"><span>See my work</span></span>
			</a>
		</article>

	<!-- Work -->
		<article id="work">
			<h2 class="major">Work</h2>
			<div id="work_content" class="row mb-3 rounded justify-content-center bg-secondary" v-for="(val) in retrievedObject" v-bind:key="val.title">
				<div class="article-body">
					<a :href="'https://scholar.google.com'+val.url" target="_blank" class="text-white article-title">{{val.title}}</a><br>
					{{val.authors.join(', ')}}  <br>
					{{val.journal}} {{val.volume}} <span v-if="typeof val.issue !== 'undefined'"> ({{val.issue}}), </span> {{val.pages}} <br>
					<span style="margin-right:20px;">CITED BY : {{val.numCitations}} </span>
					<span>YEAR : </span>{{val.year}}
					<!-- <a href="https://arxiv.org/pdf/2109.04452.pdf" class="badge badge-secondary badge-sm text-decoration-none mb-1">pdf</a>
					<a href="https://github.com/lil-lab/CB-analysis" class="badge bg-white badge-sm text-decoration-none">code</a> -->
				</div>
			</div>
			<a href="#intro" class="jumplink pic_left">
				<span class="arrow icon solid fa-chevron-left"><span>Intro</span></span>
			</a>
			<a href="#about" class="jumplink pic_right">
				<span class="arrow icon solid fa-chevron-right"><span>About</span></span>
			</a>
		</article>

	<!-- About -->
		<article id="about">
			<h2 class="major">About</h2>
			<span class="image main"><img src="/images/pic03.jpg" alt="" /></span>
			<p>Lorem ipsum dolor sit amet, consectetur et adipiscing elit. Praesent eleifend dignissim arcu, at eleifend sapien imperdiet ac. Aliquam erat volutpat. Praesent urna nisi, fringila lorem et vehicula lacinia quam. Integer sollicitudin mauris nec lorem luctus ultrices. Aliquam libero et malesuada fames ac ante ipsum primis in faucibus. Cras viverra ligula sit amet ex mollis mattis lorem ipsum dolor sit amet.</p>
			<a href="#work" class="jumplink pic_left">
				<span class="arrow icon solid fa-chevron-left"><span>Work</span></span>
			</a>
			<a href="#contact" class="jumplink pic_right">
				<span class="arrow icon solid fa-chevron-right"><span>Contact</span></span>
			</a>
		</article>

	<!-- Contact -->
		<article id="contact">
			<h2 class="major">Contact</h2>
			<form method="post" action="#">
				<div class="fields">
					<div class="field half">
						<label for="name">Name</label>
						<input type="text" name="name" id="name" />
					</div>
					<div class="field half">
						<label for="email">Email</label>
						<input type="text" name="email" id="email" />
					</div>
					<div class="field">
						<label for="message">Message</label>
						<textarea name="message" id="message" rows="4"></textarea>
					</div>
				</div>
				<ul class="actions">
					<li><input type="submit" value="Send Message" class="primary" /></li>
					<li><input type="reset" value="Reset" /></li>
				</ul>
			</form>
			<ul class="icons">
				<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
				<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
				<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
			</ul>
			<a href="#about" class="jumplink pic_left">
				<span class="arrow icon solid fa-chevron-left"><span>About</span></span>
			</a>
		</article>
</div>
</template>

<script>
export default {
	name: 'mainpart',
	props: {

	},
	data() {
        return {
            retrievedObject: []
        }
    },
	mounted () {
		var scholarly  = require("scholarly");
		var saved_time = localStorage.getItem('scholarly_time');

		if(saved_time){
			var date1=new Date();
			var date2=new Date(saved_time);
			var diff = date1 - date2;
			var diffHrs = Math.floor((diff % 86400000) / 3600000); // hours
			//var diffMins = Math.round(((diff % 86400000) % 3600000) / 60000); // minutes
		}
		
		if(!saved_time || diffHrs>24){
			scholarly.user("MPNNFXMAAAAJ").then((data) => {
				localStorage.setItem('scholarly_time', new Date());
				localStorage.setItem('scholarly', JSON.stringify(data));
			});
		}
		
		// Retrieve the object from storage
		var retrievedObject = JSON.parse(localStorage.getItem('scholarly'));
		
		for (var key in retrievedObject) {
			this.retrievedObject.push(retrievedObject[key]);
		}
	}
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
#nav {
    text-align: center;
    height: 4.25em;
    cursor: default;
}
#nav a span {
    display: block;
    position: absolute;
    background: #222222;
    color: #ffffff;
    top: -2.75em;
    font-size: 0.3em;
    height: 2.25em;
    line-height: 2.25em;
    left: 50%;
    opacity: 0;
    -moz-transition: opacity .25s ease-in-out;
    -webkit-transition: opacity .25s ease-in-out;
    -ms-transition: opacity .25s ease-in-out;
    transition: opacity .25s ease-in-out;
    width: 5.5em;
    margin-left: -2.75em;
}
#nav a {
    position: relative;
    display: inline-block;
    color: rgba(27, 31, 34);
    width: 1em;
    height: 1em;
    line-height: 0.9em;
    font-size: 2.5em;
    margin: 0 0.25em 0 0.25em;
    opacity: 0.85;
    outline: 0;
    -moz-transition: opacity .25s ease-in-out;
    -webkit-transition: opacity .25s ease-in-out;
    -ms-transition: opacity .25s ease-in-out;
    transition: opacity .25s ease-in-out;
}
#nav a span:after {
    content: '';
    display: block;
    position: absolute;
    bottom: -0.4em;
    left: 50%;
    margin-left: -0.6em;
    border-top: solid 0.6em #222222;
    border-left: solid 0.6em transparent;
    border-right: solid 0.6em transparent;
}
#nav a:after {
    content: '';
    display: block;
    position: absolute;
    left: 50%;
    bottom: -0.7em;
    margin-left: -0.5em;
    border-bottom: solid 0em rgba(27, 31, 34);
    border-left: solid 0.5em transparent;
    border-right: solid 0.5em transparent;

	
	-moz-transform: translateY(0.25rem);
	-moz-transition: opacity 0.325s ease-in-out, -moz-transform 0.325s ease-in-out;
	-webkit-transition: opacity 0.325s ease-in-out, -webkit-transform 0.325s ease-in-out;
	-ms-transition: opacity 0.325s ease-in-out, -ms-transform 0.325s ease-in-out;
	transition: opacity 0.325s ease-in-out, transform 0.325s ease-in-out;
}

#nav a.active:after {
    border-bottom-width: 0.5em;
}

#main > article .pic_right {
    text-decoration: none;
    position: relative;
    -moz-flex-grow: 0;
    -webkit-flex-grow: 0;
    -ms-flex-grow: 0;
    flex-grow: 0;
    -moz-flex-shrink: 0;
    -webkit-flex-shrink: 0;
    -ms-flex-shrink: 0;
    flex-shrink: 0;
    /*width: 17em; */
    height: 100%;
	position: absolute;
    /*top: 0;
    right: -30px;*/
	top: -35px;
    right: 0px;

}
#main > article .pic_right .arrow {
    display: block;
    position: absolute;
    right: 0;
    /*top: 50%; */
    margin-top: -1.375em;
    width: 2.75em;
    height: 2.75em;
    background: #000;
    background: rgba(0, 0, 0, 0.75);
    color: #ffffff;
    text-align: center;
    line-height: 2.75em;
    font-size: 1.5em;
    z-index: 1;
    -moz-transition: width .15s ease-in-out, padding-right .15s ease-in-out;
    -webkit-transition: width .15s ease-in-out, padding-right .15s ease-in-out;
    -ms-transition: width .15s ease-in-out, padding-right .15s ease-in-out;
    transition: width .15s ease-in-out, padding-right .15s ease-in-out;
}
#main > article .pic_right .arrow span {
    display: block;
    text-indent: -9999px;
}
#main > article .pic_right:hover .arrow {
    width: 3em;
    padding-right: 0.25em;
}


#main > article .pic_left {
    text-decoration: none;
    position: relative;
    -moz-flex-grow: 0;
    -webkit-flex-grow: 0;
    -ms-flex-grow: 0;
    flex-grow: 0;
    -moz-flex-shrink: 0;
    -webkit-flex-shrink: 0;
    -ms-flex-shrink: 0;
    flex-shrink: 0;
    /*width: 17em; */
    height: 100%;
	position: absolute;
    /*top: 0;
    left: -30px;*/
	top: -35px;
    left: 0px;

}
#main > article .pic_left .arrow {
    display: block;
    position: absolute;
    left: 0;
    /*top: 50%; */
    margin-top: -1.375em;
    width: 2.75em;
    height: 2.75em;
    background: #000;
    background: rgba(0, 0, 0, 0.75);
    color: #ffffff;
    text-align: center;
    line-height: 2.75em;
    font-size: 1.5em;
    z-index: 1;
    -moz-transition: width .15s ease-in-out, padding-right .15s ease-in-out;
    -webkit-transition: width .15s ease-in-out, padding-right .15s ease-in-out;
    -ms-transition: width .15s ease-in-out, padding-right .15s ease-in-out;
    transition: width .15s ease-in-out, padding-right .15s ease-in-out;
}
#main > article .pic_left .arrow span {
    display: block;
    text-indent: -9999px;
}
#main > article .pic_left:hover .arrow {
    width: 3em;
    padding-right: 0.25em;
}
.bg-secondary {
    background-color: #6c757d!important;
}
.rounded {
    border-radius: 0.25rem!important;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}
.row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
@media (min-width: 768px)
.col-md-12 {
    flex: 0 0 100%;
    max-width: 100%;
}
.article-body{
    position: relative;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
	padding-bottom: 5px;
    padding-top: 5px;
}
.text-info {
    color: #17a2b8!important;
}
.text-primary {
    color: #007bff!important;
}
.text-white {
    color: #fff!important;
}
.article-title {
	font-weight: 700;
    font-size: 17px;
    margin-bottom: 10px;
    display: inline-block;
}

</style>
