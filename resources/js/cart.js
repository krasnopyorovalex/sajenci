document.addEventListener('DOMContentLoaded', () => {
    const btnBuys = document.querySelectorAll('.products .btn_buy');
    const endpoints = {
        addToCart: '/cart/add/',
        removeFromCart: '/cart/remove/'
    };

    const Cart = {
        addToCart: () => {
            let id = this.getId();

            return id
                ? Cart.doRequest(endpoints.addToCart + id)
                : false;
        },
        removeFromCart: () => {
            let id = this.getId();

            return id
                ? Cart.doRequest(endpoints.removeFromCart + id)
                : false;
        },
        doRequest: (endpoint, method = 'get') => {
            return window.axios({
                method: method,
                url: endpoint,
            })
                .then(function (response) {
                    // handle success
                    console.log(response);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
        },
        getId: (event) => {
            let target = event.target;
            let id = parseInt(target.getAttribute('data-id'));

            if (isNaN(id)) {
                return false;
            }

            return id;
        }
    };

    if (btnBuys) {
        const btnBuysLength = btnBuys.length;

        for (let i = 0; i < btnBuysLength; i++) {
            btnBuys[i].addEventListener("click", Cart.addToCart);
        }
    }
});
