/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import JsonExcel from 'vue-json-excel';
//require('./bootstrap');
window.axios = require('axios');
window.Vue = require('vue');
window.VueEvent = new Vue();
//window.Event = new Vue();
var VueScrollTo = require('vue-scrollto');
Vue.use(VueScrollTo);
Vue.component('downloadExcel', JsonExcel);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('state-territory-component', require('./components/StateTerritory.vue').default);


/********************************************* Admin ****************************************************************/

/**  Product  */
Vue.component('admin-stock-dashboard', require('./components/Admin/Stock/Dashboard/dashboard.vue').default);
Vue.component('admin-stock-list', require('./components/Admin/Stock/List/ListsStock.vue').default);
Vue.component('admin-stock-elements', require('./components/Admin/Stock/Elements/ElementsStock.vue').default);


/**  Shipping  */
Vue.component('admin-shipping-dashboard', require('./components/Admin/Shipping/Dashboard/dashboard.vue').default);
Vue.component('admin-shipping-list', require('./components/Admin/Shipping/Lists/ListsShipment.vue').default);
Vue.component('admin-shipping-element', require('./components/Admin/Shipping/Elements/ElementsShipment.vue').default);


/**  Dashboard  */
Vue.component('admin-dashboard', require('./components/Admin/Dashboard/Dashboard/dashboard.vue').default);
Vue.component('admin-hall-of-fame', require('./components/Admin/Dashboard/Dashboard/HallOfFame.vue').default);
Vue.component('admin-dashboard-chart', require('./components/Admin/Dashboard/Chart/DashboardChart.vue').default);

/**  User Profile  */
Vue.component('admin-user-dashboard', require('./components/Admin/Teams/User/Dashboard/dashboard.vue').default);
Vue.component('admin-user-personal-information', require('./components/Admin/Teams/User/Forms/PersonalInformation.vue').default);
Vue.component('admin-user-profile-image', require('./components/Admin/Teams/User/Forms/ProfileImage.vue').default);
Vue.component('admin-user-change-password', require('./components/Admin/Teams/User/Forms/ChangePassword.vue').default);
Vue.component('admin-user-bank-information', require('./components/Admin/Teams/User/Forms/BankInformation.vue').default);

/**  State  */
Vue.component('state-dashboard', require('./components/Admin/Teams/State/Dashboard/dashboard.vue').default);
Vue.component('state-list', require('./components/Admin/Teams/State/Lists/ListsState.vue').default);
Vue.component('state-elements', require('./components/Admin/Teams/State/Elements/ElementsState.vue').default);

Vue.component('state-form-create', require('./components/Admin/Teams/State/Forms/CreateState.vue').default);
Vue.component('state-form-update', require('./components/Admin/Teams/State/Forms/UpdateState.vue').default);
Vue.component('state-form-delete', require('./components/Admin/Teams/State/Forms/DeleteState.vue').default);

/**  Territory  */
Vue.component('territory-dashboard', require('./components/Admin/Teams/Territory/Dashboard/dashboard.vue').default);
Vue.component('territory-list', require('./components/Admin/Teams/Territory/Lists/ListsTerritory.vue').default);
Vue.component('territory-elements', require('./components/Admin/Teams/Territory/Elements/ElementsTerritory.vue').default);

Vue.component('territory-form-create', require('./components/Admin/Teams/Territory/Forms/CreateTerritory.vue').default);
Vue.component('territory-form-update', require('./components/Admin/Teams/Territory/Forms/UpdateTerritory.vue').default);
Vue.component('territory-form-delete', require('./components/Admin/Teams/Territory/Forms/DeleteTerritory.vue').default);

/**  Roles  */
Vue.component('roles-dashboard', require('./components/Admin/Teams/Roles/Dashboard/dashboard.vue').default);
Vue.component('roles-list', require('./components/Admin/Teams/Roles/Lists/ListsRole.vue').default);
Vue.component('roles-elements', require('./components/Admin/Teams/Roles/Elements/ElementsRoles.vue').default);

