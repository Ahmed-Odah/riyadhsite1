<?php


use App\Http\Controllers\SwitchLanguage;
use App\Models\Book;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('laanding.home', [
        'books' => Book::query()->take(4)->get(),
        'blogs' => \App\Models\Blog::query()->get(),
    ]);
})->name('homepage');





Route::middleware('web')->group(function () {
    Route::get('lang/{locale}', SwitchLanguage::class)->name('lang.switch');
});






// Route::get('/signup', \App\Actions\Auth\RegisterViewAction::class)->name('signup');

Route::get('/client', \App\Actions\Client\Admin\ClientViewAction::class)->name('client');

Route::post('/client-post', \App\Actions\Client\Admin\ClientPostAction::class)->name('client.post');

Route::get('/signin', \App\Actions\Auth\LogInViewAction::class)->name('signin');
Route::post('/signup-post', \App\Actions\Auth\RegisterPostAction::class)->name('signup.post');
Route::post('/signin-post', \App\Actions\Auth\LoginPostAction::class)->name('signin.post');
Route::get('books-index', \App\Actions\Books\client\BooksClientIndexAction::class)->name('books.index');
Route::get('book-read/{id}', \App\Actions\Books\client\BookReadAction::class)->name('book.read');
Route::get('certificate-read/{id}', [\App\Actions\Books\client\BookReadAction::class, 'readCertificatePdf'])->name('certificate.read');
Route::get('/book/{id}/pdf', [\App\Actions\Books\client\BookReadAction::class, 'pdf'])->name('books.pdf');
Route::get('/certificate/{id}/pdf', [\App\Actions\Books\client\BookReadAction::class, 'pdfCertificate'])->name('certificate.pdf');
Route::get('/whous', \App\Actions\WhoUs\WhoUsAction::class,)->name('whous');
Route::get('/ClientBlackAndWhite', \App\Actions\ClientBlackAndWhite\BlackAndWhite::class)->name('ClientBlackAndWhite');
Route::get('/blog', \App\Actions\Blog::class)->name('blog');

Route::get('/drawer', \App\Actions\Drawers\Client\DrawerClientAction::class)->name('drawer');
Route::get('/gym', \App\Actions\Gym\Client\Client\GymClientAction::class)->name('gym');


Route::get('/paintings', \App\Actions\Pintings::class)->name('paintings');
Route::get('/colorphoto', \App\Actions\Colorphoto\Client\ColorphotoClientIndex::class)->name('colorphotos');

Route::get('/kitchen', \App\Actions\Kitchens\Client\KitchenClientIndex::class)->name('kitchen');

Route::get('/office', \App\Actions\Office\Client\OfficeClientAction::class)->name('office');

Route::get('/location', \App\Actions\Location::class)->name('location');


Route::get('/terrace', \App\Actions\Terrace\Client\TerraceClientAction::class)->name('terrace');


Route::get('/bathroom', \App\Actions\Bathrooms\Client\BathroomClientIndex::class)->name('bathroom');

Route::get('/laundryroom', \App\Actions\Laundryroom\Client\LaundruroomClientAction::class)->name('laundryroom');

Route::get('/livingroom', \App\Actions\Livingroom\Client\LivingroomClientAction::class)->name('livingroom');

Route::get('/warehouse', \App\Actions\Warehouses\Client\WarehouseClientAction::class)->name('warehouse');
Route::get('/official', \App\Actions\Officials\Client\OfficialClientAction::class)->name('official');



Route::get('/externalsession', \App\Actions\Externalsessions\Client\ExternalsessionClientAction::class)->name('externalsession');
Route::get('/bedroom', \App\Actions\Bedrooms\Client\BedroomClientIndex::class)->name('bedroom');
Route::get('/house', \App\Actions\Houses\Client\HouseClientAction::class)->name('house');





Route::get('/coin', \App\Actions\Coins\Client\CoinClientIndex::class)->name('coin');

Route::get('/channel', \App\Actions\Chanels\ChannelClientIndex::class)->name('channel');
Route::get('/channell', \App\Actions\Chanels\ChannelTikIndex::class)->name('channeltik');

