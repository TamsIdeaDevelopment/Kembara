<template>
    <div class="" data-wizard-type="step-content">
        <h4 class="mb-5 font-weight-bold text-dark">Enter Minimum Order</h4>
        <div class="form-group" v-for="(Role,index) in $parent.Roles">
            <label>{{Role.name}}</label>
            <input type="hidden" class="form-control" v-model="$parent.Roles[index].id"/>
            <input type="number" class="form-control" v-model="$parent.Roles[index].moq"/>
        </div>
    </div>
</template>