Vue.component('roles-form-create', require('./components/Admin/Teams/Roles/Forms/CreateRoles.vue').default);
Vue.component('roles-form-update', require('./components/Admin/Teams/Roles/Forms/UpdatesRoles.vue').default);
Vue.component('roles-form-delete', require('./components/Admin/Teams/Roles/Forms/DeleteRoles.vue').default);

/**  New Application  */
Vue.component('new-application-dashboard', require('./components/Admin/Teams/NewApplication/Dashboard/dashboard.vue').default);
Vue.component('new-application-list', require('./components/Admin/Teams/NewApplication/Lists/ListsNewApplication.vue').default);
Vue.component('new-application-elements', require('./components/Admin/Teams/NewApplication/Elements/ElementsNewApplication.vue').default);
//
Vue.component('agent-approve-form-update', require('./components/Admin/Teams/NewApplication/Forms/UpdateApproveAgent.vue').default);
Vue.component('new-application-form-delete', require('./components/Admin/Teams/NewApplication/Forms/DeleteNewApplication.vue').default);

/**  Team  */
Vue.component('team-dashboard', require('./components/Admin/Teams/Team/Dashboard/dashboard.vue').default);
Vue.component('team-list', require('./components/Admin/Teams/Team/Lists/ListsTeam.vue').default);
Vue.component('team-elements', require('./components/Admin/Teams/Team/Elements/ElementsTeam.vue').default);


Vue.component('agent-details-dashboard', require('./components/Admin/Teams/Team/Dashboard/dashboard-agent-details.vue').default);
Vue.component('team-member-elements', require('./components/Admin/Teams/Team/Elements/ElementsTeamMember.vue').default);
Vue.component('team-membership-form-update', require('./components/Admin/Teams/Team/Forms/UpdateMembership.vue').default);
Vue.component('team-settings-form-update', require('./components/Admin/Teams/Team/Forms/TeamSettings.vue').default);
Vue.component('team-transfer-network-form-update', require('./components/Admin/Teams/Team/Forms/TransferNetwork.vue').default);
Vue.component('team-upgrade-downgrade-membership-form-update', require('./components/Admin/Teams/Team/Forms/UpgradeDowngradeMembership.vue').default);
Vue.component('team-terminate-membership-form-update', require('./components/Admin/Teams/Team/Forms/TerminateMembership.vue').default);
Vue.component('team-form-delete', require('./components/Admin/Teams/Team/Forms/DeleteTeam.vue').default);


/**  Product  */
Vue.component('product-dashboard', require('./components/Admin/Product/Dashboard/dashboard.vue').default);
Vue.component('add-product-dashboard', require('./components/Admin/Product/Dashboard/add-product-dashboard.vue').default);
Vue.component('edit-product-dashboard', require('./components/Admin/Product/Dashboard/edit-product-dashboard.vue').default);
Vue.component('product-list', require('./components/Admin/Product/Lists/ListsProduct.vue').default);
Vue.component('product-elements', require('./components/Admin/Product/Elements/ElementsProduct.vue').default);
//
Vue.component('product-form-create', require('./components/Admin/Product/Forms/CreateProduct.vue').default);
Vue.component('price-form-create', require('./components/Admin/Product/Forms/CreatePrice.vue').default);
Vue.component('price-modal-create', require('./components/Admin/Product/Forms/CreatePriceModal.vue').default);
Vue.component('moq-form-create', require('./components/Admin/Product/Forms/CreateMOQ.vue').default);
//
Vue.component('product-form-update', require('./components/Admin/Product/Forms/UpdateProduct.vue').default);
Vue.component('price-form-update', require('./components/Admin/Product/Forms/UpdatePrice.vue').default);
Vue.component('moq-form-update', require('./components/Admin/Product/Forms/UpdateMOQ.vue').default);
Vue.component('stock-form-update', require('./components/Admin/Product/Forms/UpdateStock.vue').default);

