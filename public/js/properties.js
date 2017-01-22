
$(function () {
// ----------

var container = $('#properties');
var productSelect = $('#product_id');

var togglePropertiesForm = function (select) {
    var selection = select.children('option:selected');
    if (!selection.val()) {
        container.empty();
    } else {
        $.get(selection.data('url'), function (data) {
            container.html(data);
        });
    }
};

if (container.is(':empty')) {
    togglePropertiesForm(productSelect);
}

productSelect.change(function () {
    togglePropertiesForm($(this));
});

// ----------
});
