<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});



Route::group(['middleware' => 'api', 'prefix' => 'v1', 'as' => 'api.'], function () {


    Route::group(['prefix' => 'Customer', 'as' => 'Customer.', 'namespace' => 'Customer'], function () {

        Route::group(['prefix' => 'Lists', 'as' => 'Lists.','namespace' => 'Lists'], function () {
            Route::get('{user_id}/agent-list-customer-order', 'ListCustomerOrder@agentListCustomerOrder')->name('agent-list-customer-order');

            Route::get('{user_id}/customer-chart', 'ListCustomerChart@listChart')->name('customer-chart');
        });

        Route::group(['prefix' => 'Creates', 'as' => 'Creates.','namespace' => 'Creates'], function () {
            Route::post('/create-order', 'CustomerCreateOrder@customerCreateOrder')->name('create-order');

        });

        Route::group(['prefix' => 'Updates', 'as' => 'Updates.','namespace' => 'Updates'], function () {
        });

        Route::group(['prefix' => 'Deletes', 'as' => 'Deletes.','namespace' => 'Deletes'], function () {
        });
    });

    Route::group(['prefix' => 'cart', 'as' => 'cart.', 'namespace' => 'Cart'], function () {
        Route::get('/list-cart', 'CartController@ListCarts')->name('cart');
        Route::get('/count-cart', 'CartController@CountCarts')->name('count-cart');
        Route::get('/total-cart', 'CartController@totalCarts')->name('total-cart');
        Route::post('{user_id}/{rowID}/remove-item', 'CartController@RemoveItem')->name('remove-item');
        Route::post('{user_id}/{rowID}/{quantity}/add-quantity', 'CartController@AddQuantity')->name('add-quantity');
        Route::post('{user_id}/{rowID}/{quantity}/decrease-quantity', 'CartController@DecreaseQuantity')->name('decrease-quantity');
    });

    Route::group(['prefix' => 'invite', 'as' => 'invite.', 'namespace' => 'Auth'], function () {
        Route::post('/create-invite', 'InviteRegisterController@create')->name('create-invite');
    });

    Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Common'], function () {

        Route::post('/{id}/update-profile', 'ProfileSettings@ChangeProfile')->name('change-profile');
        Route::get('/check-password/{id}/{password}','ProfileSettings@CheckPassword')->name('check-password');
        Route::get('/{id}/{new_password}/change-password', 'ProfileSettings@ChangePassword')->name('change-password-profile');
        Route::post('/{id}/change-profile-picture', 'ProfileSettings@ChangeProfilePicture')->name('change-profile-picture');
    });

    Route::group(['prefix' => 'state', 'as' => 'state.', 'namespace' => 'State'], function () {

        Route::group(['prefix' => 'Lists', 'as' => 'Lists.','namespace' => 'Lists'], function () {
            Route::get('/state', 'ListState@list')->name('state');
            Route::get('/list-state', 'ListState@listState')->name('list-state');
        });

        Route::group(['prefix' => 'Creates', 'as' => 'Creates.','namespace' => 'Creates'], function () {
            Route::post('/create-state', 'CreateState@create')->name('create-state');
        });

        Route::group(['prefix' => 'Updates', 'as' => 'Updates.','namespace' => 'Updates'], function () {
            Route::post('{id}/update-state', 'UpdateState@update')->name('update-state');
        });

        Route::group(['prefix' => 'Deletes', 'as' => 'Deletes.','namespace' => 'Deletes'], function () {
            Route::delete('{id}/delete-state', 'DeleteState@delete')->name('delete-state');
        });
    });

    Route::group(['prefix' => 'territory', 'as' => 'territory.', 'namespace' => 'Territory'], function () {

        Route::group(['prefix' => 'Lists', 'as' => 'Lists.','namespace' => 'Lists'], function () {
            Route::get('/territory', 'ListTerritory@list')->name('territory');
            Route::get('/list-territory', 'ListTerritory@listTerritory')->name('territory');
            Route::get('{state_id}/list-territory-under-state', 'ListTerritory@listTerritoryUnderState')->name('list-territory-under-state');
        });

        Route::group(['prefix' => 'Creates', 'as' => 'Creates.','namespace' => 'Creates'], function () {
            Route::post('/create-territory', 'CreateTerritory@create')->name('create-territory');
        });

        Route::group(['prefix' => 'Updates', 'as' => 'Updates.','namespace' => 'Updates'], function () {
            Route::post('{id}/update-territory', 'UpdateTerritory@update')->name('update-territory');
        });

        Route::group(['prefix' => 'Deletes', 'as' => 'Deletes.','namespace' => 'Deletes'], function () {
            Route::delete('{id}/delete-territory', 'DeleteTerritory@delete')->name('delete-territory');
        });

    });

    Route::group(['prefix' => 'roles', 'as' => 'roles.', 'namespace' => 'Roles'], function () {

        Route::group(['prefix' => 'Creates', 'as' => 'Creates.','namespace' => 'Creates'], function () {
            Route::post('/create-roles', 'CreateRoles@create')->name('create-roles');
        });

        Route::group(['prefix' => 'Updates', 'as' => 'Updates.','namespace' => 'Updates'], function () {
            Route::post('{id}/update-roles', 'UpdateRoles@update')->name('update-roles');
        });

        Route::group(['prefix' => 'Deletes', 'as' => 'Deletes.','namespace' => 'Deletes'], function () {
            Route::delete('{id}/delete-roles', 'DeleteRoles@delete')->name('delete-roles');
        });

        Route::group(['prefix' => 'Lists', 'as' => 'Lists.','namespace' => 'Lists'], function () {
            Route::get('/roles', 'ListRoles@list')->name('roles');
            Route::get('/parent-roles', 'ListRoles@listParentName')->name('parent-roles');
            Route::get('/exclude-hq-role', 'ListRoles@listExcludeHQ')->name('exclude-hq-role');
            Route::get('/list-agent-level', 'ListRoles@listExcludeHQ')->name('list-agent-level');
            Route::get('{product_id}/agent-dropdown', 'ListRoles@AgentDropdownList')->name('agent-dropdown');

        });
    });

    Route::group(['prefix' => 'new-application', 'as' => 'new-application.', 'namespace' => 'NewApplication'], function () {

        Route::group(['prefix' => 'Creates', 'as' => 'Creates.','namespace' => 'Creates'], function () {
        });

        Route::group(['prefix' => 'Updates', 'as' => 'Updates.','namespace' => 'Updates'], function () {
        });

        Route::group(['prefix' => 'Deletes', 'as' => 'Deletes.','namespace' => 'Deletes'], function () {
        });

        Route::group(['prefix' => 'Lists', 'as' => 'Lists.','namespace' => 'Lists'], function () {
            Route::get('/new-application', 'ListNewApplication@list')->name('new-application');
        });
    });

    Route::group(['prefix' => 'team', 'as' => 'team.', 'namespace' => 'Team'], function () {

        Route::group(['prefix' => 'Creates', 'as' => 'Creates.','namespace' => 'Creates'], function () {
        });

        Route::group(['prefix' => 'Updates', 'as' => 'Updates.','namespace' => 'Updates'], function () {
            Route::post('{id}/update-membership', 'UpdateTeam@updateMembership')->name('update-membership');
            Route::post('{id}/approve-membership', 'UpdateTeam@ApproveAgent')->name('approve-membership');
            Route::post('{NewLeaderID}/update-network', 'UpdateTeam@updateNetwork')->name('update-network');
            Route::post('{id}/upgrade-downgrade-membership', 'UpdateTeam@UpgradeDowngradeMembership')->name('upgrade-downgrade-membership');
//            Route::post('{id}/upgrade-downgrade-membership', 'UpdateTeam@TerminateMembership')->name('upgrade-downgrade-membership');
            Route::post('{id}/update-membership-point', 'UpdateTeam@updateMembershipPoint')->name('update-membership-point');

        });

        Route::group(['prefix' => 'Deletes', 'as' => 'Deletes.','namespace' => 'Deletes'], function () {
            Route::post('{id}/delete-team', 'DeleteTeam@deleteAgent')->name('delete-team');

        });

        Route::group(['prefix' => 'Lists', 'as' => 'Lists.','namespace' => 'Lists'], function () {
            Route::get('/teams', 'ListTeam@list')->name('teams');
            Route::get('/hq', 'ListTeam@listHQ')->name('hq');
            Route::get('{id}/agent-profile', 'ListTeam@agentProfile')->name('agent-profile');
            Route::get('{id}/agent-details', 'ListTeam@agentDetails')->name('agent-details');
            Route::get('{id}/agent-info', 'ListTeam@agentInformation')->name('agent-info');
            Route::get('{id}/team-members', 'ListTeam@TeamMember')->name('team-members');
            Route::get('{id}/team-members-under-levels-only', 'ListTeam@TeamMemberUnderLevelOnly')->name('team-members-under-levels-only');
            Route::get('{territory_id}/{agent_levels_id}/search-teams', 'ListTeam@SearchTeam')->name('search-teams');
            Route::get('{levelID}/list-new-leader', 'ListTeam@listNewLeader')->name('list-new-leader');
            Route::get('{id}/list-new-leader-based-on-parent', 'ListTeam@listNewLeaderBasedOnParent')->name('list-new-leader-based-on-parent');

            Route::get('{status}/admin-filter-team', 'FilterTeam@adminFilter')->name('admin-filter-team');
        });
    });

    Route::group(['prefix' => 'product', 'as' => 'product.', 'namespace' => 'Product'], function () {

        Route::group(['prefix' => 'Creates', 'as' => 'Creates.','namespace' => 'Creates'], function () {
            Route::post('/create-product', 'CreateProduct@create')->name('create-product');
            Route::post('/create-price-product', 'CreateAgentsPrice@create')->name('create-price-product');
            Route::post('/create-agent-price-product', 'CreateAgentsPrice@createAgentPrice')->name('create-agent-price-product');
            Route::post('/create-package', 'CreatePackage@create')->name('create-package');
            Route::post('{package_id}/create-package-product', 'CreatePackageProduct@create')->name('create-package-product');
        });

        Route::group(['prefix' => 'Updates', 'as' => 'Updates.','namespace' => 'Updates'], function () {
            Route::post('{id}/products', 'UpdateProduct@update')->name('products');
            Route::post('{id}/products-stock', 'UpdateProduct@updateStock')->name('products-stock');
            Route::post('/agent-price-products', 'UpdateAgentsPrice@update')->name('agent-price-products');
            Route::post('{user_id}/{product_id}/{quantity}/edit-stock-agent', 'UpdateProduct@editAgentStock')->name('edit-stock-agent');

            Route::post('{package_id}/update-package', 'UpdatePackage@updatePackage')->name('update-package');
            Route::post('{package_id}/update-package-product', 'UpdatePackageProduct@updatePackageProduct')->name('update-package-product');

        });

        Route::group(['prefix' => 'Deletes', 'as' => 'Deletes.','namespace' => 'Deletes'], function () {
            Route::post('{id}/products', 'DeleteProduct@delete')->name('products');
            Route::post('{id}/package', 'DeletePackage@delete')->name('package');
        });

        Route::group(['prefix' => 'Lists', 'as' => 'Lists.','namespace' => 'Lists'], function () {
            Route::get('/products', 'ListProduct@list')->name('products');
            Route::get('/category-products', 'ListProduct@category')->name('category-products');
            Route::get('/list-products', 'ListProduct@listProduct')->name('list-products');
            Route::get('{id}/products-details', 'ListProduct@productDetails')->name('products-details');
            Route::get('{product_id}/agent-price-moq', 'ListProduct@agentPriceAndMOQ')->name('agent-price-moq');
            Route::get('{user_id}/list-price-moq', 'ListProduct@ListPriceAndMOQ')->name('agent-price-moq');
            Route::get('{product_id}/{agent_levels_id}/agent-moq', 'ListProduct@agentMOQ')->name('agent-moq');
            Route::get('{user_id}/stock-list-leader', 'ListProduct@StockLeaderList')->name('stock-list-leader');
            Route::get('{user_id}/stock-list-agent', 'ListProduct@StockListAgent')->name('stock-list-agent');
            Route::get('{user_id}/stock-list-agent-for-customer', 'ListProduct@StockListAgentForCustomer')->name('stock-list-agent-for-customer');

            Route::get('{user_id}/stock-first-purchase', 'ListFirstPurchaseProduct@StockFirstPurchase')->name('stock-first-purchase');

            Route::get('/package', 'ListPackage@list')->name('package');
            Route::get('{id}/package-details', 'ListPackage@PackageDetails')->name('package-details');
            Route::get('{id}/package-product-details', 'ListPackage@PackageProductDetails')->name('package-product-details');
            Route::get('{id}/list-package-product-details', 'ListPackage@listPackageProductDetails')->name('list-package-product-details');


        });
    });


    Route::group(['prefix' => 'orders', 'as' => 'orders.', 'namespace' => 'Orders'], function () {

        Route::group(['prefix' => 'HQ', 'as' => 'HQ.','namespace' => 'HQ'], function () {

            Route::group(['prefix' => 'Creates', 'as' => 'Creates.','namespace' => 'Creates'], function () {
                Route::post('/create-order', 'CreateOrder@createOrder')->name('create-order');
                Route::post('/create-first-purchase', 'CreateFirstPurchase@createFirstPurchase')->name('create-first-purchase');
                Route::post('/create-test-order', 'CreateOrder@createTestOrder')->name('create-test-order');
            });

            Route::group(['prefix' => 'Updates', 'as' => 'Updates.','namespace' => 'Updates'], function () {
                Route::post('{order_id}/{tracking_no}/update-shipment', 'UpdateShipment@updateShipment')->name('update-shipment');
                Route::post('{order_id}/{buyer_id}/complete-order', 'CompleteOrder@CompleteOrder')->name('admin-complete-order');
            });

            Route::group(['prefix' => 'Deletes', 'as' => 'Deletes.','namespace' => 'Deletes'], function () {
            });

            Route::group(['prefix' => 'Lists', 'as' => 'Lists.','namespace' => 'Lists'], function () {
                Route::get('/orders', 'ListOrder@list')->name('orders');
                Route::get('{agentID}/agent-hq-orders', 'ListOrder@AgentListOrder')->name('agent.hq.orders');
                Route::get('{orderID}/order-details', 'ListOrder@OrderDetails')->name('order.details');
                Route::get('{orderID}/order-items', 'ListOrder@OrderItems')->name('order.items');

                Route::get('/check-last-order', 'ListOrder@checkLastOrder')->name('check-last-order');

                Route::get('{user_id}/admin-chart', 'ListAdminChart@listChart')->name('admin-chart');

                Route::get('/list-shipment', 'ListShipment@listShipment')->name('list-shipment');

                Route::get('{user_id}/{option}/list-hall-of-fame-master-stokis', 'ListHallOfFame@adminlistMasterStokis')->name('admin-list-hall-of-fame-master-stokis');
                Route::get('{user_id}/{option}/list-hall-of-fame-stokis', 'ListHallOfFame@adminlistStokis')->name('admin-list-hall-of-fame-stokis');
                Route::get('{user_id}/{option}/list-hall-of-fame-agent', 'ListHallOfFame@adminlistAgent')->name('admin-list-hall-of-fame-agent');
                Route::get('{user_id}/{option}/list-hall-of-fame-mini-agent', 'ListHallOfFame@adminlistMiniAgent')->name('admin-list-hall-of-fame-mini-agent');
                Route::get('dropdown-date', 'ListHallOfFame@DropdownDate')->name('dropdown-date');


                Route::get('{status}/{HQ}/{customer}/admin-filter-order', 'FilterOrder@adminFilter')->name('admin-filter-order');
                Route::get('{option}/{seller_id}/admin-list-chart-order', 'FilterOrder@ListChartOrderHQ')->name('admin-list-chart-order');
                Route::get('{startdate}/{enddate}/{seller_id}/admin-search-chart-order', 'FilterOrder@SearchChartOrderHQ')->name('admin-search-chart-order');
                Route::get('{startdate}/{enddate}/{seller_id}/admin-search-total-chart-order', 'FilterOrder@SearchTotalChartOrderHQ')->name('admin-search-total-chart-order');

            });

        });

        Route::group(['prefix' => 'team', 'as' => 'Team.','namespace' => 'Team'], function () {

            Route::group(['prefix' => 'Creates', 'as' => 'Creates.','namespace' => 'Creates'], function () {
            });

            Route::group(['prefix' => 'Updates', 'as' => 'Updates.','namespace' => 'Updates'], function () {
                Route::get('{buyer_id}/{order_id}/approve-order', 'ApproveOrder@approveOrder')->name('approve-order');
                Route::post('{order_id}/upload-proof-of-payment', 'UpdatePayment@UpdateProofOfPayment')->name('upload-proof-of-payment');
            });

            Route::group(['prefix' => 'Deletes', 'as' => 'Deletes.','namespace' => 'Deletes'], function () {
            });

            Route::group(['prefix' => 'Lists', 'as' => 'Lists.','namespace' => 'Lists'], function () {
                Route::get('/orders', 'ListOrder@list')->name('orders');
                Route::get('{agentID}/agent-orders', 'ListOrder@AgentListOrder')->name('agent.orders');
                Route::get('{agentID}/agent-restock', 'ListOrder@AgentListRestock')->name('agent.restock');
                Route::get('{user_id}/agent-chart', 'ListChart@listChart')->name('agent-chart');

                Route::get('{user_id}/{leader_id}/{agent_levels_id}/list-hall-of-fame-restock', 'ListHallOfFameRestock@HallOfFameRestock')->name('agent-list-hall-of-fame-restock');


            });

        });
    });
    Route::group(['prefix' => 'Classroom', 'as' => 'Classroom.', 'namespace' => 'Classroom'], function () {

        Route::group(['prefix' => 'HQ', 'as' => 'HQ.','namespace' => 'HQ'], function () {

            Route::group(['prefix' => 'Creates', 'as' => 'Creates.','namespace' => 'Creates'], function () {
                Route::post('/create-classroom', 'CreateClassroom@createClassroom')->name('create-classroom');
            });

            Route::group(['prefix' => 'Updates', 'as' => 'Updates.','namespace' => 'Updates'], function () {
                Route::post('{classroom_id}/update-classroom', 'UpdateClassroom@updateClassroom')->name('update-classroom');

            });

            Route::group(['prefix' => 'Deletes', 'as' => 'Deletes.','namespace' => 'Deletes'], function () {
            });

            Route::group(['prefix' => 'Lists', 'as' => 'Lists.','namespace' => 'Lists'], function () {

            });

        });

        Route::group(['prefix' => 'Team', 'as' => 'Team.','namespace' => 'Team'], function () {

            Route::group(['prefix' => 'Creates', 'as' => 'Creates.','namespace' => 'Creates'], function () {
            });

            Route::group(['prefix' => 'Updates', 'as' => 'Updates.','namespace' => 'Updates'], function () {
            });

            Route::group(['prefix' => 'Deletes', 'as' => 'Deletes.','namespace' => 'Deletes'], function () {
            });

            Route::group(['prefix' => 'Lists', 'as' => 'Lists.','namespace' => 'Lists'], function () {
                Route::get('/all-classroom', 'ListClassroom@all')->name('all-classroom');

            });

        });
    });
});
