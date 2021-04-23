<template>
    <div>
        <table v-if="categories.length" style="border:1px solid black">
            <tr>
                <th style="border:1px solid black">Id</th>
                <th style="border:1px solid black">Name</th>
            </tr>
            <tr v-for="category in categories">
                <td style="border:1px solid black">{{ category.id }}</td>
                <td style="border:1px solid black"><a :href="`/category/edit/${category.id}`">{{ category.name }}</a>
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
export default {
    name: "CategoryList",

    data() {
        return {
            categories: []
        }
    },

    mounted() {
        this.getAllCategories()
    },

    methods: {
        getAllCategories() {
            axios.get('/api/category/all').then((response) => {
                this.categories = response.data.data
            }).catch(e => console.log(e))
        }
    }
}
</script>

<style scoped>

</style>