Route::get('/coins/{id}/', \App\Actions\Coins\Client\ShowCoinIndex::class)->name('coins.show');

Route::get('/chamber', \App\Actions\Chambers\Client\ChamberClientAction::class)->name('chamber');

Route::get('/pool', \App\Actions\Pools\Client\PoolClientIndex::class)->name('pool');

Route::get('/sumbook', \App\Actions\SumBooks\Client\SumBookClientAction::class)->name('sumbook');

Route::get('/sumbook/{sumbook}', \App\Actions\SumBooks\Client\ShowSumBookIndex::class)->name('sumbook.show');

Route::get('/diningroom', \App\Actions\Diningroom\Client\DiningroomClientIndex::class)->name('diningroom');

Route::get('/landscape', \App\Actions\Landscape\Client\LandscapeClientAction::class)->name('landscape');


Route::get('/blogs', \App\Actions\Blog\Client\BlogClientViewAction::class)->name('blogs');
Route::get('/certificate', \App\Actions\Certificates\Client\CertificateClientIndex::class)->name('certificate');

Route::get('/decor', [\App\Actions\Decors\Client\DecorClientIndex::class, 'handle'])->name('decor');


Route::prefix('auth')->group(function () {

    Route::get('/view-form/{note}', [\App\Actions\WhoUs\UpdateNotesAction::class, 'viewForm'])->name('view.form');





    Route::get('/colorphoto/index', \App\Actions\Colorphoto\Admin\ColorphotoAdminindex::class)->name('colorphoto-index');
    Route::get('/colorphoto/create/view', \App\Actions\Colorphoto\Admin\ColorphotoCreateViewIndex::class)->name('colorphoto-create-view');
    Route::get('/colorphoto/edit/view{colorphoto}', \App\Actions\Colorphoto\Admin\ColorphotoEditView::class)->name('colorphoto-edit-view');


    Route::post('/colorphoto/create', \App\Actions\Colorphoto\Admin\CreateAction::class)->name('colorphoto-create');
    Route::post('/colorphoto/delete/{colorphoto}', \App\Actions\Colorphoto\Admin\DeleteColorphotoAction::class)->name('colorphoto-delete');
    Route::post('/colorphoto/update/{colorphoto}', \App\Actions\Colorphoto\Admin\EditColorphotoAction::class)->name('colorphoto-update');



    Route::get('/Decor/index', [\App\Actions\Decors\Admin\DecorAdminIndex::class, 'handle'])->name('Decor.index');
    Route::get('/Decor/create/view', [\App\Actions\Decors\Admin\DecorCreateViewIndex::class,'handle'])->name('Decor-create-view');
    Route::get('/Decor/edit/view/{decor}', [\App\Actions\Decors\Admin\DecorEditView::class, 'handle'])->name('Decor-update-view');

    Route::post('/Decor/create', [\App\Actions\Decors\Admin\CreateAction::class, 'handle'])->name('Decor.create');
    Route::post('/Decor/Delete/{Decor}', [\App\Actions\Decors\Admin\DeleteDecorAction::class, 'handle'])->name('Decor.delete');
    Route::post('/decor/update/{decor}', [\App\Actions\Decors\Admin\EditDecorAction::class,'handle'])->name('decor.update');




    Route::get('/coin/index', \App\Actions\Coins\Admin\CoinAdminIndex::class)->name('coin-index');

    Route::post('/coin/create', \App\Actions\Coins\Admin\CreateAction::class)->name('coin-create');

    Route::get('/coin/create/view', \App\Actions\Coins\Admin\CoinCreateViewIndex::class)->name('coin-create-view');

    Route::post('/coin/delete/{coin}', \App\Actions\Coins\Admin\DeleteCoinAction::class)->name('coin-delete');

    Route::post('/coin/update/{coin}', \App\Actions\Coins\Admin\EditCoinAction::class)->name('coin-update');

    Route::get('/coin/edit/view/{coin}', \App\Actions\Coins\Admin\CoinEditView::class)->name('coin-edit-view');


    Route::get('/office/index', \App\Actions\Office\Admin\OfficeAdminIndex::class)->name('office-index');

    Route::post('/office/create', \App\Actions\Office\Admin\CreateAction::class)->name('office-create');

    Route::get('/office/create/view', \App\Actions\Office\Admin\OfficeCreateViewIndex::class)->name('office-create-view');

    Route::post('/office/delete/{office}', \App\Actions\Office\Admin\DeleteOfficeAction::class)->name('office-delete');

    Route::post('/office/update/{office}', \App\Actions\Office\Admin\EditOfficeAction::class)->name('office-update');

    Route::get('/office/edit/view/{office}', \App\Actions\Office\Admin\OfficeEditView::class)->name('office-edit-view');




    Route::get('/bathroom/index', \App\Actions\Bathrooms\Admin\BathroomAdminIndex::class)->name('bathroom-index');

    Route::post('/bathroom/create', \App\Actions\Bathrooms\Admin\CreateAction::class)->name('bathroom-create');

    Route::get('/bathroom/create/view', \App\Actions\Bathrooms\Admin\BathroomCreateViewIndex::class)->name('bathroom-create-view');
    Route::post('/bathroom/delete/{bathroom}', \App\Actions\Bathrooms\Admin\DeleteBathroomAction::class)->name('bathroom-delete');

    Route::post('/bathroom/update/{bathroom}', \App\Actions\Bathrooms\Admin\EditBathroomAction::class)->name('bathroom-update');

    Route::get('/bathroom/edit/view/{bathroom}', \App\Actions\Bathrooms\Admin\BathroomEditView::class)->name('bathroom-edit-view');



    Route::get('/diningroom/index', \App\Actions\Diningroom\Admin\DiningroomAdminIndex::class)->name('diningroom-index');
    Route::post('/diningroom/create', \App\Actions\Diningroom\Admin\CreateAction::class)->name('diningroom-create');
    Route::get('/diningroom/create/view', \App\Actions\Diningroom\Admin\DiningroomCreateViewIndex::class)->name('diningroom-create-view');
    Route::post('/diningroom/delete/{diningroom}',\App\Actions\Diningroom\Admin\DeleteDiningroomAction::class)->name('diningroom-delete');
    Route::post('/diningroom/update/{diningroom}',\App\Actions\Diningroom\Admin\EditDiningroomAction::class)->name('diningroom-update');
    Route::get('/diningroom/edit/view/{diningroom}', \App\Actions\Diningroom\Admin\DiningroomEditView::class)->name('diningroom-edit-view');













    Route::get('/pool/index', \App\Actions\Pools\Admin\PoolAdminIndex::class)->name('pool-index');

    Route::post('/pool/create', \App\Actions\Pools\Admin\CreateAction::class)->name('pool-create');

    Route::get('/pool/create/view', \App\Actions\Pools\Admin\PoolCreateViewIndex::class)->name('pool-create-view');

    Route::post('/pool/delete/{pool}', \App\Actions\Pools\Admin\DeletePoolAction::class)->name('pool-delete');

    Route::post('/pool/update/{pool}', \App\Actions\Pools\Admin\EditPoolAction::class)->name('pool-update');

    Route::get('/pool/edit/view/{pool}', \App\Actions\Pools\Admin\PoolEditView::class)->name('pool-edit-view');


    Route::get('/official/index', \App\Actions\Officials\Admin\OfficialAdminIndex::class)->name('official-index');
    Route::post('/official/create', \App\Actions\Officials\Admin\CreateAction::class)->name('official-create');
    Route::get('/official/create/view', \App\Actions\Officials\Admin\OfficialCreateViewIndex::class)->name('official-create-view');
    Route::post('/official/delete/{official}', \App\Actions\Officials\Admin\DeleteOfficialAction::class)->name('official-delete');
    Route::post('/official/update/{official}', \App\Actions\Officials\Admin\EditOfficialAction::class)->name('official-update');
    Route::get('/official/edit/view/{official}', \App\Actions\Officials\Admin\OfficialEditView::class)->name('official-edit-view');














    Route::get('/kitchen/index', \App\Actions\Kitchens\Admin\KitchenAdminIndex::class)->name('kitchen-index');
    Route::get('/kitchen/create/view', \App\Actions\Kitchens\Admin\KitchenCreateViewIndex::class)->name('kitchen-create-view');
    Route::get('/kitchen/edit/view/{kitchen}', \App\Actions\Kitchens\Admin\KitchenEditViewIndex::class)->name('kitchen-edit-view');
    Route::post('/kitchen/create', \App\Actions\Kitchens\Admin\CreateAction::class)->name('kitchen-create');
    Route::post('/kitchen/delete/{kitchen}', \App\Actions\Kitchens\Admin\DeleteKitchenAction::class)->name('kitchen-delete');
    Route::post('/kitchen/update/{kitchen}', \App\Actions\Kitchens\Admin\EditKitchenAction::class)->name('kitchen-edit');




    Route::get('/laundryroom/index', \App\Actions\Laundryroom\Admin\LaundryroomAdminIndex::class)->name('laundryroom-index');
    Route::post('/laundryroom/create', \App\Actions\Laundryroom\Admin\CreateAction::class)->name('laundryroom-create');
    Route::get('/laundryroom/create/view', \App\Actions\Laundryroom\Admin\LaundryroomCreateViewIndex::class)->name('laundryroom-create-view');
    Route::get('/laundryroom/edit/view/{laundryroom}', \App\Actions\Laundryroom\Admin\LaundryEditView::class)->name('laundry-edit-view');
    Route::post('/laundryroom/update/{laundryroom}', \App\Actions\Laundryroom\Admin\EditLaundryroomAction::class)->name('laundryroon-update');
    Route::post('/laundryroom/delete/{laundryroom}', \App\Actions\Laundryroom\Admin\DeleteLaundryroomAction::class)->name('laundryroom-delete');



    Route::get('/livingroom/index', \App\Actions\Livingroom\Admin\LivingroomAdminIndex::class)->name('livingroom-index');
    Route::post('/livingroom/create', \App\Actions\Livingroom\Admin\CreateAction::class)->name('livingroom-create');
    Route::get('/livingroom/create/view', \App\Actions\Livingroom\Admin\LivingroomCreateViewIndex::class)->name('livingroom-create-view');
    Route::get('/livingroom/edit/view/{livingroom}', \App\Actions\Livingroom\Admin\LivingEditView::class)->name('livingroom-edit-view');
    Route::post('/livingroom/update/{livingroom}', \App\Actions\Livingroom\Admin\EditLivingroomroomAction::class)->name('livingroom-update');
    Route::post('/livingroom/delete/{livingroom}', \App\Actions\Livingroom\Admin\DeleteLivingroomAction::class)->name('livingroom-delete');



    Route::get('/warehouse/index', \App\Actions\Warehouses\Admin\WarehousesAdminIndex::class)->name('warehouse-index');
    Route::post('/warehouse/create', \App\Actions\Warehouses\Admin\CreateAction::class)->name('warehouse-create');
    Route::get('/warehouse/create/view', \App\Actions\Warehouses\Admin\WarehouseCreateViewIndex::class)->name('warehouse-create-view');
    Route::get('/warehouse/edit/view/{warehouse}', \App\Actions\Warehouses\Admin\WareEditView::class)->name('warehouse-edit-view');
    Route::post('/warehouse/update/{warehouse}', \App\Actions\Warehouses\Admin\EditWareHouseAction::class)->name('warehouse-update');
    Route::post('/warehouse/delete/{warehouse}', \App\Actions\Warehouses\Admin\DeleteWarehouseAction::class)->name('warehouse-delete');



    Route::get('/externalsession/index', \App\Actions\Externalsessions\Admin\ExternalsessionsAdminIndex::class)->name('externalsession-index');
    Route::post('/externalsession/create', \App\Actions\Externalsessions\Admin\CreateAction::class)->name('externalsession-create');
    Route::get('/externalsession/create/view', \App\Actions\Externalsessions\Admin\ExternalsessionCreateViewIndex::class)->name('externalsession-create-view');
    Route::get('/externalsession/edit/view/{externalsession}', \App\Actions\Externalsessions\Admin\ExternalEditView::class)->name('externalsession-edit-view');
    Route::post('/externalsession/update/{externalsession}', \App\Actions\Externalsessions\Admin\EditExternalsessionAction::class)->name('externalsession-update');
    Route::post('/externalsession/delete/{externalsession}', \App\Actions\Externalsessions\Admin\DeleteExternalsessionAction::class)->name('externalsession-delete');




    Route::get('/bedroom/index', \App\Actions\Bedrooms\Admin\BedroomAdminIndex::class)->name('bedroom-index');
    Route::post('/bedroom/create', \App\Actions\Bedrooms\Admin\CreateAction::class)->name('bedroom-create');
    Route::get('/bedroom/create/view', \App\Actions\Bedrooms\Admin\BedroomCreateViewIndex::class)->name('bedroom-create-view');
    Route::get('/bedroom/edit/view/{bedroom}', \App\Actions\Bedrooms\Admin\BedroomEditView::class)->name('bedroom-edit-view');
    Route::post('/bedroom/update/{bedroom}', \App\Actions\Bedrooms\Admin\EditBedroomAction::class)->name('bedroom-update');
    Route::post('/bedroom/delete/{bedroom}', \App\Actions\Bedrooms\Admin\DeleteBedroomAction::class)->name('bedroom-delete');












    Route::get('/landscape/index', \App\Actions\Landscape\Admin\LandscapeAdminIndex::class)->name('landscape-index');
    Route::post('/landscape/create', \App\Actions\Landscape\Admin\CreateAction::class)->name('landscape-create');
    Route::get('/landscape/create/view', \App\Actions\Landscape\Admin\LandscapeCreateViewIndex::class)->name('landscape-create-view');
    Route::get('/landscape/edit/view/{landscape}', \App\Actions\Landscape\Admin\LandscapeEditView::class)->name('landscape-edit-view');
    Route::post('/landscape/update/{landscape}', \App\Actions\Landscape\Admin\EditLandscapeAction::class)->name('landscape-update');
    Route::post('/landscape/delete/{landscape}', \App\Actions\Landscape\Admin\DeleteLandscapeAction::class)->name('landscape-delete');



    Route::get('/drawer/index', \App\Actions\Drawers\Admin\DrawerAdminIndex::class)->name('drawer-index');
    Route::post('/drawer/create', \App\Actions\Drawers\Admin\CreateAction::class)->name('drawer-create');
    Route::get('/drawer/create/view', \App\Actions\Drawers\Admin\DrawerCreateViewIndex::class)->name('drawer-create-view');
    Route::get('/drawer/edit/view/{drawer}', \App\Actions\Drawers\Admin\DiningroomEditView::class)->name('drawer-edit-view');
    Route::post('/drawer/update/{drawer}', \App\Actions\Drawers\Admin\EditDrawerAction::class)->name('drawer-update');
    Route::post('/drawer/delete/{drawer}', \App\Actions\Drawers\Admin\DeleteDrawerAction::class)->name('drawer-delete');




    Route::get('/chamber/index', \App\Actions\Chambers\Admin\ChamberAdminIndex::class)->name('chamber-index');
    Route::post('/chamber/create', \App\Actions\Chambers\Admin\CreateAction::class)->name('chamber-create');
    Route::get('/chamber/create/view', \App\Actions\Chambers\Admin\ChamberCreateViewIndex::class)->name('chamber-create-view');
    Route::get('/chamber/edit/view/{chamber}', \App\Actions\Chambers\Admin\ChamberEditView::class)->name('chamber-edit-view');
    Route::post('/chamber/update/{chamber}', \App\Actions\Chambers\Admin\EditChamberAction::class)->name('chamber-update');
    Route::post('/chamber/delete/{chamber}', \App\Actions\Chambers\Admin\DeleteChamberAction::class)->name('chamber-delete');






    Route::get('/gym/index', \App\Actions\Gym\Admin\GymAdminIndex::class)->name('gym-index');
    Route::post('/gym/create', \App\Actions\Gym\Admin\CreateAction::class)->name('gym-create');
    Route::get('/gym/create/view', \App\Actions\Gym\Admin\GymCreateViewIndex::class)->name('gym-create-view');
    Route::get('/gym/edit/view/{gym}', \App\Actions\Gym\Admin\GymEditView::class)->name('gym-edit-view');
    Route::post('/gym/update/{gym}', \App\Actions\Gym\Admin\EditGymAction::class)->name('gym-update');
    Route::post('/gym/delete/{gym}', \App\Actions\Gym\Admin\DeleteGymAction::class)->name('gym-delete');




    Route::get('/terrace/index', \App\Actions\Terrace\Admin\TerraceAdminIndex::class)->name('terrace-index');
    Route::post('/terrace/create', \App\Actions\Terrace\Admin\CreateAction::class)->name('terrace-create');
    Route::get('/terrace/create/view', \App\Actions\Terrace\Admin\TerraceCreateViewIndex::class)->name('terrace-create-view');
    Route::get('/terrace/edit/view/{terrace}', \App\Actions\Terrace\Admin\TerraceEditView::class)->name('terrace-edit-view');
    Route::post('/terrace/update/{terrace}', \App\Actions\Terrace\Admin\EditTerraceAction::class)->name('terrace-update');
    Route::post('/terrace/delete/{terrace}', \App\Actions\Terrace\Admin\DeleteTerraceAction::class)->name('terrace-delete');








    Route::get('/house/index', \App\Actions\Houses\Admin\HouseAdminIndex::class)->name('house-index');
    Route::post('/house/create', \App\Actions\Houses\Admin\CreateAction::class)->name('house-create');
    Route::get('/house/create/view', \App\Actions\Houses\Admin\HouseCreateViewIndex::class)->name('house-create-view');
    Route::get('/house/edit/view/{house}', \App\Actions\Houses\Admin\HouseEditView::class)->name('house-edit-view');
    Route::post('/house/update/{house}', \App\Actions\Houses\Admin\EditHouseAction::class)->name('house-update');
    Route::post('/house/delete/{house}', \App\Actions\Houses\Admin\DeleteHouseAction::class)->name('house-delete');





    Route::get('/client/index', \App\Actions\Client\Admin\ClientAdminIndex::class)->name('client-index');
    Route::post('/client/create', \App\Actions\Client\Admin\CreateAction::class)->name('client-create');
    Route::get('/client/create/view', \App\Actions\Client\Admin\ClientCreateViewIndex::class)->name('client-create-view');

    Route::post('/client/delete/{client}', \App\Actions\Client\Admin\DeleteClientAction::class)->name('client-delete');


















    Route::get('/sumbook/index', \App\Actions\SumBooks\Admin\SumBookAdminIndex::class)->name('sumbook-index');
    Route::post('/sumbook/create', \App\Actions\SumBooks\Admin\CreateAction::class)->name('sumbook-create');
    Route::get('/sumbook/create/view', \App\Actions\SumBooks\Admin\SumBookCreateViewIndex::class)->name('sumbook-create-view');
    Route::post('/sumbook/update/{sumbook}', \App\Actions\SumBooks\Admin\EditSumBookAction::class)->name('sumbook-edit');
    Route::get('/sumbook/edit/view/{sumbook}', \App\Actions\SumBooks\Admin\SumBookEditView::class)->name('sumbook-edit-view');
    Route::post('/sumbook/delete/{sumbook}', \App\Actions\SumBooks\Admin\DeleteSumBookAction::class)->name('sumbook-delete');








    Route::get('/dashboard', \App\Actions\dashboard\AdminDashboardViewAction::class)->name('dashboard');
    Route::get('/certificate/index', \App\Actions\Certificates\Admin\CertificateAdminIndex::class)->name('certificate-index');
    Route::get('/certificate/create/view', \App\Actions\Certificates\Admin\CertificateCreateViewIndex::class)->name('certificate-create-view');
    Route::get('/certificate/edit/view/{certificate}', \App\Actions\Certificates\Admin\CertificateEditView::class)->name('certificate-update-view');
    Route::post('/certificate/create', \App\Actions\Certificates\Admin\CreateAction::class)->name('certificate-create');
    Route::post('/certificate/delete/{certificate}', \App\Actions\Certificates\Admin\DeleteCertificateAction::class)->name('certificate-delete');
    Route::post('/certificate/update/{certificate}', \App\Actions\Certificates\Admin\EditCertificateAction::class)->name('certificate-update');
    Route::get('/admin/blog/index', \App\Actions\Blog\BlogIndexAction::class)->name('admin.blog.index');
    Route::post('/admin/blog/create', \App\Actions\Blog\BlogCreateAction::class)->name('admin.blog.create');
    Route::post('/admin/blog/delete/{blog}', \App\Actions\Blog\BlogDeleteAction::class)->name('admin.blog.delete');
    Route::post('/admin/blog/update/{blog}', \App\Actions\Blog\BlogUpdateAction::class)->name('admin.blog.update');
    Route::get('/admin/blog/create/view', \App\Actions\Blog\BlogCreateViewAction::class)->name('admin.blog.create.view');
    Route::get('/admin/blog/update/view/{blog}', \App\Actions\Blog\BlogUpdateViewAction::class)->name('admin.blog.update.view');
    Route::post('/logout', \App\Actions\Auth\LogOutAction::class)->name('logout');
    Route::post('/book/delete/{book}', \App\Actions\Books\Admin\BookDeleteAction::class)->name('book.delete');
    Route::post('/book/update/{book}', \App\Actions\Books\Admin\BooUpdateViewAction::class)->name('book.update');
    Route::post('/book/edit/{book}', \App\Actions\Books\Admin\BooUpdateAction::class)->name('book.edit');
    Route::get('/books', \App\Actions\Books\Admin\BooksIndexAction::class)->name('books');
    Route::get('/book-create', \App\Actions\Books\Admin\BookCreateView::class)->name('book-create');
    Route::post('/book-post', \App\Actions\Books\Admin\BookPostAction::class)->name('book-post');
    Route::get('/admin-create-who-us', \App\Actions\WhoUs\AdminWhoUsCreateAction::class)->name('admin.create.who.us');
    Route::get('/whous-index', \App\Actions\WhoUs\AdminWhoUsIndex::class)->name('whous-index');
    Route::post('/create-notes', \App\Actions\WhoUs\CreateNotesAction::class)->name('create.notes');
    Route::post('/update-notes/{note}', \App\Actions\WhoUs\UpdateNotesAction::class)->name('update.notes');

    Route::post('/delete-notes/{note}', \App\Actions\WhoUs\AdminWhoUsDeleteAction::class)->name('delete.notes');
    Route::get('/update-view-notes/{note}', \App\Actions\WhoUs\UpdateNotesAction::class)->name('update.view.notes');
    Route::get('/BlackAndWhite', \App\Actions\BlackAndWhite\BlackAndWhitetIndexAction::class)->name('BlackAndWhite.index');
    Route::get('/BlackAndWhite-View', \App\Actions\BlackAndWhite\BlackAndWhitetIndexAction::class)->name('BlackAndWhite.View');
    Route::get('/BlackAndWhite-create', \App\Actions\BlackAndWhite\CreateViewPhotosAction::class)->name('BlackAndWhite.create');


    Route::post('/CreatePhotoBlackAndWhite', \App\Actions\BlackAndWhite\CreatePhotosAction::class)->name('Create.PhotoBlackAndWhite');
    Route::post('/delete-blackandwhite/{blackAndWhite}', \App\Actions\BlackAndWhite\AdminBlackAndWhiteDeleteAction::class)->name('delete.Photo');
    Route::post('/update-blackandwhite/{blackAndWhite}', \App\Actions\BlackAndWhite\UpdatePhotosAction::class)->name('update.Photo');
    Route::get('/update-view/{blackAndWhite}' , \App\Actions\BlackAndWhite\UpdateViewPhotosAction::class)->name('Update.ViewPhotos');





});