Vue.component('product-form-delete', require('./components/Admin/Product/Forms/DeleteProduct.vue').default);

/** Product (Package) */
Vue.component('package-dashboard', require('./components/Admin/Product/Dashboard/dashboard-package.vue').default);
Vue.component('package-list', require('./components/Admin/Product/Lists/ListsPackage.vue').default);
Vue.component('package-elements', require('./components/Admin/Product/Elements/ElementsPackage.vue').default);
Vue.component('view-package-dashboard', require('./components/Admin/Product/Dashboard/view-package-dashboard.vue').default);
Vue.component('package-form-view', require('./components/Admin/Product/Forms/ViewPackage.vue').default);

Vue.component('add-package-dashboard', require('./components/Admin/Product/Dashboard/add-package-dashboard.vue').default);
Vue.component('package-form-create', require('./components/Admin/Product/Forms/CreatePackage.vue').default);
Vue.component('package-product-form-create', require('./components/Admin/Product/Forms/CreatePackageProduct.vue').default);

Vue.component('edit-package-dashboard', require('./components/Admin/Product/Dashboard/edit-package-dashboard.vue').default);
Vue.component('package-form-update', require('./components/Admin/Product/Forms/UpdatePackage.vue').default);
Vue.component('package-product-form-update', require('./components/Admin/Product/Forms/UpdatePackageProduct.vue').default);

Vue.component('package-form-delete', require('./components/Admin/Product/Forms/DeletePackage.vue').default);

/**  Order  */
////////////////////////////////////// HQ ///////////////////////////////////////////
Vue.component('order-hq-dashboard', require('./components/Admin/Order/HQ/Dashboard/dashboard.vue').default);
Vue.component('order-hq-list', require('./components/Admin/Order/HQ/Lists/ListsOrder.vue').default);
Vue.component('order-hq-elements', require('./components/Admin/Order/HQ/Elements/ElementsOrder.vue').default);
//
Vue.component('team-order-hq-elements', require('./components/Admin/Order/HQ/Elements/ElementsHQOrder.vue').default);


/**  Order  */
////////////////////////////////////// Team ///////////////////////////////////////////
Vue.component('order-team-dashboard', require('./components/Admin/Order/Team/Dashboard/dashboard.vue').default);
Vue.component('order-team-list', require('./components/Admin/Order/Team/Lists/ListsOrder.vue').default);
Vue.component('order-team-elements', require('./components/Admin/Order/Team/Elements/ElementsOrder.vue').default);
//
Vue.component('order-team-agent-agent-elements', require('./components/Admin/Order/Team/Elements/ElementsTeamOrder.vue').default);

/**  Classroom  */
Vue.component('admin-classroom-dashboard', require('./components/Admin/Classroom/Dashboard/dashboard.vue').default);
Vue.component('admin-classroom-elements', require('./components/Admin/Classroom/Elements/ElementClassroom.vue').default);
Vue.component('admin-classroom-form', require('./components/Admin/Classroom/Forms/FormClassroom.vue').default);

/********************************************* Agent ****************************************************************/

/**  Customer  */
Vue.component('agent-customer-dashboard', require('./components/Agent/Customer/Dashboard/dashboard.vue').default);
Vue.component('agent-customer-dashboard-chart', require('./components/Agent/Customer/Dashboard/Chart/DashboardChart').default);
Vue.component('agent-new-customer-dashboard', require('./components/Agent/Customer/Dashboard/dashboard-new-customer-order.vue').default);
Vue.component('agent-customer-dashboard-order-details', require('./components/Agent/Customer/Dashboard/dashboard-customer-order-details.vue').default);
Vue.component('agent-customer-list', require('./components/Agent/Customer/Lists/ListsCustomerOrder.vue').default);
Vue.component('agent-customer-elements', require('./components/Agent/Customer/Elements/ElementsCustomerOrder.vue').default);
Vue.component('agent-customer-cart-elements', require('./components/Agent/Customer/Elements/ElementsCustomerCart.vue').default);
Vue.component('agent-customer-delivery-address-elements', require('./components/Agent/Customer/Elements/ElementsCustomerDeliveryAddress.vue').default);
Vue.component('agent-customer-review-submit-elements', require('./components/Agent/Customer/Elements/ElementsCustomerReviewAndSubmit.vue').default);


