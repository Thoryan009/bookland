<?php

use App\Http\Controllers\AdminCommentController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookSeriesController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\CustomerCommentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\SubCategoryController;
// use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\AdminSellerController;
use App\Http\Controllers\MailController;

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/about-us', [WebsiteController::class, 'aboutUs'])->name('about-us');
Route::get('/contact-us', [WebsiteController::class, 'contact'])->name('contact');
Route::get('/return-refund', [WebsiteController::class, 'returnRefund'])->name('return-refund');
Route::get('/faq', [WebsiteController::class, 'faq'])->name('faq');
Route::get('/privacy-policy', [WebsiteController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/old-books', [WebsiteController::class, 'oldBook'])->name('old-books');
Route::get('/old-book/detail/{id}', [WebsiteController::class, 'oldBookDetail'])->name('old-book.detail');
Route::get('/product-category/{id}', [WebsiteController::class, 'category'])->name('product-category');
Route::get('/product-publisher/{id}', [WebsiteController::class, 'publisher'])->name('product-publisher');
Route::get('/product-detail/{id}', [WebsiteController::class, 'product'])->name('product-detail');

//cart

Route::get('/cart/index', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'store'])->name('cart.add');
Route::post('/cart/add/from/seller/book/{id}', [CartController::class, 'storeFromSellerBook'])->name('cart.add.from.seller.book');
Route::post('/cart/update/', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
Route::get('/cart/direct-add/{id}', [CartController::class, 'directAddToCart'])->name('cart.direct-add');

//wishlist

Route::get('/wishlist/index', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/update/', [WishlistController::class, 'update'])->name('wishlist.update');
Route::get('/wishlist/delete/{id}', [WishlistController::class, 'delete'])->name('wishlist.delete');
Route::get('/wishlist/direct-add/{id}', [WishlistController::class, 'directAddToWishlist'])->name('wishlist.direct-add');

//checkout

Route::get('/checkout/index', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/new-order', [CheckoutController::class, 'newOrder'])->name('checkout.new-order');
Route::get('/checkout/complete-order', [CheckoutController::class, 'completeOrder'])->name('checkout.complete-order');

//login-registration

Route::get('/customer/login', [CustomerAuthController::class, 'index'])->name('customer-login');
Route::get('/customer/registration', [CustomerAuthController::class, 'registration'])->name('customer-registration');
Route::post('/customer/new-customer', [CustomerAuthController::class, 'newCustomer'])->name('customer.new-customer');
Route::post('/customer/customer-login', [CustomerAuthController::class, 'customerLogin'])->name('customer.customer-login');
Route::get('/customer/customer-logout', [CustomerAuthController::class, 'customerLogout'])->name('customer.customer-logout');


//comment

Route::post('/comment/store', [CustomerCommentController::class, 'commentStore'])->name('comment.store');

//author

Route::get('/author-detail/{id}', [WebsiteController::class, 'authorDetail'])->name('author-detail');

//search


Route::get('/search/index', [SearchController::class, 'index'])->name('search.index');
Route::get('/search', [SearchController::class, 'search'])->name('search.search');
Route::get('/search/ajax', [SearchController::class, 'ajaxSearch'])->name('search.ajax-search');

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

Route::middleware('customer')->group(function () {

    Route::get('/customer/all-order/{id}', [CustomerController::class, 'customerOrder'])->name('customer.customer-order');
    Route::get('/customer/order-detail/{id}', [CustomerController::class, 'customerOrderDetail'])->name('customer.customer-orderDetail');
    Route::get('/customer/cancel-order/{id}', [CustomerController::class, 'customerCancelOrder'])->name('customer.customer-cancelOrder');
    Route::get('/customer/profile/', [CustomerController::class, 'customerProfile'])->name('customer.customer-profile');
    Route::post('/customer/profile-update/{id}', [CustomerController::class, 'customerUpdate'])->name('customer.customer-profile-update');
});

// Seller routes 

Route::get('/seller/registration', [SellerController::class, 'registrationPage'])->name('seller.registration.page');
Route::get('/seller/login', [SellerController::class, 'loginPage'])->name('seller.login.page');
Route::post('/seller/new-seller', [SellerController::class, 'newSeller'])->name('seller.store.seller.data');
Route::post('/seller/login-seller', [SellerController::class, 'sellerLogin'])->name('seller.login.data');
Route::get('/seller/profile', [SellerController::class, 'sellerProfile'])->name('seller.profile');
Route::get('/seller/add-book', [SellerController::class, 'addBookPage'])->name('seller.add.book');
Route::post('/seller/store-book', [SellerController::class, 'storeBook'])->name('seller.store.book');
Route::get('/seller/my-books', [SellerController::class, 'mybook'])->name('seller.my.book');
Route::get('/seller/my-book/detail/{id}', [SellerController::class, 'myBookDetail'])->name('seller.my.book.detail');
Route::get('/seller/edit/book/{id}', [SellerController::class, 'editBook'])->name('seller.edit.book');
Route::post('/seller/update-book/{id}', [SellerController::class, 'updateBook'])->name('seller.update.book');
Route::get('/seller/customer-orders/', [SellerController::class, 'customerOrders'])->name('seller.customer.orders');
Route::get('/seller/customer-order-detail/{id}', [SellerController::class, 'customerOrderDetail'])->name('seller.customer.order.detail');
Route::get('/seller/customer-order-edit/{id}', [SellerController::class, 'customerOrderEdit'])->name('seller.customer.order.edit');
Route::post('/seller/customer-order-update/{id}', [SellerController::class, 'customerOrderUpdate'])->name('seller.customer.order.update');
Route::post('/seller/information-update/{id}', [SellerController::class, 'updateSeller'])->name('seller.information.update');


// Mail route 
Route::get('/mail-send', [MailController::class, 'sendMail'])->name('send.mail');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('/publisher/index', [PublisherController::class, 'index'])->name('publisher.index');
    Route::get('/publisher/create', [PublisherController::class, 'create'])->name('publisher.create');
    Route::post('/publisher/store', [PublisherController::class, 'store'])->name('publisher.store');
    Route::get('/publisher/edit/{id}', [PublisherController::class, 'edit'])->name('publisher.edit');
    Route::post('/publisher/update/{id}', [PublisherController::class, 'update'])->name('publisher.update');
    Route::get('/publisher/delete/{id}', [PublisherController::class, 'delete'])->name('publisher.delete');

    Route::get('/sub-category/index', [SubCategoryController::class, 'index'])->name('sub-category.index');
    Route::get('/sub-category/create', [SubCategoryController::class, 'create'])->name('sub-category.create');
    Route::get('/sub-category/edit/{id}', [SubCategoryController::class, 'edit'])->name('sub-category.edit');
    Route::post('/sub-category/store', [SubCategoryController::class, 'store'])->name('sub-category.store');
    Route::post('/sub-category/update/{id}', [SubCategoryController::class, 'update'])->name('sub-category.update');
    Route::get('/sub-category/delete/{id}', [SubCategoryController::class, 'delete'])->name('sub-category.delete');

    Route::get('/language/index', [LanguageController::class, 'index'])->name('language.index');
    Route::get('/language/create', [LanguageController::class, 'create'])->name('language.create');
    Route::post('/language/store', [LanguageController::class, 'store'])->name('language.store');
    Route::get('/language/edit/{id}', [LanguageController::class, 'edit'])->name('language.edit');
    Route::post('/language/update/{id}', [LanguageController::class, 'update'])->name('language.update');
    Route::get('/language/delete/{id}', [LanguageController::class, 'delete'])->name('language.delete');

    Route::get('/author/index', [AuthorController::class, 'index'])->name('author.index');
    Route::get('/author/create', [AuthorController::class, 'create'])->name('author.create');
    Route::post('/author/store', [AuthorController::class, 'store'])->name('author.store');
    Route::get('/author/edit/{id}', [AuthorController::class, 'edit'])->name('author.edit');
    Route::post('/author/update/{id}', [AuthorController::class, 'update'])->name('author.update');
    Route::get('/author/delete/{id}', [AuthorController::class, 'delete'])->name('author.delete');

    Route::get('/book-series/index', [BookSeriesController::class, 'index'])->name('book-series.index');
    Route::get('/book-series/create', [BookSeriesController::class, 'create'])->name('book-series.create');
    Route::post('/book-series/store', [BookSeriesController::class, 'store'])->name('book-series.store');
    Route::get('/book-series/edit/{id}', [BookSeriesController::class, 'edit'])->name('book-series.edit');
    Route::post('/book-series/update/{id}', [BookSeriesController::class, 'update'])->name('book-series.update');
    Route::get('/book-series/delete/{id}', [BookSeriesController::class, 'delete'])->name('book-series.delete');

    Route::get('/product/index', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/get-sub-category-by-category', [ProductController::class, 'getSubCategoryByCategory'])->name('get-sub-category-by-category');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');

    Route::get('/book/index', [BookController::class, 'index'])->name('book.index');
    Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
    Route::get('/get-sub-category-by-category', [BookController::class, 'getSubCategoryByCategory'])->name('get-sub-category-by-category');
    Route::post('/book/store', [BookController::class, 'store'])->name('book.store');
    Route::get('/book/edit/{id}', [BookController::class, 'edit'])->name('book.edit');
    Route::get('/book/detail/{id}', [BookController::class, 'detail'])->name('book.detail');
    Route::post('/book/update/{id}', [BookController::class, 'update'])->name('book.update');
    Route::get('/book/delete/{id}', [BookController::class, 'delete'])->name('book.delete');

    Route::get('/admin/all-order', [AdminOrderController::class, 'index'])->name('admin.all-order');
    Route::get('/admin/order-detail/{id}', [AdminOrderController::class, 'detail'])->name('admin.order-detail');
    Route::get('/admin/order-edit/{id}', [AdminOrderController::class, 'edit'])->name('admin.order-edit');
    Route::post('/admin/order-update/{id}', [AdminOrderController::class, 'update'])->name('admin.order-update');
    Route::get('/admin/order-invoice/{id}', [AdminOrderController::class, 'invoice'])->name('admin.order-invoice');
    Route::get('/admin/order-invoice-print/{id}', [AdminOrderController::class, 'invoicePrint'])->name('admin.order-invoice-print');
    Route::get('/admin/order-delete/{id}', [AdminOrderController::class, 'delete'])->name('admin.order-delete');

    Route::get('/admin/customer-order-edit/{id}', [AdminOrderController::class, 'customerOrderEdit'])->name('admin.customer.order-edit');
    Route::post('/admin/customer-order-update/{id}', [AdminOrderController::class, 'customerOrderUpdate'])->name('admin.customer.order-update');


    Route::get('/all-seller', [AdminSellerController::class, 'index'])->name('all.seller');
    Route::get('/seller/detail/{id}', [AdminSellerController::class, 'sellerDetail'])->name('seller.detail');
    Route::get('/seller/request', [AdminSellerController::class, 'sellRequestPage'])->name('seller.request.page');
    Route::get('/seller/request/detail/{id}', [AdminSellerController::class, 'sellRequestDetailPage'])->name('seller.request.detail');
    Route::get('/seller/request/approve/{id}', [AdminSellerController::class, 'sellApprove'])->name('seller.request.approve');
    Route::get('/seller/request/decline/{id}', [AdminSellerController::class, 'sellDecline'])->name('seller.request.decline');
    Route::get('/seller/request/add-comment/{id}', [AdminSellerController::class, 'addCommentPage'])->name('seller.request.add.coment');
    Route::post('/seller/request/store-comment/{id}', [AdminSellerController::class, 'storeComment'])->name('seller.request.store.comment');
    Route::get('/seller/all-books', [AdminSellerController::class, 'sellerBooks'])->name('seller.all.books');
    Route::get('/seller/balance-reset/{id}', [AdminSellerController::class, 'balanceReset'])->name('seller.balance.reset');

    Route::resource('customer', AdminCustomerController::class);

    Route::resource('courier', CourierController::class);

    Route::resource('user', UserController::class);

    Route::resource('admin-comment', AdminCommentController::class);
});
