<template>
    <div>
        <div class="input-group input-group-merge ">
            <div class="input-icon ">
                <span class="color-primary "></span>
            </div>
            <select class="form-control select2" name="level" style="width:100%" id="register-select-role" v-model="this.role_id" required>
                <option  v-for="Level in Roles" :value="Level.id">{{ Level.name }}</option>
            </select>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                Roles:[],
                role_id: '',
            }
        },
        created(){
            this.getRoleName();
        },
        mounted() {
            $('#register-select-role').select2({
                placeholder: 'Select Membership Type',
                minimumResultsForSearch: Infinity,
                allowClear: true
            });

            $("#register-select-role").change(function(){
                this.role_id = $("#register-select-role").val();
            }.bind(this));
        },

        methods : {
            getRoleName(){
                axios.get('/api/v1/list-membership-type')
                    .then(function (response) {
                        this.Roles = response.data;
                        // console.log(this.Roles);
                    }.bind(this));
            },
        }
    }
</script>
