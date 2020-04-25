require('./bootstrap');
$(document).ready(function() {
    $('.filterable .filters input').keyup(function(e) {
        var code = e.keyCode || e.which;
        if (code == '9')
            return;
        var inputContent = $(this).val().toLowerCase();
        var column = $(this).parents('.filterable').find('.filters th').index($(this).parents('th'));
        var $filteredRows = $('.table').find('tbody tr').filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        $('.table').find('tbody .no-result').remove();
        $('.table').find('tbody tr').show();
        $filteredRows.hide();
        if ($filteredRows.length === $('.table').find('tbody tr').length) {
            $('.table').find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
});