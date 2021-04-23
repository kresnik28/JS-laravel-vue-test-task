<template>
    <div>
        <h3 style="color:red" v-if="!found">Category not found</h3>
        <form v-if="found && items.length" @submit.prevent="saveCategory">
            <input name="name" v-model="category.name" required class="mb-1"><br>
            <textarea name="description" v-model="category.description" required
                      class="mb-1"></textarea><br>
            <select class="mb-1" v-model="category.items" name="tasks" multiple>
                <option v-for="item in items" :value="item.id">{{ item.name }}</option>
            </select><br>
            <button type="submit" class="mb-1">Save</button>
        </form>
        <h3 style="color:red" v-if="error.length">{{ error }}</h3>
    </div>
</template>

<script>
export default {
    name: "CategoryForm",
    props: {
        edit: Boolean,
        id: {
            type: Number,
            default: 0

        }
    },

    data() {
        return {
            items: [],
            category: {
                name: '',
                description: '',
                items: []
            },
            error: '',
            found: true
        }
    },

    created() {
        this.getAllItems();
        if (this.edit) {
            this.getCategory(this.id)
        }
    },

    methods: {
        getCategory(id) {
            axios.get('/api/category/' + id).then((response) => {
                this.category = response.data.data
                this.found = true
            }).catch((e) => {
                console.log(e)
                this.found = false
            })
        },

        getAllItems() {
            axios.get('/api/item/all').then((response) => {
                this.items = response.data.data
            }).catch(e => console.log(e))
        },

        async saveCategory() {
            this.error = ''
            let q
            if (this.edit) {
                q = axios.post('/api/category/' + this.id, this.category)
            } else {
                q = axios.put('/api/category/', this.category)
            }
            q.then((response) => {
                if (response.data.success) {
                    alert('Successfully saved')
                    if (!this.edit) {
                        window.location.replace("/category");
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
