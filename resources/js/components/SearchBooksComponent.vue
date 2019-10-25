<template>
    <div>
        <input class="form-control col-xl-4 mx-auto mt-4" type="text" placeholder="Search" v-model.lazy="keywords"
               v-debounce="500">
        <div v-if="results.length > 0">
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
                results: [],
                url: '/storage'
            }
        },

        watch: {
            keywords(after, before) {
                this.fetch();
            }
        },

        methods: {
            fetch() {
                axios.get('/api/search', {params: {keywords: trim(this.keywords)}})
                    .then(response => this.results = response.data)
                    .catch(error => {
                    });
            }
        }
    }
</script>