/**  Dashboard  */
Vue.component('agent-dashboard', require('./components/Agent/Dashboard/Dashboard/dashboard.vue').default);
Vue.component('agent-mini-dashboard', require('./components/Agent/Dashboard/Dashboard/MiniDashboard.vue').default);
Vue.component('agent-hall-of-fame-restock', require('./components/Agent/Dashboard/Dashboard/HallOfFameRestock').default);
Vue.component('agent-dashboard-chart', require('./components/Agent/Dashboard/Chart/DashboardChart.vue').default);

/**  User Profile  */
Vue.component('agent-user-dashboard', require('./components/Agent/Teams/User/Dashboard/dashboard.vue').default);
Vue.component('agent-user-personal-information', require('./components/Agent/Teams/User/Forms/PersonalInformation.vue').default);
Vue.component('agent-user-profile-image', require('./components/Agent/Teams/User/Forms/ProfileImage.vue').default);

/**  Order  */
////////////////////////////////////// HQ ///////////////////////////////////////////
Vue.component('agent-order-hq-dashboard', require('./components/Agent/Order/HQ/Dashboard/dashboard.vue').default);

Vue.component('agent-order-details-dashboard', require('./components/Agent/Order/HQ/Dashboard/dashboard-order-details.vue').default);
Vue.component('agent-bank-transfer-elements', require('./components/Agent/Order/HQ/Elements/ElementsBankTransfer.vue').default);

Vue.component('agent-order-hq-list', require('./components/Agent/Order/HQ/Lists/ListsOrder.vue').default);
Vue.component('agent-order-hq-elements', require('./components/Agent/Order/HQ/Elements/ElementsOrder.vue').default);

////////////////////////////////////// Team ///////////////////////////////////////////
Vue.component('agent-order-team-dashboard', require('./components/Agent/Order/Team/Dashboard/dashboard.vue').default);
Vue.component('agent-order-team-list', require('./components/Agent/Order/Team/Lists/ListsOrder.vue').default);
Vue.component('agent-order-team-elements', require('./components/Agent/Order/Team/Elements/ElementsOrder.vue').default);
Vue.component('agent-restock-team-elements', require('./components/Agent/Order/Team/Elements/ElementsRestock.vue').default);
Vue.component('agent-sales-team-elements', require('./components/Agent/Order/Team/Elements/ElementsSales.vue').default);

/**  Product  */
Vue.component('agent-verify-first-purchase', require('./components/Agent/Product/VerifyFirstPurchase').default);

Vue.component('agent-product-dashboard', require('./components/Agent/Product/Dashboard/dashboard.vue').default);
Vue.component('agent-product-list', require('./components/Agent/Product/Lists/ListsProduct.vue').default);
Vue.component('agent-product-elements', require('./components/Agent/Product/Elements/ElementsProduct.vue').default);


Vue.component('agent-product-first-purchase-dashboard', require('./components/Agent/Product/Dashboard/dashboard-first-purchase').default);
Vue.component('agent-product-first-purchase-list', require('./components/Agent/Product/Lists/ListsFirstPurchaseProduct').default);
Vue.component('agent-product-first-purchase-elements', require('./components/Agent/Product/Elements/ElementsFirstPurchaseProduct').default);

/**  Team  */
Vue.component('agent-team-dashboard', require('./components/Agent/Teams/Team/Dashboard/dashboard.vue').default);
Vue.component('agent-team-list', require('./components/Agent/Teams/Team/Lists/ListsTeam.vue').default);
Vue.component('agent-team-elements', require('./components/Agent/Teams/Team/Elements/ElementsTeam.vue').default);

