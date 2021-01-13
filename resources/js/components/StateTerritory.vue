<template>
    <div>
        <div class="form-group">
            <div class="input-group input-group-merge ">
                <div class="input-icon ">
                    <span class="color-primary "></span>
                </div>
                <select class="form-control" style="width:100%" id="update-select-state" v-model="this.state_id" name="state" required>
                    <option selected disabled>State</option>
                    <option  v-for="State in States" :value="State.id">{{ State.name }}</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group input-group-merge ">
                <div class="input-icon ">
                    <span class="color-primary "></span>
                </div>
                <select class="form-control"style="width:100%" id="update-select-territory" v-model="this.territory_id" name="territory" required>
                    <option  v-for="Territory in territories" :value="Territory.id">{{ Territory.name }}</option>
                </select>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                States: [],
                territories: [],
                state_id: '',
                territory_id: '',
            }
        },
        created(){
            this.getStateName();
        },
        mounted() {
            $("#update-select-state").change(function(){
                this.state_id = $("#update-select-state").val();
                console.log(this.state_id);
                this.getTerritoryName();

            }.bind(this));
            $("#update-select-territory").change(function(){
                this.territory_id = $("#update-select-territory").val();
                console.log(this.territory_id);
            }.bind(this));
        },

        methods : {
            getStateName(){
                axios.get('/api/v1/state/Lists/list-state')
                    .then(function (response) {
                        this.States = response.data;
                    }.bind(this));
            },
            getTerritoryName(){
                this.territories= [];
                axios.get('/api/v1/territory/Lists/'+ this.state_id +'/list-territory-under-state')
                    .then(function (response) {
                        this.territories = response.data;
                    }.bind(this));
            },

        }
    }

</script>
