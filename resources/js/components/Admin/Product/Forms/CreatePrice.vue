<template>
    <div class="" data-wizard-type="step-content">
        <h4 class="mb-5 font-weight-bold text-dark">Enter the Agent Price</h4>
        <div class="form-group" v-for="(Role,index) in $parent.Roles">
            <h6 class="text-primary">{{Role.name}}</h6>
<!--            <input type="text" class="form-control" v-model="$parent.Roles[index].price" placeholder="RM"/>-->
            <div class="row">
                <div class="col-lg-6">
                    <label>Semenanjung</label>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">RM</span></div>
                        <input type="number" class="form-control" v-model="$parent.Roles[index].price" placeholder="RM"/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label>Sabah & Sarawak</label>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">RM</span></div>
                        <input type="number" class="form-control" v-model="$parent.Roles[index].ss_price" placeholder="RM"/>
                    </div>
                </div>
<!--                <div class="col-lg-4">-->
<!--                    <label>Singapura & Brunei</label>-->
<!--                    <div class="input-group">-->
<!--                        <div class="input-group-prepend"><span class="input-group-text">$</span></div>-->
<!--                        <input type="text" class="form-control" v-model="$parent.Roles[index].sg_brn_price" placeholder="RM"/>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </div>
</template>
