$(document).ready(function () {


    const searchInput = $('#searchInput');
    const suggestionBox = $('#searchSuggestion');


    searchInput.on('keyup', function () {


        let keyword = $(this).val();


        if (keyword.length < 2) {

            suggestionBox.addClass('hidden');
            suggestionBox.html('');

            return;

        }


        $.ajax({

            url: "/products/search/suggestion",

            type: "GET",

            data: {
                keyword: keyword
            },


            success: function (response) {


                console.log(response);


                suggestionBox.html('');


                if (response.length === 0) {

                    suggestionBox.addClass('hidden');

                    return;

                }


                response.forEach(product => {


                    suggestionBox.append(`

                        <a href="/products/${product.id}"
                           class="block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">

                            <div class="flex justify-between">

                                <span>
                                    ${product.name}
                                </span>


                                <span>
                                    ${product.price.toLocaleString()}
                                    تومان
                                </span>

                            </div>

                        </a>


                    `);


                });

                suggestionBox.removeClass('hidden');


            },


            error: function (error) {

                console.log(error);

            }


        });


    });


});
