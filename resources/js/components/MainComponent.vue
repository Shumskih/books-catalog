<template>
    <div class="search">
        <input class="form-control col-xl-4 mx-auto mt-4" type="text" placeholder="Search" v-model.lazy="keywords"
               v-debounce="500" autofocus>
        <div v-if="results.length > 0" class="results col-xl-4 mx-auto custom-shadow">
            <ul>
                <li v-for="result in results" :key="result.id">
                    <a :href="'/author/' + result.id">
                        {{ result.name + ' ' + result.surname}}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    import {trim} from "lodash";

    export default {
        data() {
            return {
                keywords: null,
                results: []
            }
        },

        watch: {
            keywords(after, before) {
                if (this.keywords.length > 0) {
                    this.fetch();
                } else {
                    this.results = [];
                }
            }
        },

        methods: {
            fetch() {
                axios.get('/api/search-authors', {params: {keywords: trim(this.keywords)}})
                    .then(response => this.results = response.data)
                    .catch(error => {

                    });
            }
        }
    }
</script>

<style scoped>
    .search {
        position: relative;
        width: 100%;
    }

    .results {
        z-index: 1;
        position: absolute;
        width: 100%;
        top: 108%;
        left: 33.4%;
        background-color: #fff;
        border-bottom-left-radius: 0.4rem;
        border-bottom-right-radius: 0.4rem;
        border: 0.05rem solid #b3b7bb;
        border-top: 1px solid white;
    }

    .results ul {
        list-style: none;
        padding: 1rem 0.05rem;
        margin: 0;
    }

    .results li {
        padding-bottom: 0.3rem;
    }

    .custom-shadow {
        -webkit-box-shadow: -7px 7px 5px 0px rgba(50, 50, 50, 0.42);
        -moz-box-shadow:    -7px 7px 5px 0px rgba(50, 50, 50, 0.42);
        box-shadow:         -7px 7px 5px 0px rgba(50, 50, 50, 0.42);
    }

    @media (max-width: 1200px) {
        .results {
            left: 0;
        }
    }
</style>
