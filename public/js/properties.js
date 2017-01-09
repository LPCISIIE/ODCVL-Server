
$(() => {
// ----------

let container = $('#properties');

$('#product_id').change((e) => {
    let selection = $(e.target).children('option:selected');
    if (selection.val() == 0) {
        container.empty();
    } else {
        $.get(selection.data('url'), (data, status) => {
            container.html(data);
        });
    }
});

// ----------
});
