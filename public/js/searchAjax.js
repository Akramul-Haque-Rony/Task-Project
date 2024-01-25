$(document).ready(function() {
    $("#category_name").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "searchCategoryParent",
                data: {
                    term: request.term
                },
                dataType: "json",
                success: function(data) {
                    var resp = $.map(data, function(obj) {
                        return obj.category_name;
                    });
                    response(resp);
                }
            });
        },
        minLength: 2
    });
    $(".brand_name").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "searchBrand",
                data: {
                    term: request.term
                },
                dataType: "json",
                success: function(data) {
                    var resp = $.map(data, function(obj) {
                        return obj.brand_name;
                    });
                    response(resp);
                }
            });
        },
        minLength: 2
    });
});