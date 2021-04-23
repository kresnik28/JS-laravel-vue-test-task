<template>
    <div>
        <table v-if="items.length" style="border:1px solid black">
            <tr>
                <th style="border:1px solid black">Id</th>
                <th style="border:1px solid black">Name</th>
            </tr>
            <tr v-for="item in items">
                <td style="border:1px solid black">{{ item.id }}</td>
                <td style="border:1px solid black"><a :href="`/item/edit/${item.id}`">{{ item.name }}</a></td>
            </tr>
        </table>
    </div>
</template>

<script>
export default {
    name: "ItemList",

    data() {
        return {
            items: []
        }
    },

    mounted() {
        this.getAllItems()
    },

    methods: {
        getAllItems() {
            axios.get('/api/item/all').then((response) => {
                this.items = response.data.data
            }).catch(e => console.log(e))
        },
    }
}
</script>

<style scoped>

</style>
