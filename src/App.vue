<template>
  <div id="wrapper">
    <Header msg="Areg Karapetyan"/>
    <Mainpart/>
    <Footer/>
  </div>
</template>

<script>

import Header from './components/header.vue'
import Mainpart from './components/main.vue'
import Footer from './components/footer.vue'

export default {
  name: 'App',
  components: {
    Header,
	Mainpart,
	Footer
  },

}

</script>


<style>
#wrapper {

}
</style>
