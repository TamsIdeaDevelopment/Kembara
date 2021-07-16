<template>
    <div>
        <div class="form-group">
            <div class="input-group input-group-merge ">
                <div class="input-icon ">
                    <span class="color-primary "></span>
                </div>
                <select class="form-control select2" style="width:100%" id="register-select-state" v-model="this.state_id" name="state" required>
                    <option  v-for="State in States" :value="State.id">{{ State.name }}</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group input-group-merge ">
                <div class="input-icon ">
                    <span class="color-primary "></span>
                </div>
                <select class="form-control select2"style="width:100%" id="register-select-territory" v-model="this.territory_id" name="territory" required>
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
            $('#register-select-state').select2({
                placeholder: 'State',
                allowClear: true
            });
            $('#register-select-territory').select2({
                placeholder: 'Territory',
                allowClear: true,
                disabled: true
            });
            $("#register-select-state").change(function(){

                this.state_id = $("#register-select-state").val();
                this.getTerritoryName();

                $("#register-select-territory").prop('disabled', true);

                if (this.state_id != null)
                {
                    $("#register-select-territory").prop('disabled', false);

                    $("#register-select-territory").change(function(){
                        this.territory_id = $("#register-select-territory").val();
                    }.bind(this));
                }

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
