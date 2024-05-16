
$(document).ready(function() {
    $('select[name="calc_shipping_provinces"]').change(function() {
        var province_id = $(this).val();
        $.ajax({
            url: 'src/api/fetch_district.php',
            method: 'POST',
            data: { province_id: province_id },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>');
                if (data.error) {
                } else {
                    $.each(data, function(index, district) {
                        $('select[name="calc_shipping_district"]').append('<option value="' + district.id + '">' + district.name + '</option>');
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("AJAX error: " + textStatus + ' : ' + errorThrown);
                console.log(jqXHR.responseText)
            }
        });
    });
});