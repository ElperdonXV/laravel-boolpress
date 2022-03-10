<template>
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-4 g-4" v-if="cards.posts">
            <div class="col" v-for="(post, index) in cards.posts" :key="index">
                <div class="card">
                <img v-if="post.image" :src="'/storage/'+post.image" class="card-img-top" :alt="post.title">
                <img v-else src="/storage/uploads/no-image.jpg" class="card-img-top" :alt="post.title">
                <div class="card-body">
                    <h5 class="card-title">{{ post.title }}</h5>
                    <p class="card-text">{{ post.content }}</p>
                </div>
                <router-link class="btn btn-info" :to="{ name: 'post', params: { id: post.id } }">View</router-link>
                </div>
            </div>
        </div>
        <div class="row mt-3 bg-light">
            <ul class="list-inline bg-light d-flex justify-content-center">
                <li class="list-inline-item"> <button v-if="cards.prev_page_url" class="btn btn-primary" @click="changePage('prev_page_url')">Prev</button></li>
                <li class="list-inline-item"> <button v-if="cards.next_page_url" class="btn btn-primary" @click="changePage('next_page_url')">Next</button></li>
            </ul>
        </div>
    </div>
</template>

<script>
  export default {
    name: "Main",
    props: ['cards'],
    methods: {
      changePage(vs) {
        this.$emit('changePage', vs);
      }
    }
  }
</script>

<style lang="scss" scoped>
</style>