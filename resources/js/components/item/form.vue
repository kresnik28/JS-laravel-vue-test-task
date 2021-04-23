<template>
    <div>
        <h3 style="color:red" v-if="!found">Category not found</h3>
        <form v-if="found && categories.length" @submit.prevent="saveItem">
            <input name="name" v-model="item.name" required class="mb-1"><br>
            <textarea name="description" v-model="item.description" required
                      class="mb-1"></textarea><br>
            <select class="mb-1" v-model="item.category_id" name="item">
                <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
            </select><br>
            <button type="submit" class="mb-1">Save</button>
        </form>
        <h3 style="color:red" v-if="error.length">{{ error }}</h3>
    </div>
</template>

<script>
export default {
    name: "ItemForm",
    props: {
        edit: Boolean,
        id: {
            type: Number,
            default: 0

        }
    },

    data() {
        return {
            categories: [],
            item: {
                name: '',
                description: '',
                category_id: []
            },
            error: '',
            found: true
        }
    },

    created() {
        this.getAllCategories();
        if (this.edit) {
            this.getItem(this.id)
        }
    },

    methods: {
        getItem(id) {
            axios.get('/api/item/' + id).then((response) => {
                this.item = response.data.data
                this.found = true
            }).catch((e) => {
                console.log(e)
                this.found = false
            })
        },

        getAllCategories() {
            axios.get('/api/category/all').then((response) => {
                this.categories = response.data.data
            }).catch(e => console.log(e))
        },

        async saveItem() {
            this.error = ''
            let q
            if (this.edit) {
                q = axios.post('/api/item/' + this.id, this.item)
            } else {
                q = axios.put('/api/item/', this.item)
            }
            q.then((response) => {
                if (response.data.success) {
                    alert('Successfully saved')
                    if (!this.edit) {
                        window.location.replace("/item");
                    }
                } else {
                    alert('Something went wrong')
                }
            }).catch((e) => {
                if (e.response) {
                    if (e.response.status === 422) {
                        this.error = e.response.data.message
                    }
                }
                console.log(e)
            })
        }
    }
}
</script>

<class scoped>

</class>
