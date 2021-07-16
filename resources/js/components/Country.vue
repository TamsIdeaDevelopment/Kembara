<template>
    <div>
        <div class="input-group input-group-merge ">
            <div class="input-icon ">
                <span class="color-primary "></span>
            </div>
            <select class="form-control select2" style="width:100%" id="register-select-country" name="country" required>
                <option value="Malaysia">Malaysia</option>
            </select>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
            }
        },
        created(){
        },
        mounted() {
            $('#register-select-country').select2({
                // placeholder: 'Country',
                minimumResultsForSearch: Infinity,
                // allowClear: true
            });

        },
        methods : {
        }
    }
</script>
