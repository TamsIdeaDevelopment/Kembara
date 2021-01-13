<template>
    <div class="" data-wizard-type="step-content">
        <h4 class="mb-5 font-weight-bold text-dark">Enter the Agent Price</h4>
        <div class="form-group" v-for="(Role,index) in $parent.Roles">
            <label>{{Role.name}}</label>
            <input type="text" class="form-control" v-model="$parent.Roles[index].price" placeholder="RM"/>
        </div>
    </div>
</template>
