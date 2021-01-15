<template>
    <div>

        <div class="pl-3">
            <button href="#" class="btn btn-primary" @click="followUser" v-text="buttonText"></button>
        </div>

    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        props: ['userId', 'follows'],

        data: function () {
            return {
                status: this.follows,
            }
        },

        methods: {

            followUser() {

                axios.post("/follow/" + this.userId)
                    .then(
                        response => {
                            this.status = !this.status;
                            console.log(response.data);
                        }
                    )
                    .catch(errors => {
                        if (errors.response.status == 401) {
                            window.location = "/login";
                        }
                        ;
                    });
            }
        },

        computed: {
            buttonText() {
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }
    }
</script>