Vue.component('agent-agent-details-dashboard', require('./components/Agent/Teams/Team/Dashboard/dashboard-agent-details.vue').default);
Vue.component('agent-team-membership-form-update', require('./components/Agent/Teams/Team/Forms/UpdateMembership.vue').default);
Vue.component('agent-team-member-elements', require('./components/Agent/Teams/Team/Elements/ElementsTeamMember.vue').default);


/**  Cart  */
Vue.component('agent-cart-dashboard', require('./components/Agent/Cart/Dashboard/dashboard.vue').default);
Vue.component('agent-cart-details-dashboard', require('./components/Agent/Cart/Dashboard/dashboard-details.vue').default);


Vue.component('agent-cart-total-count-elements', require('./components/Agent/Cart/Elements/ElementsTotalCart.vue').default);
Vue.component('agent-cart-elements', require('./components/Agent/Cart/Elements/ElementsCart.vue').default);
Vue.component('agent-cart-delivery-address-elements', require('./components/Agent/Cart/Elements/ElementsDeliveryAddress.vue').default);
Vue.component('agent-cart-payment-method-elements', require('./components/Agent/Cart/Elements/ElementsPaymentMethod.vue').default);
Vue.component('agent-cart-review-submit-elements', require('./components/Agent/Cart/Elements/ElementsReviewAndSubmit.vue').default);



/**  First Purchase  */

Vue.component('agent-first-purchase-details-dashboard', require('./components/Agent/FirstPurchase/Dashboard/dashboard-details.vue').default);

Vue.component('agent-first-purchase-elements', require('./components/Agent/FirstPurchase/Elements/ElementsCart.vue').default);
Vue.component('agent-first-purchase-delivery-address-elements', require('./components/Agent/FirstPurchase/Elements/ElementsDeliveryAddress.vue').default);
Vue.component('agent-first-purchase-payment-method-elements', require('./components/Agent/FirstPurchase/Elements/ElementsPaymentMethod.vue').default);
Vue.component('agent-first-purchase-review-submit-elements', require('./components/Agent/FirstPurchase/Elements/ElementsReviewAndSubmit.vue').default);

/**  First Purchase Mini Agent*/

Vue.component('mini-agent-first-purchase-details-dashboard', require('./components/Agent/FirstPurchase/Dashboard/Dashboard-MiniAgentDetails.vue').default);


Vue.component('mini-agent-first-purchase-elements', require('./components/Agent/FirstPurchase/Elements/MiniAgentElementsCart.vue').default);
Vue.component('mini-agent-first-purchase-delivery-address-elements', require('./components/Agent/FirstPurchase/Elements/MiniAgentElementsDeliveryAddress.vue').default);
Vue.component('mini-agent-first-purchase-payment-method-elements', require('./components/Agent/FirstPurchase/Elements/MiniAgentElementsPaymentMethod.vue').default);
Vue.component('mini-agent-first-purchase-review-submit-elements', require('./components/Agent/FirstPurchase/Elements/MiniAgentElementsReviewAndSubmit.vue').default);


/**  Product  */
Vue.component('agent-stock-dashboard', require('./components/Agent/Stock/Dashboard/dashboard.vue').default);
Vue.component('agent-stock-list', require('./components/Agent/Stock/List/ListsStock.vue').default);
Vue.component('agent-stock-elements', require('./components/Agent/Stock/Elements/ElementsStock.vue').default);


/**  Classroom  */
Vue.component('agent-classroom-dashboard', require('./components/Agent/Classroom/Dashboard/dashboard.vue').default);
Vue.component('agent-classroom-elements', require('./components/Agent/Classroom/Elements/ElementClassroom.vue').default);

                                                /**  User   **/

////////////////////////////////////// Team ///////////////////////////////////////////
Vue.component('invite-team-dashboard-user', require('./components/User/Teams/Invite/Dashboard/dashboard.vue').default);
Vue.component('list-agent-invite-form', require('./components/User/Teams/Invite/Forms/CreateInvite.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

export const EventBus = new Vue();

const app = new Vue({
    el: '#app',
});
