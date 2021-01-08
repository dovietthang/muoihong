/*
 * jQuery Simple Shopping Cart v0.1
 * Basis shopping cart using javascript/Jquery.
 *
 * Authour : Sirisha
 */


/* '(function(){})();' this function is used, to make all variables of the plugin Private */

(function ($, window, document, undefined) {

    /* Default Options */
    var defaults = {
        cart: [],
        addtoCartClass: '.add_to_cart',
        removeCartClass:'.remove_to_cart',
        cartProductListClass: '.cart-products-list',
        totalCartCountClass: '.total-cart-count',
        totalCartCostClass: '.total-cart-cost',
        showcartID : '#show-cart',
        itemCountClass : '.item-count'
    };

    function Item(id,name, price, count,image,unit_price) {
        this.name = name;
        this.price = price;
        this.count = count;
        this.image = image;
        this.id = id;
        this.unit_price = unit_price;
    }
    /*Constructor function*/
    function simpleCart(domEle, options) {

        /* Merge user settings with default, recursively */
        this.options = $.extend(true, {}, defaults, options);
        //Cart array
        this.cart = [];
        //Dom Element
        this.cart_ele = $(domEle);
        //Initial init functionq
        this.init();
    }


    /*plugin functions */
    $.extend(simpleCart.prototype, {
        init: function () {
            this._setupCart();
            this._setEvents();
            this._loadCart();
            this._updateCartDetails();
        },
        _setupCart: function () {
            this.cart_ele.addClass("cart-grid panel panel-defaults");
            if(check_cart == 'cart'){
                this.cart_ele.append("<tbody class='cart-products-list' id='show-cart'></tbody>");
                this.cart_ele.append("<tfoot>\n\
                    <td colspan='4'><span class='text-total'>TỔNG CỘNG: </span></td>\n\
                    <td><span class='total-cart-cost'>0</span></td>\n\
                    </tfoot>");  
            }else if(check_cart == 'pay'){
                this.cart_ele.append("<div  class='cart-products-list' id='show-cart'></div>");
                this.cart_ele.append("<div class='row'><div class='col-md-6'>Tạm tính</div><div class='col-md-6 text-right total-cart-cost'>0</div></div>");
                this.cart_ele.append("<div class='row'>\n\
                    <div class='col-md-6'>Thành tiền<br>(Đã bao gồm VAT)</div>\n\
                    <div class='col-md-6 text-right total-cart-cost'>0</div>\n\
                    </div>");
                this.cart_ele.append("<div class='row'><div class='col-md-12 submit_pay'><button class='btn'>Đặt Hàng</button></div></div>");
            }else{
                this.cart_ele.append("<div class='panel-heading cart-heading'><div class='total-cart-count'>Your Cart 0 items</div><div class='spacer'></div><div></div></div>")
                this.cart_ele.append("<div class='panel-body cart-body'><div class='cart-products-list' id='show-cart'><!-- Dynamic Code from Script comes here--></div></div>")
                this.cart_ele.append("<div class='cart-summary-container'>\n\
                                    <div class='cart-offer'></div>\n\
                                            <div class='cart-total-amount'>\n\
                                                <div><span class='text-total'>TỔNG CỘNG: </span><span class='total-cart-cost'>0</span></div>\n\
                                                <div class='spacer'></div>\n\
                                                <div class='cart-checkout'>\n\
                                            </div>\n\
                                            <div class='edit-cart'><a href='"+$('meta[name="cart"]').attr('content')+"'>SỬA GIỎ HÀNG</a></div>\n\
                                            <div class='pay-cart'><a href='"+$('meta[name="pay"]').attr('content')+"'>THANH TOÁN</a></div>\n\
                                     </div>");
            }
            
        },
        _addProductstoCart: function () {
        },
        _updateCartDetails: function () {
            var mi = this;
            $(this.options.cartProductListClass).html(mi._displayCart());
            $(this.options.totalCartCountClass).html("<h5>GIỎ HÀNG ( " + mi._totalCartCount() + " sản phẩm)</h5>");
            $(this.options.totalCartCostClass).html(new Intl.NumberFormat('vi-VN').format(mi._totalCartCost())+'đ');
            if(check_cart == 'pay'){
                $('.list_cart').val(localStorage.getItem("shoppingCart"));
                $('.order_price').val(mi._totalCartCost());
            }
        },
        _setCartbuttons: function () {

        },
        _setEvents: function () {
            var mi = this;
            $(this.options.addtoCartClass).on("click", function (e) {
                e.preventDefault();
                var id = $(this).attr("data-id");
                var name = $(this).attr("data-name");
                var image = $(this).attr("data-image");
                var cost = Number($(this).attr("data-price"));
                mi._addItemToCart(id,name, cost, 1,image);
                mi._updateCartDetails();
            });
            if(check_cart == 'cart'){
                $(this.options.showcartID).on("click", this.options.removeCartClass, function (e) {
                    var id = $(this).attr("data-id");
                    var that = $(this);
                    mi._removeItemCart(id,that);
                    window.location.reload(true);
                });
            }
            $(this.options.showcartID).on("change", this.options.itemCountClass, function (e) {
                var ci = this;
                e.preventDefault();
                var id = $(this).attr("data-id");
                var count = $(this).val();
                var name = $(this).attr("data-name");
                var cost = Number($(this).attr("data-price"));
                var image = $(this).attr("data-image");
                mi._removeItemfromCart(id,name, cost, count,image);
                mi._updateCartDetails();
    });

        },
        /* Helper Functions */
        _addItemToCart: function (id,name, price, count,image) {

            for (var i in this.cart) {
                if (this.cart[i].id === id) {
                    this.cart[i].id = id;
                    this.cart[i].unit_price = price;
                    this.cart[i].count++;
                    this.cart[i].price = price * this.cart[i].count;
                    this.cart[i].image = image;
                    this._saveCart();
                    return;
                }
            }
            var item = new Item(id,name, price, count,image,price);
            this.cart.push(item);
            this._saveCart();
        },
        _removeItemfromCart: function (id,name, price, count,image) {
            for (var i in this.cart) {
                if (this.cart[i].id === id) {
                    this.cart[i].id = id;
                    var singleItemCost = Number(price / this.cart[i].count);
                    this.cart[i].unit_price = singleItemCost;
                    this.cart[i].count = count;
                    this.cart[i].price = singleItemCost * count;
                    this.cart[i].image = image;
                    if (count == 0) {
                        this.cart.splice(i, 1);
                    }
                    break;
                }
            }
            this._saveCart();
        },
        _removeItemCart:function (id,that){
           for (var i in this.cart) {
                if (this.cart[i].id === id) {
                  this.cart.splice(i, 1);
                }
           }
           that.parent().parent().addClass('removed-item').one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e) {
               $(this).remove();
               
           });
           this._saveCart();

        },
        _clearCart: function () {
            this.cart = [];
            this._saveCart();
        },
        _totalCartCount: function () {
            return this.cart.length;
        },
        _displayCart: function () {
            var cartArray = this._listCart();
            // console.log(cartArray);
            var output = "";
            if (cartArray.length <= 0) {
                output = "<h4>Your cart is empty</h4>";
            }
            for (var i in cartArray) {
                if(check_cart == 'cart'){
                    output +="<tr>\n\
                       <td scope='row'> <img src='" + cartArray[i].image + "' style='width:120px;height:95px;object-fit:cover'></td>\n\
                       <td>"+ new Intl.NumberFormat('vi-VN').format(cartArray[i].unit_price) +"</td>\n\
                       <td><input type='number' class='quantity form-control item-count' data-id='"+cartArray[i].id+"' data-image='"+cartArray[i].image+"' data-name='" + cartArray[i].name + "' data-price='" + cartArray[i].price + "' min='0' value=" + cartArray[i].count + " name='number'></td>\n\
                       <td><i class='fa '>" + new Intl.NumberFormat('vi-VN').format(cartArray[i].price)  + "</i></td>\n\
                       <td ><button class='remove_to_cart' data-id='"+cartArray[i].id+"'>x</button></td>\n\
                       <tr>"
                }else{
                    output += "<div class='cart-each-product row'>\n\
                       <div class='image col-md-4'><img src='" + cartArray[i].image + "' style='width:100%;height:85px;object-fit:cover'><div class='position-count'>"+cartArray[i].count+"</div></div>\n\
                       <div class='name col-md-5'>" + cartArray[i].name + "</div>\n\
                       <div class='quantity-am col-md-3'><i class='fa '>" + new Intl.NumberFormat('vi-VN').format(cartArray[i].price) + "</i></div>\n\
                       </div>";
                }
            }
            return output;
        },
        _totalCartCost: function () {
            var totalCost = 0;
            for (var i in this.cart) {
                totalCost += this.cart[i].price;
            }
            return totalCost;
        },
        _listCart: function () {
            var cartCopy = [];
             console.log(this.cart);
            for (var i in this.cart) {
                var item = this.cart[i];
                var itemCopy = {};
                for (var p in item) {
                    itemCopy[p] = item[p];
                }
                cartCopy.push(itemCopy);
            }
            return cartCopy;
        },
        _calGST: function () {
            var GSTPercent = 18;
            var totalcost = this.totalCartCost();
            var calGST = Number((totalcost * GSTPercent) / 100);
            return calGST;
        },
        _saveCart: function () {
            localStorage.setItem("shoppingCart", JSON.stringify(this.cart));
        },
        _loadCart: function () {
            this.cart = JSON.parse(localStorage.getItem("shoppingCart"));
            if (this.cart === null) {
                this.cart = [];
            }
        }
    });
    /* Defining the Structure of the plugin 'simpleCart'*/
    $.fn.simpleCart = function (options) {
        return this.each(function () {
            $.data(this, "simpleCart", new simpleCart(this));
            console.log($(this, "simpleCart"));
        });
    }
    ;
})(jQuery, window, document);



